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

        .contact-section {
            height: 90vh;
        }

        .contact-section,
        h4 {
            font-family: "Barlow-Bold";
        }

        textarea {
            resize: none;
            max-height: 25vh;
            min-height: 25vh;
        }

        * {
            font-family: "Barlow-Regular";
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
    <title>Gizmo Twist | Contact</title>
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
                <h1>CONTACT</h1>
            </div>
        </div>
    </header>

    <section class="bg-white contact-section py-5">
        <div class="container h-100 shadow-sm">
            <div class="row h-100">
                <div class="col h-100 border position-relative">
                    <div class="container py-3 position-absolute w-75 top-50 start-50 translate-middle">
                        <form action="#">
                            <h4 class="text-center mb-4">Send Us A Message</h4>
                            <div class="mb-3">
                                <input type="email" class="form-control rounded-0" id="emailaddress" placeholder="Email Address">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control rounded-0" id="emailaddress" rows="7" placeholder="How can we help you?"></textarea>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark rounded-pill">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col h-100 border">

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
            $('.contact').addClass('text-primary');
            $('.contact').removeClass('text-dark');
        });
    </script>
</body>

</html>

<?php

include "cart-offcanvas.php";
include "product-details.php";
?>