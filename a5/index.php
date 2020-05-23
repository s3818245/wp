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

//Default data
/*$sql = "INSERT INTO itemData VALUES('Apple Airpods Pro', 'airpods-pro', 'apple in-ear', 'This is ', '$100',";
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
                    <div class="row row-cols-lg-3 row-cols-sm-1">
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

                        $sql = "SELECT * FROM itemData";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="col">';
                                echo    '<div class="card" style="width:250px,">';
    
                                echo    '<img class="card-img-top" src="data:image/jpg;base64,' . base64_encode($row['itemImage']) . '" />'; ;
    
                                echo        '<div class="card-body">';
                                echo            '<h4 class="card-title">' .$row['itemName'].  '</h4>';
                                echo            '<p class="card-text"></p>';
                                echo            '<a href="" style="text-decoration: " ;>';
                                echo            'Price:' .$row['itemPrice'];
                                echo            '</a>';
                                echo        '</div>';
                                echo    '</div>';
                                echo'</div>';
                            }
                          } else {
                            echo "0 results";
                          }
                        ?>
                        <!--
                        CODE FOR CARD
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
                        -->
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