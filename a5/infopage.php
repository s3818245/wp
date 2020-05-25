<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Info Page</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">


    <script defer src="script.js"></script>
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
    if (!empty($_GET)){
        $id = $_GET['info'];

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

        $sql = "SELECT * FROM itemData WHERE itemID='$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $itemName = $row['itemName'];
            $itemPrice = $row['itemPrice'];
            $itemImage = '<img class="card-img-top" src="data:image/jpg;base64,' . base64_encode($row['itemImage']) . '" />';
            $itemDescription = $row['itemDescription'];
            $itemClass = $row['itemClass'];
          } else {
            echo "0 results";
          }
    }
    ?> 

    <nav class="navbar navbar-expand bg-dark navbar-dark">
        <a class="navbar-brand">Logo</a>
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
                <div class="col-md-5 col-12">
                    <div class="col-12">
                        <?php
                            echo $itemImage;
                        ?>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <div class="col-12">
                        <h1><?php echo $itemName;?></h1>
                    </div>
                    <hr>
                    <div class="col-12">
                        Price: $<?php echo $itemPrice;?>
                    </div>
                    <br>
                    <div class="availability col-12">
                        In stock
                    </div>
                    <br>
                    <div class="col-12">
                        Category: 
                        <?php echo $itemClass?>
                    </div>
                    <br>
                    <hr>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-7"><Button>Add to cart</Button></div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        Description:
                        <div class="description"> <?php echo $itemDescription;?>
                        </div>
                    </div>    
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-12">
                    <h3>Related product</h3>
                </div>
                <div class="col-12">
                    (controlable carousel)
                    <div id="moreProduct" class="carousel slide" data-ride="carousel">
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
                        <a class="carousel-control-prev" href="#moreProduct" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#moreProduct" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php mysqli_close($conn); ?>

</body>

</html>