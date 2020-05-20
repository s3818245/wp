<?php
session_start();
$errorFound = 0;

$seatTypeChosen = 0;

$cleanCustData = $_POST["cust"];

$cleanMovieData = $_POST["movie"];

$cleanSeatsData = $_POST["seats"];

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
    'WED' => 'T12',
    'THU' => 'T12',
    'FRI' => 'T12',
    'SAT' => 'T21',
    'SUN' => 'T21',
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

$movieTitle = [
  'ACT' => array(
    0 => 'Avenger: Endgame',
    1 => '<img src="Photo/Avengers_Endgame_Poster.jpg" class="img-responsive mx-auto d-block" style="height: auto; max-width: 100%;">',
    2 => 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.'
  ),
  'AHF' => array(
    0 => 'The Happy Prince',
    1 => '<img src="Photo/the-happy-prince-poster.jpg" class="img-responsive mx-auto d-block" style="height: auto; max-width: 100%;">',
    2 => "In a cheap Parisian hotel room Oscar Wilde lies on his death bed. The past floods back,
    taking him to other times and places. Was he once the most famous man in London? The
    artist crucified by a society that once worshipped him? Under the microscope of death he
    reviews the failed attempt to reconcile with his long suffering wife Constance, the
    ensuing reprisal of his fatal love affair with Lord Alfred Douglas and the warmth and
    devotion of Robbie Ross, who tried and failed to save him from himself. Travelling through
    Wilde's final act and journeys through England, France and Italy, the transience of lust
    is laid bare and the true riches of love are revealed. It is a portrait of the dark side
    of a genius who lived and died for love.",
  ),
  'RMC' => array(
    0 => 'Top End Wedding',
    1 => '<img src="Photo/top-end-wedding-poster.jpg" class="img-responsive mx-auto d-block" style="height: auto; max-width: 100%;">',
    2 => "Engaged and in love Lauren and Ned have just 10 days to reunite her newly separated
    parents and pull off their dream Top End Wedding. But Lauren's mother has gone missing,
    experiencing a midlife crisis. In order to find her, the couple goes on a fantastic road
    trip across northern Australia. Along the way they find fulfillment for their own personal
    journeys through the wild beauty of the landscapes and the unbeatable charm of the
    characters that they meet along the way. But will they finally recover Lauren's mother and
    pursue their dream wedding?",
  ),
  'ANM' => array(
    0 => 'Dumbo',
    1 => '<img src="Photo/dumbo-poster.jpg" class="img-responsive mx-auto d-block" style="height: auto; max-width: 100%;">',
    2 => "Circus owner, Max Medici, enlists former star Holt Farrier and his children Milly and Joe
    to care for a newborn
    elephant whose oversized ears make him a laughingstock in an already struggling circus.
    But when they discover that Dumbo can fly, the circus makes an incredible comeback,
    attracting persuasive entrepreneur V.A. Vandevere, who recruits the
    peculiar pachyderm for his newest, larger-than-life entertainment venture, Dreamland.
    Dumbo soars to new heights alongside a charming and spectacular aerial artist, Colette
    Marchant, until Holt learns that beneath its shiny veneer, Dreamland is full
    of dark secrets.",
  ),
];

$movie_day = [
  'MON' => 'Monday',
  'TUE' => 'Tueday',
  'WED' => 'Wednesday',
  'THU' => 'Thursday',
  'FRI' => 'Friday',
  'SAT' => 'Saturday',
  'SUN' => 'Sunday',
];

$movie_hour = [
  'T12' => '12pm',
  'T15' => '3pm',
  'T18' => '6pm',
  'T21' => '9pm',
];



function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialChars($data);
  return $data;
}
function preShow($arr, $returnAsString = false)
{

  $ret  = '<pre>' . print_r($arr, true) . '</pre>';

  if ($returnAsString)

    return $ret;

  else

    echo $ret;
}

function printMyCode()
{

  $lines = file($_SERVER['SCRIPT_FILENAME']);

  echo "<pre class='mycode'><ol>";

  foreach ($lines as $line)

    echo '<li>' . rtrim(htmlentities($line)) . '</li>';

  echo '</ol></pre>';
}

function php2js($arr, $arrName)
{

  $lineEnd = "";

  echo "<script>\n";

  echo "/* Generated with A4's php2js() function */";

  echo "  var $arrName = " . json_encode($arr, JSON_PRETTY_PRINT);

  echo "</script>\n\n";
}

$pricesArrayPHP = array();

php2js($pricesArrayPHP, 'pricesArrayJS');

if (isset($_POST['session-reset'])) {

  foreach ($_SESSION as $something => &$whatever) {

    unset($whatever);
  }
}
