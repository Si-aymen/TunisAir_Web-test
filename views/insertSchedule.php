<?php
    include_once '../model/Schedule.php';
    include_once '../controller/ScheduleC.php';

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new ScheduleC();
    if (
        isset($_POST["day_off_origin"]) && 
        isset($_POST["tlc"]) &&
        isset($_POST["ac_type_code"]) && 
        isset($_POST["airline"]) && 
        isset($_POST["flight_no"])&& 
        isset($_POST["departure_date"])&& 
        isset($_POST["departure_time"])&& 
        isset($_POST["arrival"])&& 
        isset($_POST["arrival_time"])&& 
        isset($_POST["aireport_c_is_dep"])&& 
        isset($_POST["aireport_c_is_dest"])&& 
        isset($_POST["code"])&& 
        isset($_POST["type"])
    ) {
        if (
            !empty($_POST["day_off_origin"]) && 
            !empty($_POST["tlc"]) && 
            !empty($_POST["ac_type_code"]) && 
            !empty($_POST["airline"]) && 
            !empty($_POST["flight_no"]) && 
            !empty($_POST["departure_date"])&& 
            !empty($_POST["departure_time"])&& 
            !empty($_POST["arrival"])&& 
            !empty($_POST["arrival_time"])&& 
            !empty($_POST["aireport_c_is_dep"])&& 
            !empty($_POST["aireport_c_is_dest"])&& 
            !empty($_POST["code"])&& 
            !empty($_POST["type"])
        ) {
            $user = new Schedule(
                $_POST['day_off_origin'],
                $_POST['tlc'], 
                $_POST['ac_type_code'],
                $_POST['airline'],
                $_POST['flight_no'],
                $_POST['departure_date'],
                $_POST['departure_time'],
                $_POST['arrival'],
                $_POST['arrival_time'],
                $_POST['aireport_c_is_dep'],
                $_POST['aireport_c_is_dest'],
                $_POST['code'],
                $_POST['type'],
            );
            $userC->ajouterUtilisateur($user);
            header('Location:afficherSchedule.php');
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
        
        <form action="" method="POST" >
            <center>
            <table border="1" align="center"  onSubmit="return validateForm2()">

                <tr>
                    <td>
                        <label for="nom">day_off_origin:
                        </label>
                    </td>
                    <td><input type="date" name="day_off_origin" id="day_off_origin" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">tlc:
                        </label>
                    </td>
                    <td><input type="text" name="tlc" id="tlc"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="email">ac_type_code :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="ac_type_code" id="ac_type_code">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="login">Login:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="airline" id="airline" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">flight_no:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="flight_no" id="flight_no">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">departure_date:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="departure_date" id="departure_date">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">departure_time:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="departure_time" id="departure_time">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">arrival:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="arrival" id="arrival">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">arrival_time:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="arrival_time" id="arrival_time">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">aireport_c_is_dep:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="aireport_c_is_dep" id="aireport_c_is_dep">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">aireport_c_is_dest:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="aireport_c_is_dest" id="aireport_c_is_dest">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">code:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="code" id="code">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">type:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="type" id="type">
                    </td>
                </tr>
               
               
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
                        </center>
    </body>
</html>
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