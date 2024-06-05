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

        .product-overview-section {
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
    <section class="bg-white product-overview-section py-5">
        <div class="container h-100 py-3">
            <?php
            include "product.php";
            ?>
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
            $('nav').removeClass('mt-3');
            $('.home').addClass('text-dark');
            $('.home').removeClass('text-primary');
            $('.home').removeClass('mt-3');
            $('.shop').addClass('text-primary');
            $('.shop').removeClass('text-dark');
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