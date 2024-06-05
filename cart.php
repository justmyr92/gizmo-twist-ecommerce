<?php
session_start();
if (isset($_SESSION["CUSTOMER_ID"])) {
    include "customer-information.php";
} else {
    header("location: login.php");
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

        .cart-overview-section {
            min-height: 86.5vh;
            max-height: fit-content;
            margin-top: 90px;
        }

        .footer-content,
        table,
        th {
            font-family: "Barlow-Bold";
        }

        h6 {
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
    <section class="bg-white cart-overview-section py-5">
        <div class="container border">
            <div class="row">
                <div class="col-8 border p-3">
                    <div class="row">
                        <div class="col-4">
                            <h6>PRODUCT</h6>
                        </div>
                        <div class="col">
                            <h6>PRICE</h6>
                        </div>
                        <div class="col">
                            <h6>QUANTITY</h6>
                        </div>
                        <div class="col">
                            <h6>TOTAL</h6>
                        </div>
                        <div class="col">
                            <h6>ACTION</h6>
                        </div>
                    </div>
                    <?php
                    $shipping_fee = 0;
                    $sql = "SELECT PRODUCT_INFORMATION.NAME, PRODUCT_INFORMATION.PRODUCT_ID, PRODUCT_INFORMATION.PRICE, PRODUCT_INFORMATION.IMAGE, CART.CUSTOMER_ID, CART.QUANTITY, CART.SUBTOTAL FROM PRODUCT_INFORMATION INNER JOIN CART ON CART.PRODUCT_ID = PRODUCT_INFORMATION.PRODUCT_ID WHERE CART.CUSTOMER_ID = '$customer_id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $shipping_fee = 50;
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="row">
                                <div class="col-4">
                                    <div class="card mb-3 border-0" style="max-width: 100%;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="res/images/products/<?php echo $row["IMAGE"]; ?>" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body p-0">
                                                    <p class="card-title mx-2 mt-2"><?php echo $row["NAME"]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <p>PHP <?php echo $row["PRICE"]; ?></p>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" min="1" value="<?php echo $row["QUANTITY"]; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <p>PHP <?php echo $row["SUBTOTAL"]; ?></p>
                                </div>
                                <div class="col">
                                    <button class="btn btn-success btn-sm edit-quantity" id="<?php echo $row["PRODUCT_ID"]; ?>"><i class="bi bi-pen-fill"></i></button>
                                    <button class="btn btn-danger btn-sm delete_product" id="<?php echo $row["PRODUCT_ID"]; ?>"><i class="bi bi-trash-fill"></i></button>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="col p-3">
                    <div class="container-fluid g-0 cart-summary">
                        <h6>SHPPING DETAILS</h6>
                        <div class="row mb-2">
                            <div class="col-2">
                                NAME
                            </div>
                            <div class="col text-end">
                                <?php echo $customer_info["FIRSTNAME"] . " " . $customer_info["MIDDLENAME"] . " " . $customer_info["LASTNAME"]; ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-2">
                                ADDRESS
                            </div>
                            <div class="col text-end">
                                <?php echo $customer_info["STREET"] . ", " . $customer_info["BARANGAY"] . ", " . $customer_info["MUNICIPALITY"]; ?>
                                <br>
                                <?php echo $customer_info["PROVINCE"] . ", " . $customer_info["ZIPCODE"]; ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                PHONE NO
                            </div>
                            <div class="col text-end">
                                <?php echo $customer_info["PHONENUMBER"]; ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-2">
                                EMAIL
                            </div>
                            <div class="col text-end">
                                <?php echo $customer_info["EMAIL_ADDRESS"]; ?>
                            </div>
                        </div>
                        <hr>
                        <?php
                        include "connection.php";
                        $cust_id = $_SESSION["CUSTOMER_ID"];
                        $sql = "SELECT SUM(SUBTOTAL) FROM CART WHERE CUSTOMER_ID = '$cust_id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_row();
                        ?>
                        <div class="row mb-2">
                            <div class="col">
                                SUBTOTAL
                            </div>
                            <div class="col text-end">
                                <?php
                                if ($row[0] != 0) {
                                    echo "PHP " . $row[0];
                                } else {
                                    echo "PHP " . 0;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                SHIPPING FEE
                            </div>
                            <div class="col text-end">
                                <?php
                                if ($shipping_fee != 0) {
                                    echo "PHP " . number_format((float)$shipping_fee, 2, '.', '');
                                } else {
                                    echo "PHP " . 0;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                TOTAL
                            </div>
                            <div class="col text-end">
                                <?php
                                if ($row[0] != 0) {
                                    echo "PHP " . number_format((float)$row[0] + $shipping_fee, 2, '.', '');
                                } else {
                                    echo "PHP " . 0;
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex gap-2">
                            <button class="btn btn-dark w-50 delete_all_product">RESET CART</button>
                            <button class="btn btn-outline-dark w-50 place-order">PLACE ORDER</button>
                        </div>
                    </div>
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
            $('nav').removeClass('mt-3');
            $('.home').addClass('text-dark');
            $('.home').removeClass('text-primary');
        });
    </script>
</body>

</html>


<div class="modal fade" id="editquantityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editquantityModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content edit-cart-quantity">

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("click", ".edit-quantity", function() {
        var product_id = $(this).attr('id');
        $.ajax({
            url: 'edit-quantity.php',
            method: 'post',
            data: {
                product_id: product_id
            },
            success: function(data) {
                $('.edit-cart-quantity').html(data);
                $('#editquantityModal').modal("show");
            }
        });
    });
</script>
<?php
include "cart-offcanvas.php";
?>
<script>
    $(document).on('click', '.delete_product', function(e) {
        e.preventDefault();
        var product_id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "submit-delete-product.php",
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        Swal.fire(
                            'Deleted!',
                            'Your cart has been reset.',
                            'success'
                        ).then((result) => {
                            window.location.href = "cart.php";
                        })
                    }
                });
            } else {
                window.location.href = "cart.php";
            }
        });
    });
</script>
<script>
    $(document).on('click', '.delete_all_product', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "submit-delete-product.php",
                    success: function(data) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ).then((result) => {
                            window.location.href = "cart.php";
                        })
                    }
                });
            } else {
                window.location.href = "cart.php";
            }
        });
    });
</script>
<script>
    $(document).on('click', '.place-order', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Confirm Order',
            text: "Do you want to place order?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Place Order'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "place-order.php",
                    success: function(data) {
                        Swal.fire(
                            'Order Confirmed',
                            'View Order History',
                            'success'
                        ).then((result) => {
                            window.location.href = "cart.php";
                        })
                    }
                });
            } else {
                window.location.href = "cart.php";
            }
        });
    });
</script>