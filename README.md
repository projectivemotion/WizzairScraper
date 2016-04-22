# Wizzair-Scraper
Wizzair Airline Flights Price Scraper


## Use at your own risk!
* I am not responsible for your use of this software.
* Please do not abuse!
* Please do not be stupid!


### Installation

> git clone https://github.com/projectivemotion/wizzair-scraper.git
> composer update

## Usage

See `demo/` directory. for an example

Usage: demo/wizzair.php origin destination departure return

Example: 
> php -f demo/wizzair.php SKG BUD 2016-06-08 2016-06-15

    stdClass Object
    (
        [outbound] => stdClass Object
            (
                [disabled] => 
                [date] => 2016-06-08
                [departure_stamp] => 2016-06-08T20:55:00
                [arrival_stamp] => 2016-06-08T21:30:00
                [flight_number] => W6_2448
                [basic] => €9.99
                [basic_discount] => €9.99
                [plus] => €69.49
                [plus_discount] => €69.49
            )
    
        [inbound] => stdClass Object
            (
                [disabled] => 
                [date] => 2016-06-15
                [departure_stamp] => 2016-06-15T17:45:00
                [arrival_stamp] => 2016-06-15T20:20:00
                [flight_number] => W6_2447
                [basic] => €39.99
                [basic_discount] => €29.99
                [plus] => €99.49
                [plus_discount] => €89.49
            )
    
    )

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
