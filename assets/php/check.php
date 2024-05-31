<?php

include('../../connection.php');


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
            
        
            header('Location: Application_web.php?variable=' . $encodedVariable);
            
            $success = true;
            break;
        }
        
        
    }

    if ($success==false) {
        echo "<html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>mdp incrorrect</title>
            <link rel='stylesheet' href='../css/master.css'>
        </head>
        <body>
            <dialog open>
                <p>Le mot de passe ou Username sont incorrects !!</p><br>
                <form method='dialog'>
                    <button style='display: inline-block; width: 230px; height: 60px; background: #e23939; color: #fff; border-radius: 3px; margin-top: 55px; font-size: medium;'>
                        <a href='../../master.php?' style='color: #fff; text-decoration: none;'>Réessayer?</a>
                    </button>
                </form>
            </dialog>
        </body>
        </html>";
    }
