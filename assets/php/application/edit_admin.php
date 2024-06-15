<?
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
   $f=404;
}
