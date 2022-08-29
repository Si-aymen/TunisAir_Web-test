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

<?PHP
session_start();
	include "../controller/UtilisateurC.php";

	$utilisateurC=new UtilisateurC();
	$listeUsers=$utilisateurC->afficherUtilisateurs();

?>

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

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
              <?php
                                            $bdd= new PDO('mysql:host=localhost;dbname=tunisair;charset=utf8','root','');
                                            $userParPage =6;
                                            $userTotalReq=$bdd->query('SELECT Id FROM utilisateur where Corps="PNT" ');
                                            $userTotal=$userTotalReq->rowCount();
                                            $pagesTotales=ceil($userTotal/$userParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
                                            $_GET['page']=intval($_GET['page']);
                                            $pageCourante=$_GET['page'];
                                            }else{
                                                $pageCourante=1;
                                            }

                                            $depart=($pageCourante-1)*$userParPage;

                                            ?>
                                            

                <div class="bg-light text-center rounded p-4">
                    <div class="table-responsive">
                        <a href="connexion.php"><i style="font-size: 26px; background-color:#F0FFFF; border-radius: 5px;">Ajouter un Utilisateur</i></a>
                        <h1>PNT</h1>
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                        <!--  <th scope="col">id</th> -->
                                    <th scope="col">matricule</th>
                                    <th scope="col">mot de passe</th>
                                    <th scope="col">first name</th>
                                    <th scope="col">last name</th>
                                    <th scope="col">corps</th>
                                    <th scope="col">delete</th>
                                    <th scope="col">update</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?PHP
                            $listeUsers=$bdd->query('SELECT * FROM utilisateur ORDER BY Id DESC LIMIT '.$depart.','.$userParPage);

				foreach($listeUsers as $user){
			?>
				<tr>
			<!--		<td><//?PHP echo $user['Id']; ?></td> -->
  <?php if( $user['Corps'] =='PNT') { ?>
					<td><?PHP echo $user['Matricule']; ?></td>
          <td><?PHP echo $user['Mdp']; ?></td>
					<td><?PHP echo $user['Firstname']; ?></td>
					<td><?PHP echo $user['Lastname']; ?></td>
					<td><?PHP echo $user['Corps'];; ?></td>

          <td>  <input type="checkbox" id="show">
               <label for="show" class="show-btn"><i class="fa fa-trash"></i></label>
               <div class="container">
                 <form method="POST" action="supprimerUtilisateur.php">
                   <h7>veuillez vous supprimer cette demande ?</h7><br>
                <button type="submit" name="supprimer">supprimer</button>
                <input type="hidden" value=<?PHP echo $user['Id']; ?> name="id">
               </form>
                  <label for="show" class="close-btn fas fa-times" title="close"></label>
               </div>
            </div>
            </td>
					<td>

              <a href="modifierUtilisateur.php?id=<?PHP echo $user['Id']; ?>" ><i class="fa fa-edit" style="font-size: 26px;"></i></a>

					</td>
				</tr>
        <?php  }?>
			<?PHP
				}
			?>
                            </tbody>
                        </table>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
<?php
for($i=1;$i<=$pagesTotales;$i++){
    if($i == $pageCourante){
    ?>
    <li class="page-item"><a class="page-link"><?php echo $i.' '; ?></a></li>
    <?php
    }else{
      ?>
    <li class="page-item"><?php   echo '<a class="page-link" href="afficherutilisateur.php?page='.$i.'">'.$i.'</a> '; ?></li>
    <?php
  }
}
?>
  </ul>
</nav>
        <br>
        <br>

                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
              <?php
                                            $bdd= new PDO('mysql:host=localhost;dbname=tunisair;charset=utf8','root','');
                                            $userParPage =6;
                                            $userTotalReq=$bdd->query('SELECT Id FROM utilisateur where Corps="PNC"');
                                            $userTotal=$userTotalReq->rowCount();
                                            $pagesTotales=ceil($userTotal/$userParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
                                            $_GET['page']=intval($_GET['page']);
                                            $pageCourante=$_GET['page'];
                                            }else{
                                                $pageCourante=1;
                                            }

                                            $depart=($pageCourante-1)*$userParPage;

                                            ?>

                <div class="bg-light text-center rounded p-4">
                    <div class="table-responsive">
                      <h1>PNC</h1>
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                        <!--  <th scope="col">id</th> -->
                                    <th scope="col">matricule</th>
                                    <th scope="col">mot de passe</th>
                                    <th scope="col">first name</th>
                                    <th scope="col">last name</th>
                                    <th scope="col">corps</th>
                                    <th scope="col">delete</th>
                                    <th scope="col">update</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?PHP
                            $listeUsers=$bdd->query('SELECT * FROM utilisateur ORDER BY Id DESC LIMIT '.$depart.','.$userParPage);

        foreach($listeUsers as $user){
      ?>
        <tr>
      <!--		<td><//?PHP echo $user['Id']; ?></td> -->
      <?php if( $user['Corps'] =='PNC') { ?>
          <td><?PHP echo $user['Matricule']; ?></td>
          <td><?PHP echo $user['Mdp']; ?></td>
          <td><?PHP echo $user['Firstname']; ?></td>
          <td><?PHP echo $user['Lastname']; ?></td>
          <td><?PHP echo $user['Corps'];; ?></td>

          <td>  <input type="checkbox" id="show">
               <label for="show" class="show-btn"><i class="fa fa-trash"></i></label>
               <div class="container">
                 <form method="POST" action="supprimerUtilisateur.php">
                   <h7>veuillez vous supprimer cette demande ?</h7><br>
                <button type="submit" name="supprimer">supprimer</button>
                <input type="hidden" value=<?PHP echo $user['Id']; ?> name="id">
               </form>
                  <label for="show" class="close-btn fas fa-times" title="close"></label>
               </div>
            </div>
            </td>
          <td>

              <a href="modifierUtilisateur.php?id=<?PHP echo $user['Id']; ?>" ><i class="fa fa-edit" style="font-size: 26px;"></i></a>

          </td>
        </tr>
        <?php  }?>
      <?PHP
        }
      ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-end">
                        <?php
                        for($i=1;$i<=$pagesTotales;$i++){
                            if($i == $pageCourante){
                            ?>
                            <li class="page-item"><a class="page-link"><?php echo $i.' '; ?></a></li>
                            <?php
                            }else{
                              ?>
                            <li class="page-item"><?php   echo '<a class="page-link" href="afficherutilisateur.php?page='.$i.'">'.$i.'</a> '; ?></li>
                            <?php
                          }
                        }
                        ?>
                          </ul>
                        </nav>
        <br>
        <br>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
              <?php
                                            $bdd= new PDO('mysql:host=localhost;dbname=tunisair;charset=utf8','root','');
                                            $userParPage =6;
                                            $userTotalReq=$bdd->query('SELECT Id FROM utilisateur  where Corps="ADMIN"');
                                            $userTotal=$userTotalReq->rowCount();
                                            $pagesTotales=ceil($userTotal/$userParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
                                            $_GET['page']=intval($_GET['page']);
                                            $pageCourante=$_GET['page'];
                                            }else{
                                                $pageCourante=1;
                                            }

                                            $depart=($pageCourante-1)*$userParPage;

                                            ?>

                <div class="bg-light text-center rounded p-4">
                    <div class="table-responsive">
                      <h1>ADMIN</h1>
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                        <!--  <th scope="col">id</th> -->
                                    <th scope="col">matricule</th>
                                    <th scope="col">mot de passe</th>
                                    <th scope="col">first name</th>
                                    <th scope="col">last name</th>
                                    <th scope="col">corps</th>
                                    <th scope="col">delete</th>
                                    <th scope="col">update</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?PHP
                            $listeUsers=$bdd->query('SELECT * FROM utilisateur ORDER BY Id DESC LIMIT '.$depart.','.$userParPage);

        foreach($listeUsers as $user){
      ?>
        <tr>
      <!--		<td><//?PHP echo $user['Id']; ?></td> -->
      <?php if( $user['Corps'] =='ADMIN') { ?>
          <td><?PHP echo $user['Matricule']; ?></td>
          <td><?PHP echo $user['Mdp']; ?></td>
          <td><?PHP echo $user['Firstname']; ?></td>
          <td><?PHP echo $user['Lastname']; ?></td>
          <td><?PHP echo $user['Corps'];; ?></td>

          <td>  <input type="checkbox" id="show">
               <label for="show" class="show-btn"><i class="fa fa-trash"></i></label>
               <div class="container">
                 <form method="POST" action="supprimerUtilisateur.php">
                   <h7>veuillez vous supprimer cette demande ?</h7><br>
                <button type="submit" name="supprimer">supprimer</button>
                <input type="hidden" value=<?PHP echo $user['Id']; ?> name="id">
               </form>
                  <label for="show" class="close-btn fas fa-times" title="close"></label>
               </div>
            </div>
            </td>
          <td>

              <a href="modifierUtilisateur.php?id=<?PHP echo $user['Id']; ?>" ><i class="fa fa-edit" style="font-size: 26px;"></i></a>

          </td>
        </tr>
        <?php  }?>
      <?PHP
        }
      ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-end">
                        <?php
                        for($i=1;$i<=$pagesTotales;$i++){
                            if($i == $pageCourante){
                            ?>
                            <li class="page-item"><a class="page-link"><?php echo $i.' '; ?></a></li>
                            <?php
                            }else{
                              ?>
                            <li class="page-item"><?php   echo '<a class="page-link" href="afficherutilisateur.php?page='.$i.'">'.$i.'</a> '; ?></li>
                            <?php
                          }
                        }
                        ?>
                          </ul>
                        </nav>
        <br>
        <br>
                    </div>
                </div>
            </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


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
