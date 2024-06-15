<?
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_message'])) {
		$id = intval($_POST['id_message']);
		$sqlmessage = "DELETE FROM contact WHERE ID_C= $id";
		if ($conn->query($sqlmessage) === TRUE) {
			$deleted = true;
		} else {
			$deleteError = $conn->error;
		}
	}