<?
include('connection.php');

if (!isset($_GET["variable"]) || empty($_GET['variable'])) {
    header('Location: master.php');
    exit; // It's a good practice to call exit after a header redirect.
} else {
    $usernameinfo = urldecode($_GET['variable']);
    $usernameinfo = stripslashes($usernameinfo);
    $querysqluser = "SELECT  Id_u,Email, Telephone,CIN,ville,Date_nec,gender FROM `utilisateurs` where Nom_prenom = $usernameinfo";
    $resuser = $conn->query($querysqluser);
    while ($rowuser = $resuser->fetch_assoc()) {
        $ID = $rowuser['Id_u'];
        $tele_res = $rowuser["Telephone"];
        $email_res = $rowuser["Email"];
        $date_n = $rowuser["Dete_nec"];
        $ville = $rowuser['ville'];
        $gender = $rowuser["gender"];
        $password = $rowuser["password"];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title><? echo  $usernameinfo ?></title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background: #e2e8f0;
        }

        .hidden {
            display: none;
            opacity: 0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }



        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <?

    if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['Id_re'])) {
        $Id_anuler = $_POST["Id_re"];
        $stmt = $conn->prepare("DELETE FROM `reservation` WHERE ID_reservation = ?");
        if ($stmt) {
            $stmt->bind_param("i", $Id_anuler);
            if ($stmt->execute()) {
                $deleted_reservation = true;
                echo "Reservation deleted successfully.";
            } else {
                echo "Error executing delete statement: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing delete statement: " . $conn->error;
        }
    }


    if (
        $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_update'], $_POST['Nom'], $_POST['tele'], $_POST['email'], $_POST['ville'], $_POST['password'], $_POST['New_password'])
    ) {
        $id_update = $_POST['id_update'];
        $nom_new = $_POST['Nom'];
        $telephone_new = $_POST['tele'];
        $email_new = $_POST['email'];
        $ville_new = $_POST['ville'];
        $password_old = $_POST['password'];
        $password_new = $_POST['New_password'];

        // Update query for Nom_prenom (if provided)
        if (!empty($nom_new)) {
            $sql = "UPDATE `utilisateurs` SET Nom_prenom = ? WHERE Id_u = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("si", $nom_new, $id_update);
                if ($stmt->execute()) {
                    $f++;
                } else {
                    echo "Error updating Nom_prenom: " . $stmt->error . "<br>";
                }
                $stmt->close();
            } else {
                echo "Error preparing statement for Nom_prenom update: " . $conn->error . "<br>";
            }
        }

        // Update query for Telephone (if provided)
        if (!empty($telephone_new)) {
            $sql = "UPDATE `utilisateurs` SET Telephone = ? WHERE Id_u = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("si", $telephone_new, $id_update);
                if ($stmt->execute()) {
                    $f++;
                } else {
                    echo "Error updating Telephone: " . $stmt->error . "<br>";
                }
                $stmt->close();
            } else {
                echo "Error preparing statement for Telephone update: " . $conn->error . "<br>";
            }
        }

        // Update query for Email (if provided)
        if (!empty($email_new)) {
            $sql = "UPDATE `utilisateurs` SET Email = ? WHERE Id_u = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("si", $email_new, $id_update);
                if ($stmt->execute()) {
                    $f++;
                } else {
                    echo "Error updating Email: " . $stmt->error . "<br>";
                }
                $stmt->close();
            } else {
                echo "Error preparing statement for Email update: " . $conn->error . "<br>";
            }
        }

        // Update query for Ville (if provided)
        if (!empty($ville_new)) {
            $sql = "UPDATE `utilisateurs` SET ville = ? WHERE Id_u = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("si", $ville_new, $id_update);
                if ($stmt->execute()) {
                    $f++;
                } else {
                    echo "Error updating Ville: " . $stmt->error . "<br>";
                }
                $stmt->close();
            } else {
                echo "Error preparing statement for Ville update: " . $conn->error . "<br>";
            }
        }

        // Update query for Password (if provided and matches old password)
        if (!empty($password_old) && !empty($password_new)) {
            // Validate old password first (replace 'password_field' with your actual password column name)
            $sql = "SELECT password FROM `utilisateurs` WHERE Id_u = ? LIMIT 1";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("i", $id_update);
                $stmt->execute();
                $stmt->bind_result($hashed_password);
                $stmt->fetch();
                $stmt->close();

                // Verify old password
                if (password_verify($password_old, $hashed_password)) {
                    // Hash the new password
                    $hashed_password_new = password_hash($password_new, PASSWORD_DEFAULT);

                    // Update password in database
                    $sql = "UPDATE `utilisateurs` SET password = ? WHERE Id_u = ?";
                    $stmt = $conn->prepare($sql);
                    if ($stmt) {
                        $stmt->bind_param("si", $hashed_password_new, $id_update);
                        if ($stmt->execute()) {
                            echo "Password updated successfully<br>";
                        } else {
                            echo "Error updating Password: " . $stmt->error . "<br>";
                        }
                        $stmt->close();
                    } else {
                        echo "Error preparing statement for Password update: " . $conn->error . "<br>";
                    }
                } else {
                    echo "Old password verification failed<br>";
                }
            } else {
                echo "Error preparing statement for retrieving old password: " . $conn->error . "<br>";
            }
        }
    }
    ?>
    <div class="container">
        <div class="main-body">

            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="cursor: pointer;" onclick="window.history.back();">Routour</li>
                </ol>
            </nav>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <h4><? echo $usernameinfo ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">




                    </div>
                </div>
                <div class="col-md-8">
                    <h3>Votre informations personnel</h3>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div id="info">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <? echo $usernameinfo ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6><? echo $email_res ?></h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <? echo $tele_res ?> </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <? echo $gender ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ville</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <? echo $ville ?>
                                    </div>
                                </div>
                                <hr>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-danger btn-lg" onclick="edit_details();" style="color:#fff">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div id="edit_form" class="hidden">
                                <form method="post">
                                    <input type="text" name="id_update" class="hidden" value="<? echo $ID ?>">
                                    <div>
                                        <label>Nom & Prenom</label>
                                        <input type="text" placeholder="<? echo $usernameinfo ?>" class="form-control" name="Nom">
                                    </div>
                                    <div>
                                        <label>Telephone</label>
                                        <input type="text" placeholder="<? echo $tele_res ?>" class="form-control" name="tele">
                                    </div>
                                    <div>
                                        <label>Email</label>
                                        <input type="text" placeholder="<? echo $email_res ?>" class="form-control" name="email">
                                    </div>
                                    <div>
                                        <label>Ville</label>
                                        <input type="text" placeholder="<? echo $ville ?>" class="form-control" name="ville">
                                    </div>
                                    <div>
                                        <label>mot de pass</label>
                                        <input type="text" placeholder="ancien mot de passe" class="form-control" name="password">
                                        <br>
                                        <input type="text" placeholder="nouveau mot de passe" name="New_password" class="form-control" />
                                    </div>
                                    <button class="btn btn-sm btn-info" type="submit">Sauvgarder</button>
                                    <button class="btn btn-sm btn-danger" onclick="anuller(event)">Anuller</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h3>Votre Reservations</h3>
                    <div class="row gutters-sm">
                        <?
                        $querysqluser = "SELECT `ID_reservation`, `Validation`, `Id_u`, `date_de_debut`, `date_de_fin`, `ID_voiture`
                     FROM `reservation` WHERE Id_u = $ID";
                        $resuser = $conn->query($querysqluser);

                        // Check if there are rows returned
                        if ($resuser->num_rows > 0) {
                            $A = 0;
                            
                            while ($rowuser = $resuser->fetch_assoc()) {
                                $card_id = "Card".$A;
                                $card_body_id = "card_body".$A;
                                $form_annuler_id = "form_annuler".$A;
                                $valid_id = "valid".$A;
                                $id_resee = $rowuser["ID_reservation"];
                                $validation = $rowuser['Validation'];
                                $date1 = $rowuser['date_de_debut'];
                                $date2 = $rowuser['date_de_fin'];
                                $timestamp1 = strtotime($date1);
                                $timestamp2 = strtotime($date2);

                                // Calculate the difference in seconds
                                $difference = abs($timestamp2 - $timestamp1);  // Absolute difference in seconds

                                // Convert difference to days (86400 seconds in a day)
                                $days = floor($difference / (60 * 60 * 24));
                                $voitureidres = $rowuser['ID_voiture'];

                                // Query to fetch car details for each reservation
                                $querysqlvoiture = "SELECT `image`, `marque`, `module`,`prix_voiture` FROM `voitures` WHERE `ID_voiture` = $voitureidres";
                                $resvoiture = $conn->query($querysqlvoiture);
                                $rowvoiture = $resvoiture->fetch_assoc();

                                // Display reservation details
                                if ($rowvoiture) {
                                    $voituree = $rowvoiture['marque'] . " " . $rowvoiture['module'];
                                    $voitureeurl = $rowvoiture['image'];
                                    $prix = $rowvoiture['prix_voiture'];
                                } else {
                                    $voituree = "Unknown";
                                }
                        ?>
                                <?php if ($validation == 'oui') : ?>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const myElement = document.getElementById('<?php echo $card_id ?>');
                                            const body = document.getElementById('<? echo $card_body_id ?>');
                                            const form = document.getElementById('<? echo $form_annuler_id ?>');
                                            const valid =document.getElementById('<? echo $valid_id ?>');
                                            if (myElement && body && form) {
                                                myElement.classList.remove( 'h-100');
                                                myElement.classList.add('border-success', 'mb-3');
                                                body.classList.add('text-success');
                                                form.classList.add('hidden');
                                                valid.classList.remove('hidden');
                                            }
                                        });
                                    </script>
                                <?php endif; ?>
                                <div class="col-sm-6 mb-3">
                                    <div id="<?php echo $card_id ?>" class="card h-100">
                                        <div id="<? echo $card_body_id ?>" class="card-body">
                                            <img src="<? echo $voitureeurl ?>" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title"><? echo $voituree ?></h5>
                                                <p class="card-text"></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">De : <? echo $date1 ?> </li>
                                                <li class="list-group-item">à <? echo $date2 ?></li>
                                                <li class="list-group-item"><? echo "Votre Tottal est :" . $days * $prix . " DH" ?></li>
                                                <li id="<? echo $valid_id ?>" class="list-group-item hidden">
                                                    Validée 
                                                    <i class="fa fa-check-circle"></i>
                                                </li>
                                            </ul>
                                            <form method="post" id="<? echo $form_annuler_id ?>" onsubmit="confirmDeletion(event)">
                                                <input type="hidden" name="Id_re" value="<?php echo $id_resee ?>">
                                                <button class="btn btn-danger" type="submit">Anuller</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                        <?
                        $A ++;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>
    <script>
        function confirmDeletion(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            Swal.fire({
                title: 'attetion',
                text: "Êtes-vous sûr de vouloir faire cette action ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'oui',
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit(); // Submit the form if the user confirms
                }
            });

            return false; // Prevent form submission
        }
    </script>
    <script>
        function edit_details() {
            var info = document.getElementById('info');
            info.classList.add('hidden');
            var edi = document.getElementById('edit_form');
            edi.classList.remove('hidden');
        }

        function anuller(event) {
            event.preventDefault();
            var info = document.getElementById('info');
            info.classList.remove('hidden');
            var edi = document.getElementById('edit_form');
            edi.classList.add('hidden');

        }
    </script>
    <?php if ($f > 0) : ?>
        <script>
            swal.fire({
                icon: 'success',
                title: 'Modifié', // Fixed typo here, assuming you meant 'Modifié' for 'Modified'
                showConfirmButton: true // Fixed camelCase for showConfirmButton
            });
        </script>
    <?php endif; ?>
    <?php if ($deleted_reservation) : ?>
        <script>
            swal.fire({
                icon: 'success',
                title: 'anulleé', // Fixed typo here, assuming you meant 'Modifié' for 'Modified'
                showConfirmButton: true // Fixed camelCase for showConfirmButton
            });
        </script>

    <? endif ?>
</body>

</html>