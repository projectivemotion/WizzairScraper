<?php
/**
 * Project: WizzairScraper
 *
 * @author Amado Martinez <amado@projectivemotion.com>
 */
if(!isset($argv))
    die("Run from command line.");

// copied this from doctrine's bin/doctrine.php
$autoload_files = array( __DIR__ . '/../vendor/autoload.php',
    __DIR__ . '/../../../autoload.php');

foreach($autoload_files as $autoload_file)
{
    if(!file_exists($autoload_file)) continue;
    require_once $autoload_file;
}
// end autoloader finder

if($argc < 5)
    die("$argv[0] origin:ABZ destination:GDN departure:2016-05-03 return:2016-05-07");

$wizzair    =   new \projectivemotion\WizzairScraper\Scraper();
$wizzair->cacheOn();
$wizzair->verboseOff();

$wizzair->setAdults(1);

$wizzair->setDepartureDate($argv[3]);
$wizzair->setReturnDate($argv[4]);

$flights    =   $wizzair->getFlights($argv[1], $argv[2]);

print_r($flights);