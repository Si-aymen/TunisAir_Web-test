<?PHP
session_start();
include_once '../controller/DemandeC.php';
include_once "../controller/UtilisateurC.php";
include_once '../model/demande.php';

$demandeC=new DemandeC();


    $userC = new UtilisateurC();
	$user2=$userC->recupererUtilisateurmat($_SESSION['login1']);
    
   $matricule=$user2["Matricule"];
    $listeUsers=$demandeC->recupererDemandematricule($matricule);

                    

                      $error = "";
                      // create user
                      $demande = null;
                      // create an instance of the controller
                      $demandeC = new DemandeC();
                      if (
                          isset($_POST["matricule"]) &&
                          isset($_POST["mois"]) &&
                          isset($_POST["type"]) &&
                          isset($_POST["description"])
                      ) {
                        $date = DateTime::createFromFormat("Y-m-d", $_POST['mois']);
                        $day = $date->format("d");
                        if (    $demandeC->sommeDemande($_POST["matricule"])<5){
                          if($day<"13"){
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
                      $demandeC->ajouterDemande($demande);
                              header('Location:affichagedemandefront.php');
                          }
                          else
                              $error = "Missing information";
                            }else{
                              echo '<script>alert("superieur!")</script>';
                            }
                            }else
                            {
                              echo '<script>alert("maximum 5 demande!")</script>';
                            }
                      }
	

?>



                                <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Leadership Event HTML5 Bootstrap v5 Template</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-leadership-event.css" rel="stylesheet">
       

<!--

TemplateMo 575 Leadership Event

https://templatemo.com/tm-575-leadership-event

-->
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
                          <a class="nav-link click-scroll" href="affichagedemandefront.php">liste demande user</a>
                      </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="affichagedemandefronttout.php">liste des demandes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Schedules</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Pricing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Venue</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="logout.php">logout</a>
                        </li>
                    </ul>
                <div>

            </div>
        </nav>
        <br>
        <br>

       
        <table class="table">
  <thead>
  
    <tr>
      <th scope="col">matricule</th>
      <th scope="col">mois</th>
      <th scope="col">type</th>
      <th scope="col">description</th>
      <th scope="col">delete</th>
      <th scope="col">update</th>
    </tr>
  </thead>
  <tbody>
  <?PHP
										foreach($listeUsers as $demande){
									?>
    <tr>
   
      <td><?PHP echo $demande['Matricule']; ?></td>
      <td><?PHP echo $demande['Mois']; ?></td>
      <td><?PHP echo $demande['Type']; ?></td>
      <td><?PHP echo $demande['Description']; ?></td>
      <td>
      <form method="POST" action="../tunisair forntend/supprimerdemandefront.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $demande['Id']; ?> name="id">
						</form>
											</td>
											<td>
                                      <a href="../tunisair forntend/modifierdemandefront.php?id=<?PHP echo $demande['Id']; ?>"> Modifier </a>
											</td>
    </tr>
    <?PHP
										}
									?>
  </tbody>
</table>
<main>
            <section class="contact section-padding" id="section_7">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <form class="custom-form contact-form bg-white shadow-lg" action="#" method="post" role="form">
                                <h2>Ajouter Votre Demande</h2>
                                <div id="error">
                                    <?php echo $error; ?>
                                </div>

                                <div class="row">
                                <form action="" method="POST">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <input type="text" name="matricule" id="matricule" class="form-control" placeholder="matricule" required="">
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-12">
                                        <input type="date" name="mois" id="mois" class="form-control" placeholder="mois" required="">
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-12">
                                        <select name="type" id="type"  class="form-control" >
                                            <option value="NULL">choisir</option>
                                            <option value="PNC">PNC</option>
                                            <option value="PNT">PNT</option>
                                          </select>
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" id="description" name="description" placeholder="description"></textarea>

                                        <button type="submit" class="form-control">Envoyer</button><br>
                                    </div>
                                          </form>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

        </main>


















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



							