<?php

// Create connection
$conn = new mysqli("localhost", "root", "dyasmir", "GIZMO_TWIST");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
