<!doctype html>
<html class="no-js" lang="en">

<head>
	<!-- meta data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!--font-family-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">


	<!-- title of site -->
	<title>Le Grand Maroc Car</title>

	<!-- For favicon png -->
	<link rel="shortcut icon" type="image/icon" href="assets/logo/Red & White Minimalist Automotive Car Logo (2).png" />

	<!--font-awesome.min.css-->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/animationcars.css">

	<!--linear icon css-->

	<link rel="stylesheet" href="assets/css/linearicons.css">

	<!--flaticon.css-->
	<link rel="stylesheet" href="assets/css/flaticon.css">

	<!--animate.css-->
	<link rel="stylesheet" href="assets/css/animate.css">

	<!--owl.carousel.css-->
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

	<!--bootstrap.min.css-->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- bootsnav -->
	<link rel="stylesheet" href="assets/css/bootsnav.css">

	<!--style.css-->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--responsive.css-->
	<link rel="stylesheet" href="assets/css/responsive.css">

	<!-- reservation form -->
	<link rel="stylesheet" href="RESERVATION.css">
	<!-- sweetalert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</head>

<body>
	<?php
	$reserved = false;
	$contacted = false;
	include('connection.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['CIN']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['voiture']) && isset($_POST["id"]) && isset($_POST['debut_date']) && isset($_POST['fin_date'])) {
		$NOM = $_POST['name'];
		$cin = $_POST['CIN'];
		$email = $_POST['email'];
		$tele = $_POST['phone'];
		$voiture = $_POST['voiture'];
		$id = $_POST["id"];
		$date1 = $_POST['debut_date'];
		$date2 = $_POST['fin_date'];
		$stmt = $conn->prepare("INSERT Into reservation (ID_reservation,Validation,Nom_et_Prenom_c,CIN,Email_client,Telephone_c,date_de_debut,date_de_fin,ID_voiture) VALUES (null, 'Non','$NOM','$CIN' ,'$email','$tele','$date1','$date2','$id')");
		if ($stmt) {
			if ($stmt->execute()) {
				$reserved = true;
			} else {
				$reservederror = $stmt->error;
			}
			$stmt->close();
		} else {
			$reservederror = $conn->error;
		}
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["input-message"]) && isset($_POST["input-name"]) && isset($_POST["input-email"]) && isset($_POST["input-telephone"])) {
		$message = $_POST["input-message"];
		$NOM = $_POST["input-name"];
		$email = $_POST["input-email"];
		$tele = $_POST["input-telephone"];

		$sql = "INSERT INTO contact (ID_C,message,Nom_C,Email_C, tele_C) VALUES (null, '$message', '$NOM','$email','$tele')";

		if ($conn->query($sql) === TRUE) {
			$contacted = true;
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
							<a class="navbar-brand" href="index.php"><img src="assets/logo/Red & White Minimalist Automotive Car Logo (2).png" style="width: 150px; height: 150px; margin-top: -40px;"><span></span></a>

						</div><!--/.navbar-header-->
						<!-- End Header Navigation -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="master.php">Connecter</a></li>
								<li><a href="sign_up.php">register</a></li>
							</ul><!--/.nav -->
						</div><!-- /.navbar-collapse -->
					</div><!--/.container-->
				</nav><!--/nav-->
				<!-- End Navigation -->
			</div><!--/.header-area-->
			<div class="clearfix"></div>

		</div><!-- /.top-area-->
		<!-- top-area End -->

		<div class="container">
			<div class="welcome-hero-txt">
				<h2>louer une voiture en un clic depuis chez vous</h2>
				<p>
					enfin! nous vous proposons un moyen de louer une voiture quand vous le souhaitez et où que vous soyez.
				</p>
				<button class="welcome-btn" onclick="window.location.href='#featured-cars'">louer maintenant</button>
			</div>
		</div>

		<div class="container">
			<div class="row"></div>
		</div>

	</section><!--/.welcome-hero-->
	<!--welcome-hero end -->

	<!--service start -->
	<!--/.service-->
	<!--service end-->

	<!--new-cars start -->
	<section id="new-cars" class="new-cars">
		<div class="container">
			<div class="section-header">
				<p>
					découvrez <span>nos </span>nouvelles voituresthe</p>
				<h2>nouvelles voitures</h2>
			</div><!--/.section-header-->
			<div class="new-cars-content">

				<div class="owl-carousel owl-theme" id="new-cars-carousel">
					<?
					$sql = "SELECT * FROM voitures WHERE Nouvelles_Voitures ='Oui'";
					$resultnov = $conn->query($sql);
					if ($resultnov->num_rows > 0) {
						while ($Row_nov = $resultnov->fetch_assoc()) {
							$imageUrlNov = $Row_nov["image"];
							$marqueNOV = $Row_nov["marque"];
							$module = $Row_nov["module"];
							$prix = $Row_nov["prix_voiture"];
							$description = $Row_nov["description"];
					?>
							<div class="new-cars-item">
								<div class="single-new-cars-item">
									<div class="row">
										<div class="col-md-7 col-sm-12">
											<div class="new-cars-img">
												<img src="<? echo $imageUrlNov ?>" alt="img" />
											</div><!--/.new-cars-img-->
										</div>
										<div class="col-md-5 col-sm-12">
											<div class="new-cars-txt">
												<h2><a href="#"><? echo $marqueNOV . " " . $module ?> </a></h2>
												<p>
													<? echo $description ?>
												</p>

												<button class="welcome-btn new-cars-btn" onclick="window.location.href='#featured-cars'">
													Reserver maintenant
												</button>
											</div><!--/.new-cars-txt-->
										</div><!--/.col-->
									</div><!--/.row-->

								</div>
								<!--/.single-new-cars-item-->
							</div>
					<?
						}
					}
					?><!--/.new-cars-item-->
				</div>
				<!--/#new-cars-carousel-->
			</div><!--/.new-cars-content-->
		</div><!--/.container-->

	</section><!--/.new-cars-->
	<!--new-cars end -->

	<!--featured-cars start -->
	<section id="featured-cars" class="featured-cars">
		<div class="container">
			<div class="section-header">
				<p>découvrez <span>les</span> voitures</p>
				<h2>Les voitures</h2>
			</div><!--/.section-header-->
			<div class="featured-cars-content">
				<div class="row">
					<?php
					$sql = "SELECT * FROM voitures ";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						$i = 1;
						while ($row = $result->fetch_assoc()) {
							$imageUrl = $row["image"];
							$marque = $row["marque"];
							$couleur = $row["couleur"];
							$module = $row["module"];
							$prix = $row["prix_voiture"];
							$description = $row["description"];
							$voitureidres = $row["ID_voiture"];
							$voitureid = "voiture" . $i;
							$reservationid = "reservation" . $i;
							$disponibility = $row["Disponibility"];
					?>

							<!-- Car Item -->
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="single-featured-cars">
									<div class="featured-img-box">
										<div class="featured-cars-img">
											<img src="<?php echo $imageUrl; ?>" onclick="hide_voitures('<? echo $voitureid ?>', event)"" alt=" Car Image">
										</div>
										<div class="featured-model-info">
											<p>Marque: <?php echo $marque; ?><br>
												Couleur: <?php echo $couleur; ?><br>
												Modèle: <?php echo $module; ?><br>
												disponibilitie : <? echo $disponibility; ?><br>
												Manual
											</p>
										</div>
									</div>
									<div class="featured-cars-txt">
										<h2><a style="cursor: pointer;" onclick="hide_voitures('<? echo $voitureid ?>', event)"><?php echo $marque; ?></a></h2>
										<h3><?php echo $prix; ?> DH/Jour</h3>
									</div>
								</div>
							</div>
							<!-- End Car Item -->
							<!-- details page -->
							<div class="hidden" id="<? echo $voitureid ?>">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="new-cars-img">
											<img src="<? echo $imageUrl  ?>" alt="img" />
										</div><!--/.new-cars-img-->
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="new-cars-txt">
											<h2><a href="#"><? echo $marque . " " . $module ?></a></h2>
											<p>

												<?
												echo $description;
												?>
											</p>

											<button class="welcome-btn new-cars-btn" onclick="window.location.href='master.php'">
												Reserver
											</button>
											<button class="welcome-btn new-cars-btn" onclick="show_voitures('<? echo $voitureid ?>', event)">Fermer</button>
										</div><!--/.new-cars-txt-->
									</div><!--/.col-->
								</div><!--/.row-->
							</div>

							<!-- end details page -->
					<?php

							$i++;
						}
					} else {
						echo "0 results";
					}


					?>

				</div>
			</div>
		</div><!--/.container-->

	</section><!--/.featured-cars-->
	<!--featured-cars end -->

	<!-- clients-say strat -->
	<!-- clients-say end -->

	<!--brand strat -->
	<section id="brand" class="brand">
		<div class="container">
			<div class="brand-area">
				<div class="owl-carousel owl-theme brand-item">
					<? $sql2 = "SELECT * FROM brand ";
					$result2 = $conn->query($sql2);
					if ($result2->num_rows > 0) {
						while ($row2 = $result2->fetch_assoc()) {
							$imageUrlbrand = $row2["URL"];
							$brand = $row2["Brand_Nom"];
					?>
							<div class="item">
								<a href="#">
									<img src="<? echo $imageUrlbrand ?>" alt="brand-image" title="<? echo $brand ?>" />
								</a>
							</div><!--/.item-->

					<? }
					} else {
						echo "no resault";
					}
					$conn->close() ?><!--/.item-->
				</div><!--/.owl-carousel-->
			</div><!--/.clients-area-->

		</div><!--/.container-->

	</section><!--/brand-->
	<!--brand end -->

	<!--blog start -->
	<section id="blog" class="blog"></section><!--/.blog-->
	<!--blog end -->

	<!--contact start-->
	<footer id="contact" class="contact">
		<div class="container">
			<div class="section-header">
				<h2>contactez nous</h2>
			</div>

			<div class="row">
				<form class="cf" method="post">
					<div class="half left cf">
						<input type="text" name="input-name" placeholder="Nom">
						<input type="email" name="input-email" placeholder="Email">
						<input type="text" name="input-telephone" placeholder="Telephone">
					</div>
					<div class="half right cf">
						<textarea id="message" type="text" name="input-message" placeholder="Message"></textarea>
					</div>
					<input type="submit" class="welcome-btn" value="Submit" id="input-submit">
				</form>

			</div><!--/.foot-email-icon-->

		</div>

		<!--/.footer-copyright-->
		</div><!--/.container-->

		<div id="scroll-Top">
			<div class="return-to-top">
				<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
			</div>

		</div>
	</footer><!--/.contact-->

	<script src="assets/js/reservation1.js"></script>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/produicts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootsnav.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/routour.js"></script>
	<script src="assets/js/fermer.js"></script>
	<script src="assets/js/calculedays.js"></script>
	<script>
		function confirmDeletion(event) {
			event.preventDefault(); // Prevent the form from submitting immediately

			Swal.fire({
				title: 'attetion',
				text: "Êtes-vous sûr de vouloir supprimer cette réservation ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'oui, supprimer'
			}).then((result) => {
				if (result.isConfirmed) {
					event.target.submit(); // Submit the form if the user confirms
				}
			});

			return false; // Prevent form submission
		}
	</script>

	<script>
		<?php if ($reserved) : ?>
			swal.fire({
				icon: 'Success',
				Text: 'Votre reservation a été bien envoyée',
				title: 'Reservé',
				showConfirmButton: true,
			});
		<? endif ?>
	</script>
	<script>
		<?php if ($contacted) : ?>
			swal.fire({
				icon: 'Success',
				Text: 'Votre message a été bien envoyée',
				showConfirmButton: true,
			})
		<? endif ?>
	</script>
</body>

</html>