<?php
/**
 * Project: WizzairScraper
 *
 * @author Amado Martinez <amado@projectivemotion.com>
 */

namespace projectivemotion\WizzairScraper;


use projectivemotion\PhpScraperTools\CacheScraper;

class Scraper extends CacheScraper
{
    protected $protocol =   'https';
    protected $domain   =   'be.wizzair.com';

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
        $params = ['flightList' => [
            ['departureStation' => $origin,
                'arrivalStation'    => $destination,
                'departureDate' =>  $this->getDepartureDate('Y-m-d')
            ],
            [
                'departureStation'  =>  $destination,
                'arrivalStation'    =>  $origin,
                'departureDate' => $this->getReturnDate('Y-m-d')
            ]],
            'wdc' => "true",
            'adultCount'    => $this->getAdults(),
            'childCount'    =>  $this->getChildren(),
            'infantCount'   =>  $this->getInfants()
        ];
        $array_source    =   $this->cache_get('/3.6.0/Api/search/search', json_encode($params) , true );
        $result =   json_decode($array_source , true);

        if(!$result)
            throw new \Exception($array_source);

        return $result;
    }

    public function isRoundTrip()
    {
        return $this->getReturnDate() != '';
    }

    public function getFlights($origin, $destination)
    {
        // initialize cookies.
        $home   =   $this->cache_get('/');
        $html_source    =   $this->makeRequest($origin, $destination);

        return $html_source;
    }
}