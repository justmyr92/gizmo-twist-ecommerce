<?php
session_start();
if (isset($_SESSION["CUSTOMER_ID"])) {
    include "customer-information.php";
}
$limit = TRUE;
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

        .main-section {
            height: 100vh;
            background-image: url('./res/images/hahaa.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .main-section,
        h2 {
            font-family: "Barlow-Bold";
        }

        .product-overview-section,
        h3 {
            font-family: "Barlow-Bold";
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
    <title>Gizmo Twist | Home</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <section class="main-section">
        <div class="container d-flex align-items-center h-100 w-100">
            <div class="">
                <h2>NO. 1 <span class="text-danger fw-bold">CUBE SHOP</span> IN THE PHILIPPINES</h2>
                <p class="fs-5">IT STARTED WITH A CROSS</p>
                <a href="shop.php" class="btn btn-primary rounded-2 px-3">SHOP NOW</a>
            </div>
        </div>
    </section>
    <section class="bg-white" style="height: 50vh;">
        <div class="container h-100">
            <div class="d-flex justify-content-between h-100 category-section">
                <div class="card border text-dark my-auto shadow-sm" style="width: 25vw; height: max-content">
                    <img src="res/images/haha.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h3 class="card-title fw-bold">Rubik's Cubes</h3>
                        <p class="card-text">New releases</p>
                    </div>
                </div>
                <div class="card border text-dark my-auto shadow-sm" style="width: 25vw; height: max-content">
                    <img src="res/images/lube.png" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h3 class="card-title fw-bold">Lubes</h3>
                        <p class="card-text">New releases</p>
                    </div>
                </div>
                <div class="card border text-dark my-auto shadow-sm" style="width: 25vw; height: max-content">
                    <img src="res/images/accessories.png" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h3 class="card-title fw-bold">Accessories</h3>
                        <p class="card-text">New releases</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-3 product-overview-section" style="min-height: 70vh;">
        <div class="container h-100">
            <h3>PRODUCT OVERVIEW</h3>
            <?php
            include "product.php";
            ?>
            <div class="d-flex justify-content-center mt-2">
                <a href="shop.php" class="btn btn-outline-dark">
                    Load more
                </a>
            </div>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
    <script src=" node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var nav = document.querySelector('nav');
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 100) {
                    nav.classList.add('bg-light', 'shadow-sm');
                } else {
                    nav.classList.remove('bg-light', 'shadow-sm');
                }
            });
        });
    </script>
    <script type="text/javascript">
        <?php
        if ($_SESSION["LOGIN_STATUS"] == "SUCCESSFUL") {
        ?>
            Swal.fire({
                title: 'Login Successful',
                text: 'Welcome to GizmoTwist!',
                icon: 'success'
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