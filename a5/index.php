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
    session_start();
    $servername = "sql307.epizy.com";
    // $port= 8889;
    $username = "epiz_25832353";
    $password = "3IEhY1FThCdC7g4";
    $dbname = "epiz_25832353_itemData";

    //create connection 
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SECTION FOR CREATING DATABASE AND TABLE
    /*    // Create table 
$sql = "CREATE TABLE itemData (
    itemName VARCHAR(100),
    itemID VARCHAR(100),
    itemClass VARCHAR(1000),
    itemDescription VARCHAR(10000),
    itemPrice VARCHAR(100),
    itemImage BLOB
)";
if (mysqli_query($conn, $sql)) {
echo "<p> Table student created successfully </p>";
} else {
echo "<p>Error creating table: </p>" . mysqli_error($conn);
} 
*/

    //Failed code
    /*$sql = "INSERT INTO itemData VALUES('Apple Airpods Pro', 'airpods-pro', 'apple in-ear', 'This is', '$100',";
$sql = "INSERT INTO itemData VALUES('Apple Airpods', 'airpods', 'apple in-ear', 'This is ', '$100', 'airpods.jpg');";
$sql = "INSERT INTO itemData VALUES('Beats Solo 3', 'beats-solo-3', 'beats on-ear', 'This is ', '$100', 'beats-solo-3.jpg');";
$sql = "INSERT INTO itemData VALUES('Beats Solo', 'beats-solo', 'beats on-ear', 'This is ', '$100', 'beats-solo.jpg');";
$sql = "INSERT INTO itemData VALUES('Beats Studio 3', 'beats-studio-3', 'beats over-ear', 'This is ', '$100', 'beats-studio-3.jpg');";
$sql = "INSERT INTO itemData VALUES('Beats X', 'beatsx', 'beats in-ear', 'This is ', '$100', 'beatsx.jpg');";
$sql = "INSERT INTO itemData VALUES('Samsung Galaxy Buds +', 'galaxybuds', 'samsung in-ear', 'This is ', '$100', 'galaxybuds.jpg');";
$sql = "INSERT INTO itemData VALUES('Jaybirds X4', 'jaybirds-x4', 'jaybirds in-ear', 'This is ', '$100', 'jaybirds-x4.jpg');";
$sql = "INSERT INTO itemData VALUES('Powerbeats Pro', 'powerbeats-pro', 'beats in-ear', 'This is ', '$100', 'powerbeats-pro.jpg');";
$sql = "INSERT INTO itemData VALUES('Powerbeats Wired', 'powerbeats-wired', 'beats in-ear', 'This is ', '$100', 'powerbeats-wired.jpg');";
$sql = "INSERT INTO itemData VALUES('Sony WF-1000-XM3', 'sony-wf-1000-xm3', 'sony in-ear', 'This is ', '$100', 'sony-wf-1000-xm3.jpg');";

if (mysqli_query($conn, $sql)) {
    echo "<p>Insert item successfully </p>";
    } else {
    echo "<p>Error insert item: </p>" . mysqli_error($conn);
    } 
*/

    if (!empty($_SESSION['userdata']['username'])) {
        $pageusername = '
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="bi bi-person" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg>'
            . $_SESSION['userdata']['username'] .
            '</a>
                    <div class="dropdown-menu" aria-labelledby="navbarUser">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
                ';

        $addedpro =  '
        <div class="col py-2 d-flex align-items-stretch">
            <div class="card" style="">
                <a href="addproduct.html">
                    <svg class="bi bi-plus-circle" width="10em" height="10em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    </svg>
                </a>
            </div>
        </div>
        ';
    } else {
        $login = '
            <li class="nav-item">
                <a class="nav-link" href="loginpage.php">
                    <svg class="bi bi-lock" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
                        </svg> Login</a>
                </li>
                ';
    }

    mysqli_close($conn);
    ?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse w-100 order-1 order-md-0 dual-collapse2">
            <a class="navbar-brand">Logo</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link active" href="">Home</a>
                </li>
                <!-- <li class="nav-item"> 
                    <a class="nav-link" href="#two">sth2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#three">sth3</a>
                </li>
                -->
            </ul>
        </div>
        <div class="mx-auto order-0">
        </div>
        <div class="navbar-collapse w-100 order-1 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="wishlist.php">
                        <svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg> Wish list</a>
                </li>
                 -->
                <li class="nav-item">
                    <a class="nav-link" href="orderform.php">
                        <svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                        </svg> Check Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <svg class="bi bi-cart3" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg> Cart</a>
                </li>
                <?php
                echo $login . $pageusername;
                ?>
            </ul>
        </div>
    </nav>


    <main class="main section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div id="carouselMain" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="Photos/index-carousel-1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="Photos/index-carousel-2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="Photos/index-carousel-3.jpg" alt="Third slide">
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
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#item-list" method="get">
                            <input type="hidden" name="category" value="">
                            <button type="submit" class="nav-link">All items</button>
                        </form>
                        <?php
                        $servername = "sql307.epizy.com";
                        // $port= 8889;
                        $username = "epiz_25832353";
                        $password = "3IEhY1FThCdC7g4";
                        $dbname = "epiz_25832353_itemData";

                        //create connection 
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM itemCat";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'#item-list" method="get">
                                <input type="hidden" name="category" value="'.$row['Category'].'">
                                <button type="submit" class="nav-link">'.$row['Category'].' headphones</button>
                                </form>';
                            }
                        } else {
                            echo "0 results";
                        }
                        mysqli_close($conn);
                        ?>
                        <!--  
                        <form action=" echo htmlspecialchars($_SERVER["PHP_SELF"]); #item-list" method="get">
                            <input type="hidden" name="category" value="in-ear">
                            <button type="submit" class="nav-link">In-ear headphones</button>
                        </form>

                        <form action=" echo htmlspecialchars($_SERVER["PHP_SELF"]); #item-list" method="get">
                            <input type="hidden" name="category" value="on-ear">
                            <button type="submit" class="nav-link">On-ear headphones</button>
                        </form>

                        <form action=" echo htmlspecialchars($_SERVER["PHP_SELF"]); #item-list" method="get">
                            <input type="hidden" name="category" value="over-ear">
                            <button type="submit" class="nav-link">Over-ear headphones</button>
                        </form>
                        -->
                    </nav>
                </div>
                <!-- ITEM LIST -->
                <div class="col-9" id="item-list">ITEM LIST
                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                        <?php

                        $servername = "sql307.epizy.com";
                        // $port= 8889;
                        $username = "epiz_25832353";
                        $password = "3IEhY1FThCdC7g4";
                        $dbname = "epiz_25832353_itemData";

                        //create connection 
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        if (!empty($_GET['category'])) {
                            $category = $_GET['category'];
                            $sql = "SELECT * FROM itemData WHERE itemClass='$category'";
                        } else {
                            $sql = "SELECT * FROM itemData";
                        }
                        $result = mysqli_query($conn, $sql);


                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="col py-2 d-flex align-items-stretch">';
                                echo    '<div class="card" style="max-width:250px, height: 400px;">';

                                echo    '<img class="card-img-top" src="data:image/jpg;base64,' . base64_encode($row['itemImage']) . '" />';;

                                echo        '<div class="card-body text-center">';
                                echo            '<h4 class="card-title">' . $row['itemName'] .  '</h4>';
                                echo            '<p class="card-text"></p>';
                                echo            '<div style="" class="text-center";>';
                                echo            'Price: $' . $row['itemPrice'];
                                echo            '</div>';
                                echo            '<form action="infopage.php ' . header('Location: infopage.php') . '" method="get">';
                                echo                '<div class="text-center">';
                                echo                '<input type="hidden" name="info" value="' . $row['itemID'] . '">';
                                echo                '<button type="submit" class="btn btn-secondary pt-1">More information</button>';
                                echo                '</div>';
                                echo            '</form>';
                                echo        '</div>';
                                echo    '</div>';
                                echo '</div>';
                            }
                            echo $addedpro;
                        } else {
                            echo "0 results";
                        }
                        mysqli_close($conn);
                        ?>
                        <!-- CODE FOR CARD 
                        <div class="col">
                            <div class="card" style="width:250px">

                                <img class="card-img-top" src="Photos/airpods.jpg" alt="Card image">

                                <div class="card-body">
                                    <h4 class="card-title"> Apple Airpods</h4>
                                    <p class="card-text"></p>
                                    <div style="color:blue" class="text-center";>
                                    Price: $159.00
                                    </div>
                                    <form action="header('Location: infopage.php')" method="get">
                                        <div class="text-center">
                                            <input type="hidden" name="info" value="">
                                            <button type="submit" name="info" class="btn btn-secondary pt-1">More information</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        -->

                    </div>
                    <br>
                    <!--  
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
                    -->
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