<?php
session_start();
$nameErrorFound = 0;
$nameCleanData = $_POST["cust"]["name"];

$mailErrorFound = 0;
$mailCleanData = $_POST["cust"]["email"];

$mobileErrorFound = 0;
$mobileCleanData = $_POST["cust"]["mobile"];

$cardErrorFound = 0;
$cardCleanData = $_POST["cust"]["card"];

$expiryErrorFound = 0;
$expiryCleanData = $_POST["cust"]["expiry"];



$moviesDayTime = [
  'ACT' => [
    'WED' => 'T21',
    'THU' => 'T21',
    'FRI' => 'T21',
    'SAT' => 'T18',
    'SUN' => 'T18',
  ],
  'RMC' => [
    'MON' => 'T18',
    'TUE' => 'T18',
    'SAT' => 'T15',
    'SUN' => 'T15',
  ],
  'ANM' => [
    'MON' => 'T12',
    'TUE' => 'T12',
    'WED' => 'T18',
    'THU' => 'T18',
    'FRI' => 'T18',
    'SAT' => 'T12',
    'SUN' => 'T12',
  ],
  'AHF' => [
    'WED'=> 'T12',
    'THU'=> 'T12',
    'FRI'=> 'T12',
    'SAT'=> 'T21',
    'SUN'=> 'T21',
  ]
  ];

$seatPrice = [
  'original' => 
  [
    'STA' => '19.80',
    'STP' => '17.59',
    'STC' => '15.30',
    'FCA' => '30.00',
    'FCP' => '27.00',
    'FCC' => '24.00',
  ],
  'discounted' =>
  [
    'STA' => '14.00',
    'STP' => '12.50',
    'STC' => '11.00',
    'FCA' => '24.00',
    'FCP' => '22.50',
    'FCC' => '21.00',
  ]

  ];

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialChars($data);
  return $data;
}
function preShow( $arr, $returnAsString=false ) {

    $ret  = '<pre>' . print_r($arr, true) . '</pre>';

    if ($returnAsString)

         return $ret;

   else 

        echo $ret; 

}

function printMyCode() {

    $lines = file($_SERVER['SCRIPT_FILENAME']);

    echo "<pre class='mycode'><ol>";

    foreach ($lines as $line)

           echo '<li>'.rtrim(htmlentities($line)).'</li>';

    echo '</ol></pre>';

}

function php2js( $arr, $arrName ) {

    $lineEnd="";

    echo "<script>\n";

    echo "/* Generated with A4's php2js() function */";

    echo "  var $arrName = ".json_encode($arr, JSON_PRETTY_PRINT);

    echo "</script>\n\n";

}

$pricesArrayPHP = array ();

php2js($pricesArrayPHP, 'pricesArrayJS');

if (isset($_POST['session-reset'])) {

    foreach($_SESSION as $something => &$whatever) {

         unset($whatever);

    }

}
?>