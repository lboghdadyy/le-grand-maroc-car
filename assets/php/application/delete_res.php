<?
$deleted_res = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_reservation_supprimer'])) {
	$idres = intval($_POST['id_reservation_supprimer']);
	$stmt = $conn->prepare("DELETE FROM reservation WHERE ID_reservation = ?");
	$stmt->bind_param("i", $idres);
	if ($stmt->execute()) {
		$deleted_res = true;
	}
}
