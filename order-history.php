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

        .order-history-section {
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Gizmo Twist | Order History</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <section class="bg-white order-history-section py-5">
        <div class="container">
            <h3>ORDER HISTORY</h3>
            <table class="table display" id="order-history-table">
                <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>Order Date</th>
                        <th>Estimated Delivery Date</th>
                        <th>Shipping Fee</th>
                        <th>Total</th>
                        <th>View Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $customer_id = $_SESSION["CUSTOMER_ID"];
                    $sql = "SELECT * FROM INVOICE WHERE CUSTOMER_ID = '$customer_id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($invoice_row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $invoice_row["INVOICE_ID"] ?></td>
                                <td><?php echo $invoice_row["Order_Date"] ?></td>
                                <td><?php echo $invoice_row["Shipping_Date"] ?></td>
                                <td>PHP <?php echo $invoice_row["SHIPPING_FEE"] ?></td>
                                <td>PHP <?php echo $invoice_row["TOTAL_AMOUNT"] ?></td>
                                <td>
                                    <input type="hidden" id="shipping_fee" value="<?php echo $invoice_row["SHIPPING_FEE"] ?>">
                                    <button class="btn btn-success btn-sm view-more" id="<?php echo $invoice_row["INVOICE_ID"] ?>" data-bs-toggle="modal" data-bs-target="#viewMoreModal">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
    <script>
        $(document).ready(function() {
            $('#order-history-table').DataTable();
        });
        $(function() {
            $('nav').addClass('bg-light');
            $('nav').addClass('shadow-sm');
            $('nav').removeClass('mt-3');
            $('.home').addClass('text-dark');
            $('.home').removeClass('text-primary');
        });
    </script>
    <script src=" node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $(document).on("click", ".view-more", function() {
            var invoice_id = $(this).attr('id');
            var shipping_fee = $("#shipping_fee").val();
            $.ajax({
                url: 'order-details.php',
                method: 'post',
                data: {
                    invoice_id: invoice_id,
                    shipping_fee: shipping_fee
                },
                success: function(data) {
                    $('.view-more-details').html(data);
                    $('#viewMoreModal').modal("show");

                }
            });
        });
    </script>
</body>

</html>

<div class="modal fade" id="viewMoreModal" tabindex="-1" aria-labelledby="viewMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewMoreModalLabel">Order Details</h5>
            </div>
            <div class="modal-body view-more-details">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>