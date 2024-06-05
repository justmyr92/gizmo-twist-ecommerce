<?php
session_start();

include "connection.php";
$login_username = $_POST["login_username"];
$login_password = md5($_POST["login_password"]);
function auth_login($conn, $login_username, $login_password)
{
    $sql = "SELECT * FROM CUSTOMER_INFORMATION INNER JOIN CUSTOMER_ACCOUNT ON CUSTOMER_ACCOUNT.CUSTOMER_ID = CUSTOMER_INFORMATION.CUSTOMER_ID WHERE (CUSTOMER_INFORMATION.EMAIL_ADDRESS = '$login_username' OR CUSTOMER_ACCOUNT.USERNAME = '$login_username') AND CUSTOMER_ACCOUNT.PASSWORD = '$login_password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo $row["CUSTOMER_ID"];
            return $row["CUSTOMER_ID"];
        }
    }
}

$_SESSION["CUSTOMER_ID"] = auth_login($conn, $login_username, $login_password);
if (isset($_SESSION["CUSTOMER_ID"])) {
    $_SESSION["LOGIN_STATUS"] = "SUCCESSFUL";
} else {
    $_SESSION["LOGIN_STATUS"] = "FAILED";
}
header("location: login.php");
