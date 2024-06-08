<?
include('../../connection.php');
$deleted = false;
$update = false;

if (!isset($_GET["variable"]) || empty($_GET['variable'])) {
	header('Location: ../../master.php');
	exit; // It's a good practice to call exit after a header redirect.
} else {
	$usernameadmin = $_GET['variable'];
	// Your additional code here
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<!-- meta data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="../css/listes.css">
	<!--font-family-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

	<!-- title of site -->
	<title>Le Grand Maroc Car</title>

	<!-- For favicon png -->
	<link rel="shortcut icon" type="image/icon" href="assets/logo/Red & White Minimalist Automotive Car Logo (2).png" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	<!-- SweetAlert2 JS -->
	<!--font-awesome.min.css-->
	<link rel="stylesheet" href="../css/font-awesome.min.css">

	<!--linear icon css-->
	<link rel="stylesheet" href="../css/linearicons.css">

	<!--flaticon.css-->
	<link rel="stylesheet" href="../css/flaticon.css">

	<!--animate.css-->
	<link rel="stylesheet" href="../css/animate.css">

	<!--owl.carousel.css-->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!--bootstrap.min.css-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<!-- bootsnav -->
	<link rel="stylesheet" href="../css/bootsnav.css">

	<!--style.css-->
	<link rel="stylesheet" href="../css/style.css">

	<!--responsive.css-->
	<link rel="stylesheet" href="../css/responsive.css">
	<!-- reservation form -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


</head>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
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
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_reservation'])) {
		$idres = intval($_POST['id_reservation']);
		$stmt = $conn->prepare("UPDATE reservation SET Validation = 'oui' WHERE ID_reservation = ?");
		$stmt->bind_param("i", $idres);
		if ($stmt->execute()) {
			$update = true;
		} else {
			$updateerror = $stmt->error;
		}
	}
	?>

	<!--welcome-hero start -->
	<section id="home" class="welcome-hero">

		<!-- top-area Start -->
		<div class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
				<nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

					<div class="container">

						<!-- Start Header Navigation -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
								<i class="fa fa-bars"></i>
							</button>
							<a class="navbar-brand" href="index.html"><img src="../logo/Red & White Minimalist Automotive Car Logo (2).png" style="width: 150px; height: 150px; margin-top: -40px;"><span></span></a>

						</div><!--/.navbar-header-->
						<!-- End Header Navigation -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
							<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
								<li class=" scroll active"><a href=""><i class="fa fa-sign-out"></i>disconnecter</a></li>
							</ul><!--/.nav -->
						</div><!-- /.navbar-collapse -->
					</div><!--/.container-->
				</nav><!--/nav-->
				<!-- End Navigation -->
			</div><!--/.header-area-->
			<div class="clearfix"></div>

		</div><!-- /.top-area-->
		<!-- top-area End -->




	</section>

	<section id="new-cars" class="new-cars">
		<div class="container">
			<div class="section-header">
				<h2>Bienvenue <? echo $usernameadmin; ?></h2>
			</div>
			<ul class="horizontal-list">
				<li onclick="showSection('featured-cars')">Les voitures</li>
				<li onclick="showSection('Reservation_section')">Les reservations</li>
				<li onclick="showSection('Messages_section')">Les messages</li>
				<li onclick="showSection('more_section')">Plus</li>
			</ul>
		</div>
	</section>
	<section class="tab-content hidden" id="featured-cars" class="featured-cars">
		<div class="container">
			<div class="section-header">
				<p>découvrez <span>les</span> voitures</p>
				<h2>Les voitures</h2>
			</div>
			<div class="featured-cars-content">
				<div class="row">
					<?php
					include("../../connection.php");

					$sql = "SELECT * FROM voitures ";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						$i = 1;
						while ($row = $result->fetch_assoc()) {
							$id = $row["ID_voiture"];
							$imageUrl = $row["image"];
							$marque = $row["marque"];
							$couleur = $row["couleur"];
							$module = $row["module"];
							$prix = $row["prix_voiture"];
							$description = $row["description"];
							$dispo = $row["Disponibility"];
							if ($dispo == 1) {
								$disponibility = "disponible";
							} else {
								$disponibility = "indisponible";
							}
							$voitureid = "voiture" . $i;
							$marque_input = 'marque' . $i;
							$module_input = 'module' . $i;
							$disponibility_input = 'disponibility' . $i;
							$prix_input = 'prix' . $i;

					?>

							<div class="col-lg-3 col-md-4 col-sm-6" style="opacity: 1;transition: opacity 0.5s ease-in-out">
								<div class="single-featured-cars">
									<div class="featured-img-box">
										<div class="featured-cars-img">
											<img src="../../<?php echo $imageUrl; ?>" alt=" Car Image">
										</div>
										<div class="featured-model-info">
											<p>Marque: <?php echo $marque; ?><br>
												Couleur: <?php echo $couleur; ?><br>
												Modèle: <?php echo $module; ?><br>
												Disponible : <? echo $disponibility; ?><br>
												<span class="featured-hp-span">Prix: <?php echo $prix; ?> DH/Jour</span>
												Manual
											</p>
										</div>
									</div>
									<div class="featured-cars-txt">
										<h2>
											<i class="fa fa-pencil-square-o" style="cursor: pointer;" onclick="hide_voitures('<? echo $voitureid ?>', event)"></i>
											<i class="fa fa-trash" style="margin-left: 20px;" onclick="Swal.fire({ icon:'question',title:'attetion !',text:'are you sure you want to delet it',showConfirmButton: true ,showCancelButton: true});"></i>
										</h2>
									</div>
								</div>
							</div>
							<!-- edit car -->
							<div class="hidden" id="<? echo $voitureid ?>">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="new-cars-img">
											<img src="../../<? echo $imageUrl  ?>" alt="img" />
										</div><!--/.new-cars-img-->
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="new-cars-txt">
											<h2><a href="#"><? echo $marque . " " . $module ?></a></h2>
											<p>
												Marque: <?php echo $marque . " "; ?><i onclick="modifier_voiture('<? echo $marque_input ?>')" class="fa fa-pencil-square-o"></i><br>
												<input id="<? echo $marque_input ?>" type="text" placeholder="Marque" class="hidden" /><br>
												Modèle: <?php echo $module . " "; ?><i onclick="modifier_voiture('<? echo $module_input ?>')" class="fa fa-pencil-square-o"></i><br>
												<input id="<? echo $module_input ?>" type="text" placeholder="Module" class="hidden" /><br>
												Disponible : <? echo $disponibility . " "; ?><i onclick="modifier_voiture('<? echo $disponibility_input ?>')" class="fa fa-pencil-square-o"></i><br>
												<input id="<? echo $disponibility_input ?>" type="text" placeholder="Disponibility" class="hidden" /><br>
												<span class="featured-hp-span">Prix: <?php echo $prix; ?>DH/Jour </span><i onclick="modifier_voiture('<? echo $prix_input ?>')" class="fa fa-pencil-square-o"></i><br>
												<input id="<? echo $prix_input ?>" type="text" placeholder="Prix" class="hidden" /><br>
											</p>


											<button class="btn btn-primary btn-lg" onclick="show_voitures('<? echo $voitureid ?>', event)">Anuler</button>
											<button class="btn btn-warning btn-lg">Sauvgarder</button>
										</div><!--/.new-cars-txt-->
									</div><!--/.col-->
								</div><!--/.row-->
							</div>

					<?
							$i++;
						}
					} ?>
					<div class="col-lg-3 col-md-4 col-sm-6" onclick="hide_voitures('Edit_id', event)">
						<div class="single-featured-cars">
							<div class="featured-img-box">
								<div class="featured-cars-img">
									<img src="../images/add.png" alt=" Car Image">
								</div>
								<div class="featured-model-info">
									<h2>Ajouter une nouvelle voiture ?
									</h2>
								</div>
							</div>
						</div>
					</div>

				</div><!--/.new-cars-->
			</div>
		</div>

	</section>
	<!-- Messages section -->
	<section class="tab-content hidden" id="Messages_section" class="clients-say">
		<div class="container">
			<div class="section-header">
				<h2>Les Messages</h2>
			</div><!--/.section-header-->
			<div class="row">
				<div class="owl-carousel testimonial-carousel">
					<?
					$sqlMessages = "SELECT * FROM `contact`";
					$resultMessages = $conn->query($sqlMessages);
					if ($resultMessages->num_rows > 0) {
						$i = 1;
						while ($rowMessage = $resultMessages->fetch_assoc()) {
							$nom_et_prenom_contact =	$rowMessage["Nom_C"];
							$email_contact = $rowMessage["Email_C"];
							$tele_contact = $rowMessage["Tele_C"];
							$message = $rowMessage["message"];
							$messageid = $rowMessage["ID_C"];

					?>
							<div class="message col-sm-3 col-xs-12">
								<div class="single-testimonial-box">
									<div class="testimonial-description">
										<div class="testimonial-info">
											<div class="testimonial-img">
												<img src="..\images\pngwing.com.png" alt="image of clients person" onclick="show_message('<? echo 'message ' . $i ?>')" />
											</div>
										</div><!--/.testimonial-info-->
										<!--/.testimonial-comment-->
										<div class="testimonial-person">
											<h2><? echo $nom_et_prenom_contact; ?></h2>

										</div><!--/.testimonial-person-->
									</div><!--/.testimonial-description-->
								</div><!--/.single-testimonial-box-->
							</div>
							<div class="hidden" id="message <? echo $i ?>">
								<dl class="row">
									<dt class="col-sm-3"><button onclick="cancel('<? echo 'message ' . $i ?>')" class="btn btn-primary">Fermer<button>

												<form method="post">
													<input type="text" class="hidden" name="id_message" value="<? echo $messageid ?>" />
													<button class="btn btn-danger" type="submit">Supprimer</button>
												</form>
									</dt>
									<dt class="col-sm-3"><? echo $nom_et_prenom_contact ?></dt>
									<dd class="col-sm-9"><? echo $message ?><br></dd>
								</dl>

							</div>
					<?
							$i++;
						}
					} ?><!--/.col-->
				</div><!--/.testimonial-carousel-->
			</div><!--/.row-->
		</div><!--/.container-->

	</section>
	<!-- end message section -->
	<!-- reservation section -->
	<section class="tab-content hidden container" id="Reservation_section">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">voiture</th>
					<th scope="col">Nom et prenom</th>
					<th scope="col">Telephone</th>
					<th scope="col">Date de debut</th>
					<th scope="col">Date de fin</th>
					<th scope="col">Disbonibility</th>
				</tr>
			</thead>
			<tbody>

				<?
				$sql_reservation = "SELECT * FROM `reservation`";
				$resultreservation = $conn->query($sql_reservation);
				if ($resultreservation->num_rows > 0) {
					$i = 1;
					while ($rowreservation = $resultreservation->fetch_assoc()) {
						$voitureidres = $rowreservation["ID_voiture"];
						$querysql = "SELECT marque, module FROM voitures where ID_voiture =" . $voitureidres;
						$res = $conn->query($querysql);
						while ($rowvoiture = $res->fetch_assoc()) {
							$voituree = $rowvoiture["marque"] . " " . $rowvoiture["module"];
							$disponibility_resault = $rowvoiture["Disponibility"];
							if ($disponibility_resault == '1') {
								$dispoo = 'oui';
							} else {
								$dispoo = 'Non';
							}
						}
						$nom_et_prenom_reservation = $rowreservation["Nom_et_Prenom_c"];
						$tele_res = $rowreservation["Telephone_c"];
						$date_de_debut = $rowreservation["date_de_debut"];
						$date_de_fin = $rowreservation["date_de_fin"];
						$res_id = $rowreservation["ID_reservation"];

				?>
						<tr>
							<td><? echo $voituree ?></td>
							<td><? echo $nom_et_prenom_reservation ?></td>
							<td><? echo $tele_res ?></td>
							<td><? echo $date_de_debut ?></td>
							<td><? echo $date_de_fin ?></td>
							<td><? echo $dispoo ?></td>
							<td>
								<form method="post">
									<input class="hidden" type="text" name="id_reservation" value="<? echo $res_id ?>" />
									<button type="submit" class="btn btn-sm btn-danger" style="margin-bottom: 10px;">Valider</button>
								</form>
							</td>
						</tr>
				<?
					}
				}
				?>
			</tbody>
		</table>
	</section>
	<section id="more_section" class="tab-content hidden">
		<div class="container">
			<div class="service-content">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="single-service-item" style="cursor: pointer;" onclick="gerer_admins();">
							<div class="single-service-icon">
								<img src="../images/manager.png">
							</div>
							<h2>gérer les administrateurs</h2>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.container-->

	</section>
	<?
	$conn->close();
	?>

	<script src="../js/bootsnav.js"></script>
	<script src="../js/aficher_les_voitures_admin.js"></script>
	<script src="../js/Voitures_edit.js"></script>
	<script src="../js/les_messsages.js"></script>
	<script src="../js/routour.js"></script>
	<script src="../js/fermer.js"></script>
	<script src="../js/edit.js"></script>
	<script>
		<?php if ($deleted) : ?>
			Swal.fire({
				icon: 'success',
				title: 'Deleted!',
				text: 'Le message a ete bien supprime .',
				showConfirmButton: true,
			});
		<?php endif; ?>
	</script>
	<script>
		<?php if ($update) : ?>
			Swal.fire({
				icon: 'success',
				title: 'valideé',
				text: 'La reservation a été valideé',
				showConfirmButton: true,
			})
		<?php endif ?>
	</script>
</body>

</html>