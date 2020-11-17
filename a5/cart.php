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
    session_start();
    include 'tools.php';
    if(!empty($_POST)){
        $itemID = $_POST['productName'];
        $deleteID = $_POST['delete'];
        if (!empty($_SESSION['cart'][$deleteID])){
            unset($_SESSION['cart'][$deleteID]);
        }
        if($_SESSION['cart'][$itemID]!= 'added'){
            $_SESSION['cart'][$itemID] = 'added';
        }
    }

    preShow($_SESSION);

    //  if (isset($_POST['checkout'])) {
        //  header('Location: orderform.php');
    // }

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
                $userlist='<li class="nav-item">
                <a class="nav-link justified-content-right" href="userlist.php">Userlist</a>
                </li>';
                
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

?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse w-100 order-1 order-md-0 dual-collapse2">
            <a class="navbar-brand">Logo</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <?php echo $userlist;?>
            </ul>
        </div>
        <div class="mx-auto order-0">
        </div>
        <div class="navbar-collapse w-100 order-1 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">
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
                        <!--<tbody class="thead">
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
                        </tbody>-->
                        <?php
                            
                            $servername = "sql307.epizy.com";
                            // $port= 8889;
                            $username = "epiz_25832353";
                            $password = "3IEhY1FThCdC7g4";
                            $dbname = "epiz_25832353_itemData";
                            $itemTotal = 0;

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
                                        <button type="button" class="" onclick="minus(\''.$row['itemID'].'\', '.$row['itemPrice'].'); itemTotal();">
                                        <span class="glyphicon glyphicon-minus-sign"></span> - </button>
                                        <input type=text id="'.$row['itemID'].'-qty" onchange="updateQuantity(\''.$row['itemID'].'\', '.$row['itemPrice'].'); itemTotal();" value="1">
                                        <button type="button" class="" onclick="plus(\''.$row['itemID'].'\', '.$row['itemPrice'].'); itemTotal();">
                                        <span class="glyphicon glyphicon-plus-sign"></span> + </button>
                                    </th>
                                      <th>$<span class="subtotal" id="'.$row['itemID'].'-subtotal" value="'.$row['itemPrice'].'">'.$row['itemPrice'].'</span>     
                                        <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                            <button type="submit" name="delete" value="'.$row['itemID'].'"> Delete </button>
                                        </form>
                                    </th>
                                </tr>
                                </tbody>';
                                $itemTotal += $row['itemPrice'] ;
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
                        Product Total: $ <span id="producttotal"><?php echo $itemTotal;?></span>
                        </h4>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <a href="index.php"><button class="btn btn-primary">Continue shopping</button></a>
                    </div>
                </div>
                <br>
                <div class="col-lg-3 col-sm-12">
                    <form method="post" action="orderform.php<?php header('Location: orderform.php');?>">
                        <div class="row mx-1 p-2 rounded" style="border: 1px black solid;">
                            <div class="col-12">
                                <h3>Order Summary</h3>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">Product total:</div>
                                    <div class="col-6" id="product-total" value="<?php echo $itemTotal; ?>">$<?php echo $itemTotal; ?></div>
                                    <input type="hidden" name="price[product]" id="price_product" class="form-control" value="<?php echo $itemTotal; ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">GST (28%):</div>
                                    <div class="col-6" id="GTS" value="<?php echo number_format((float) $itemTotal * (7 / 25), 2, '.', ''); ?>">$<?php echo number_format((float) $itemTotal * (7 / 25), 2, '.', ''); ?></div>
                                    <input type="hidden" name="price[gst]" id="price_gst" class="form-control" value="<?php echo number_format((float) $itemTotal * (7 / 25), 2, '.', ''); ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">Delivery fee: </div>
                                    <div class="col-6" id="delivery-fee" value="15">$15 </div>
                                    <input type="hidden" name="price[delivery]" id="price_delivery" class="form-control" value="15">
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">Total</div>
                                    <div class="col-6" id="total" value="<?php echo number_format((float) $itemTotal * (32 / 25) + 15, 2, '.', ''); ?>">$<?php echo number_format((float) $itemTotal * (32 / 25) + 15, 2, '.', ''); ?></div>
                                    <input type="hidden" name="price[total]" id="price_total" class="form-control" value="<?php echo number_format((float) $itemTotal * (32 / 25) + 15, 2, '.', ''); ?>">
                                </div>
                            </div>
                        </div> <br>
                        <div class="col-12">
                            <button class="btn btn-primary btn-md float-right form-group" type="submit" name="checkout" value="Submit">Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>