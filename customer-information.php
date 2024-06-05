<?php
include "connection.php";
$cust_id = $_SESSION["CUSTOMER_ID"];
$sql = "SELECT * FROM CUSTOMER_INFORMATION WHERE CUSTOMER_ID = '$cust_id'";
$result = $conn->query($sql);
$customer_info = $result->fetch_assoc();
