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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "* Username is required";
            $errorFound++;
        }

        if (empty($_POST["password"])) {
            $passwordErr = "* Password is required";
            $errorFound++;
        }
    }

    $login = array('admin1' => 'nghiepquatsapmat', 'admin2' => 'nlgiaidoancuoi');
    ?>
    <div class="container login_con">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 col-12 my-auto" style="border: 1px black solid;">
                <h2>Account Login</h2>
                <form action="" method="post" name="login_form">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="Input form-control" id="username" placeholder="Username/Email/Mobile phone">
                    </div>
                    <div class="form-group">
                        <label for="password">Password::</label>
                        <input type="password" class="Input form-control" id="password" placeholder="Password">
                    </div>
                    <div class="my-2">
                        <button class="btn btn-primary btn-sm btn-block" type="submit" value="Submit">Log in</button>
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
    <?php
    if (isset($_POST["submit"])) {

        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        if (isset($login[$username]) && $login[$username] == $password) {
            header("location: orderform.html");
            exit;
        } else {
            $err_mes = "<span style='color: red'> Invalid Login Details </span>";
            echo $err_mes;
        };
    };

    preShow($_POST);
    ?>
</body>

</html>