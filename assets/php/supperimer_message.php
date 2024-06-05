<?
include("connection.php");
$id = $_POST["id_message"];
$sql = "DELETE * FROM contact where ID_C=?";
echo ""