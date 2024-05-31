<?php
$username = "root";
$password ="root";
$dbname ="location";
$servername="localhost";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
