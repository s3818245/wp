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
        <section id="receipt_info" style="background: linear-gradient(180deg, #666666, #a6a6a6);">
            <h2>Order Confirmation</h2>
            <div class="container-fluid p-4">
                <div class="row justify-content-around">
                    <div class="col-lg-6 col-md-12 py-2 my-1">
                        <div class="row border border-dark rounded-top" style="background-color: #77c5f4; font-size: 2rem; font-size: x-large; font-weight: bold;">Movie details</div>
                        <div class="row border border-dark rounded-bottom" style="background: linear-gradient(180deg, #77c5f4, #9fd6f7);">
                            <div class="col-sm-12 py-2" style="font-size: 1.5rem; font-weight: 500;"><?php echo $movieTitle[$movieID][0]; ?></div>
                            <div class="col-sm-4 py-2"><?php echo $movieTitle[$movieID][1]; ?></div>
                            <div class="col-sm-8 py-2">
                                <div class="col-sm-12"><span style="font-weight: bold;">Plot:</span> <?php echo $movieTitle[$movieID][2]; ?></div>
                                <div class="col-sm-12">Day: <?php echo $movie_day[$movieDay]; ?></div>
                                <div class="col-sm-12">Time: <?php echo $movie_hour[$movieHour]; ?></div>
                                <br>
                                <div class="col-sm-12 border border-dark rounded justified-content-right">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4" style="font-size: 1rem; font-weight: bold;">Ticket(s) Amount: </div>
                                                <div class="col-8">
                                                    <?php
                                                    foreach (array_combine($seatType, $seatValue) as $seatName => $seatAmount) {
                                                        echo $seatAmount . ' ' . $seatName . '<br>';
                                                    };
                                                    ?>
                                                    <br>
                                                    <div class="row"><a href="indi_tickets.php"><button style="float: right;" type="button" class="btn btn-primary">View ticket(s) - Individual</button></a></div>
                                                    <br>
                                                    <div class="row"><a href="gr_ticket.php"><button style="float: right;" type="button" class="btn btn-primary">View ticket(s) - Group</button></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 py-2 my-1">
                        <div class="row border border-dark rounded-top" style="background-color: #77c5f4; font-size: 2rem; font-size: x-large; font-weight: bold;">Order summary</div>
                        <div class="row border border-dark rounded-bottom" style="background: linear-gradient(180deg, #77c5f4, #9fd6f7);">
                            <div class="col-12 py-2" style="border-bottom: 1px lightgray solid">
                                <div style="font-size: 1.25rem; font-weight: 500; font-style: italic;">Customer's Information</div>
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
                                        echo $_SESSION["date"] . " at " . $_SESSION["time"];
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 py-2">
                                <div style="font-size: 1.25rem; font-weight: 500; font-style: italic;">Seat(s) info:</div>
                                <div class="row" style="border-bottom: 1px lightgray solid">
                                    <div class="col-12">
                                        <?php
                                        foreach (array_combine($seatType, $seatValue) as $seatName => $seatAmount) {
                                            echo '<div class="row">';
                                            echo '<div class="col-4">' . $seatName;
                                            echo '</div>';
                                            echo '<div class="col-4">' . $seatAmount;
                                            echo '</div>';
                                            echo '<div class="col-4">';
                                            echo '</div>';
                                            echo '</div>';
                                        };
                                        ?>
                                    </div>
                                </div>

                                <div style="font-size: 1.25rem; font-weight: 500; font-style: italic;">Price</div>
                                <div class="row">
                                    <div class="col-8">
                                        Total seats price:
                                    </div>
                                    <div class="col-4">
                                        <?php
                                        echo '$' . $totalAmount;
                                        ?>
                                    </div>
                                </div>
                                <div class="row row-cols-3">
                                    <div class="col">GTS (1/11):</div>
                                    <div class="col"></div>
                                    <div class="col">
                                        <?php echo '$' . number_format((float) $totalAmount * (1 / 11), 2, '.', ''); ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row row-cols-3">
                                    <div class="col">Total:</div>
                                    <div class="col"></div>
                                    <div class="col">
                                        <?php echo '$' . number_format((float) $totalAmount * (12 / 11), 2, '.', ''); ?>
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