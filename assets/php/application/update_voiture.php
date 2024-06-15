<?
$f = 0;

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['new_Marque']) && isset($_POST['New_module']) && isset($_POST['new_price']) && isset($_POST['new_dispo'])) {
		$new_marque = $_POST['new_Marque'];
		$new_module = $_POST['New_module'];
		$new_price = $_POST['new_price'];
		$new_dispo = $_POST['new_dispo']; // Corrected variable name
		$idd = intval($_POST['id']);

		if (!empty($new_marque)) {
			$st = $conn->prepare("UPDATE `voitures` SET marque = ? WHERE ID_voiture = ?");
			if ($st) {
				$st->bind_param("si", $new_marque, $idd);
				if ($st->execute()) {
					$f++;
				}
				$st->close();
			} else {
				echo "Error preparing statement for marque: " . $conn->error;
			}
		}

		if (!empty($new_module)) {
			$st = $conn->prepare("UPDATE `voitures` SET module = ? WHERE ID_voiture = ?");
			if ($st) {
				$st->bind_param("si", $new_module, $idd);
				if ($st->execute()) {
					$f++;
				}
				$st->close();
			} else {
				echo "Error preparing statement for module: " . $conn->error;
			}
		}

		if (!empty($new_price)) {
			$st = $conn->prepare("UPDATE `voitures` SET prix_voiture = ? WHERE ID_voiture = ?");
			if ($st) {
				$st->bind_param("ii", $new_price, $idd); // Corrected to "ii" assuming price is an integer
				if ($st->execute()) {
					$f++;
				}
				$st->close();
			} else {
				echo "Error preparing statement for price: " . $conn->error;
			}
		}

		if (!empty($new_dispo)) {
			$st = $conn->prepare("UPDATE `voitures` SET Disponibility = ? WHERE ID_voiture = ?");
			if ($st) {
				$st->bind_param("ii", $new_dispo, $idd); // Corrected to "ii" assuming available is an integer
				if ($st->execute()) {
					$f++;
				}
				$st->close();
			} else {
				echo "Error preparing statement for available: " . $conn->error;
			}
		}

		echo "<script>alert('{$f} modification(s) have been committed.');</script>";
	}
