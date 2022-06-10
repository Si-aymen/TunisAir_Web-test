<?php
    include_once '../Model/Utilisateur.php';
    include_once '../Controller/UtilisateurC.php';

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new UtilisateurC();
    if (
        isset($_POST["matricule"]) &&
        isset($_POST["mdp"]) &&
        isset($_POST["firstname"]) &&
        isset($_POST["lastname"]) &&
        isset($_POST["corps"])
    ) {
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
            $userC->ajouterUtilisateur($user);
            header('Location:loginfront.php');
        }
        else
            $error = "Missing information";
    }


?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="text" id="matricule" placeholder="matricule" required="">
					<input type="password" name="mdp" id="mdp" placeholder="mot de passe" required="">
					<button>Login</button>
				</form>
			</div>

			<div class="login">
			<form action="" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="matricule" id="matricule" placeholder="matricule" required="">
					<input type="password" name="mdp" id="mdp" placeholder="mot de passe" required="">
					<input type="text" name="firstname" id="firstname" placeholder="first name" required="">
					<input type="text" name="lastname" id="lastname" placeholder="lastname name" required="">
          <select name="corps" id="corps">
          <option value="PNT">PNT</option>
          <option value="PNC">PNC</option>
        </select>
					<button>Sign up</button>

				</form>
			</div>
	</div>
</body>
</html>
<!-- partial -->

</body>
</html>
