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
                <div class="row">
                    <div class="col-md-7 col-sm-12 py-2 my-1">
                        <div class="title2">Movie details</div>
                        <div class="row">
                            <div class="col-sm-12 py-2"><?php echo $movieTitle[$movieID][0] ;?></div>
                            <div class="col-sm-4 py-2"><?php echo $movieTitle[$movieID][1] ;?></div>
                            <div class="col-sm-8 py-2">
                                <div class="col-sm-12"><?php echo $movieTitle[$movieID][2] ;?></div>
                                <div class="col-sm-12">Tickets info</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 py-2 my-1">
                        <div class="row title2" style="border: 1px black solid">Order summary</div>
                        <div class="row" style="border: 1px black solid">
                            <div class="col-6 py-2">
                                <div class="row row-cols-2">
                                    <div class="col">Name:</div>
                                    <div class="col"><?php echo $custname ;?></div>
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col">Email:</div>
                                    <div class="col"><?php echo $custemail ;?></div>
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col">Mobile:</div>
                                    <div class="col"><?php echo $custmobile ;?></div>
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col">Credit card:</div>
                                    <div class="col"><?php echo $custcard ;?></div>
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col">Date:</div>
                                    <div class="col"><?php echo $movie_day[$movieDay] ;?></div>
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col">Time:</div>
                                    <div class="col"><?php echo $movie_hour[$movieHour] ;?></div>
                                </div>
                            </div>
                            <div class="col-6 py-2">
                                <div class="row row-cols-3">
                                    <div class="col">Seat:</div>
                                    <div class="col"><?php echo $seatname[$seat] ;?></div>
                                    <div class="col"></div>
                                </div>
                                <div class="row row-cols-3">
                                    <div class="col">Tickets total:</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <hr>
                                <div class="row row-cols-3">
                                    <div class="col">Total:</div>
                                    <div class="col"></div>
                                    <div class="col">$<?php echo $totalAmount ;?></div>
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