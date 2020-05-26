<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart list</title>

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
    include 'tools.php';
    session_start();
    if(!empty($_POST)){
        preShow($_POST);
        $itemID = $_POST['productName'];
        if($_SESSION['cart'][$itemID]!= 'added'){
            $_SESSION['cart'][$itemID] = 'added';
        }
        preShow($_SESSION);
    }
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse w-100 order-1 order-md-0 dual-collapse2">
            <a class="navbar-brand">Logo</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#two">sth2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#three">sth3</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
        </div>
        <div class="navbar-collapse w-100 order-1 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="wishlist.php">
                        <svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg> Wish list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orderform.php">
                        <svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                        </svg> Check Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="cart.php">
                        <svg class="bi bi-cart3" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg> Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <svg class="bi bi-lock" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
                        </svg> Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="main section">
        <br>
        <div class="container-fluid">
            <div class="row mx-1 p-2">
                <div class="col-lg-9 col-sm-12">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="thead">
                            <tr>
                                <th></th>
                                <th></th>
                                <th>
                                    <button type="button" class="" onclick="minus('item');">
                                    <span class="glyphicon glyphicon-minus-sign"></span> - </button>
                                    <input type=text id='item-qty' onchange="updateQuantity()">
                                    <button type="button" class="" onclick="plus('item');">
                                    <span class="glyphicon glyphicon-plus-sign"></span> + </button>
                                </th>
                                <th>$<span id='p1-subtotal'></span> </th>
                            </tr>
                        </tbody>
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
                        foreach ($_SESSION['cart'] as $key => $value){
                        $sql = "SELECT * FROM itemData WHERE itemID='$key'";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<tbody class="thead">
                                <tr>
                                    <th>'.$row['itemName'].'</th>
                                    <th> $'.$row['itemPrice'].'</th>
                                    <th>
                                        <button type="button" class="" onclick="minus("'.$row['itemID'].'", "'.$row['itemPrice'].'");">
                                        <span class="glyphicon glyphicon-minus-sign"></span> - </button>
                                        <input type=text id="'.$row['itemID'].'-qty" onchange="updateQuantity(\''.$row['itemID'].'\', '.$row['itemPrice'].')">
                                        <button type="button" class="" onclick="plus("'.$row['itemID'].'", "'.$row['itemPrice'].'");">
                                        <span class="glyphicon glyphicon-plus-sign"></span> + </button>
                                    </th>
                                    <th>$<span id="'.$row['itemID'].'-subtotal"></span> </th>
                                </tr>
                                </tbody>';
                            }
                          } else {
                            echo "0 results";
                          }
                          }
                          mysqli_close($conn);
                        ?>
                    </table>
                    <div class="float-right">
                        <h4>
                        Product Total: $
                        </h4>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary">Continue shopping</button>
                    </div>
                </div>
                <br>
                <div class="col-lg-3 col-sm-12">
                    <div class="row mx-1 p-2 rounded" style="border: 1px black solid;">
                        <div class="col-12"><h3>Order Summary</h3></div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">Product total:</div>
                                <div class="col-6" id="product-total" value="0">$</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">GTS: </div>
                                <div class="col-6" id="GTS" value="">$</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">Delivery fee: </div>
                                <div class="col-6" id="delivery-fee" value="15">$ 15 </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">Total</div>
                                <div class="col-6" id="total">$</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-md float-right">Check da freak out button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>