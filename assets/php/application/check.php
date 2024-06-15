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

    $success = false;

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
}
