<?php
if (isset($_SESSION["CUSTOMER_ID"])) {
?>
    <script>
        $(document).ready(function() {
            $('#account_Login').show();
            $('#account_notLogin').hide();
        });
    </script>
<?php
} else {
?>
    <script>
        $(document).ready(function() {
            $('#account_notLogin').show();
            $('#account_Login').hide();
        });
    </script>
<?php
}
?>
<nav class="navbar navbar-expand-lg navbar-light text-dark py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="home.php">
            <img src="res/images/gizmo-twist-logo.png" alt="gizmo-twist-logo.png" width="35" height="35">
            GIZMO<span class="text-success fw-normal">TWIST</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ms-3 mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-primary home" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark shop" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark blog" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark about" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark contact" href="contact.php">Contact</a>
                </li>
            </ul>
            <div class="d-flex">
                <a class="text-dark btn btn-lg" id="account_notLogin" href="login.php">
                    <i class="bi bi-person"></i>
                </a>
                <div class="dropdown open">
                    <a class="text-dark btn btn-lg dropdown" id="account_Login" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item"><?php echo $customer_info["FIRSTNAME"] . " " . $customer_info["LASTNAME"]; ?></a>
                        <a class="dropdown-item" href="order-history.php">View Order</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
                <a class="text-dark btn btn-lg position-relative" href="cart.php">
                    <i class="bi bi-cart-fill"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php
                        if (isset($_SESSION["CUSTOMER_ID"])) {
                            $customer_id =  $_SESSION["CUSTOMER_ID"];
                            $sql = "SELECT COUNT(CUSTOMER_ID) FROM CART WHERE CUSTOMER_ID = '$customer_id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_row();
                            }
                        }
                        ?>
                        <small>
                            <?php
                            if (isset($_SESSION["CUSTOMER_ID"])) {
                                echo $row[0];
                            } else {
                                echo 0;
                            }
                            ?>
                        </small>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>