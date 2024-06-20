<?php
$success = false;

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["useremail"]) && isset($_POST["password"])) {
    $userinput = $_POST["useremail"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM `admins`";
    $result = $conn->query($sql);
    if ($result === false) {
        die("Database query failed: " . $conn->error);
    }

    // Query to select all users
    $sql2 = "SELECT * FROM `utilisateurs`";
    $result2 = $conn->query($sql2);
    if ($result2 === false) {
        die("Database query failed: " . $conn->error);
    }

    $success = false;

    // Check admin credentials
    while ($row = $result->fetch_assoc()) {
        $Pass = $row["Password"];
        $username = $row["username"];

        if ($password == $Pass && $userinput === $username) {
            $encodedVariable = urlencode($username);

            // Ensure the URL is correctly formatted
            header('Location: assets/php/Application_web.php?variable=' . $encodedVariable);
            $success = true;
            break;
        }
    }
    while ($row2 = $result2->fetch_assoc()) {
        $Pass = $row2["password"];
        $username = $row2["Nom_prenom"];

        if ($password == $Pass && $userinput === $username) {
            $encodedVariable = urlencode($username);

            header('Location: logged.php?variable=' . $encodedVariable);
            $success = true;
            break;
        }
    }

    // If no match is found
    if (!$success) {
        echo "Invalid credentials.";
    }
}
