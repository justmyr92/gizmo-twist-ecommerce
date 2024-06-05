<?php
session_start();
if (isset($_SESSION["CUSTOMER_ID"])) {
    include "customer-information.php";
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

        header {
            height: 30vh;
            margin-top: 26px;
            background-image: url('./res/images/hahaa.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        header,
        h1 {
            font-family: "Barlow-Bold";
        }

        .story-section,
        h3 {
            font-family: "Barlow-Bold";
        }

        * {
            font-family: "Barlow-Regular";
        }

        .footer-content,
        table,
        th {
            font-family: "Barlow-Bold";
        }

        .our-story-image {
            width: 90%;
        }

        .our-story-image:hover {
            z-index: 1;
            width: 100%;
            transition-duration: 1s;
        }
    </style>
    <link rel="icon" href="res/images/gizmo-twist-logo.png">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Gizmo Twist | About</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <br>
    <br>
    <br>
    <header>
        <div class="container position-relative h-100">
            <div class="position-absolute start-50 top-50 translate-middle">
                <h1>ABOUT</h1>
            </div>
        </div>
    </header>
    <section class="bg-white story-section" style="height: max-content;">
        <div class="container">
            <div class="row py-5">
                <div class="col-7">
                    <h3>Our Story</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat consequat enim, non auctor massa ultrices non. Morbi sed odio massa. Quisque at vehicula tellus, sed tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu arcu egestas convallis. Nullam eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae nec augue. Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis diam faucibus et. Morbi a tempor elit.</p>
                    <p>Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula.</p>
                </div>
                <div class="col-5">
                    <img src="res/images/pexels-negative-space-34591.jpg" class="shadow-sm border border-2 our-story-image">

                </div>
            </div>
            <div class="row py-5">
                <div class="col-5">
                    <img src="res/images/pexels-negative-space-34591.jpg" class="shadow-sm border border-2 our-story-image">
                </div>
                <div class="col-7">
                    <h3>Our Vision</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat consequat enim, non auctor massa ultrices non. Morbi sed odio massa. Quisque at vehicula tellus, sed tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu arcu egestas convallis. Nullam eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae nec augue. Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis diam faucibus et. Morbi a tempor elit.</p>
                    <p>Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula.</p>
                </div>
            </div>
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
            $('.about').addClass('text-primary');
            $('.about').removeClass('text-dark');
        });
    </script>
</body>

</html>

<?php

include "cart-offcanvas.php";
include "product-details.php";
?>