<?php
/**
 * Project: WizzairScraper
 *
 * @author Amado Martinez <amado@projectivemotion.com>
 */

namespace projectivemotion\WizzairScraper\Test;


use projectivemotion\WizzairScraper\FarechartResponse;

class FarechartResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testFareResponse()
    {
        $response = new FarechartResponse(file_get_contents(__DIR__ . '/response.json'));

        $flights = $response->getDateFlights('2017-05-16', '2017-05-18');

        $this->assertCount(0, $flights['outbound']);
        $this->assertCount(0, $flights['inbound']);

        $flights = $response->getDateFlights('2017-05-14', '2017-05-17');

        $this->assertCount(1, $flights['outbound']);
        $this->assertCount(1, $flights['inbound']);

        $flights = $response->getDateFlights('2017-05-14', '2017-05-18');

        $this->assertCount(1, $flights['outbound']);
        $this->assertCount(0, $flights['inbound']);

        $flights = $response->getDateFlights('2017-05-16', '2017-05-17');

        $this->assertCount(0, $flights['outbound']);
        $this->assertCount(1, $flights['inbound']);

    }
}
