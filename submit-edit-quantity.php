<?php
include "connection.php";
session_start();
$quantity = $_POST["new_quantity"];
$product_id = $_POST["product_id"];
$subtotal = $_POST["subtotal"];
$customer_id = $_SESSION["CUSTOMER_ID"];
$sql = "UPDATE CART SET QUANTITY ='$quantity', SUBTOTAL ='$subtotal' WHERE CUSTOMER_ID = '$customer_id' AND PRODUCT_ID = '$product_id'";
$conn->query($sql);
