# Wizzair-Scraper
Wizzair Airline Flights Price Scraper
[![Build Status](https://travis-ci.org/projectivemotion/wizzair-scraper.svg?branch=master)](https://travis-ci.org/projectivemotion/wizzair-scraper)

Last Verified: 2019-12-28

## Use at your own risk!
* I am not responsible for your use of this software.
* Please do not abuse!
* Check out my other projects: [Agoda-Scraper](https://github.com/projectivemotion/agoda-scraper), [Hotelscom-Scraper](https://github.com/projectivemotion/hotelscom-scraper), [EasyJet-Scraper](https://github.com/projectivemotion/easyjet-scraper), [Planitour-Scraper](https://github.com/projectivemotion/planitour-scraper), [Xgbs-Soap Client](https://github.com/projectivemotion/xgbs-soap)

### 
    
### Composer Installation
    composer require projectivemotion/wizzair-scraper
    
### Requirements
    PHP 5.6
    Composer

### Demo
    git clone https://github.com/projectivemotion/wizzair-scraper.git
    cd wizzair-scraper && composer update
    
See `demo/` directory. for an example

Usage: demo/wizzair.php origin destination departure return

Example: 
```
~/projects/php/WizzairScraper $ php -f demo/wizzair.php BFS VNO 2016-12-07 2016-12-09
Using Parameters: BFS - VNO / 2016-12-07 - 2016-12-09

{
    "outboundFlights": [],
    "returnFlights": [
        {
            "departureStation": "VNO",
            "arrivalStation": "BFS",
            "carrierCode": "W6",
            "flightNumber": "8013",
            "flightSellKey": "W6~8013~ ~~VNO~12\/09\/2016 18:15~BFS~12\/09\/2016 19:30~",
            "departureDateTime": "2016-12-09T18:15:00",
            "arrivalDateTime": "2016-12-09T19:30:00",
            "fares": [
                {
                    "fareSellKey": "0~PW~~PWZZC~WZZC~~10~X",
                    "basePrice": {
                        "amount": 17.49,
                        "currencyCode": "GBP"
                    },
                    "discountedPrice": {
                        "amount": 17.49,
                        "currencyCode": "GBP"
                    },
                    "bundle": "BASIC",
                    "fareDiscountType": "none",
                    "wdc": true
                },
                {
                    "fareSellKey": "0~PW~~PWZZC~WZZC~~10~X",
                    "basePrice": {
                        "amount": 35.49,
                        "currencyCode": "GBP"
                    },
                    "discountedPrice": {
                        "amount": 35.49,
                        "currencyCode": "GBP"
                    },
                    "bundle": "MIDDLE",
                    "fareDiscountType": "none",
                    "wdc": true
                },
                {
                    "fareSellKey": "0~PW~~PWZZC~WZZC~~10~X",
                    "basePrice": {
                        "amount": 52.74,
                        "currencyCode": "GBP"
                    },
                    "discountedPrice": {
                        "amount": 52.74,
                        "currencyCode": "GBP"
                    },
                    "bundle": "PLUS",
                    "fareDiscountType": "none",
                    "wdc": true
                },
                {
                    "fareSellKey": "0~P~~PREG~REG1~~8~X",
                    "basePrice": {
                        "amount": 25.99,
                        "currencyCode": "GBP"
                    },
                    "discountedPrice": {
                        "amount": 25.99,
                        "currencyCode": "GBP"
                    },
                    "bundle": "BASIC",
                    "fareDiscountType": "none",
                    "wdc": false
                },
                {
                    "fareSellKey": "0~P~~PREG~REG1~~8~X",
                    "basePrice": {
                        "amount": 43.99,
                        "currencyCode": "GBP"
                    },
                    "discountedPrice": {
                        "amount": 43.99,
                        "currencyCode": "GBP"
                    },
                    "bundle": "MIDDLE",
                    "fareDiscountType": "none",
                    "wdc": false
                },
                {
                    "fareSellKey": "0~P~~PREG~REG1~~8~X",
                    "basePrice": {
                        "amount": 61.24,
                        "currencyCode": "GBP"
                    },
                    "discountedPrice": {
                        "amount": 61.24,
                        "currencyCode": "GBP"
                    },
                    "bundle": "PLUS",
                    "fareDiscountType": "none",
                    "wdc": false
                }
            ],
            "infantLimitExceeded": {
                "limitExceeded": false,
                "isBlocking": true
            },
            "wheelchairLimitExceeded": {
                "limitExceeded": false,
                "isBlocking": true
            },
            "oxyLimitExceeded": {
                "limitExceeded": false,
                "isBlocking": true
            },
            "sportsEquipmentLimitExceeded": {
                "limitExceeded": false,
                "isBlocking": false
            }
        }
    ],
    "outboundBundles": null,
    "returnBundles": [
        {
            "code": "BASIC",
            "ancillaryServices": [
                "bundle-ancillary-online-check-in",
                "bundle-ancillary-small-cabin-baggage"
            ]
        },
        {
            "code": "MIDDLE",
            "ancillaryServices": [
                "bundle-ancillary-online-check-in",
                "bundle-ancillary-seat-selection",
                "bundle-ancillary-large-cabin-baggage",
                "bundle-ancillary-light-checked-in-baggage"
            ]
        },
        {
            "code": "PLUS",
            "ancillaryServices": [
                "bundle-ancillary-seat-selection",
                "bundle-ancillary-large-cabin-baggage",
                "bundle-ancillary-heavy-checked-in-baggage",
                "bundle-ancillary-wizz-flex",
                "bundle-ancillary-wizz-account-refund",
                "bundle-ancillary-priority-boarding",
                "bundle-ancillary-small-personal-item",
                "bundle-ancillary-airport-check-in"
            ]
        }
    ],
    "currencyCode": "GBP",
    "arrivalStationCurrencyCode": "EUR",
    "isDomestic": false
}
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
