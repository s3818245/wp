<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>

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

    date_default_timezone_set("Asia/Ho_Chi_Minh");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // check customer's name
        if (empty($_POST["cust"]["name"])) {
            $nameErr = "* Name is required";
            $errorFound++;
        } else {
            $name = test_input($_POST["cust"]["name"]);
            if (!preg_match("/^[A-Za-z\-'., ]{1,100}$/", $name)) {
                $nameErr = "* Only letters and whitespace are allowed.";
                $errorFound++;
            }
        }

        // Check customer's email
        if (empty($_POST["cust"]["email"])) {
            $emailErr = "* Email is required";
            $errorFound++;
        } else {
            $email = test_input($_POST["cust"]["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "* Invalid email format";
                $errorFound++;
            }
        }

        // Check customer's mobile
        if (empty($_POST["cust"]["mobile"])) {
            $mobileErr = "* Mobile number is required";
            $errorFound++;
        } else {
            $mobile = test_input($_POST["cust"]["mobile"]);
            if (!preg_match("/^([\(04\)|04|\+61[4,5]|\+61 [4,5]])( ?\d){8}$/", $mobile)) {
                $mobileErr = "* Please provide phone number";
                $errorFound++;
            }
        }

        // Check customer's card number
        if (empty($_POST["cust"]["card"])) {
            $cardErr = "* Card number is required";
            $errorFound++;
        } else {
            $card = test_input($_POST["cust"]["card"]);
            if (!preg_match("/^([\d] ?){14,19}$/", $card)) {
                $cardErr = "* Please provide a valid card number";
                $errorFound++;
            }
        }

        // Check customer's card's expiry
        if (empty($_POST["cust"]["expiry"])) {
            $expiryErr = "* Please provide credit's card expiry";
            $errorFound++;
          } else {
            if (checkExpiry()) {
            } else {
              $expiryErr = "* Expiry cannot be within 28 days since purchase day";
              $errorFound++;
            }
          } 

        //  Update data in SESSION
        if ($errorFound == 0) {
            $_SESSION['cart'] = $_POST;
            $nowdate = date('l d/m/Y');
            $nowtime = date('H:i');
            $_SESSION['date'] = $nowdate;
            $_SESSION['time'] = $nowtime;
            if (!empty($_SESSION)) {
                $bookingFile = fopen("booking.csv", "a");
                $data = array_merge(
                    [$nowdate],
                    [$nowtime],
                    (array) $_SESSION["cart"]["cust"]
                );
                fputcsv($bookingFile, $data);
                fclose($bookingFile);
            }
        }
    }

    if (isset($_POST['submit'])) {
        $name_err = $_POST['cust']['name'];
        $email_err = $_POST['cust']['email'];
        $mobile_err = $_POST['cust']['mobile'];
        $card_err = $_POST['cust']['card'];
        $expiry_err = $_POST['cust']['expiry'];
    
      }

    preShow($_POST);

    ?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse w-100 order-1 order-md-0 dual-collapse2">
            <a class="navbar-brand">Logo</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
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
                    <a class="nav-link active" href="orderform.php">
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
                <li class="nav-item">
                    <a class="nav-link" href="loginpage.php">
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="container my-3 p-4">
                            <div class="row">
                                <h3>Customer's Infomation</h3>
                            </div>
                            <div class="form-group">
                                <label for="">Name:</label>
                                <input type="text" name="cust[name]" id="cust_name" class="form-control" value="<?php echo $name_err; ?>">
                                <span class="error" style="color: red;"><?php echo $nameErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="email" name="cust[email]" id="cust_email" class="form-control" value="<?php echo $email_err; ?>">
                                <span class="error" style="color: red;"><?php echo $emailErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Mobile:</label>
                                <input type="tel" name="cust[mobile]" id="cust_mobile" class="form-control" value="<?php echo $mobile_err; ?>">
                                <span class="error" style="color: red;"><?php echo $mobileErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Credit card:</label>
                                <input type="text" name="cust[card]" id="cust_card" class="form-control" value="<?php echo $card_err; ?>">
                                <span class="error" style="color: red;"><?php echo $cardErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Expiry day:</label>
                                <input type="month" name="cust[expiry]" id="cust_expiry" class="form-control" value="<?php echo $expiry_err; ?>">
                                <span class="error" style="color: red;"><?php echo $expiryErr; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="container my-3 p-4">
                            <div class="row">
                                <h3>Shopping Infomation</h3>
                            </div>
                            <div class="form-group">
                                <label for="">Address:</label>
                                <input type="text" class="form-control">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="">Ward:</label>
                                <input type="text" class="form-control">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="">District:</label>
                                <input type="text" class="form-control">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="">City/Province:</label>
                                <input type="text" class="form-control">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="">Country:</label>
                                <input type="text" class="form-control">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="">Delivery date (expected?):</label>
                                <input type="hidden" class="form-control">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="">Product Name (and amount?):</label>
                                <input type="text" class="form-control">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="container my-3 p-4">
                            <div class="col-12">
                                <h3>Note for Shipper</h3>
                            </div>
                            <div class="form-group">
                                <label for="">Note:</label>
                                <input type="text" class="form-control">
                                <span></span>
                            </div>
                            <div>
                                <label for="Total">Total $</label>
                                <span id="total-amount">0</span>
                                <input type="hidden" id="total-not-value" name="total" value="">
                            </div>
                            <div>
                                <button class="form-group" type="submit" name="submit" value="Submit">Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>

</html>