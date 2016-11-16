# Wizzair-Scraper
Wizzair Airline Flights Price Scraper V0.1.0

Last Updated: 2016-11-15

## Use at your own risk!
* I am not responsible for your use of this software.
* Please do not abuse!
* Please do not be stupid!
* Check out my other projects: [Agoda-Scraper](https://github.com/projectivemotion/agoda-scraper), [Hotelscom-Scraper](https://github.com/projectivemotion/hotelscom-scraper), [EasyJet-Scraper](https://github.com/projectivemotion/easyjet-scraper), [Planitour-Scraper](https://github.com/projectivemotion/planitour-scraper), [Xgbs-Soap Client](https://github.com/projectivemotion/xgbs-soap)

### Installation
    git clone https://github.com/projectivemotion/wizzair-scraper.git
    cd wizza-scraper && composer update

## Usage

See `demo/` directory. for an example

Usage: demo/wizzair.php origin destination departure return

Example: 
```
~/projects/php/WizzairScraper $ php -f demo/wizzair.php BFS VNO 2016-11-21 2016-11-25
array (
  'outboundFlights' => 
  array (
    0 => 
    array (
      'departureStation' => 'BFS',
      'arrivalStation' => 'VNO',
      'carrierCode' => 'W6',
      'flightNumber' => '8014',
      'flightSellKey' => 'W6~8014~ ~~BFS~11/21/2016 20:00~VNO~11/22/2016 00:55~',
      'departureDateTime' => '2016-11-21T20:00:00',
      'arrivalDateTime' => '2016-11-22T00:55:00',
      'fares' => 
      array (
        0 => 
        array (
          'fareSellKey' => '0~PW~~PWZZC~WZZC~~10~X',
          'basePrice' => 
          array (
            'amount' => 17.489999999999998,
            'currencyCode' => 'GBP',
          ),
          'discountedPrice' => 
          array (
            'amount' => 17.489999999999998,
            'currencyCode' => 'GBP',
          ),
          'bundle' => 'BASIC',
          'fareDiscountType' => 'none',
          'wdc' => true,
        ),
        1 => 
        array (
          'fareSellKey' => '0~PW~~PWZZC~WZZC~~10~X',
          'basePrice' => 
          array (
            'amount' => 90.989999999999995,
            'currencyCode' => 'GBP',
          ),
          'discountedPrice' => 
          array (
            'amount' => 54.240000000000002,
            'currencyCode' => 'GBP',
          ),
          'bundle' => 'PLUS',
          'fareDiscountType' => 'none',
          'wdc' => true,
        ),
        2 => 
        array (
          'fareSellKey' => '0~P~~PREG~REG1~~8~X',
          'basePrice' => 
          array (
            'amount' => 25.989999999999998,
            'currencyCode' => 'GBP',
          ),
          'discountedPrice' => 
          array (
            'amount' => 25.989999999999998,
            'currencyCode' => 'GBP',
          ),
          'bundle' => 'BASIC',
          'fareDiscountType' => 'none',
          'wdc' => false,
        ),
        3 => 
        array (
          'fareSellKey' => '0~P~~PREG~REG1~~8~X',
          'basePrice' => 
          array (
            'amount' => 99.489999999999995,
            'currencyCode' => 'GBP',
          ),
          'discountedPrice' => 
          array (
            'amount' => 62.740000000000002,
            'currencyCode' => 'GBP',
          ),
          'bundle' => 'PLUS',
          'fareDiscountType' => 'none',
          'wdc' => false,
        ),
      ),
      'infantLimitExceeded' => 
      array (
        'limitExceeded' => false,
        'isBlocking' => true,
      ),
      'wheelchairLimitExceeded' => 
      array (
        'limitExceeded' => false,
        'isBlocking' => true,
      ),
      'oxyLimitExceeded' => 
      array (
        'limitExceeded' => false,
        'isBlocking' => true,
      ),
      'sportsEquipmentLimitExceeded' => 
      array (
        'limitExceeded' => false,
        'isBlocking' => false,
      ),
    ),
  ),
  'returnFlights' => 
  array (
    0 => 
    array (
      'departureStation' => 'VNO',
      'arrivalStation' => 'BFS',
      'carrierCode' => 'W6',
      'flightNumber' => '8013',
      'flightSellKey' => 'W6~8013~ ~~VNO~11/25/2016 18:15~BFS~11/25/2016 19:30~',
      'departureDateTime' => '2016-11-25T18:15:00',
      'arrivalDateTime' => '2016-11-25T19:30:00',
      'fares' => 
      array (
        0 => 
        array (
          'fareSellKey' => '0~KW~~KWZZC~WZZC~~10~X',
          'basePrice' => 
          array (
            'amount' => 52.990000000000002,
            'currencyCode' => 'GBP',
          ),
          'discountedPrice' => 
          array (
            'amount' => 52.990000000000002,
            'currencyCode' => 'GBP',
          ),
          'bundle' => 'BASIC',
          'fareDiscountType' => 'none',
          'wdc' => true,
        ),
        1 => 
        array (
          'fareSellKey' => '0~KW~~KWZZC~WZZC~~10~X',
          'basePrice' => 
          array (
            'amount' => 126.48999999999999,
            'currencyCode' => 'GBP',
          ),
          'discountedPrice' => 
          array (
            'amount' => 89.739999999999995,
            'currencyCode' => 'GBP',
          ),
          'bundle' => 'PLUS',
          'fareDiscountType' => 'none',
          'wdc' => true,
        ),
        2 => 
        array (
          'fareSellKey' => '0~K~~KREG~REG1~~8~X',
          'basePrice' => 
          array (
            'amount' => 61.990000000000002,
            'currencyCode' => 'GBP',
          ),
          'discountedPrice' => 
          array (
            'amount' => 61.990000000000002,
            'currencyCode' => 'GBP',
          ),
          'bundle' => 'BASIC',
          'fareDiscountType' => 'none',
          'wdc' => false,
        ),
        3 => 
        array (
          'fareSellKey' => '0~K~~KREG~REG1~~8~X',
          'basePrice' => 
          array (
            'amount' => 135.49000000000001,
            'currencyCode' => 'GBP',
          ),
          'discountedPrice' => 
          array (
            'amount' => 98.739999999999995,
            'currencyCode' => 'GBP',
          ),
          'bundle' => 'PLUS',
          'fareDiscountType' => 'none',
          'wdc' => false,
        ),
      ),
      'infantLimitExceeded' => 
      array (
        'limitExceeded' => false,
        'isBlocking' => true,
      ),
      'wheelchairLimitExceeded' => 
      array (
        'limitExceeded' => false,
        'isBlocking' => true,
      ),
      'oxyLimitExceeded' => 
      array (
        'limitExceeded' => false,
        'isBlocking' => true,
      ),
      'sportsEquipmentLimitExceeded' => 
      array (
        'limitExceeded' => false,
        'isBlocking' => false,
      ),
    ),
  ),
  'outboundBundles' => 
  array (
    0 => 
    array (
      'code' => 'BASIC',
      'ancillaryServices' => 
      array (
      ),
    ),
    1 => 
    array (
      'code' => 'PLUS',
      'ancillaryServices' => 
      array (
        0 => 'seat-selection',
        1 => 'small-cabin-bag',
        2 => 'heavy-checked-in-bag',
        3 => 'wizz-flex',
        4 => 'priority-boarding',
        5 => 'airport-checkin',
      ),
    ),
  ),
  'returnBundles' => 
  array (
    0 => 
    array (
      'code' => 'BASIC',
      'ancillaryServices' => 
      array (
      ),
    ),
    1 => 
    array (
      'code' => 'PLUS',
      'ancillaryServices' => 
      array (
        0 => 'seat-selection',
        1 => 'small-cabin-bag',
        2 => 'heavy-checked-in-bag',
        3 => 'wizz-flex',
        4 => 'priority-boarding',
        5 => 'airport-checkin',
      ),
    ),
  ),
  'currencyCode' => 'GBP',
  'arrivalStationCurrencyCode' => 'EUR',
  'isDomestic' => false,
)
```
# License
The MIT License (MIT)

Copyright (c) 2016 Amado Martinez

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
