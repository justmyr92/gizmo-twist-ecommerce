<?php
include "connection.php";
$id = $_POST["product_id"];
$sql = "SELECT * FROM PRODUCT_INFORMATION WHERE PRODUCT_ID = '$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-6 h-100">
                        <img src="res/images/products/<?php echo $row["IMAGE"]; ?>" class="border mt-auto" alt="" width="100%">
                    </div>
                    <div class="col">
                        <input type="hidden" id="product_id" name="product_id" value="<?php echo $id; ?>">
                        <h5 class="fw-bold"><?php echo $row["NAME"]; ?></h5>
                        <p><?php echo $row["DESCRIPTION"]; ?></p>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" class="p-0">
                                        <p>Sold:</p>
                                    </th>
                                    <td scope="row" class="p-0"><?php echo "10"; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-0">
                                        <p>Stocks:</p>
                                    </th>
                                    <td scope="row" class="p-0"><?php echo $row["STOCKS"]; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-0">
                                        <p>Category:</p>
                                    </th>
                                    <td scope="row" class="p-0"><?php echo $row["CATEGORY"]; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-0">
                                        <p>Price:</p>
                                    </th>
                                    <td scope="row" class="p-0">PHP <?php echo $row["PRICE"]; ?>
                                        <input type="hidden" id="price" name="price" value="<?php echo $row["PRICE"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-0">
                                        <p>Quantity:</p>
                                    </th>
                                    <td scope="row" class="p-0">
                                        <div class="mb-3">
                                            <input type="number" class="form-control w-50" name="input_quantity" id="input_quantity" value="1" min="1" max="<?php echo $row["STOCKS"]; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-0">
                                        <p>Summary:</p>
                                    </th>
                                    <td scope="row" class="p-0 summary"> 1 x <?php echo $row["PRICE"]; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-0">
                                        <p>Total:</p>
                                    </th>
                                    <td scope="row" class="p-0 total">PHP <?php echo $row["PRICE"]; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer border-0 py-3">
            <button class="btn btn-outline-dark rounded-0 ms-2 add-to-cart" id="<?php echo $id; ?>" type="submit">
                <i class="bi bi-cart-fill"></i>
                ADD TO CART
            </button>
        </div>
<?php
    }
}
?>

<script type="text/javascript">
    $("#input_quantity").on("input", function() {
        var quantity = $('#input_quantity').val()
        var price = $('#price').val();
        var subtotal = price * quantity
        $(".summary").text($(this).val());
        $(".summary").append(" x ", price);
        var total = "PHP " + parseFloat($(this).val() * price).toFixed(2);
        $('.total').text(total);
        console.log(quantity);
    });
</script>