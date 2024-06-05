<?php
include "connection.php";
session_start();
$product_id = $_POST["product_id"];
$customer_id = $_SESSION["CUSTOMER_ID"];
$price = $_POST["price"];
$input_quantity = $_POST["input_quantity"];
$subtotal = $price * $input_quantity;
if (isset($_SESSION["CUSTOMER_ID"])) {
    $sql = "SELECT * FROM CART WHERE PRODUCT_ID = '$product_id' AND CUSTOMER_ID = '$customer_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($rsow = $result->fetch_assoc()) {
            $input_quantity += $rsow["Quantity"];
            $subtotal = $price * $input_quantity;
            $sql = "UPDATE CART SET QUANTITY = $input_quantity, SUBTOTAL = $subtotal WHERE PRODUCT_ID = '$product_id' AND CUSTOMER_ID = '$customer_id'";
            if ($conn->query($sql) === TRUE) {
                $_SESSION["ADD-TO-CART-STATUS"] = "SUCCESS";
            }
        }
    } else {
        $sql = "INSERT INTO CART VALUES ('$customer_id', '$product_id', $input_quantity, $subtotal)";
        if ($conn->query($sql) === TRUE) {
            $_SESSION["ADD-TO-CART-STATUS"] = "SUCCESS";
        }
    }
} else {
    $_SESSION["ADD-TO-CART-STATUS"] = "FAILED";
}
header("location: shop.php");
