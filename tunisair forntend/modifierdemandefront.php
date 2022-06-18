<?php
session_start();
	include "../controller/DemandeC.php";
	include_once '../Model/Demande.php';

	$demandeC = new DemandeC();
	$error = "";

	if (
		isset($_POST["matricule"]) &&
        isset($_POST["mois"]) &&
        isset($_POST["type"]) &&
        isset($_POST["description"])
	){
		if (
            !empty($_POST["matricule"]) &&
            !empty($_POST["mois"]) &&
            !empty($_POST["type"]) &&
            !empty($_POST["description"])
        ) {
            $demande = new Demande(
                $_POST['matricule'],
                $_POST['mois'],
                $_POST['type'],
									$_POST['description']
			);


            $demandeC->modifierDemande($demande, $_GET['id']);
            header('refresh:0;url=affichagedemandefront.php');
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
    <meta charset="utf-8">

        <title>Leadership Event HTML5 Bootstrap v5 Template</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-leadership-event.css" rel="stylesheet">
</head>
	<body>
    <nav class="navbar navbar-expand-lg">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="index.html" class="navbar-brand mx-auto mx-lg-0">

                    <span class="brand-text">Tunisair</span>
                </a>

                <a class="nav-link custom-btn btn d-lg-none" href="#">Buy Tickets</a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="demande.php">Demande</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="affichagedemandefront.php">liste des demandes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#">Schedules</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#">Pricing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#">Venue</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_7">Contact</a>
                        </li>
                    </ul>
                <div>

            </div>
        </nav>
        
        <div id="error">
            <?php echo $error; ?>
        </div>

		<?php
			if (isset($_GET['id'])){
				$demande = $demandeC->recupererDemande($_GET['id']);

		?>
        <section class="contact section-padding" id="section_7">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <form class="custom-form contact-form bg-white shadow-lg" action="" method="POST" role="form">
                                <h2>Modifier demande</h2>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <input type="text" name="matricule" id="matricule" class="form-control" value = "<?php echo $demande['Matricule']; ?>">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <input type="date" name="mois" id="mois" class="form-control" value = "<?php echo $demande['Mois']; ?>">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <select name="type" id="type"  class="form-control" >
                                        <option value="<?php echo $demande['Type']; ?>">PNT</option>
	                                    <option value="<?php echo $demande['Type']; ?>">PNC</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <input class="form-control" type="text" name="description" id="description" value = "<?php echo $demande['Description']; ?>">
                                        <button type="submit" class="form-control">Modifier</button><br>
                                    </div>
                            </form>
                                </div>
                        </div>

                    </div>
                </div>
            </section>
		<?php
		}
		?>
        <footer class="site-footer">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-7 col-12">
                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Our Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Code of Conduct</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy and Terms</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>


                    <div class="col-lg-5 col-12 ms-lg-auto">
                        <div class="copyright-text-wrap d-flex align-items-center">
                            <p class="copyright-text ms-lg-auto me-4 mb-0">Copyright © 2022 Leadership Event Co., Ltd.

                            <br>All Rights Reserved.

          					<br><br>Design: <a title="CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a></p>

                            <a href="#section_1" class="bi-arrow-up arrow-icon custom-link"></a>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
	</body>
</html>
