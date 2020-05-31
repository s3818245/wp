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

    $countrieslist = array("..." => "", "AF" => "Afghanistan", "AX" => "Åland Islands", "AL" => "Albania", "DZ" => "Algeria", "AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla", "AQ" => "Antarctica", "AG" => "Antigua and Barbuda", "AR" => "Argentina", "AM" => "Armenia", "AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados", "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BA" => "Bosnia and Herzegovina", "BW" => "Botswana", "BV" => "Bouvet Island", "BR" => "Brazil", "IO" => "British Indian Ocean Territory", "BN" => "Brunei Darussalam", "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon", "CA" => "Canada", "CV" => "Cape Verde", "KY" => "Cayman Islands", "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile", "CN" => "China", "CX" => "Christmas Island", "CC" => "Cocos (Keeling) Islands", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo", "CD" => "Congo, The Democratic Republic of The", "CK" => "Cook Islands", "CR" => "Costa Rica", "CI" => "Cote D'ivoire", "HR" => "Croatia", "CU" => "Cuba", "CY" => "Cyprus", "CZ" => "Czech Republic", "DK" => "Denmark", "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "EC" => "Ecuador", "EG" => "Egypt", "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia", "FK" => "Falkland Islands (Malvinas)", "FO" => "Faroe Islands", "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia", "TF" => "French Southern Territories", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece", "GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam", "GT" => "Guatemala", "GG" => "Guernsey", "GN" => "Guinea", "GW" => "Guinea-bissau", "GY" => "Guyana", "HT" => "Haiti", "HM" => "Heard Island and Mcdonald Islands", "VA" => "Holy See (Vatican City State)", "HN" => "Honduras", "HK" => "Hong Kong", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia", "IR" => "Iran, Islamic Republic of", "IQ" => "Iraq", "IE" => "Ireland", "IM" => "Isle of Man", "IL" => "Israel", "IT" => "Italy", "JM" => "Jamaica", "JP" => "Japan", "JE" => "Jersey", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya", "KI" => "Kiribati", "KP" => "Korea, Democratic People's Republic of", "KR" => "Korea, Republic of", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LA" => "Lao People's Democratic Republic", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia", "LY" => "Libyan Arab Jamahiriya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MO" => "Macao", "MK" => "Macedonia, The Former Yugoslav Republic of", "MG" => "Madagascar", "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta", "MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius", "YT" => "Mayotte", "MX" => "Mexico", "FM" => "Micronesia, Federated States of", "MD" => "Moldova, Republic of", "MC" => "Monaco", "MN" => "Mongolia", "ME" => "Montenegro", "MS" => "Montserrat", "MA" => "Morocco", "MZ" => "Mozambique", "MM" => "Myanmar", "NA" => "Namibia", "NR" => "Nauru", "NP" => "Nepal", "NL" => "Netherlands", "AN" => "Netherlands Antilles", "NC" => "New Caledonia", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria", "NU" => "Niue", "NF" => "Norfolk Island", "MP" => "Northern Mariana Islands", "NO" => "Norway", "OM" => "Oman", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestinian Territory, Occupied", "PA" => "Panama", "PG" => "Papua New Guinea", "PY" => "Paraguay", "PE" => "Peru", "PH" => "Philippines", "PN" => "Pitcairn", "PL" => "Poland", "PT" => "Portugal", "PR" => "Puerto Rico", "QA" => "Qatar", "RE" => "Reunion", "RO" => "Romania", "RU" => "Russian Federation", "RW" => "Rwanda", "SH" => "Saint Helena", "KN" => "Saint Kitts and Nevis", "LC" => "Saint Lucia", "PM" => "Saint Pierre and Miquelon", "VC" => "Saint Vincent and The Grenadines", "WS" => "Samoa", "SM" => "San Marino", "ST" => "Sao Tome and Principe", "SA" => "Saudi Arabia", "SN" => "Senegal", "RS" => "Serbia", "SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore", "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia", "ZA" => "South Africa", "GS" => "South Georgia and The South Sandwich Islands", "ES" => "Spain", "LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname", "SJ" => "Svalbard and Jan Mayen", "SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syrian Arab Republic", "TW" => "Taiwan, Province of China", "TJ" => "Tajikistan", "TZ" => "Tanzania, United Republic of", "TH" => "Thailand", "TL" => "Timor-leste", "TG" => "Togo", "TK" => "Tokelau", "TO" => "Tonga", "TT" => "Trinidad and Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan", "TC" => "Turks and Caicos Islands", "TV" => "Tuvalu", "UG" => "Uganda", "UA" => "Ukraine", "AE" => "United Arab Emirates", "GB" => "United Kingdom", "US" => "United States", "UM" => "United States Minor Outlying Islands", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VE" => "Venezuela", "VN" => "Viet Nam", "VG" => "Virgin Islands, British", "VI" => "Virgin Islands, U.S.", "WF" => "Wallis and Futuna", "EH" => "Western Sahara", "YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe");

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
            if (!preg_match("/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/", $mobile)) {
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

        if (empty($_POST["cust"]["address1"])) {
            $address1Err = "* Address is required";
            $errorFound++;
        } else {
            $address1 = test_input($_POST["cust"]["address1"]);
            if (!preg_match("/^(\d+[^\w\s]?[\d{1,10}]*)\s?(\b\w*\b\s?)+$/", $address1)) {
                $address1Err = "* address1Err.";
                $errorFound++;
            }
        }

        if (!empty($_POST["cust"]["address2"])) {
            $address2 = test_input($_POST["cust"]["address2"]);
            if (!preg_match("/^[0-9]$/", $address2)) {
                $address2Err = "* address2Err.";
                $errorFound++;
            }
        }

        if (!empty($_POST["cust"]["ward"])) {
            $ward = test_input($_POST["cust"]["ward"]);
            if (!preg_match("/^$/", $ward)) {
                $wardErr = "* wardErr.";
                $errorFound++;
            }
        }

        if (!empty($_POST["cust"]["district"])) {
            $district = test_input($_POST["cust"]["district"]);
            if (!preg_match("/^$/", $district)) {
                $districtErr = "* districtErr.";
                $errorFound++;
            }
        }

        if (empty($_POST["cust"]["city"])) {
            $cityErr = "* City is required";
            $errorFound++;
        } else {
            $city = test_input($_POST["cust"]["city"]);
            if (!preg_match("/^$/", $city)) {
                $cityErr = "* citynErr.";
                $errorFound++;
            }
        }

        foreach ($countrieslist as $key => $countryselected) {
            if ($countryselected == "") {
                $errorFound++;
                $countryErr = "* Please select a country";
            }
        }

        if (!empty($_POST["cust"]["zip"])) {
            $zip = test_input($_POST["cust"]["zip"]);
            if (!preg_match("/^(\d{5}(?:[-\s]\d{4})?)$/", $zip)) {
                $zipErr = "* Zip Code unknonw";
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

    if (isset($_POST['order'])) {
        $name_err = $_POST['cust']['name'];
        $email_err = $_POST['cust']['email'];
        $mobile_err = $_POST['cust']['mobile'];
        $card_err = $_POST['cust']['card'];
        $expiry_err = $_POST['cust']['expiry'];
        $address1_err = $_POST['cust']['address1'];
        $address2_err = $_POST['cust']['address1'];
        $ward_err = $_POST['cust']['ward'];
        $district_err = $_POST['cust']['district'];
        $city_err = $_POST['cust']['city'];
        $country_err = $_POST['cust']['country'];
        $zip_err = $_POST['cust']['zip'];
    }

    preShow($_POST);

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

        $addedpro =  '
        <div class="col py-2 d-flex align-items-stretch">
            <div class="card" style="">
                <a href="addproduct.html">
                    <svg class="bi bi-plus-circle" width="10em" height="10em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    </svg>
                </a>
            </div>
        </div>
        ';
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
                <li class="nav-item active">
                    <a class="nav-link" href="">
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
                <?php
                echo $login . $pageusername;
                ?>
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
                                <label for="">Address 1:</label>
                                <input type="text" name="cust[address1]" id="cust_address1" class="form-control" value="<?php echo $address1_err; ?>">
                                <span class="error" style="color: red;"><?php echo $address1Err; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Address 2:</label>
                                <input type="text" name="cust[address2]" id="cust_address2" class="form-control" value="<?php echo $address2_err; ?>">
                                <span class="error" style="color: red;"><?php echo $address2Err; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Ward:</label>
                                <input type="text" name="cust[ward]" id="cust_ward" class="form-control" value="<?php echo $ward_err; ?>">
                                <span class="error" style="color: red;"><?php echo $wardErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">District:</label>
                                <input type="text" name="cust[district]" id="cust_district" class="form-control" value="<?php echo $district_err; ?>">
                                <span class="error" style="color: red;"><?php echo $districtErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">City:</label>
                                <input type="text" name="cust[city]" id="cust_city" class="form-control" value="<?php echo $city_err; ?>">
                                <span class="error" style="color: red;"><?php echo $cityErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Country:</label>
                                <select name="cust[country]" id="cust_country" class="custom-select" value="">
                                    <?php
                                    foreach ($countrieslist as $key => $countryselected) {
                                    ?>
                                        <option value="<?= $key ?>" title="<?= htmlspecialchars($countryselected) ?>"><?= htmlspecialchars($countryselected) ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="error" style="color: red;"><?php echo $countryErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Zip:</label>
                                <input type="text" name="cust[zip]" id="cust_zip" class="form-control" value="<?php echo $zip_err; ?>">
                                <span class="error" style="color: red;"><?php echo $zipErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Delivery date (expected?):</label>
                                <input type="hidden" class="form-control">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="container my-3 p-4">
                            <div class="row">
                                <h3>Note for Shipper</h3>
                            </div>
                            <div class="form-group">
                                <label for="">Note:</label>
                                <input type="text" class="form-control">
                                <span></span>
                            </div>
                            <div class="row">
                                <h3>Product Information</h3>
                            </div>
                            <div class="form-group">
                                <label for="">Product Name (and amount?):</label>
                                <input type="hidden" class="form-control">
                                <span></span>
                            </div>
                            <div>
                                <label for="Total">Total $</label>
                                <span id="total-amount">0</span>
                                <input type="hidden" id="total-not-value" name="total" value="">
                            </div>
                            <div>
                                <button class="form-group" type="submit" name="order" value="Submit">Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>

</html>