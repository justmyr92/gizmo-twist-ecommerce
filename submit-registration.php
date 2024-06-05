<?php
include "connection.php";
session_start();
$customer_id = 'CID' . rand(1000000, 9999999);
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mname = $_POST["mname"];
$age = $_POST["age"];
$bday = $_POST["bday"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$street = $_POST["street"];
$barangay = $_POST["barangay"];
$municipality = $_POST["municipality"];
$province = $_POST["province"];
$zipcode = $_POST["zipcode"];
$username = $_POST["username"];
$password = md5($_POST["password"]);
$cpassword = md5($_POST["cpassword"]);


if ($password == $cpassword) {
    $sql = "INSERT INTO CUSTOMER_INFORMATION VALUES ('$customer_id', '$lname', '$fname', '$mname', $age, '$bday', '$street', '$barangay', '$municipality', '$province', '$zipcode', '$phone', '$email');";
    $sql .= "INSERT INTO CUSTOMER_ACCOUNT VALUES ('$customer_id', '$username', '$password');";
    if ($conn->multi_query($sql) === TRUE) {
        $_SESSION["REGISTER_STATUS"] = "SUCCESS";
    } else {
        $_SESSION["REGISTER_STATUS"] = "FAILED";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @font-face {
            font-family: "Barlow-Regular";
            src: url("./res/fonts/Barlow-Regular.ttf");
        }

        @font-face {
            font-family: "Barlow-Bold";
            src: url("./res/fonts/Barlow-Bold.ttf");
        }

        * {
            font-family: "Barlow-Regular";
        }

        .registration-section {
            min-height: 70vh;
            max-height: max-content;
            margin-top: 90px;
        }

        .footer-content,
        table,
        th {
            font-family: "Barlow-Bold";
        }
    </style>
    <link rel="icon" href="res/images/gizmo-twist-logo.png">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</head>

<body>

</body>

</html>
<script type="text/javascript">
    <?php
    if (isset($_SESSION["REGISTER_STATUS"])) {
        if ($_SESSION["REGISTER_STATUS"] == "SUCCESS") {
    ?>
            Swal.fire(
                'Registration Successful!',
                'success'
            ).then((result) => {
                window.location.href = "home.php";
            })
        <?php
        } else {
        ?> Swal.fire(
                'Registration Failed!',
                'error'
            ).then((result) => {
                window.location.href = "registration.php";
            })
    <?php
        }
        unset($_SESSION["REGISTER_STATUS"]);
    }
    ?>
</script>