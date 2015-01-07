
<?php

//$sql_host ='192.168.100.2';
$sql_host = 'localhost';
$sql_user = 'mmw_dappermen';
$sql_db = 'mmw_dappermen';

$sql_password = 'orient1967';

//connect to database
$conn = mysql_connect($sql_host, $sql_user, $sql_password) or die("Connection Failure to Database");
mysql_select_db($sql_db, $conn) or die("Database not found.");

//royalmail
$postcode = "ZE29LF";
//$postcode = "FK2 8FB";
//$postcode = "BT82 9NP"; //both equal zero
//$postcode = "BT47 2RU";
//$postcode = "PA4 0NT"; //not correct
$postcode = "wf13 4 db";

//dpd
//$postcode = "PR8 4HZ";
//$postcode = "bs34 8ux";
//$postcode = "CV3 4PE";
//$postcode = "S71 1NL";

echo getCourierByPostcode($postcode);

// if(isRoyalMailPostcode($postcode)) echo $postcode." id Royal Mail postcode."; 
//else echo $postcode." id DPD postcode.";

function getCourierByPostcode($postcode) {

    $trimPostcode = trim($postcode);

    $trimPostcode = str_replace(" ", "", $trimPostcode);

    if (strlen($trimPostcode) == 5) { // e.g W1 3AA
        $trimLeftSide = substr($trimPostcode, 0, 2);
        $trimRightSide = " " . substr($trimPostcode, 2, 1);
    }

    if (strlen($trimPostcode) == 6) { // e.g W12 3AA
        $trimLeftSide = substr($trimPostcode, 0, 3);
        $trimRightSide = " " . substr($trimPostcode, 3, 1);
    }

    if (strlen($trimPostcode) == 7) { // e.g WO12 3AA
        $trimLeftSide = substr($trimPostcode, 0, 4);
        $trimRightSide = " " . substr($trimPostcode, 4, 1);
    }



    $arrangePostcode = $trimLeftSide . $trimRightSide;

    $jhCode = $trimLeftSide . $trimRightSide;
    $jhCode = (string) $jhCode;

    //$sql = "SELECT COUNT(*) AS total FROM tbl_dpd_postcodes WHERE Postcode = '".$jhCode."'";
    $sql = "SELECT * FROM tbl_dpd_postcodes WHERE Postcode = '" . $jhCode . "'";
    //echo $sql."<br>";
    $query = mysql_query($sql);

    while ($PostCodeResult = mysql_fetch_assoc($query)) {
        $postCheckResult = (int) $PostCodeResult["GroupRef"];
    }

    if ($postCheckResult != "") {
        $sql = "select * from tbl_dpd_groups where GroupRef = " . $postCheckResult . "";
        $query = mysql_query($sql);

        while ($PostGroup = mysql_fetch_assoc($query)) {
            //print_r($PostGroup);
            $postcodeGroup = $PostGroup["GroupServices"];

            $dpdPostcode = substr($postcodeGroup, 31, 1);
            //$royailMailPostcode = substr($postcodeGroup,10,1);

            $ans = "RM";
            if ($dpdPostcode == 1)
                $ans = "DPD";
        }
    }
    return $ans;
}
?>
<?php

/*
  This file is free software: you can redistribute it and/or modify
  the code under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  However, the license header, copyright and author credits
  must not be modified in any form and always be displayed.

  This class is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  @author geoPlugin (gp_support@geoplugin.com)
  @copyright Copyright geoPlugin (gp_support@geoplugin.com)

  This file is an example PHP file of the geoplugin class
  to geolocate IP addresses using the free PHP Webservices of
  http://www.geoplugin.com/

 */

require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

/*
  Notes:

  The default base currency is USD (see http://www.geoplugin.com/webservices:currency ).
  You can change this before the call to geoPlugin::locate with eg:
  $geoplugin->currency = 'EUR';

  The default IP to lookup is $_SERVER['REMOTE_ADDR']
  You can lookup a specific IP address, by entering the IP in the call to geoPlugin::locate
  eg
  $geoplugin->locate('209.85.171.100');

 */

//locate the IP
$geoplugin->locate();

echo "Geolocation results for {$geoplugin->ip}: <br />\n" .
 "City: {$geoplugin->city} <br />\n" .
 "Region: {$geoplugin->region} <br />\n" .
 "Area Code: {$geoplugin->areaCode} <br />\n" .
 "DMA Code: {$geoplugin->dmaCode} <br />\n" .
 "Country Name: {$geoplugin->countryName} <br />\n" .
 "Country Code: {$geoplugin->countryCode} <br />\n" .
 "Longitude: {$geoplugin->longitude} <br />\n" .
 "Latitude: {$geoplugin->latitude} <br />\n" .
 "Currency Code: {$geoplugin->currencyCode} <br />\n" .
 "Currency Symbol: {$geoplugin->currencySymbol} <br />\n" .
 "Exchange Rate: {$geoplugin->currencyConverter} <br />\n";

/*
  How to use the in-built currency converter
  geoPlugin::convert accepts 3 parameters
  $amount - amount to convert (required)
  $float - the number of decimal places to round to (default: 2)
  $symbol - whether to display the geolocated currency symbol in the output (default: true)
 */
if ($geoplugin->currency != $geoplugin->currencyCode) {
    //our visitor is not using the same currency as the base currency
    echo "<p>At todays rate, US$100 will cost you " . $geoplugin->convert(100) . " </p>\n";
}

/* Finding places nearby 
  nearby($radius, $maxresults)
  $radius (optional: default 10)
  $maxresults (optional: default 5)
 */
$nearby = $geoplugin->nearby();

if (isset($nearby[0]['geoplugin_place'])) {

    echo "<pre><p>Some places you may wish to visit near " . $geoplugin->city . ": </p>\n";

    foreach ($nearby as $key => $array) {

        echo ($key + 1) . ":<br />";
        echo "\t Place: " . $array['geoplugin_place'] . "<br />";
        echo "\t Region: " . $array['geoplugin_region'] . "<br />";
        echo "\t Latitude: " . $array['geoplugin_latitude'] . "<br />";
        echo "\t Longitude: " . $array['geoplugin_longitude'] . "<br />";
    }
    echo "</pre>\n";
}
?>