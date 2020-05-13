
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assignment 4</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">


  <script defer src="script.js"></script>
  <script src='wireframe.js'></script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<?php

session_start();

include 'tools.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

if (empty($_POST["cust"]["name"])) {
   $nameErr = "Name is required";
   $errorFound++;
 } else {
   $name = test_input($_POST["cust"]["name"]);
   if (!preg_match("/^[A-Za-z\-'., ]{1,100}$/", $name)){
     $nameErr = "Only letters and whitespace are allowed.";
     $errorFound++;
   }
}

if (empty($_POST["cust"]["email"])) {
  $emailErr = "Email is required";
  $errorFound++;
} else {
  $email = test_input($_POST["cust"]["email"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $emailErr = "Invalid email format";
     $errorFound++;
  }
}

if (empty($_POST["cust"]["mobile"])){
    $mobileErr = "Mobile number is required";
    $errorFound++;
} else {
    $mobile = test_input($_POST["cust"]["mobile"]);
    if (!preg_match("/^(\(04\)|04|\+61[4,5]|\+61 [4,5])( ?\d){8}$/", $mobile)){
        $mobileErr = "Please provide Australian phone number";
        $errorFound++;
    }
}

if(empty($_POST["cust"]["card"])){
    $cardErr = "Card number is required";
    $errorFound++;
} else {
    $card = test_input($_POST["cust"]["card"]);
    if (!preg_match("/^([\d] ?){14,19}$/", $card)){
        $cardErr = "Please provide a valid card number";
        $errorFound++;
    }
}

if(empty($_POST["cust"]["expiry"])){
    $expiryErr = "Please provide credit's card expiry";
    $errorFound++;
}

if($errorFound == 0){
  foreach ($cleanData as $key => $value){
    $_SESSION[$key] = $value;
  }

}

if (isset($_POST['session-reset'])) {
  unset($_SESSION);
}

}  
?>

  <header>
    <div class="container-fluid p-4">
      <img src="Photo/logo.png" alt="Cinemax" id="logo">
    </div>
  </header>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand">Cinemax</a>

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#one">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#two">Now Showing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#three">Pricing</a>
      </li>

    </ul>
  </nav>

  <main class="main_content">
    <!--About us section-->
    <section id="one">
      <div class="parallax dolby_image">
        <div class="container-fluid p-4 section_title">
          <h1>About us</h1>
        </div>
        <div class="container p-4 my-5 text_on_image">The renovated Cinemax now offers immersive movie experience with
          3D Dolby Vision</div>
      </div>

      <div class="parallax seat_promo_image">
        <div class="navbar p-4 " style="background-color: lightslategrey;">

        </div>
        <div class="container p-4 mt-5 text_on_image">
          Enjoy movies the way you like with Cinemax's variety of seat types to choose from. <br>
          <p id="sub_text">*(More details in Pricing section)</p>
        </div>
      </div>
    </section>

    <!--Now showing section-->

    <section id="two">
      <div class="container-fluid p-4 section_title">
        <h1>Now showing</h1>
      </div>
      <div class="now_showing_section">
        <div class="row equal customGutter">
          <div class="col-lg-6 py-2">
            <div class="row borderBg">
              <div class="col-xl-4 borderPadding d-flex align-items-center justify-content-center">
                <img src="Photo/Avengers_Endgame_Poster.jpg" class="img-responsive mx-auto d-block poster_size"
                  alt="Avengers Endgame">
              </div>
              <div class="col-xl-8 borderPadding">
                <div class="row">
                  <div class="col-xl-9 col-md-6 title">Avengers Endgame</div>
                  <div class="col-xl-3 col-md-6 rating">PG-13</div>
                </div>
                <div class="row borderPadding">
                  <div class="col-xl-12 time">
                    <ul>
                      <div class="title2">Movie ID: ACT</div>
                      <li>Wednesday - 9pm (T21) </li>
                      <li>Thursday - 9pm (T21) </li>
                      <li>Friday - 9pm (T21)</li>
                      <li>Saturday - 6pm (T18)</li>
                      <li>Sunday - 6pm (T18)</li>
                    </ul>
                  </div>
                </div>
                <div class="row borderPadding">
                  <!-- Button trigger Avengers Endgame modal -->
                  <button type="button" value="ACT" class="synopsis btn btn-primary rounded"
                    >
                    More Info
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 py-2">
            <div class="row borderBg">
              <div class="col-xl-4 borderPadding d-flex align-items-center justify-content-center">
                <img src="Photo/the-happy-prince-poster.jpg" class="img-responsive mx-auto d-block poster_size"
                  alt="The Happy Prince">
              </div>
              <div class="col-xl-8 borderPadding">
                <div class="row">
                  <div class="col-xl-9 col-md-6 title">The Happy Prince</div>
                  <div class="col-xl-3 col-md-6 rating">R</div>
                </div>
                <div class="row borderPadding">
                  <div class="col-xl-12 time">
                    <ul>
                      <div class="title2">Movie ID: AHF</div>
                      <li>Wednesday - 12pm (T12)</li>
                      <li>Thursday - 12pm (T12)</li>
                      <li>Friday - 12pm (T12)</li>
                      <li>Saturday - 9pm (T21)</li>
                      <li>Sunday - 9pm (T21)</li>
                    </ul>
                  </div>
                </div>
                <div class="row borderPadding">
                  <!-- Button trigger The Happy Prince modal -->
                  <button type="button" value="AHF" class="synopsis btn btn-primary rounded"
                    >
                    More Info
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row equal customGutter">
          <div class="col-lg-6 py-2">
            <div class="row borderBg">
              <div class="col-xl-4 borderPadding d-flex align-items-center justify-content-center">
                <img src="Photo/top-end-wedding-poster.jpg" class="img-responsive mx-auto d-block poster_size"
                  alt="Top End Wedding">
              </div>
              <div class="col-xl-8 borderPadding">
                <div class="row">
                  <div class="col-xl-9 col-md-6 title">Top End Wedding</div>
                  <div class="col-xl-3 col-md-6 rating">NR</div>
                </div>
                <div class="row borderPadding">
                  <div class="col-xl-12 time">
                    <ul>
                      <div class="title2">Movie ID: RMC</div>
                      <li>Monday - 6pm (T18)</li>
                      <li>Tuesday - 6pm (T18)</li>
                      <li>Saturday - 3pm (T15)</li>
                      <li>Sunday - 3pm (T15)</li>
                    </ul>
                  </div>
                </div>
                <div class="row borderPadding">
                  <!-- Button trigger Top End Wedding modal -->
                  <button type="button" value="RMC" class="synopsis btn btn-primary rounded"
                    >
                    More Info
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 py-2">
            <div class="row borderBg">
              <div class="col-xl-4 borderPadding d-flex align-items-center justify-content-center">
                <img src="Photo/dumbo-poster.jpg" class="img-responsive mx-auto d-block poster_size" alt="Dumbo">
              </div>
              <div class="col-xl-8 borderPadding">
                <div class="row">
                  <div class="col-xl-9 col-md-6 title">Dumbo</div>
                  <div class="col-xl-3 col-md-6 rating">PG</div>
                </div>
                <div class="row borderPadding">
                  <div class="col-xl-12 time">
                    <ul>
                      <div class="title2">Movie ID: ANM</div>
                      <li>Monday - 12pm (T12)</li>
                      <li>Tuesday - 12pm (T12)</li>
                      <li>Wednesday - 6pm (T18)</li>
                      <li>Thursday - 6pm (T18)</li>
                      <li>Friday - 6pm (T18)</li>
                      <li>Saturday - 12pm (T12)</li>
                      <li>Sunday - 12pm (T12)</li>
                    </ul>
                  </div>
                </div>
                <div class="row borderPadding">
                  <!-- Button trigger Dumbo modal -->
                  <button type="button" value="ANM" class="synopsis btn btn-primary rounded"
                    >
                    More Info
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--SECTION SYNOPSIS-->
    <section id="movie-synopsis">
      <!--General Modal-->
      <div class="section-content">

        <div class="synopsis-content" id="show-synopsis">
          <div>
            <h1>Synopsis</h1>
          </div>
          <div class="default-title">
            Please select a movie
          </div>
          <!-- CONTENT FOR AVENGERS SYNOPSIS -->
          <div id="ACTsynopsis" class="carousel slide" data-interval="false" data-ride="carousel" hidden>
            <div class="movie-header">
              Avengers: Endgame
            </div>
            <!-- The slideshow -->
            <div class="carousel-inner">
              <!--First slide (Basic Info)-->
              <div class="carousel-item active">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-6">
                      <img src="Photo/Avengers_Endgame_Poster.jpg" class="img-responsive mx-auto d-block"
                        style="height: auto; max-width: 100%;" alt="Poster Art">
                    </div>
                    <div class="col-xl-6">
                      <div class="col-xl-12">
                        <p class="title1">Info</p>
                        <p>Rating: PG-13 (for sequences of sci-fi violence and action, and
                          some
                          language)</p>
                        <p>Genre: Action & Adventure, Drama, Science Fiction & Fantasy</p>
                        <p>Directed By: Joe Russo, Anthony Russo</p>
                        <p>Written By: Christopher Markus, Stephen McFeely</p>
                        <p>Studio: Marvel Studios</p>
                        <p>Runtime: 182 minutes</p>
                      </div>
                      <div class="col-xl-12">
                        <p class="title1">Plot Description</p>
                        <p>Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his
                          oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow,
                          Captain America and Bruce Banner -- must figure out a way to bring back their vanquished
                          allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and
                          the
                          universe.</p>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row" id="top-border">
                    <div class="col-xl-3">
                      <p class="title1">Make a booking:</p>
                    </div>
                    <div class="col-xl-8">
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="WED_T21">Wednesday: 9pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="THU_T21">Thursday: 9pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="FRI_T21">Friday: 9pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="SAT_T18">Saturday: 6pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="SUN_T18">Sunday: 6pm</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--Second slide (Trailer)-->
              <div class="carousel-item">
                <div class="row d-flex align-items-center justify-content-center">
                  <div class="col-9">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                      <iframe width="900" height="500" src="https://www.youtube.com/embed/TcMBFSGVi1c" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#ACTsynopsis" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#ACTsynopsis" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>

          <!-- CONTENT FOR HAPPY PRINCE SYNOPSIS -->
          <div id="AHFsynopsis" class="carousel slide" data-interval="false" data-ride="carousel" hidden>
            <div class="movie-header">
              The Happy Prince
            </div>
            <!-- The slideshow -->
            <div class="carousel-inner">
              <!--First slide (Basic Info)-->
              <div class="carousel-item active">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-6">
                      <img src="Photo/the-happy-prince-poster.jpg" class="img-responsive mx-auto d-block"
                        style="height: auto; max-width: 100%;" alt="Poster Art">
                    </div>
                    <div class="col-xl-6">
                      <div class="col-xl-12">
                        <p class="title1">Info</p>
                        <p>Rating: R (for sexual content, graphic nudity, language, and
                          brief
                          drug use)</p>
                        <p>Genre: Drama</p>
                        <p>Directed By: Rupert Everett</p>
                        <p>Written By: Rupert Everett</p>
                        <p>Studio: Sony Pictures Classics</p>
                        <p>Runtime: 105 minutes</p>
                      </div>
                      <div class="col-xl-12">
                        <p class="title1">Plot Description</p>
                        <p>In a cheap Parisian hotel room Oscar Wilde lies on his death bed. The past floods back,
                          taking him to other times and places. Was he once the most famous man in London? The
                          artist crucified by a society that once worshipped him? Under the microscope of death he
                          reviews the failed attempt to reconcile with his long suffering wife Constance, the
                          ensuing reprisal of his fatal love affair with Lord Alfred Douglas and the warmth and
                          devotion of Robbie Ross, who tried and failed to save him from himself. Travelling through
                          Wilde's final act and journeys through England, France and Italy, the transience of lust
                          is laid bare and the true riches of love are revealed. It is a portrait of the dark side
                          of a genius who lived and died for love.</p>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row" id="top-border">
                    <div class="col-xl-3">
                      <p class="title1">Make a booking:</p>
                    </div>
                    <div class="col-xl-8">
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="WED_T12">Wednesday: 12pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="THU_T12">Thursday: 12pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="FRI_T12">Friday: 12pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="SAT_T21">Saturday: 9pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="SUN_T21">Sunday: 9pm</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--Second slide (Trailer)-->
              <div class="carousel-item">
                <div class="row d-flex align-items-center justify-content-center">
                  <div class="col-9">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                      <iframe zwidth="900" height="500" src="https://www.youtube.com/embed/4HmN9r1Fcr8" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#AHFsynopsis" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#AHFsynopsis" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>

          <!-- CONTENT FOR TOP END WEDDING SYPNOSIS -->
          <div id="RMCsynopsis" class="carousel slide" data-interval="false" data-ride="carousel" hidden>
            <div class="movie-header">
              Top End Wedding
            </div>
            <!-- The slideshow -->
            <div class="carousel-inner">
              <!--First slide (Basic Info)-->
              <div class="carousel-item active">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-6">
                      <img src="Photo/top-end-wedding-poster.jpg" class="img-responsive mx-auto d-block"
                        style="height: auto; max-width: 100%;" alt="Poster Art">
                    </div>
                    <div class="col-xl-6">
                      <div class="col-xl-12">
                        <p class="title1">Info</p>
                        <p>Rating: NR (Not Rated)</p>
                        <p>Genre: Comedy, Romance</p>
                        <p>Directed By: Wayne Blair</p>
                        <p>Written By: Miranda Tapsell, Joshua Tyler</p>
                        <p>Studio: Goalpost Pictures</p>
                        <p>Runtime: 103 minutes</p>
                      </div>
                      <div class="col-xl-12">
                        <p class="title1">Plot Description</p>
                        <p>Engaged and in love Lauren and Ned have just 10 days to reunite her newly separated
                          parents and pull off their dream Top End Wedding. But Lauren's mother has gone missing,
                          experiencing a midlife crisis. In order to find her, the couple goes on a fantastic road
                          trip across northern Australia. Along the way they find fulfillment for their own personal
                          journeys through the wild beauty of the landscapes and the unbeatable charm of the
                          characters that they meet along the way. But will they finally recover Lauren's mother and
                          pursue their dream wedding?</p>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row" id="top-border">
                    <div class="col-xl-3">
                      <p class="title1">Make a booking:</p>
                    </div>
                    <div class="col-xl-8">
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="MON_T18">Monday: 6pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="TUE_T18">Tuesday: 6pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="SAT_T15">Saturday: 3pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="SUN_T15">Sunday: 3pm</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--Second slide (Trailer)-->
              <div class="carousel-item">
                <div class="row d-flex align-items-center justify-content-center">
                  <div class="col-9">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                      <iframe width="900" height="500" src="https://www.youtube.com/embed/uoDBvGF9pPU" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#RMCsynopsis" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#RMCsynopsis" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>

          <!-- CONTENT FOR DUMBO SYNOPSIS -->

          <div id="ANMsynopsis" class="carousel slide" data-interval="false" data-ride="carousel" hidden>
            <div class="movie-header">
              Dumbo
            </div>
            <!-- The slideshow -->
            <div class="carousel-inner">
              <!--First slide (Basic Info)-->
              <div class="carousel-item active">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-6">
                      <img src="Photo/dumbo-poster.jpg" class="img-responsive mx-auto d-block"
                        style="height: auto; max-width: 100%;" alt="Poster Art">
                    </div>
                    <div class="col-xl-6">
                      <div class="col-xl-12">
                        <p class="title1">Info</p>
                        <p>Rating: PG (for peril/action, some thematic elements, and brief
                          mild
                          language)</p>
                        <p>Genre: Animation, Kids & Family, Science Fiction & Fantasy</p>
                        <p>Directed By: Tim Burton</p>
                        <p>Written By: Ehren Kruger</p>
                        <p>Studio: Walt Disney Pictures</p>
                        <p>Runtime: 112 minutes</p>
                      </div>
                      <div class="col-xl-12">
                        <p class="title1">Plot Description</p>
                        <p>Circus owner, Max Medici, enlists former star Holt Farrier and his children Milly and Joe
                          to care for a newborn
                          elephant whose oversized ears make him a laughingstock in an already struggling circus.
                          But when they discover that Dumbo can fly, the circus makes an incredible comeback,
                          attracting persuasive entrepreneur V.A. Vandevere, who recruits the
                          peculiar pachyderm for his newest, larger-than-life entertainment venture, Dreamland.
                          Dumbo soars to new heights alongside a charming and spectacular aerial artist, Colette
                          Marchant, until Holt learns that beneath its shiny veneer, Dreamland is full
                          of dark secrets.</p>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row" id="top-border">
                    <div class="col-xl-3">
                      <p class="title1">Make a booking:</p>
                    </div>
                    <div class="col-xl-8">
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="MON_T12">Monday:
                        12pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="TUE_T12">Tuesday:
                        12pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="WED_T18">Wednesday:
                        6pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="THU_T18">Thursday:
                        6pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="FRI_T18">Friday:
                        6pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="SAT_T12">Saturday:
                        12pm</button>
                      <button type="button" class="mx-2 my-2 btn btn-secondary button_width date" value="SUN_T12">Sunday:
                        12pm</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--Second slide (Trailer)-->
              <div class="carousel-item">
                <div class="row d-flex align-items-center justify-content-center">
                  <div class="col-9">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                      <iframe width="900" height="500" src="https://www.youtube.com/embed/7NiYVoqBt-8" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#ANMsynopsis" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#ANMsynopsis" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
        </div>

        <div id="booking-content">
          <form  method="post" id="booking-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>#booking-form">
            <div>
              <span>
                <h1>Booking form</h1>
              </span>
              <span class="default-title">
                Movie Title
              </span>
              <span>
                <span id="ACT" class="title2" hidden>Avengers Endgame</span>
                <span id="RMC" class="title2" hidden>Top End Wedding</span>
                <span id="ANM" class="title2" hidden>Dumbo</span>
                <span id="AHF" class="title2" hidden>The Happy Prince</span>
              </span>
              <span id="default-date-time">
                - Day - Hour (Please select)
              </span>
              <span>
                <span id="MON" hidden> - Monday</span>
                <span id="TUE" hidden> - Tuesday</span>
                <span id="WED" hidden> - Wednesday</span>
                <span id="THU" hidden> - Thursday</span>
                <span id="FRI" hidden> - Friday</span>
                <span id="SAT" hidden> - Saturday</span>
                <span id="SUN" hidden> - Sunday</span>
              </span>
              <span>
                <span id="T12" hidden> - 12pm</span>
                <span id="T15" hidden> - 3pm</span>
                <span id="T18" hidden> - 6pm</span>
                <span id="T21" hidden> - 9pm</span>
              </span>
            </div>
            <input type="hidden" name="movie[id]" id="movie-id" value="">
            <input type="hidden" name="movie[day]" id="movie-day" value="">
            <input type="hidden" name="movie[hour]" id="movie-hour" value="">
            <div class="row">
              <div class="col-md-6">
                <div class="container p-4 my-3 border">
                  <label for="standard">Standard</label>
                  <div>
                    <label for="standard-adult">Adult</label>
                    <select name="seats[STA]" id="seats-STA" class="custom-select" onchange="getPrice(this.id)">
                      <option value="">Please Select</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select> <br>
                    <label for="standard-concession">Concession</label>
                    <select name="seats[STP]" id="seats-STP" class="custom-select" onchange="getPrice(this.id)">
                      <option value="">Please Select</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select> <br>
                    <label for="standard-children">Children</label>
                    <select name="seats[STC]" id="seats-STC" class="custom-select" onchange="getPrice(this.id)">
                      <option value="">Please Select</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select> <br>
                  </div>
                </div>
                <div class="container p-4 my-3 border">
                  <label for="firstclass">First class</label>
                  <div>
                    <label for="firstclass-adult">Adult</label>
                    <select name="seats[FCA]" id="seats-FCA" class="custom-select" onchange="getPrice(this.id)">
                      <option value="">Please Select</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select> <br>
                    <label for="firstclass-concession">Concession</label>
                    <select name="seats[FCP]" id="seats-FCP" class="custom-select" onchange="getPrice(this.id)">
                      <option value="">Please Select</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select> <br>
                    <label for="firstclass-children">Children</label>
                    <select name="seats[FCC]" id="seats-FCC" class="custom-select" onchange="getPrice(this.id)">
                      <option value="">Please Select</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select> <br>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="container my-3 p-4">
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="cust[name]" id="cust-name" type="text" class="form-control">
                    <span class="error">* <?php echo $nameErr;?></span>
                  </div>

                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="cust[email]" id="cust-email" type="email" class="form-control">
                    <span class="error">* <?php echo $emailErr;?></span>
                  </div>

                  <div class="form-group">
                    <label for="mobile">Mobile:</label>
                    <input name="cust[mobile]" id="cust-mobile" type="tel" class="form-control">
                    <span class="error">* <?php echo $mobileErr;?></span>
                  </div>

                  <div class="form-group">
                    <label for="credit-card">Credit Card:</label>
                    <input name="cust[card]" id="cust-card" type="text" class="form-control" >
                    <span class="error">* <?php echo $cardErr; ?></span>
                  </div>

                  <div class="form-group">
                    <label for="expiry">Expiry:</label>
                    <input name="cust[expiry]" id="cust-expiry" type="month" class="form-control">
                    <span class="error">* <?php echo $expiryErr; ?></span>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <label for="Total">Total $</label>
              <span id="total-amount">0</span>
            </div>
            <button class="form-group" type="submit" href="#booking-form" value="Submit">Order</button>
            <button type="submit" name="session-reset" value="Reset the session"> Reset the session </button>
          <!-- Debugging php section -->
          <?php 
          preShow($_POST);
          preShow($_SESSION);?>
        </div>

      </div>

    </section>

    <section id="three">

      <div class="container-fluid p-4 section_title">
        <h1>Pricing</h1>
      </div>

      <div class="container p-2 my-3 seat_type " style="text-align: center;">
        <h1>Standard Seat </h1><br>
        (Discount time: Monday, Wednesday & at 12pm on weekdays)
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="Photo/STA.jpeg" alt="seat type" style="width: auto; height:330px">
            <div class="card-body">
              <h5 class="card-title">Standard Adult (STA)</h5>
              <p>
                Normal: 19.80 <br>
                Discount: 14.00
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="Photo/STP.jpeg" alt="seat type" style="width: auto; height:330px">
            <div class="card-body">
              <h5 class="card-title">Standard Concession (STP)</h5>
              <p>
                Normal: 17.50 <br>
                Discount: 12.50
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="Photo/STC.jpeg" alt="seat type" style="width: auto; height:330px">
            <div class="card-body">
              <h5 class="card-title">Standard Child (STC)</h5>
              <p>
                Normal: 15.30 <br>
                Discount: 11.00
              </p>
            </div>
          </div>
        </div>
      </div>


      <div class="container p-2 my-3 seat_type " style="text-align: center;">
        <h1>First Class Seat </h1><br>
        (Discount time: Monday, Wednesday & at 12pm on weekdays)
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="Photo/FCA.jpeg" alt="seat type" style="width: auto; height:330px">
            <div class="card-body">
              <h5 class="card-title">First Class Adult (FCA)</h5>
              <p>
                Normal: 30.00 <br>
                Discount: 24.00
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="Photo/FCP.jpeg" alt="seat type" style="width: auto; height:330px">
            <div class="card-body">
              <h5 class="card-title">First Class Concession (FCP)</h5>
              <p>
                Normal: 27.00 <br>
                Discount: 22.50
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="Photo/FCC.jpeg" alt="seat type" style="width: auto; height:330px">
            <div class="card-body">
              <h5 class="card-title">First Class Child (FCC)</h5>
              <p>
                Normal: 24.00 <br>
                Discount: 21.00
              </p>
            </div>
          </div>
        </div>
      </div>

    </section>

  </main>


  <footer>
    <h3>Contact us</h3>
    <div>
      Email: contact@cinemax.com <br>
      Phone: 0909090909 <br>
      Address: 18 Anonymous, Ho Chi Minh city
    </div>
    <div>&copy;
      <script>
        document.write(new Date().getFullYear());
      </script> Phan Truong Quynh Anh (s3818245), Nguyen Thi Nha Uyen (s3819293). </div>
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
      Programming course at RMIT University in Melbourne, Australia.</div>
  </footer>

</body>

</html>