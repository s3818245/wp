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

                        $sql = "SELECT * FROM itemData";
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