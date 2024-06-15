<?
$deleted_car = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_voiture'])) {
		$idres = intval($_POST['delete_voiture']);
		$stmt = $conn->prepare("DELETE FROM `voitures` WHERE ID_voiture	 = ?");
		$stmt->bind_param("i", $idres);
		if ($stmt->execute()) {
			$deleted_car = true;
		}
	}