
  

<?php

$username = "root";
$password ="root";
$dbname ="location";
$servername="localhost";
$conn = new mysqli($servername, $username, $password, $dbname);

$NOM = $_POST['name'];
$email = $_POST['email'];
$tele = $_POST['phone'];
$voiture = $_POST['voiture'];
$id=$_POST["id"];
$date1 = $_POST['debut_date'];
$date2 = $_POST['fin_date'];

    $totaljours = $date1-$date2;

$prix = $_POST["prix"];
$totalmontant = $totaljours * $prix;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT Into reservation (ID_reservation, Nom_et_Prenom_c,Email_client,Telephone_c,date_de_debut,date_de_fin,ID_voiture) VALUES (null, '$NOM', '$email','$tele','$date1','$date2','$id')";
if ($conn->query($sql) === TRUE) {
    echo "<dialog open>
    <p>Votre demande de reservation a ete enregistree. </p><br>
    <p> votre total est : ".$totalmontant."</p>
    <form method='dialog'>
      <button style='display: inline-block;
      width: 230px;
      height: 60px;
      background: #e23939;
      color: #fff;
      border-radius: 3px;
      margin-top: 55px;
      '><a href='conirmation.php' style='color : #fff;
      text-decoration : none;
      font-size: medium;'>Payez Maintenant ?</a></button>
      <button style='display: inline-block;
      width: 230px;
      height: 60px;
      background: #e23939;
      color: #fff;
      border-radius: 3px;
      margin-top: 55px;
      font-size: medium;'><a href='index.php' style='color : #fff;
      text-decoration : none;'>routour aux accuiel</a></button>
    </form>
  </dialog>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}