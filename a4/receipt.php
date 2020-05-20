<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Receipt Page</title>

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

    $movieID = $_SESSION['cart']['movie']['id'];
    $movieDay = $_SESSION['cart']['movie']['day'];
    $movieHour = $_SESSION['cart']['movie']['hour'];
    $custname = $_SESSION['cart']['cust']['name'];
    $custemail = $_SESSION['cart']['cust']['email'];
    $custmobile = $_SESSION['cart']['cust']['mobile'];
    $custcard = $_SESSION['cart']['cust']['card'];

    $seatType = array();
    $seatValue = array();
    if (!empty($_SESSION['cart']['seats']['STA'])) {
        array_push($seatType, 'Standard Adult ');
        array_push($seatValue, $_SESSION['cart']['seats']['STA']);
    }
    if (!empty($_SESSION['cart']['seats']['STP'])) {
        array_push($seatType, 'Standard Concession ');
        array_push($seatValue, $_SESSION['cart']['seats']['STP']);
    }
    if (!empty($_SESSION['cart']['seats']['STC'])) {
        array_push($seatType, 'Standard Child ');
        array_push($seatValue, $_SESSION['cart']['seats']['STC']);
    }
    if (!empty($_SESSION['cart']['seats']['FCA'])) {
        array_push($seatType, 'First Class Adult ');
        array_push($seatValue, $_SESSION['cart']['seats']['FCA']);
    }
    if (!empty($_SESSION['cart']['seats']['FCP'])) {
        array_push($seatType, 'First Class Concession ');
        array_push($seatValue, $_SESSION['cart']['seats']['FCP']);
    }
    if (!empty($_SESSION['cart']['seats']['FCC'])) {
        array_push($seatType, 'First Class Child ');
        array_push($seatValue, $_SESSION['cart']['seats']['FCC']);
    }

    $totalAmount = $_SESSION['cart']['total'];


    preShow($_SESSION);

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
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php#one">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php#two">Now Showing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php#three">Pricing</a>
            </li>
        </ul>
    </nav>

    <main class="main_content">
        <section id="receipt_info">
            <h2>Order Confirmation</h2>
            <div class="container-fluid p-4">
                <div class="row justify-content-around">
                    <div class="col-lg-6 col-md-12 py-2 my-1">
                        <div class="row title2" style="border: 1px black solid">Movie details</div>
                        <div class="row" style="border: 1px black solid">
                            <div class="col-sm-12 py-2"><?php echo $movieTitle[$movieID][0]; ?></div>
                            <div class="col-sm-4 py-2"><?php echo $movieTitle[$movieID][1]; ?></div>
                            <div class="col-sm-8 py-2">
                                <div class="col-sm-12"><?php echo $movieTitle[$movieID][2]; ?></div>
                                <div class="col-sm-12">
                                    <div class="row justified-content-between" style="border: 1px black solid">Ticket Info:
                                        <div class="col-6">
                                            <?php
                                            foreach (array_combine($seatType, $seatValue) as $seatName => $seatAmount) {
                                                echo $seatName . ' - ' . $seatAmount . '<br>';
                                            };
                                            ?>
                                        </div>
                                        <div class="col-4">
                                            <button>Print receipt</button>
                                            <button>View ticket</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 py-2 my-1">
                        <div class="row title2" style="border: 1px black solid">Order summary</div>
                        <div class="row" style="border: 1px black solid">
                            <div class="col-12 py-2" style="border-bottom: 1px black solid">
                                <div>Customer's Information</div>
                                <div class="row">
                                    <div class="col-4">Name:</div>
                                    <div class="col-8"><?php echo $custname; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">Email:</div>
                                    <div class="col-8"><?php echo $custemail; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">Mobile:</div>
                                    <div class="col-8"><?php echo $custmobile; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">Credit card NO.:</div>
                                    <div class="col-8"><?php echo $custcard; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">Booking Time:</div>
                                    <div class="col-8">
                                        <?php 
                                        echo $nowdate . '&nbsp';
                                        echo $nowtime;
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 py-2">
                                <div>Price</div>
                                <div class="row">
                                    <div class="col-12">
                                        <?php
                                        foreach (array_combine($seatType, $seatValue) as $seatName => $seatAmount) {
                                            echo '<div class="row">';
                                            echo '<div class="col-6">' . $seatName;
                                            echo '</div>';
                                            echo '<div class="col-6">' . $seatAmount;
                                            echo '</div>';
                                            echo '</div>';
                                        };
                                        echo '<div class="col-6">' . $_SESSION["date"] ." ". $_SESSION["time"];
                                        echo '</div>';
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row row-cols-3">
                                    <div class="col">Total:</div>
                                    <div class="col"></div>
                                    <div class="col">$<?php echo $totalAmount; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

</body>

</html>