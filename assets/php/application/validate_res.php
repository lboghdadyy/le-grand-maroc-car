<?php
$update = false;
$updateerror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom_res']) && isset($_POST['car_reserved']) && isset($_POST['date_d']) && isset($_POST['date_f']) && isset($_POST['Email_reservation']) && isset($_POST['id_reservation'])) {
	$idres = intval($_POST['id_reservation']);
	$email_reservation = $_POST['Email_reservation'];
	$nom_res = $_POST['nom_res'];
	$voiture = $_POST['car_reserved'];
	$date1_ = $_POST['date_d'];
	$date2_ = $_POST['date_f'];
	$stmt = $conn->prepare("UPDATE reservation SET Validation = 'oui' WHERE ID_reservation = ?");
	
	if ($stmt) {
		$stmt->bind_param("i", $idres);
		if ($stmt->execute()) {
		$update = true;
	} else {
		$updateerror = "Error updating reservation: " . $conn->error;
	}

	$stmt->close();
}
}
