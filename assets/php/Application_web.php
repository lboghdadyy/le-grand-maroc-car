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
	<title>Admin</title>

	<!-- For favicon png -->
	<link rel="shortcut icon" type="image/icon" href="../logo/Red & White Minimalist Automotive Car Logo (2).png" />

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

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


</head>

<body>

	<?
	include('application/users.php');

	include('application/deletemessage.php');

	include('application/validate_res.php');

	include('application/update_voiture.php');

	include('application/delete_res.php');

	include('application/edit_admin.php');
	?>

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
							<a class="navbar-brand" href="../../index.php"><img src="../logo/Red & White Minimalist Automotive Car Logo (2).png" style="width: 150px; height: 150px; margin-top: -40px;"><span></span></a>

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
			<table class="table table-dark">
				<thead>
					<tr>
						<th style="cursor: pointer;" onclick="showSection('featured-cars')">Les voitures</th>
						<th style="cursor: pointer;" onclick="showSection('Reservation_section')">Les reservations</th>
						<th style="cursor: pointer;" onclick="showSection('Messages_section')">Les messages</th>
						<th style="cursor: pointer;" onclick="showSection('more_section')">Option</th>
					</tr>
				</thead>
			</table>
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
							$Etat = $row["Nouvelles_Voitures"];
							$voitureid = "voiture" . $i;
							$marque_input = 'marque' . $i;
							$module_input = 'module' . $i;
							$disponibility_input = 'disponibility' . $i;
							$prix_input = 'prix' . $i;
							$etat_input = 'etat' . $i;

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
												Disponible : <? echo $dispo; ?><br>
												nouvelle : <? echo $Etat; ?><br>
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
											<form method="POST">
												<h2><a href="#"><? echo $marque . " " . $module ?></a></h2>
												<p>
													<input value="<? echo $id ?>" class="hidden" name="id">
													Marque: <?php echo $marque . " "; ?><i onclick="modifier_voiture('<? echo $marque_input ?>')" class="fa fa-pencil-square-o"></i><br>
													<input name="new_Marque" id="<? echo $marque_input ?>" type="text" placeholder="Marque" class="hidden" /><br>

													Etat : <? echo $etat ?><i onclick="modifier_voiture('<? echo $etat_input ?>')" class="fa fa-pencil-square-o"></i><br>
													<input type="text" <?  ?> class="hidden" name="new_etat" id="<? echo $etat_input ?>" placeholder="etat" /><br>

													Modèle: <?php echo $module . " "; ?><i onclick="modifier_voiture('<? echo $module_input ?>')" class="fa fa-pencil-square-o"></i><br>
													<input name="New_module" id="<? echo $module_input ?>" type="text" placeholder="Module" class="hidden" /><br>

													Disponible : <? echo $dispo . " "; ?><i onclick="modifier_voiture('<? echo $disponibility_input ?>')" class="fa fa-pencil-square-o"></i><br>
													<input name="new_dispo" id="<? echo $disponibility_input ?>" type="text" placeholder="Disponibility" class="hidden" /><br>

													<span class="featured-hp-span">Prix: <?php echo $prix; ?>DH/Jour </span><i onclick="modifier_voiture('<? echo $prix_input ?>')" class="fa fa-pencil-square-o"></i><br>
													<input name="new_price" id="<? echo $prix_input ?>" type="text" placeholder="Prix" class="hidden" /><br>
												</p>


												<button class="btn btn-primary btn-lg" onclick="show_voitures('<? echo $voitureid ?>', event)">Anuler</button>
												<button class="btn btn-warning btn-lg" type="submit">Sauvgarder</button>
											</form>
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
					<div class="hidden" id="Edit_id">
						<form method="post">
							<div class="form-group">
								<label for="disponibility">Disponibility:</label>
								<input type="text" class="form-control" id="disponibility" name="disponibility" required>
							</div>

							<div class="form-group">
								<label for="marque">Marque:</label>
								<input type="text" class="form-control" id="marque" name="marque" required>
							</div>

							<div class="form-group">
								<label for="module">Module:</label>
								<input type="text" class="form-control" id="module" name="module" required>
							</div>

							<div class="form-group">
								<label for="couleur">Couleur:</label>
								<input type="text" class="form-control" id="couleur" name="couleur" required>
							</div>

							<div class="form-group">
								<label for="image">Image:</label>
								<input type="text" class="form-control" id="image" name="image" required>
							</div>

							<div class="form-group">
								<label for="prix_voiture">Prix Voiture:</label>
								<input type="number" class="form-control" id="prix_voiture" name="prix_voiture" required>
							</div>

							<div class="form-group">
								<label for="description">Description:</label>
								<textarea class="form-control" id="description" name="description" rows="4" required></textarea>
							</div>

							<input type="text" value="oui" name="etat" class="hidden">
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg">Ajouter</button>
								<button class="btn btn-primary btn-lg" onclick="show_voitures('Edit_id', event)">Fermer</button>
							</div>
						</form>
					</div>

				</div><!--/.new-cars-->
			</div>
		</div>


	</section>
	<section class="tab-content hidden container" id="Reservation_section">
		<div class="section-header">
			<h2>Les reservations</h2>
		</div>
		<table class="table table-striped table-dark">
			<thead>
				<tr>
					<th scope="col">voiture</th>
					<th scope="col">Nom</th>
					<th scope="col">Telephone</th>
					<th scope="col">Email</th>
					<th scope="col">Date de debut</th>
					<th scope="col">Date de fin</th>
					<th scope="col">Disbonibility</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				<?
				$sql_reservation = "SELECT * FROM `reservation`";
				$resultreservation = $conn->query($sql_reservation);
				if ($resultreservation->num_rows > 0) {
					$i = 1;
					while ($rowreservation = $resultreservation->fetch_assoc()) {
						$tr_id = "tr" . $i;
						$vali = $rowreservation["Validation"];


						$voitureidres = $rowreservation["ID_voiture"];
						$id_us = $rowreservation["Id_u"];
						$querysql = "SELECT ID_voiture, marque, module,	Disponibility FROM voitures where ID_voiture =" . $voitureidres;
						$res = $conn->query($querysql);
						while ($rowvoiture = $res->fetch_assoc()) {
							$voituree = $rowvoiture["marque"] . " " . $rowvoiture["module"];
							$disponibility_resault = $rowvoiture["Disponibility"];
							$iddd_v = $rowvoiture["ID_voiture"];
						}
						$querysqluser = "SELECT Nom_prenom, Email, Telephone,CIN FROM `utilisateurs` where Id_u = $id_us";
						$resuser = $conn->query($querysqluser);
						while ($rowuser = $resuser->fetch_assoc()) {
							$nom_et_prenom_reservation = $rowuser["Nom_prenom"];
							$tele_res = $rowuser["Telephone"];
							$email_res = $rowuser["Email"];
						}

						$date_de_debut = $rowreservation["date_de_debut"];
						$date_de_fin = $rowreservation["date_de_fin"];
						$res_id = $rowreservation["ID_reservation"];

						if ($vali == "oui") {
				?>
							<script>
								document.addEventListener('DOMContentLoaded', function() {
											const tr = document.getElementById("<? echo $tr_id ?>");
											if (tr) {
												tr.classList.add('bg-success');
											}
										})
							</script>
						<? }
						?>
						</script>
						<tr id="<? echo $tr_id ?>">
							<td scop="row"><? echo $voituree ?></td>
							<td><? echo $nom_et_prenom_reservation ?></td>
							<td><? echo $tele_res ?></td>
							<td><? echo $email_res ?></td>
							<td><? echo $date_de_debut ?></td>
							<td><? echo $date_de_fin ?></td>
							<td><? echo $disponibility_resault ?></td>
							<td>
								<form method="post">
									<input class="hidden" type="text" name="nom_res" value="<? echo $nom_et_prenom_reservation ?>" />
									<input class="hidden" type="text" name="id_reservation" value="<? echo $res_id ?>" />
									<input class="hidden" type="text" name="Email_reservation" value="<? echo $email_res ?>" />
									<input class="hidden" type="text" name="car_reserved" value="<? echo $voituree ?>" />
									<input class="hidden" type="text" name="date_d" value="<? echo $date_de_debut ?>" />
									<input class="hidden" type="text" name="date_f" value="<? echo $date_de_fin ?>" />
									<input type="text" class="hidden" name="id_v" value="<? echo $iddd_v ?>">
									<button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Valider</button>
								</form>
							</td>
							<td>
								<form method="post">
									<input class="hidden" type="text" name="id_reservation_supprimer" value="<? echo $res_id ?>">
									<button class="btn btn-danger" type="submit">Supprimer</button>
								</form>
							</td>
						</tr>
				<?
						$i++;
					}
				}
				?>
			</tbody>
		</table>
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
											<h2><? echo $nom_et_prenom_contact; ?></h2><br>


										</div><!--/.testimonial-person-->
									</div><!--/.testimonial-description-->
								</div><!--/.single-testimonial-box-->
							</div>
							<div class="hidden" id="message <? echo $i ?>">
								<dl class="row">
									<dt class="col-sm-3">
										<button title="Fermer" onclick="cancel('<? echo 'message ' . $i ?>')" class="btn btn-primary btn-lg">
											<i class="fa fa-window-close"></i>
										</button>

										<form method="post" style="margin-left: -10px;">
											<input type="text" class="hidden" name="id_message" value="<? echo $messageid ?>" />
											<button class="btn btn-danger btn-lg" title="Supprimer" type="submit"><i class="fa fa-trash"></i></button>
										</form>
									</dt>
									<dt class="col-sm-3"><? echo $nom_et_prenom_contact ?><br><? echo $email_contact ?></dt>

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

	<section id="more_section" class="tab-content hidden">
		<div class="section-header">
			<h2>Option</h2>
		</div>
		<div class="container">
			<div id="service-content" class="service-content">
				<div class="row" id="service">
					<div class="col-md-4 col-sm-6">
						<div class="single-service-item" style="cursor: pointer;">
							<div class="single-service-icon">
								<img src="../images/businessman.png" onclick="gerer_admins('admins');">
							</div>
							<h2><a href="#">gérer les administrateurs</a></h2>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-service-item">
							<div class="single-service-icon">
								<img src="../images/teamwork.png" onclick="gerer_admins('users');">
							</div>
							<h2><a href="#">gérer les utilisateurs</a></h2>
						</div>
						</di>
					</div>
				</div>

			</div>
			<div id="admins" class="hidden">
				<div class="section-header">
					<h2>Les administrateurs</h2>
				</div>
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nom & Prenom</th>
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Telephone</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql_admin = "SELECT * FROM `admins`";
						$resultadmin = $conn->query($sql_admin);
						if ($resultadmin->num_rows > 0) {
							while ($row_admin = $resultadmin->fetch_assoc()) {
								$id_admin = $row_admin["ID_admin"];
								$nom_admin = $row_admin["Nom_admin"];
								$user_admin = $row_admin["username"];
								$email_admin = $row_admin["Email_admin"];
								$tele_admin = $row_admin["Telephone_admin"];
						?>
								<tr>
									<th scope="row"><?php echo $id_admin; ?></th>
									<td><?php echo $nom_admin; ?></td>
									<td><?php echo $user_admin; ?></td>
									<td><?php echo $email_admin; ?></td>
									<td><?php echo $tele_admin; ?></td>
									<td>
										<button class="btn btn-warning btn-lg" onclick="modifier_admin_detail('<?php echo $id_admin; ?>')">
											<i class="fa fa-cog"></i>
										</button>
									</td>
									<td>
										<form style="margin-top: -15px;" method="post" onsubmit="confirmDeletion(event)">
											<button type="submit" class="btn btn-danger btn-lg">
												<i class="fa fa-trash"></i>
											</button>
											<input class="hidden" type="text" name="admin_respo" value="<? echo $usernameadmin ?>" />
											<input type="text" class="hidden" name="delet_admin_id" value="<? echo $id_admin ?>">
										</form>
									</td>
								</tr>
								<tr>
							<?php
							}
						} else {
							echo "<tr><td colspan='6'>No records found</td></tr>";
						}
							?>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<button class="btn btn-primary btn-lg" onclick="add_admin()">
									<i class="fa fa-plus"></i>
								</button>
							</td>
								</tr>
					</tbody>
				</table>
				<button class="btn btn-lg btn-primary" onclick="back('admins')">routour</button>
			</div>
			<div id="editForm" class="hidden">
				<h2>Edit Admin Details</h2>
				<!-- Include form fields here, pre-populate with AJAX or server-side rendering -->
				<form method="post" onsubmit="confirmDeletion(event)">
					<div class="form-group">
						<label for="adminId">ID</label>
						<input type="text" class="form-control" id="adminId" name="adminId" readonly>
					</div>
					<div class="form-group">
						<label for="ADmin-role">Role :</label>
						<input type="text" name="role" id="roleadmin" class="form-control" />

					</div>
					<div class="form-group">
						<label for="adminName">Nom & Prenom</label>
						<input type="text" class="form-control" id="adminName" name="adminName">
					</div>
					<div class="form-group">
						<label for="adminUsername">Username</label>
						<input type="text" class="form-control" id="adminUsername" name="adminUsername">
					</div>
					<div class="form-group">
						<label for="adminEmail">Email</label>
						<input type="email" class="form-control" id="adminEmail" name="adminEmail">
					</div>
					<div class="form-group">
						<label for="adminPhone">Telephone</label>
						<input type="text" class="form-control" id="adminPhone" name="adminPhone">
					</div>
					<button type="submit" class="btn btn-primary">Save Changes</button>
					<button type="button" class="btn btn-secondary" onclick="gerer_admins('admins')">Cancel</button>
				</form>
			</div>
			<div id="add_form" class="hidden">
				<h2>Ajouter un administrateur</h2>
				<form method="post" onsubmit="confirmDeletion(event)">
					<div class="form-group">
						<label for="ADmin-role">Role :</label>
						<input type="text" name="role" id="roleadmin" class="form-control" />
					</div>
					<div class="form-group">
						<label for="adminName">Nom & Prenom</label>
						<input type="text" class="form-control" id="adminName" name="adminName">
					</div>
					<div class="form-group">
						<label for="adminUsername">Username</label>
						<input type="text" class="form-control" id="adminUsername" name="adminUsername">
					</div>
					<div class="form-group">
						<label for="adminEmail">Email</label>
						<input type="email" class="form-control" id="adminEmail" name="adminEmail">
					</div>
					<div class="form-group">
						<label for="adminPhone">Telephone</label>
						<input type="text" class="form-control" id="adminPhone" name="adminPhone">
					</div>
					<div class="form-group">
						<label>Mot de pass</label>
						<input type="text" class="form-control" id="admin_password" name="admin_password" />
					</div>
					<button type="submit" class="btn btn-primary">Ajouter</button>
					<button type="button" class="btn btn-secondary" onclick="gerer_admins('admins')">Cancel</button>
				</form>
			</div>
			<div id="users" class="hidden">
				<div class="section-header">
					<h2>Les utilisateurs</h2>
				</div>
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nom & Prenom</th>
							<th scope="col">Gender</th>
							<th scope="col">Email</th>
							<th scope="col">Telephone</th>
							<th scope="col">CIN</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql_users = "SELECT * FROM  `utilisateurs`";
						$resultusers = $conn->query($sql_users);
						if ($resultadmin->num_rows > 0) {
							while ($row_user = $resultusers->fetch_assoc()) {
								$id_user = $row_user["Id_u"];
								$nom_user = $row_user["Nom_prenom"];
								$user_gender = $row_user["gender"];
								$email_user = $row_user["Email"];
								$tele_user = $row_user["Telephone"];
								$CIN_user = $row_user["CIN"];
								$ville = $row_user["ville"];
						?>
								<tr>
									<th scope="row"><?php echo $id_user; ?></th>
									<td><?php echo $nom_user; ?></td>
									<td><?php echo $user_gender; ?></td>
									<td><?php echo $email_user; ?></td>
									<td><?php echo $tele_user; ?></td>
									<td><? echo $CIN_user ?></td>
									<td>
										<form style="margin-top: -15px;" method="post" onsubmit="confirmDeletion(event)">
											<button type="submit" class="btn btn-danger btn-lg">
												<i class="fa fa-trash"></i>
											</button>
											<input type="text" class="hidden" name="delet_user_id" value="<? echo $id_user ?>">
										</form>
									</td>
								</tr>
								<tr>
							<?php
							}
						} else {
							echo "<tr><td colspan='6'>No records found</td>";
						}
							?>
					</tbody>
				</table>
				<button class="btn btn-lg btn-primary" onclick="back('users')">routour</button>
			</div>
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
	<script src="../js/admin_edit.js"></script>
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
		<?php if ($added_voiture) : ?>
			swal.fire({
				icon: 'success',
				title: 'success!',
				text: 'cette voiture a été ajouteé .',
				showConfirmButton: true,
			})
		<?php endif ?>
	</script>
	<script>
		<?php if ($added_admin) : ?>
			Swal.fire({
				icon: 'success',
				title: 'success!',
				text: 'cette admin a été ajouteé .',
				showConfirmButton: true,

			})
		<?php endif ?>
	</script>
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
		<? if ($update) : ?>
			Swal.fire({
				icon: 'success',
				title: 'valideé',
				text: 'la reservation a été valideé',
				showConfirmButton: true,
			})

		<? endif ?>
	</script>
	<script>
		<? if ($deleted_user) : ?>
			Swal.fire({
				icon: 'success',
				title: 'Deleted!',
				text: 'Lutilisateur a ete bien supprime .',
				showConfirmButton: true,
			});
		<? endif ?>
	</script>
	</script>
	<script>
		<? if ($deleted_res) : ?>
			Swal.fire({
				icon: 'success',
				title: 'supprimée',
				text: 'La reservation a été supprimée',
				showConfirmButton: true,
			})
		<? endif ?>
	</script>
	<script>
		<? if ($deleted_admin) : ?>
			Swal.fire({
				icon: 'success',
				title: 'supprimée',
				showConfirmButton: true,
			})
		<? endif ?>
	</script>
	<script src="../js/admins.js"></script>
	<script>
		function back(section) {
			// Hide the specified section
			var sectionElement = document.getElementById(section);
			if (sectionElement) {
				sectionElement.classList.add('hidden');
			} else {
				console.error("Section with ID '" + section + "' not found.");
				return;
			}

			// Show the main service content section
			var serviceContent = document.getElementById('service-content');
			if (serviceContent) {
				serviceContent.classList.remove('hidden');
			} else {
				console.error("Service content section not found.");
			}
		}
	</script>
</body>

</html>