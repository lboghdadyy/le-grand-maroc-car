<?php
$username = "root";
$password ="root";
$dbname ="location";
$servername="localhost";
$conn = new mysqli($servername, $username, $password, $dbname);

$NOM = $_POST['name'];
$email = $_POST['email'];
$tele = $_POST['phone'];
$date1 = $_POST['debut_date'];
$date2 = $_POST['fin_date'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO client (ID_client,Nom_clinet,Email_client, Telephone_client) VALUES (null, '$NOM', '$email','$tele')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('merci pour votre message !'); </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


