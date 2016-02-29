<?php
/**
 * Project: WizzairScraper
 *
 * @author Amado Martinez <amado@projectivemotion.com>
 */

namespace projectivemotion\WizzairScraper;


use projectivemotion\PhpScraperTools\BaseScraper;

class Scraper extends BaseScraper
{
    protected $protocol =   'https';
    protected $domain   =   'wizzair.com';

    protected $return_date      =   '';
    protected $departure_date   =   '';

    /**
     * Age 14+
     * @var integer
     */
    protected $adults = 0;

    /**
     * Age 2-14
     * @var integer
     */
    protected $children = 0;

    /**
     * Age 0-2
     * @var integer
     */
    protected $infants = 0;

    public function setChildren($children)
    {
        $this->children = $children;
    }

    public function setAdults($adults)
    {
        $this->adults = $adults;
    }

    public function setInfants($infants)
    {
        $this->infants = $infants;
    }

    public function setDepartureDate($departure_date)
    {
        $this->departure_date = strtotime($departure_date);
    }

    public function setReturnDate($return_date)
    {
        $this->return_date = strtotime($return_date);
    }

    public function getDepartureDate($format    =   'd/m/Y')
    {
        return date($format, $this->departure_date);
    }

    public function getReturnDate($format   =   'd/m/Y')
    {
        return date($format, $this->return_date);
    }

    public function getAdults()
    {
        return $this->adults;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getInfants()
    {
        return $this->infants;
    }

    public function makeRequest($origin, $destination)
    {
        $data   =   [
            '__EVENTTARGET' => 'ControlGroupRibbonAnonNewHomeView_AvailabilitySearchInputRibbonAnonNewHomeView_ButtonSubmit',
            '__VIEWSTATE' => '/wEPDwUBMGQYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgEFYENvbnRyb2xHcm91cFJpYmJvbkFub25OZXdIb21lVmlldyRBdmFpbGFiaWxpdHlTZWFyY2hJbnB1dFJpYmJvbkFub25OZXdIb21lVmlldyRTdHVkZXRTZW5pb3JHcm91cDE3fpgiZVYsmPCUdty1tJk6k1loTEBRGmqiM1+x7UVb',
            '35951e45-2310-4c83-a6d5-a54a4cbd9948' => '47842437-17ac-4130-b599-bea60db16526',
            'ControlGroupRibbonAnonNewHomeView$AvailabilitySearchInputRibbonAnonNewHomeView$OriginStation' => $origin,
            'ControlGroupRibbonAnonNewHomeView$AvailabilitySearchInputRibbonAnonNewHomeView$DestinationStation' => $destination,
            'ControlGroupRibbonAnonNewHomeView$AvailabilitySearchInputRibbonAnonNewHomeView$DepartureDate' => $this->getDepartureDate(),
            'ControlGroupRibbonAnonNewHomeView$AvailabilitySearchInputRibbonAnonNewHomeView$ReturnDate' => $this->getReturnDate(),
            'ControlGroupRibbonAnonNewHomeView$AvailabilitySearchInputRibbonAnonNewHomeView$PaxCountADT' => $this->getAdults(),
            'ControlGroupRibbonAnonNewHomeView$AvailabilitySearchInputRibbonAnonNewHomeView$PaxCountCHD' => $this->getChildren(),
            'ControlGroupRibbonAnonNewHomeView$AvailabilitySearchInputRibbonAnonNewHomeView$PaxCountINFANT' => $this->getInfants(),
            'ControlGroupRibbonAnonNewHomeView$AvailabilitySearchInputRibbonAnonNewHomeView$ButtonSubmit' => 'Search'
        ];

        return $this->cache_get('/en-GB/FlightSearch', $data);
    }

    public function getFlightNumber($label_el)
    {
        $input_code = pq($label_el)->val();

        $input_data = explode('|', $input_code);
        $flight_info = explode(' ', $input_data[1]);
        $flight_number = str_replace('~', '_', rtrim($flight_info[0], '~'));

        return $flight_number;
    }

    public function getFlightsFor($flights_body)
    {
        foreach ($flights_body->find('div.flight-row') as $node_index => $row_el)
        {
            if($node_index == 0) continue;
            $fr =   pq($row_el);

            $flight    =   (object)[];

            $flight->disabled  =   ($fr->hasClass('disabled'));

            $date_el  =   $fr->find('.flight-date>span');
            $fare_basic =   $fr->find('.flight-fare-container:first');
            $fare_plus =   $fr->find('.flight-fare-container:last');

            $flight->date  =   date('Y-m-d', strtotime($date_el->text()));

            if($flight->disabled) {
                yield $flight;
                continue;
            }

            $flight->departure_stamp   =   $date_el->attr('data-flight-departure');
            $flight->arrival_stamp   =   $date_el->attr('data-flight-arrival');

            $flight->flight_number =   $this->getFlightNumber($fare_basic->find('input.input-nowizzclub'));

            $flight->basic =   $fare_basic->find('label.flight-fare--active')->text();
            $flight->basic_discount =   $fare_basic->find('label.flight-fare--passive')->text();

            $flight->plus  =   $fare_plus->find('label.flight-fare--active')->text();
            $flight->plus_discount  =   $fare_plus->find('label.flight-fare--passive')->text();


            yield $flight;
        }
        return;
    }

    public function isRoundTrip()
    {
        return $this->getReturnDate() != '';
    }

    public function parseResultsPage($html_source)
    {
        $doc    =   \phpQuery::newDocument($html_source);
        $outbound_div   = $doc['#marketColumn0 div.flights-body'];
        $inbound_div    = $doc['#marketColumn1 div.flights-body'];


        $rates = (object)[
            'outbound'  => (object)['disabled' => true],
            'inbound'   =>  (object)['disabled' => true],
        ];

        if(!$outbound_div)
        {
            // @todo log error
            return $rates;
        }

        $outbound   =   $this->getFlightsFor($outbound_div);
        foreach($outbound as $flight)
        {
            if($flight->date != $this->getDepartureDate('Y-m-d'))
                continue;

            $rates->outbound    =   $flight;
            break;
        }

        if($this->isRoundTrip())
        {
            $inbound = $this->getFlightsFor($inbound_div);
            foreach($inbound as $flight)
            {
                if($flight->date != $this->getReturnDate('Y-m-d'))
                    continue;

                $rates->inbound =   $flight;
                break;
            }
        }

        return $rates;
    }

    public function getFlights($origin, $destination)
    {
        // initialize cookies.
        $home   =   $this->cache_get('/');
        $html_source    =   $this->makeRequest($origin, $destination);
        
        $rates  =   $this->parseResultsPage($html_source);
        return $rates;
    }
}