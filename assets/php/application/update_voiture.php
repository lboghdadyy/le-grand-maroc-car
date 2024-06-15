<?
//modifier une voiture
$f = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_etat']) && isset($_POST['id']) && isset($_POST['new_Marque']) && isset($_POST['New_module']) && isset($_POST['new_price']) && isset($_POST['new_dispo'])) {
	$new_marque = $_POST['new_Marque'];
	$new_etat = $_POST['new_etat'];
	$new_module = $_POST['New_module'];
	$new_price = $_POST['new_price'];
	$new_dispo = $_POST['new_dispo']; // Corrected variable name
	$idd = intval($_POST['id']);

	if (!empty($new_etat)) {
		$st = $conn->prepare("UPDATE `voitures` SET Nouvelles_Voitures = ? WHERE ID_voiture = ?");
		if ($st) {
			$st->bind_param("si", $new_etat, $idd);
			if ($st->execute()) {
				$f++;
			}
			$st->close();
		} else {
			echo "Error preparing statement for etat: " . $conn->error;
		}
	}

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
//ajouter une voiture
$added_voiture = false;

if (
	$_SERVER['REQUEST_METHOD'] == 'POST' &&
	isset($_POST['disponibility']) &&
	isset($_POST['marque']) &&
	isset($_POST['module']) &&
	isset($_POST['couleur']) &&
	isset($_POST['image']) &&
	isset($_POST['prix_voiture']) &&
	isset($_POST['description']) &&
	isset($_POST['etat'])
) {


	// Gather POST data
	$disponibility = $_POST['disponibility'];
	$marque = $_POST['marque'];
	$module = $_POST['module'];
	$couleur = $_POST['couleur'];
	$image = $_POST['image'];  // Image URL or path provided directly
	$prix_voiture = $_POST['prix_voiture'];
	$description = $_POST['description'];
	$etat = $_POST['etat'];

	// Prepare and bind SQL statement
	$stmt = $conn->prepare("INSERT INTO voitures (ID_voiture, Disponibility, marque, module, couleur, image, prix_voiture, description, Nouvelles_Voitures) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)");

	if ($stmt === false) {
		die("Erreur de préparation de la requête: " . $conn->error);
	}

	$stmt->bind_param("sssssdss", $disponibility, $marque, $module, $couleur, $image, $prix_voiture, $description, $etat);

	if ($stmt->execute()) {
		$added_voiture = true;
		echo "<div class='alert alert-success' role='alert'>New car added successfully.</div>";
	}
	$stmt->close();
	$conn->close();
}
