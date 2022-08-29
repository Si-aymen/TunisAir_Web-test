<?php
session_start();
	include "../controller/UtilisateurC.php";
	include_once '../Model/Utilisateur.php';

	$utilisateurC = new UtilisateurC();
	$error = "";

	if (
		isset($_POST["matricule"]) &&
      isset($_POST["mdp"]) &&
        isset($_POST["firstname"]) &&
        isset($_POST["lastname"]) &&
        isset($_POST["corps"])
	){
		if (
            !empty($_POST["matricule"]) &&
            !empty($_POST["mdp"]) &&
            !empty($_POST["firstname"]) &&
            !empty($_POST["lastname"]) &&
            !empty($_POST["corps"])
        ) {
            $user = new Utilisateur(
                $_POST['matricule'],
                  $_POST['mdp'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['corps']
			);

            $utilisateurC->modifierUtilisateur($user, $_GET['id']);
            header('refresh:0;url=afficherUtilisateur.php');
        }
        else
            $error = "Missing information";
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
	<body>
		<div class="container-xxl position-relative bg-white d-flex p-0">
				<!-- Spinner Start -->
				<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
						<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
								<span class="sr-only">Loading...</span>
						</div>
				</div>
				<!-- Spinner End -->


				<!-- Sidebar Start -->
				<div class="sidebar pe-4 pb-3">
						<nav class="navbar bg-light navbar-light">
								<a href="index.html" class="navbar-brand mx-4 mb-3">
										<h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>TUNISAIR</h3>
								</a>
								<div class="d-flex align-items-center ms-4 mb-4">
										<div class="position-relative">
												<img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
												<div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
										</div>
										<div class="ms-3">
												<h6 class="mb-0">admin</h6>
												<span>Admin</span>
										</div>
								</div>
								<div class="navbar-nav w-100">
								<a href="afficherDemande.php" class="nav-item nav-link active">Demande</a>
                  <a href="afficherUtilisateur.php" class="nav-item nav-link active">utilisateur</a>
                  <a href="../php-calendar/3-calendar.php" class="nav-item nav-link active">agenda</a>
                  <a href="../views/afficherSchedule.php" class="nav-item nav-link active">Schedule</a>

								</div>
						</nav>
				</div>
				<!-- Sidebar End -->


				<!-- Content Start -->
				<div class="content">
						<!-- Navbar Start -->
						<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
								<a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
										<h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
								</a>
								<a href="#" class="sidebar-toggler flex-shrink-0">
										<i class="fa fa-bars"></i>
								</a>
								<div class="navbar-nav align-items-center ms-auto">
										<div class="nav-item dropdown">
												<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
														<img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
														<span class="d-none d-lg-inline-flex">admin</span>
												</a>
												<div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
														<a href="#" class="dropdown-item">My Profile</a>
														<a href="#" class="dropdown-item">Settings</a>
														<a href="logout.php" class="dropdown-item">Log Out</a>
												</div>
										</div>
								</div>
						</nav>
        <br>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <br>
		<?php
			if (isset($_GET['id'])){
				$user = $utilisateurC->recupererUtilisateur($_GET['id']);

		?>
		<form action="" method="POST">
           

            <!--        <td>
                        <label for="id">Id:
                        </label>
                    </td> -->
                <!--    <td>
						<input type="text" name="id" id="id"  value = "<?php echo $user['Id']; ?>" disabled>
					</td> -->
					<label class="form-label" for="form2Example1">Matricule</label>

						<div class="form-outline mb-4">
    <input type="text" id="matricule" name ="matricule" class="form-control"   value = "<?php echo $user['Matricule']; ?>" />
  </div>
       
			<label class="form-label" for="form2Example1">mot de passe</label>
<div class="form-outline mb-4">
<input type="text" id="mdp" name ="mdp" class="form-control"   value = "<?php echo $user['Mdp']; ?>" />
</div>

<label class="form-label" for="form2Example1">Nom </label>
<div class="form-outline mb-4">
<input type="text" id="firstname" name ="firstname" class="form-control"  value = "<?php echo $user['Firstname']; ?>" />
</div>
<label class="form-label" for="form2Example1">Prenom </label>
<div class="form-outline mb-4">
<input type="text" id="lastname" name ="lastname" class="form-control"  value = "<?php echo $user['Lastname']; ?>" />
</div>

<label class="form-label" for="form2Example1">Corps </label>
<select class="form-select"  name="corps" id="corps" aria-label="Default select example">
<?php if ($user['Corps']=="PNT"){ ?>
													<option value="PNT"><?php echo $user['Corps']; ?></option>
													<option value="PNC">PNC</option>
													<option value="ADMIN">ADMIN</option>
											<?php } else if ($user['Corps']=="PNC"){ ?>
												<option value="PNC"><?php echo $user['Corps']; ?></option>
												<option value="PNT">PNT</option>
												<option value="ADMIN">ADMIN</option>
											<?php } else if ($user['Corps']=="ADMIN"){ ?>
												<option value="ADMIN"><?php echo $user['Corps']; ?></option>
												<option value="PNT">PNT</option>
												<option value="PNC">PNC</option>
											<?php } ?>
</select>


		
<br>              
                      <pre>                                              <input class="btn btn-primary" type="submit" value="envoyer">                     <input class="btn btn-primary" type="reset" value="annuler"> <pre>
                        

                   
              


                
        </form>
		<?php
		}
		?>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>
