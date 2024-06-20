<?
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delet_user_id'])) {
    $user_deleted_id = intval($_POST['delet_user_id']);

    // Assuming 'utilisateurs' is the table name for users
    $st_delete = $conn->prepare("DELETE FROM utilisateurs WHERE Id_u = ?");
    $st_delete->bind_param("i", $user_deleted_id);

    if ($st_delete->execute()) {
        $deleted_user = true;
        $message = "L'utilisateur a été supprimé avec succès.";
    } else {
        $message = "Erreur lors de la suppression de l'utilisateur.";
        // Optionally, you can also echo the specific MySQL error for debugging:
        // $message .= " MySQL Error: " . $conn->error;
    }

    $st_delete->close();
}
