<?php
include "connection.php";
session_start();
$customer_id = $_SESSION["CUSTOMER_ID"];
$product_id = $_POST["product_id"];
$sql = "SELECT CART.QUANTITY, PRODUCT_INFORMATION.NAME, PRODUCT_INFORMATION.STOCKS, PRODUCT_INFORMATION.PRICE FROM CART INNER JOIN PRODUCT_INFORMATION ON CART.PRODUCT_ID = PRODUCT_INFORMATION.PRODUCT_ID WHERE CART.PRODUCT_ID = '$product_id' AND CART.CUSTOMER_ID ='$customer_id'";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

?>
<div class="modal-header">
    <h5 class="modal-title"><?php echo $product["NAME"] ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        <label for="floatingInput">Quantity</label>
        <input type="number" class="form-control" id="new_quantity" min="1" max="<?php echo $product["STOCKS"]; ?>" value="<?php echo $product["QUANTITY"]; ?>">
        <input type="hidden" class="price" value="<?php echo $product["PRICE"]; ?>">

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary submit-new-quantity" id="<?php echo $product_id; ?>">Save changes</button>
</div>

<script>
    $(document).on('click', '.submit-new-quantity', function(e) {
        e.preventDefault();
        var product_id = $(this).attr('id');
        var new_quantity = $("#new_quantity").val();
        var price = $(".price").val();
        var subtotal = price * new_quantity;
        Swal.fire({
            text: 'Do you want to continue',
            icon: 'warning',
            confirmButtonText: 'Yes',
            showCancelButton: true,
            showDenyButton: true,
            denyButtonText: 'Dont Save'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "submit-edit-quantity.php",
                    data: {
                        product_id: product_id,
                        new_quantity: new_quantity,
                        subtotal: subtotal
                    },
                    success: function(data) {
                        Swal.fire({
                            text: 'Update success!',
                            icon: 'success',
                        }).then((result) => {
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