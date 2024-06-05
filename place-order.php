<?php
session_start();
include "connection.php";

$customer_id = $_SESSION["CUSTOMER_ID"];
$sql = "SELECT SUM(SUBTOTAL) FROM CART WHERE CUSTOMER_ID = '$customer_id'";
$result = $conn->query($sql);
$subtotal = $result->fetch_row();

$invoice_id = "IID" . strval(rand(1000000, 9999999));
$shipping_fee = 50.00;
$order_date = date("Y/m/d");
$received_date = date('Y/m/d', strtotime($order_date . ' + 7 days'));
$total = $shipping_fee + $subtotal[0];
$sql = "SELECT Product_ID, Quantity, Subtotal FROM CART WHERE CUSTOMER_ID = '$customer_id'";
$a = $conn->query($sql);
if ($a->num_rows > 0) {
    $sql = "INSERT INTO INVOICE VALUES ('$invoice_id', '$customer_id', $shipping_fee, '$order_date', '$received_date', $total);";
    while ($row = $a->fetch_assoc()) {
        $orderline_id = "OID" . strval(rand(100000000, 999999999));
        $product_id = $row["Product_ID"];
        $quantity = $row["Quantity"];
        $subtotal = $row["Subtotal"];
        $sql .= "INSERT INTO ORDERLINE VALUES ('$orderline_id', '$invoice_id', '$product_id', $quantity, $subtotal);";
    }
    $conn->multi_query($sql);
}

$conn->close();
include "connection.php";

$sql = "SELECT PRODUCT_INFORMATION.STOCKS, CART.QUANTITY, CART.PRODUCT_ID FROM PRODUCT_INFORMATION INNER JOIN CART ON PRODUCT_INFORMATION.PRODUCT_ID = CART.PRODUCT_ID WHERE CART.CUSTOMER_ID = '$customer_id'";
$sasas = $conn->query($sql);
if ($sasas->num_rows > 0) {
    $sql = "";
    while ($row = $sasas->fetch_assoc()) {
        $new_stocks = $row["STOCKS"] - $row["QUANTITY"];
        $product_id = $row["PRODUCT_ID"];
        $sql .= "UPDATE PRODUCT_INFORMATION SET STOCKS = $new_stocks WHERE PRODUCT_ID = '$product_id';";
    }
    $sql .= "DELETE FROM CART WHERE CUSTOMER_ID = '$customer_id'";
    $conn->multi_query($sql);
}
