<?php
session_start();

$errorFound = 0;
$cleanCustData = $_POST["cust"];

function checkExpiry()
{
  $expiry = explode("-", ($_POST["cust"]["expiry"]));
  $currentDate = date_create('now');
  $currentYear = date_format($currentDate, ("Y"));
  date_add($currentDate, date_interval_create_from_date_string("28 days"));
  $validMonth = date_format($currentDate, ("m"));
  if ($expiry[0] == $currentYear) {
    if ($expiry[1] > $validMonth) {
      return TRUE;
    } else return FALSE;
  } else {
    return TRUE;
  }
}

function preShow($arr, $returnAsString = false)
{

    $ret  = '<pre>' . print_r($arr, true) . '</pre>';

    if ($returnAsString)

        return $ret;

    else

        echo $ret;
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialChars($data);
  return $data;
}

?>