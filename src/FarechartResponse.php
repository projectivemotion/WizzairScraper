<?php
/**
 * Project: WizzairScraper
 *
 * @author Amado Martinez <amado@projectivemotion.com>
 */

namespace projectivemotion\WizzairScraper;


class FarechartResponse
{
    protected $outbound;
    protected $inbound;

    public function __construct($jsonstr)
    {
        $obj = json_decode($jsonstr, true);
        $this->outbound = array_filter($obj['outboundFlights'], function ($outinfo){
            return $outinfo['price'] !== null;
        });

        $this->inbound = array_filter($obj['returnFlights'], function ($info){
            return $info['price'] !== null;
        });
    }

    public function getDateFlights($YMDStr, $YMDStr2)
    {
        return [
            'outbound' => array_filter($this->outbound, function ($info) use ($YMDStr) {
                return $info['date'] == "${YMDStr}T00:00:00";
            }),
            'inbound' => array_filter($this->inbound, function ($info) use ($YMDStr2) {
                return $info['date'] == "${YMDStr2}T00:00:00";
            })
        ];
    }
}