<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

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

<body>
    <?php
    session_start();
    include 'tools.php';

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

    $login = array();
    $sql = "SELECT * FROM userData";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data = array($row['username']=>$row['password']);
            $login = $login + $data;
        }
    } else {
        echo "0 account available";
    }
    // $login = array('admin1' => 'nghiepquatsapmat', 'admin2' => 'nlgiaidoancuoi');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "* Username is required";
            $errorFound++;
        }

        if (empty($_POST["password"])) {
            $passwordErr = "* Password is required";
            $errorFound++;
        }

        if ($errorFound == 0) {
            $_SESSION['userdata'] = $_POST;
            $nowdate = date('l d/m/Y');
            $nowtime = date('H:i');
            $_SESSION['date'] = $nowdate;
            $_SESSION['time'] = $nowtime;
            if (!empty($_SESSION)) {
                $bookingFile = fopen("booking.csv", "a");
                $data = array_merge(
                    [$nowdate],
                    [$nowtime],
                    (array) $_SESSION["userdata"]
                );
                fputcsv($bookingFile, $data);
                fclose($bookingFile);
            }
        }
    }

    if (isset($_POST["login"])) {

        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        if (isset($login[$username]) && $login[$username] == $password) {
            $_SESSION['userdata']['username'] = $username;
            header("location: index.php");
            exit;
        } else {
            $err_mes = "* Invalid Login Details";
        };
    };
    preShow($_POST);
    ?>

    <div class="container login_con">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 col-12 my-auto" style="border: 1px black solid;">
                <h2>Account Login</h2>
                <form action="" method="post" name="login_form">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="Input form-control" id="username" name="username" placeholder="Username/Email/Mobile phone">
                        <span class="error" style="color: red;"><?php echo $usernameErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password::</label>
                        <input type="password" class="Input form-control" id="password" name="password" placeholder="Password">
                        <span class="error" style="color: red;"><?php echo $passwordErr; ?></span>
                    </div>
                    <div class="my-2">
                        <span class="error" style="color: red;"><?php echo $err_mes; ?></span><br>
                        <button class="btn btn-primary btn-sm btn-block" type="submit" name="login" value="Submit">Log in</button>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col">
                            <label>
                                <input type="checkbox" class="remember" name="remember"> Remember me
                            </label>
                        </div>
                        <div class="col">
                            <div class="float-right">
                                <span class="forget"><a href="#">Forgot password?</a></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>