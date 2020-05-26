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
    if (!empty($_GET)){
        $id = $_GET['info'];
        session_start();
        $servername = "localhost";
        $port= 8889;
        $username = "root";
        $password = "root";
        $dbname = "myDB";
                    
        //create connection 
        $conn = new mysqli("$servername:$port", $username, $password, $dbname);
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
          } else {
            echo "0 results";
          }
        mysqli_close($conn);
    }
    ?> 

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse w-100 order-1 order-md-0 dual-collapse2">
            <a class="navbar-brand">Logo</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="#Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="#two">sth2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="#three">sth3</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
        </div>
        <div class="navbar-collapse w-100 order-1 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="#wishlist">
                        <svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg> Wish list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="#checkout">
                        <svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd"
                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                        </svg> Check Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="#cart">
                        <svg class="bi bi-cart3" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg> Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="#login">
                        <svg class="bi bi-lock" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
                        </svg> Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="main section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-12">
                    <div class="col-12">Image here</div>
                    <div class="col-12">(controlable carousel)
                        <div id="productImage" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="..." alt="First slide">More pic?
                                    <?php
                                    echo $itemImage;
                                    ?>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="..." alt="Second slide">More pic?
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="..." alt="Third slide">More pic?
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#productImage" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#productImage" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <div class="col-12">
                        <h1>Product name</h1>
                        <?php echo $itemName;?>
                    </div>
                    <hr>
                    <div class="col-12">
                        Rating?
                    </div>
                    <br>
                    <div class="col-12">
                        price
                        <?php echo $itemPrice;?>
                    </div>
                    <br>
                    <div class="col-12">
                        Product avaibility?
                    </div>
                    <br>
                    <div class="col-12">
                        <?php echo $itemDescription;?>

                        Description: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae eius dolorem
                        officia amet laboriosam nam, error perferendis unde minima dolores et autem libero veritatis
                        pariatur beatae facere hic harum. Repellat harum, suscipit neque sed, quae adipisci voluptates
                        sapiente, consequuntur nam obcaecati eos dolor voluptatibus ipsa hic repudiandae. Dolorum
                        adipisci aliquam quasi tempora magnam nemo quo reiciendis ad dolor assumenda ut suscipit
                        molestias, a molestiae nobis voluptate repellendus aperiam ab perferendis odit hic, maxime eius
                        reprehenderit! Molestias maiores vero accusamus praesentium ipsum quidem distinctio doloribus
                        recusandae voluptatibus totam omnis, quod, error animi placeat voluptate fugiat qui deleniti
                        culpa soluta magni iure.
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3">Qty: input</div>
                            <div class="col-7"><Button>Add to cart</Button></div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        Wishlist if u want to?
                    </div>
                    <br>
                    <div class="col-12">
                        category?
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <h3>Review (number)</h3>
                </div>
                <div class="col-12">
                    Review des: Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae iure
                    blanditiis inventore similique esse quidem ex dicta, saepe quibusdam eveniet rerum, officia
                    veritatis fugiat voluptate ut repellendus tempore enim quae ab alias ratione maxime officiis. Minima
                    eveniet asperiores in, corrupti delectus nesciunt nam modi, debitis nemo vero illo, impedit
                    molestias.
                </div>
            </div>
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

</body>

</html>