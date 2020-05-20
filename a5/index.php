<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 5</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">


    <script defer src="script.js"></script>
    <script src='wireframe.js'></script>
    <script src="style.css"></script>

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
    $servername = "localhost";
    $port = "8889";
    $username = "root";
    $password = "root";
    $dbname = "myDB";

    //create connection 
    $conn = new mysqli("$servername:$port", $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

// SECTION FOR CREATING DATABASE AND TABLE

    // Create database
/*    $sql = "CREATE DATABASE itemData";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}
*/
/*
    // Create table 
 $sql = "CREATE TABLE itemData (
    itemName VARCHAR(100),
    itemID VARCHAR(100),
    itemClass VARCHAR(10),
    itemDescription VARCHAR(100),
    itemPrice VARCHAR(100),
    itemImage BLOB,
)";
if (mysqli_query($conn, $sql)) {
echo "<p> Table student created successfully </p>";
} else {
echo "<p>Error creating table: </p>" . mysqli_error($conn);
}
*/

mysqli_close($conn);
?>

    <nav class="navbar navbar-expand bg-dark navbar-dark">
        <a class="navbar-brand">Bluetooth headphones</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link justified-content-right" href="#one">sth</a>
            </li>
            <li class="nav-item">
                <a class="nav-link justified-content-right" href="#two">sth</a>
            </li>
            <li class="nav-item">
                <a class="nav-link justified-content-right" href="#three">sth</a>
            </li>
            <li class="nav-item">
                <a class="nav-link justified-content-right" href="#four">sth</a>
            </li>
            <li class="nav-item">
                <a class="nav-link justified-content-right" href="#five">sth</a>
            </li>
        </ul>
    </nav>


    <main class="main section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div id="carouselMain" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="..." alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="..." alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="..." alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselMain" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselMain" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-3">CATEGORY
                <nav class="nav flex-column">
                        <a class="nav-link" href="#">All items</a>
                        <a class="nav-link" href="#">Wired in-ear headphones</a>
                        <a class="nav-link" href="#">Wireless in-ear headphones</a>
                        <a class="nav-link" href="#">Over-ear headphones</a>
                        <a class="nav-link" href="#">On-ear headphones</a>
                    </nav>
                </div>
                <!-- ITEM LIST -->
                <div class="col-9">ITEM LIST
                    <div class="row row-cols-3">
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="Photos/airpods.jpg" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"> Apple Airpods</h4>
                                    <p class="card-text"></p>
                                    <a href="" style="text-decoration: " ;>
                                    Price: $159.00
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text"></p>
                                    <a href="" style="text-decoration: " ;>

                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text"></p>
                                    <a href="" style="text-decoration: " ;>

                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text"></p>
                                    <a href="" style="text-decoration: " ;>

                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text"></p>
                                    <a href="" style="text-decoration: " ;>

                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text"></p>
                                    <a href="" style="text-decoration: " ;>

                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text"></p>
                                    <a href="" style="text-decoration: " ;>

                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text"></p>
                                    <a href="" style="text-decoration: line-through" ;>

                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text"></p>
                                    <a href="" style="text-decoration: line-through" ;>

                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        Maybe sth?
                    </div>
                    <br>
                    <div>
                        <div id="carouselRec" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="..." alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="..." alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="..." alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselRec" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselRec" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
<footer>
    <h3>Contact us</h3>
    <div>
        Email: contact@shop.com <br>
        Phone: 0909090909 <br>
        Address: 18.5 Anonymous, Ho Chi Minh city
    </div>
    <div>&copy;
        <script>
            document.write(new Date().getFullYear());
        </script> Phan Truong Quynh Anh (s3818245), Nguyen Thi Nha Uyen (s3819293). </div>
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
        Programming course at RMIT University in Melbourne, Australia.</div>
</footer>

</html>