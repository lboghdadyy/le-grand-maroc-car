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
		<link rel="shortcut icon" type="image/icon" href="assets/logo/Red & White Minimalist Automotive Car Logo (2).png"/>
       
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
		<link rel="stylesheet" href="../css/bootsnav.css" >	
        
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

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
 <? include('../../connection.php'); 
 if (isset($_GET['variable'])) {
    $username = $_GET['variable'];
}
 ?>
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

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
					<h2>Bienvenue <? echo $username; ?></h2>
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
					<class="row">
							<?php
								include("../../connection.php");

								$sql = "SELECT * FROM voitures ";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									$i=1;
									while ($row = $result->fetch_assoc()) {
										$id = $row["ID_voiture"];
										$imageUrl = $row["image"];
										$marque = $row["marque"];
										$couleur = $row["couleur"];
										$module = $row["module"];
										$prix = $row["prix_voiture"];
										$description = $row["description"];
										$dispo = $row["Disponibility"];
										if($dispo == 1){
											$disponibility = "disponible";
										}else{
											$disponibility = "indisponible";
										}
										$voitureid="voiture".$i;
										
										
							?>

						<div class="col-lg-3 col-md-4 col-sm-6" style="opacity: 1;transition: opacity 0.5s ease-in-out">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="../../<?php echo $imageUrl; ?>" onclick="hide_voitures('<? echo $voitureid ?>', event)"" alt="Car Image">
									</div>
									<div class="featured-model-info">
										<p>Marque: <?php echo $marque; ?><br>
										Couleur: <?php echo $couleur; ?><br>
										Modèle: <?php echo $module; ?><br>
										Disponible : <? echo $disponibility ; ?><br>
										<span class="featured-hp-span">Prix: <?php echo $prix; ?> DH/Jour</span>
										Manual
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><i class="fa fa-pencil-square-o"></i><i class="fa fa-trash" style="margin-left: 20px;"></i></h2>
								</div>
							</div>
						</div>
						<!-- edit car -->
						<div class="hidden"  id="<? echo $voitureid ?>">
							<div class="row">
								<div class="col-md-7 col-sm-12">
									<div class="new-cars-img">
										<img src="../../<? echo $imageUrl  ?>" alt="img"/>
									</div><!--/.new-cars-img-->
								</div>
								<div class="col-md-5 col-sm-12">
									<div class="new-cars-txt">
										<h2><a href="#"><?echo $marque." ".$module ?></a></h2>
										<p>
											
											<?	
												echo $description;
											?>
										</p>
										
										<button class="welcome-btn new-cars-btn" onclick="Reservation('<? echo $voitureid ?>','<? echo $reservationid ?>',event)">
											Reserver
										</button>
										<button class="welcome-btn new-cars-btn" onclick="show_voitures('<?echo $voitureid?>', event)">Fermer</button>
									</div><!--/.new-cars-txt-->	
								</div><!--/.col-->
							</div><!--/.row-->
						</div>

						<?
						}
					 } ?>
					</div><!--/.new-cars-->
				</div>
			</div>
			
		</section>
		<!-- Messages section -->
		<section class="tab-content hidden" id="Messages_section"  class="clients-say">
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
									$i=1;
									while ($rowMessage = $resultMessages->fetch_assoc()) {
										$nom_et_prenom_contact =	$rowMessage["Nom_C"];
										$email_contact = $rowMessage["Email_C"];
										$tele_contact = $rowMessage["Tele_C"];
										$message = $rowMessage["message"];

								?>
						<div class="col-sm-3 col-xs-12">
							<div class="single-testimonial-box">
								<div class="testimonial-description">
									<div class="testimonial-info">
										<div class="testimonial-img">
											<img src="..\images\pngwing.com.png" alt="image of clients person" />
										</div>
									</div><!--/.testimonial-info-->
									<div class="testimonial-comment">
										<p>
											<i></i>
										</p>
									</div><!--/.testimonial-comment-->
									<div class="testimonial-person">
										<h2><? echo $nom_et_prenom_contact; ?></h2>
										
									</div><!--/.testimonial-person-->
								</div><!--/.testimonial-description-->
							</div><!--/.single-testimonial-box-->
						</div>
						<? 
						}
					}?><!--/.col-->
					</div><!--/.testimonial-carousel-->
				</div><!--/.row-->
			</div><!--/.container-->

		</section>
		<!-- end message section -->
		<!-- reservation section -->
		<section class="tab-content hidden" id="Reservation_section"></section>
		<!-- end reservation section-->
		<!-- more section -->
		<section class="tab-content hidden" id="more_section"></section>
		<section id="blog" class="blog"></section><!--/.blog-->
		<!--blog end -->

	<? 
	$conn->close();
	 ?>
		
		<script src="../js/bootsnav.js"></script>
		<script src="../js/aficher_les_voitures_admin.js"></script>
		<script src="../js/Voitures_edit.js"></script>
		
	</body>
	
</html>