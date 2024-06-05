<?php
session_start();
include "connection.php";
$customer_id = $_SESSION["CUSTOMER_ID"];
if (isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];
    $sql = "DELETE FROM CART WHERE PRODUCT_ID = '$product_id' AND CUSTOMER_ID = '$customer_id'";
} else {
    $sql = "DELETE FROM CART WHERE CUSTOMER_ID = '$customer_id'";
}
$conn->query($sql);
