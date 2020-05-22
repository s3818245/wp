<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets page</title>

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

<body>

    <?php
    session_start();
    if (empty($_SESSION['cart'])) {
        header('Location: index.php');
    }

    include 'tools.php';

    ?>

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
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="row" style="border: 1px black solid;">
                        <div class="col-3" style="margin: auto;">
                            <img class="rounded mx-auto d-block" src="Photo/movie-icon.png" style="max-width: 30%; height: auto;">
                        </div>
                        <div class="col-9" style="border-left: 1px black solid;">
                            <div class="row" style="margin: auto;">
                                <img class="rounded mx-auto d-block" src="Photo/logo.png" style="max-width: 30%; height: auto;">
                            </div>
                            <div class="row" style="border-top: 1px black solid;">
                                <div class="col-12">
                                    <p class="text-center" style="font-size: x-small;">
                                        Email: contact@cinemax.com <br>
                                        Phone: 0909090909 <br>
                                        Address: 18 Anonymous, Ho Chi Minh city
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border: 1px black solid;">
                        <div class="col-10">
                            <div class="col-12" style="color: #c1c7cb;">
                                Movie
                            </div>
                            <div class="col-12" style="font-size: 1.2rem; font-weight: 500;">
                                <?php echo $movieTitle[$movieID][0] ?>
                            </div>
                            <div class="col-12" style="color: #c1c7cb;">
                                Date
                            </div>
                            <div class="col-12" style="font-size: 1.2rem; font-weight: 500;">
                                <?php echo $movie_day[$movieDay] . ' at ' . $movie_hour[$movieHour]; ?>
                            </div>
                            <br>
                            <div class="col-12">
                                <div class="row row-cols-3">
                                    <div class="col" style="color: #c1c7cb;">Seat Name</div>
                                    <div class="col" style="color: #c1c7cb;">Amount</div>
                                </div>
                            </div>
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
                        <div class="col-2" style="margin: auto; ">
                            <img class="mx-auto d-block" src="Photo/barcode-part.png" style="max-width: 78%; height: auto;">
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </main>

</body>

</html>