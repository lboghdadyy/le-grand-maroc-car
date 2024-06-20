<?
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_prenom = $conn->real_escape_string($_POST['nom_complet']);
    $gender = $conn->real_escape_string($_POST['genre']);
    $date_nec = $conn->real_escape_string($_POST['date_naissance']);
    $email = $conn->real_escape_string($_POST['email']);
    $telephone = $conn->real_escape_string($_POST['numero_telephone']);
    $cin = $conn->real_escape_string($_POST['cin']);
    $ville = $conn->real_escape_string($_POST['ville']);
    $password = $_POST['pass'];

    $sql = "INSERT INTO utilisateurs (Nom_prenom, gender, Date_nec, Email,	password , Telephone, CIN, ville) 
            VALUES ('$nom_prenom', '$gender', '$date_nec', '$email','$password' ,'$telephone', '$cin', '$ville')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        $encodedVariable = urlencode($nom_prenom);
        header('Location: logged.php?variable=' . $encodedVariable);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    
	<link rel="shortcut icon" type="image/icon" href="assets/logo/Red & White Minimalist Automotive Car Logo (2).png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- <link rel="stylesheet" href="assets/css/sign_up.css"> -->
    <title>Register au Le Grand Maroc Car</title>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            display: flex;
            overflow: hidden;
        }

        /* Import Google font - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }



        .container {
            position: relative;
            max-width: 700px;
            width: 100%;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #FF6666;
            color: #ddd;
        }

        .container header {
            font-size: 1.5rem;
            color: #ddd;
            font-weight: 500;
            text-align: center;
        }

        .container .form {
            margin-top: 30px;
        }

        .form .input-box {
            width: 100%;
            margin-top: 20px;
        }

        .input-box label {
            color: #ddd;
        }

        .form :where(.input-box input, .select-box) {
            position: relative;
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 0 15px;
        }

        .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .form .column {
            display: flex;
            column-gap: 15px;
        }

        .form .gender-box {
            margin-top: 20px;
        }

        .gender-box h3 {
            color: #ddd;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .form :where(.gender-option, .gender) {
            display: flex;
            align-items: center;
            column-gap: 50px;
            flex-wrap: wrap;
        }

        .form .gender {
            column-gap: 5px;
        }

        .gender input {
            accent-color: black;
        }

        .form :where(.gender input, .gender label) {
            cursor: pointer;
        }

        .gender label {
            color: #ddd;
        }

        .address :where(input, .select-box) {
            margin-top: 15px;
        }

        .select-box select {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            color: #707070;
            font-size: 1rem;
        }

        .form button {
            height: 55px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #e23939;
        }

        .form button:hover {
            background: #700505;
        }

        /*Responsive*/
        @media screen and (max-width: 500px) {
            .form .column {
                flex-wrap: wrap;
            }

            .form :where(.gender-option, .gender) {
                row-gap: 15px;
            }
        }
    </style>
</head>

<body>
    <section class="container">
        <header>Remplire Les informations suivants</header>
        <form method="post" class="form">
            <div class="input-box">
                <label>Nom complet</label>
                <input type="text" name="nom_complet" placeholder="Entrez le nom complet" required />
            </div>
            <div class="input-box">
                <label>Adresse e-mail</label>
                <input type="email" name="email" placeholder="Entrez l'adresse e-mail" required />
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Numéro de téléphone</label>
                    <input type="tel" name="numero_telephone" placeholder="Entrez le numéro de téléphone" required />
                </div>
                <div class="input-box">
                    <label>Date de naissance</label>
                    <input type="date" name="date_naissance" placeholder="Entrez la date de naissance" required />
                </div>
            </div>
            <div class="gender-box">
                <h3>Genre</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="genre" value="male" checked />
                        <label for="check-male">Masculin</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="genre" value="female" />
                        <label for="check-female">Féminin</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="genre" value="prefer_not_to_say" />
                        <label for="check-other">Préfère ne pas dire</label>
                    </div>
                </div>
            </div>
            <div class="input-box address">
                <label>Adresse</label>
                <div class="column">
                    <input type="text" name="ville" placeholder="Entrez votre ville" required />
                </div>
                <label for="">Votre CIN</label>
                <div class="column">
                    <input type="text" name="cin" placeholder="CIN" required />
                </div>
            </div>
            <div class="input-box">
                <label>Password</label>
                <div class="column">
                    <input type="text" name="pass" required />
                </div>
            </div>
            <button type="submit">Suivant</button>
        </form>

    </section>
</body>

</html>