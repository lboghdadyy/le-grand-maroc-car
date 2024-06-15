<?
// admin edit
$admin_update;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adminId'], $_POST['adminName'], $_POST['adminUsername'], $_POST['adminEmail'], $_POST['adminPhone'])) {
    $f = 0;

    if (!empty($_POST['adminPassword'])) {
        $adminPassword = password_hash($_POST['adminPassword'], PASSWORD_DEFAULT);
        $st = $conn->prepare("UPDATE `admins` SET Password = ? WHERE ID_admin = ?");
        if ($st) {
            $st->bind_param("si", $adminPassword, $adminId);
            if ($st->execute()) {
                $f++;
            }
            $st->close();
        } else {
            echo "Error preparing statement for password: " . $conn->error;
        }
    }

    if (!empty($_POST['adminName'])) {
        $adminName = $_POST['adminName'];
        $st = $conn->prepare("UPDATE `admins` SET Nom_admin = ? WHERE ID_admin = ?");
        if ($st) {
            $st->bind_param("si", $adminName, $adminId);
            if ($st->execute()) {
                $f++;
            }
            $st->close();
        } else {
            echo "Error preparing statement for name: " . $conn->error;
        }
    }

    if (!empty($_POST['adminUsername'])) {
        $adminUsername = $_POST['adminUsername'];
        $st = $conn->prepare("UPDATE `admins` SET username = ? WHERE ID_admin = ?");
        if ($st) {
            $st->bind_param("si", $adminUsername, $adminId);
            if ($st->execute()) {
                $f++;
            }
            $st->close();
        } else {
            echo "Error preparing statement for username: " . $conn->error;
        }
    }

    if (!empty($_POST['adminEmail'])) {
        $adminEmail = $_POST['adminEmail'];
        $st = $conn->prepare("UPDATE `admins` SET Email_admin = ? WHERE ID_admin = ?");
        if ($st) {
            $st->bind_param("si", $adminEmail, $adminId);
            if ($st->execute()) {
                $f++;
            }
            $st->close();
        } else {
            echo "Error preparing statement for email: " . $conn->error;
        }
    }

    if (!empty($_POST['adminPhone'])) {
        $adminPhone = $_POST['adminPhone'];
        $st = $conn->prepare("UPDATE `admins` SET Telephone_admin = ? WHERE ID_admin = ?");
        if ($st) {
            $st->bind_param("si", $adminPhone, $adminId);
            if ($st->execute()) {
                $f++;
            }
            $st->close();
        } else {
            echo "Error preparing statement for phone: " . $conn->error;
        }
    }
} else {
    $f = 404;
}
//delete an admin !!!!
$deleted_admin = false;
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delet_admin_id'], $_POST['admin_respo'])) {
    $admin_deleted_id = intval($_POST['delet_admin_id']);
    $admin_respo = $_POST["admin_respo"];

    $sql = "SELECT * FROM admins WHERE username = '$admin_respo'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $role = $row['role'];
        $id_admin_respo = $row['ID_admin'];
        if ($role === 'Master') {
            if ($admin_deleted_id = !$id_admin_respo) {
                $st_delete = $conn->prepare("DELETE FROM admins WHERE ID_admin = ?");
                $st_delete->bind_param("i", $admin_deleted_id);
                if ($st_delete->execute()) {
                    $deleted_admin = true;
                    $message = "L'admin a été supprimé.";
                } else {
                    $message = "Erreur lors de la suppression de l'admin.";
                }
                $st_delete->close();
            } else {
                $message = 'désolé, vous ne pouvez pas vous supprimer en tant que maître';
            }
        } else {
            $message = "L'accès est refusé.";
        }
    } else {
        $message = "Aucun utilisateur trouvé avec le nom d'utilisateur donné.";
    }
    echo $message;
}
// add admin
if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['role'], $_POST['adminName'], $_POST['adminUsername'], $_POST['adminEmail'], $_POST['adminPhone'], $_POST['admin_password'])
) {

    $role = $_POST['role'];
    $adminName = $_POST['adminName'];
    $adminUsername = $_POST['adminUsername'];
    $adminEmail = $_POST['adminEmail'];
    $adminPhone = $_POST['adminPhone'];
    $admin_password = $_POST['admin_password'];

    $stmt = $conn->prepare("INSERT INTO admins (ID_admin, role, Password, Nom_admin, username, Telephone_admin, Email_admin) VALUES (null, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Erreur de préparation de la requête: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $role, $admin_password, $adminName, $adminUsername, $adminPhone, $adminEmail);

    if ($stmt->execute()) {
        $added_admin = true;
    } 

    // Close statement
    $stmt->close();
}
