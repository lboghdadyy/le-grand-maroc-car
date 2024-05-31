<?php

include("connection.php");
$message = $_POST["input-message"];
$NOM = $_POST["input-name"];
$email = $_POST["input-email"];
$tele = $_POST["input-telephone"];

$sql = "INSERT INTO contact (ID_C,message,Nom_C,Email_C, tele_C) VALUES (null, '$message', '$NOM','$email','$tele')";

    if ($conn->query($sql) === TRUE) {
        echo "<open diamog> <p>Votre Message a ete envoyee. </p>
        <button><a  href='index.php'>OK</a></button></dialog>";
    }

 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
