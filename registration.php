<?php
session_start();
if (isset($_SESSION["CUSTOMER_ID"])) {
    include "customer-information.php";
}
$limit = FALSE;
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
    <title>Gizmo Twist | Shop</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <section class="bg-white registration-section py-5">
        <div class="container h-100 py-3">
            <form action="submit-registration.php" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                                <label for="lname">Last Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                                <label for="fname">First Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
                                <label for="mname">Middle Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="age" name="age" placeholder="Age">
                                <label for="age">Age</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="bday" name="bday" placeholder="Birthday">
                                <label for="bday">Birthday</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                <label for="phone">Phone</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="street" name="street" placeholder="Street">
                                <label for="street">Street</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Barangay">
                                <label for="barangay">Barangay</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Phone">
                                <label for="municipality">Municipality</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="province" name="province" placeholder="Province">
                                <label for="province">Province</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code">
                                <label for="zipcode">Zip Code</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder=">Confirm Password">
                                <label for="cpassword">Confirm Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="w-100">
                        <button type="submit" class="btn btn-outline-success px-5 float-end">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
    <script src=" node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('nav').addClass('bg-light');
            $('nav').addClass('shadow-sm');
            $('.home').addClass('text-dark');
            $('.home').removeClass('text-primary');
            $('.home').removeClass('mt-3');
            $('.shop').addClass('text-dark');
        });
    </script>
</body>

</html>
<?php
if (isset($_SESSION["ADD-TO-CART-STATUS"])) {
    if ($_SESSION["ADD-TO-CART-STATUS"] == "SUCCESS") {
?>
        <script type="text/javascript">
            Swal.fire({
                title: 'SUCCESFULLY ADDED TO CART',
                text: 'Have a great day!',
                icon: 'success'
            })
        </script>
    <?php
    } else if ($_SESSION["ADD-TO-CART-STATUS"] == "FAILED") {
    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong!'
            })
        </script>
<?php
    }
    unset($_SESSION["ADD-TO-CART-STATUS"]);
}
include "cart-offcanvas.php";
?>