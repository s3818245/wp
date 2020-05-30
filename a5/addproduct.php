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
    include 'tools.php';
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

    $errorFound = 0;

    preShow($_POST);
    if (isset($_POST['add'])){
        // check image
        if(isset($_FILES['item-image'])){
            echo "image chosen";
        $imgData = addslashes(file_get_contents($_FILES['item-image']['tmp_name']));
        $imageSize = $_FILES['item-image']['size'];
        $imageName = $_FILES['item-image']['name'];
        $imageError = $_FILES['item-image']['error'];

        $valid_types = array('png', 'jpg', 'jpeg');
        $filetype = strtolower(end(explode('.',$imageName)));


        if(!in_array($filetype, $valid_types)){
            $imageErrorMess = "* Please choose an image file";
            $errorFound++;
        }
        if($imageSize>65536){
            $imageErrorMess = "* Size of image is too large";
            $errorFound++;
        }
        }

        // check item name
        if (empty($_POST['item']['name'])){
            $nameError = "* Please enter product's name";
            $errorFound++;
        } else{
            $itemName = test_input($_POST['item']['name']);
            if(!preg_match("/^([A-Za-z\-'., ]|[0-9]){1,100}$/", $itemName)){
                $nameError = "* Stop hacking my website";
                $errorFound++;
            }          
        }

        // check item price
        if (empty($_POST['item']['price'])){
            $priceError = "* Please enter product's price";
            $errorFound++;
        } else{
            $itemPrice = test_input($_POST['item']['price']);
            if(!preg_match("/^([0-9].?){1,100}$/", $itemPrice)){
                $priceError = "* Only integers and '.' are allowed";
                $errorFound++;
            }          
        }

        // check item category
        if (empty($_POST['item']['category'])){
            $categoryError = "* Please enter product's category";
            $errorFound++;
        } else{
            $itemCategory = test_input($_POST['item']['category']);
            if(!preg_match("/^[a-zA-Z\-]{1,100}$/", $itemCategory)){
                $categoryError = "* Only letters and '-' are allowed";
                $errorFound++;
            }          
        }

        // chek item description
        if (empty($_POST['item']['description'])){
            $descriptionError = "* Please enter product's description";
            $errorFound++;
        } else{
            $itemDescription = test_input($_POST['item']['description']);
            if(!preg_match("/^[A-Za-z\-'., 0-9]*$/", $itemDescription)){
                $descriptionError = "* Stop hacking our website";
                $errorFound++;
            }          
        }


        if($errorFound==0){
            $itemNameExplode = explode(' ',$itemName);
            if(count($itemNameExplode)>1){
                $itemNameJoin = join('-', $itemNameExplode);
                $itemID = strtolower($itemNameJoin);
            }else{
                $itemID = strtolower($itemName);
            }
            $sql = "INSERT INTO itemData VALUES ('$itemName', '$itemID', '$itemCategory', '$itemDescription', '$itemPrice', '$imgData');";
            if (mysqli_multi_query($conn, $sql)) {
                echo "<p>New record created successfully </p>";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
        }
    }

    mysqli_close($conn);
    ?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse w-100 order-1 order-md-0 dual-collapse2">
            <a class="navbar-brand">Logo</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#Home">Home</a>
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
                    <a class="nav-link justified-content-right" href="wishlist.html">
                        <svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg> Wish list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="orderform.html">
                        <svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd"
                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                        </svg> Check Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="cart.html">
                        <svg class="bi bi-cart3" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg> Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link justified-content-right" href="loginpage.html">
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
            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="col-12">
                            <h1>Insert image</h1>
                           <br>
                            <img src="Photos/upload_icon.png" style="width:300px;height:300px;" alt="">
                            <label>Upload Image File:</label>
                            <br>
                            <input name="item-image" type="file" class="form-control-file"> 
                            <span><?php echo $imageErrorMess; ?></span>
                        </div>
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="col-12">
                            <h1>Product Name
                                <input name="item[name]" id="item-name" type="text">
                            </h1>
                                <span><?php echo $nameError;?></span>
                        </div>
                        <hr>
                        <br>
                        <div class="col-12">
                            Price: $
                            <input name="item[price]" id="item-price" type="text">
                            <span><?php echo $priceError;?></span>
                        </div>
                        <br>
                        <br>
                        <div class="col-12">
                            Category:
                            <select name="item[category]" id="item-category" class="form-control">
                                <option value="in-ear">In-ear</option>
                                <option value="on-ear">On-ear</option>
                                <option value="over-ear">Over-ear</option>
                            </select>
                            <span><?php echo $categoryError;?></span>
                        </div>
                        <br>
                        <hr>
                        <div class="col-12">
                            Description:
                            <br>
                            <textarea name="item[description]" id="item-description" cols="60" rows="10" class="form-control"></textarea>
                            <span><?php echo $descriptionError;?></span>
                        </div>
                        <br>
                        <div class="col-12">
                            <button name="add" type="submit" class="btn btn-secondary">Add item</button>
                        </div>        
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>

</html>