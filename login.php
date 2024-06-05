<?php
session_start();
if (isset($_SESSION["CUSTOMER_ID"])) {
    header("location: home.php");
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

        .login-section {
            height: 100vh;
        }

        * {
            font-family: "Barlow-Regular";
        }

        .footer-content,
        table,
        th {
            font-family: "Barlow-Bold";
        }

        form {
            width: 30vw;
        }
    </style>
    <link rel="icon" href="res/images/gizmo-twist-logo.png">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Gizmo Twist | Login</title>
</head>

<body>

    <?php
    include "navbar.php";
    ?>
    <section class="login-section">
        <div class="container position-relative h-100 w-100">
            <form action="submit-login.php" method="POST" class="border shadow position-absolute top-50 start-50 translate-middle p-4 rounded border border-2 border-dark">
                <div class="mb-3">
                    <h3>Login</h3>
                    <span class="p">Not a member? <a href="#" class="text-success text-decoration-none">Register</a></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border border-dark" id="login_username" name="login_username" placeholder="Username" autocomplete="off" required>
                    <label for="login_username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control border border-dark" id="login_password" name="login_password" placeholder="Password" autocomplete="off" required>
                    <label for="login_password">Password</label>
                </div>
                <div class="d-grid">
                    <button class="btn btn-outline-dark btn-lg rounded-0">Sign In</button>
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
        });
    </script>

    <script type="text/javascript">
        <?php
        if ($_SESSION["LOGIN_STATUS"] == "FAILED") {
        ?>
            Swal.fire({
                icon: 'error',
                title: 'Log in Error',
                text: 'Incorrect Username or Password! Please Try Again!'
            })
        <?php
            unset($_SESSION["LOGIN_STATUS"]);
        }
        ?>
    </script>
</body>

</html>

<?php
include "cart-offcanvas.php";
?>