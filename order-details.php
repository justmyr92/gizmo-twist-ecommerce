<table class="table table-borderless">
    <tbody>
        <thead>
            <tr>
                <th>#</th>
                <th>NAME</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
                <th>SUBTOTAL</th>
            </tr>
        </thead>
        <?php
        include "connection.php";
        $count = 1;
        $total = 0;
        $invoice_id = $_POST["invoice_id"];
        $shipping_fee = $_POST["shipping_fee"];
        $sql = "SELECT PRODUCT_INFORMATION.NAME, PRODUCT_INFORMATION.PRICE, ORDERLINE.QUANTITY, ORDERLINE.SUBTOTAL FROM ORDERLINE INNER JOIN PRODUCT_INFORMATION ON PRODUCT_INFORMATION.PRODUCT_ID = ORDERLINE.PRODUCT_ID WHERE INVOICE_ID = '$invoice_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <th><?php echo $count; ?></th>
                    <td><?php echo $row["NAME"]; ?></td>
                    <td><?php echo $row["QUANTITY"]; ?></td>
                    <td>PHP <?php echo $row["PRICE"]; ?></td>
                    <td>PHP <?php echo $row["SUBTOTAL"]; ?></td>
                </tr>
        <?php
                $count++;
                $total += $row["SUBTOTAL"];
            }
        }
        ?>
        <tr>
            <th></th>
            <td></td>
            <td></td>
            <th>SUMMARY</th>
            <td>PHP <?php echo number_format((float)$total, 2, '.', ''); ?></td>
        </tr>
        <tr>
            <th></th>
            <td></td>
            <td></td>
            <th>SHIPPING FEE</th>
            <td>PHP <?php echo number_format((float)$shipping_fee, 2, '.', ''); ?></td>
        </tr>
        <tr>
            <th></th>
            <td></td>
            <td></td>
            <th>TOTAL</th>
            <td>PHP <?php echo number_format((float)$shipping_fee + $total, 2, '.', ''); ?></td>
        </tr>
    </tbody>
</table>