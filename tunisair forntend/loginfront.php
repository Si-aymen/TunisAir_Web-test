<?php
session_start();
    include_once '../model/Utilisateur.php';
    include_once '../controller/UtilisateurC.php';

    $error = "";
    $user = null;
    $userC = new UtilisateurC();

    if (
      isset($_POST["login1"])&&
      isset($_POST["login2"])
      )
      {

  	if(!empty($_POST["login1"])&&
  	!empty($_POST["login2"]))
  {
  	$user=$userC->recupererUtilisateurmat($_POST["login1"]);
    if($user!="") {$role=$user['Corps'];
  	$message=$userC->connexionUser($_POST["login1"],$_POST["login2"]);
  	$username=$_POST["login1"];
  	$password=sha1($_POST["login2"]);


  	  if($message!='incorrect')
  	  {
  	    if($role=="ADMIN")
  	    {	
          $_SESSION['login1']=$_POST["login1"];
  		    header('location:../views/afficherdemande.php');}
  		  else if  (($role=="PNT")||($role=="PNC"))
        {
          $_SESSION['login1']=$_POST["login1"];
  			  header('location:index.php');}
  	  } 
  }
  else{
  		$message='incorrect';
  	}
  
  }else
  {
  $message="Missing information";
  }
}

    if (
        isset($_POST["matricule"]) &&
        isset($_POST["mdp"]) &&
        isset($_POST["firstname"]) &&
        isset($_POST["lastname"]) &&
        isset($_POST["corps"])&&
        isset($_POST["classe"])
    ) {
        if (
            !empty($_POST["matricule"]) &&
            !empty($_POST["mdp"]) &&
            !empty($_POST["firstname"]) &&
            !empty($_POST["lastname"]) &&
            !empty($_POST["corps"])&&
            !empty($_POST["classe"])
            
        ) {
            $user = new Utilisateur(
                $_POST['matricule'],
                  $_POST['mdp'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['corps'],
                $_POST['classe']
            );
            $userC->ajouterUtilisateur($user);
            header('Location:loginfront.php');
        }
        else
            $error = "Missing information";
    }


?>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
<style>
		.error {
			color: red;
      position: relative ;
      left :20px;

		}


    #sign{
  overflow : scroll;
}
	</style>
	<title>Tunisair</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
  <link rel="stylesheet" href="./style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<script>
		function validateForm2() {
			var letters = /^[A-Za-z]+$/;
			var dateNow = new Date();
			var mat = document.getElementById("matricule").value;
			var md = document.getElementById("mdp").value;
			var fi = document.getElementById("firstname").value;
			var la = document.getElementById("lastname").value;

			var errormat = document.getElementById('errormat');
			var errormdp = document.getElementById('errormdp');
			var errorfirst = document.getElementById('errorfirst');
			var errorlast = document.getElementById('errorlast');
			 
      if (isNaN(mat)==true) {
				errormat.innerHTML = "la matricule ne doit pas etre alphabetique";
        return false ;
			}
      else if(isNaN(fi)==false)
      {
        errorfirst.innerHTML="le nom ne doit pas etre numerique"
        return false ;
      }
      else if(isNaN(la)==false)
      {
        errorlast.innerHTML="le prenom ne doit pas etre numerique"
        return false ;
      }
    }
</script>
</head>
<body>
	<div class= "main">
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="login1" id="login" placeholder="matricule" required="">
					<input type="password" name="login2" id="login2" placeholder="mot de passe" required="">
					<button type="submit" >Login</button>
				</form>
			</div>

			<div  id ="sign" class="login">
			<form action="" method="POST" onSubmit="return validateForm2()">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="matricule" id="matricule" placeholder="matricule" required="">
          <p id="errormat" class="error"></p>
					<input type="password" name="mdp" id="mdp" placeholder="mot de passe" required="">
          <p id="errormdp" class="error"></p>
					<input type="text" name="firstname" id="firstname" placeholder="first name" required="">
          <p id="errorfirst" class="error"></p>
					<input type="text" name="lastname" id="lastname" placeholder="lastname name" required="">
          <p id="errorlast" class="error"></p>
          <select name="corps" id="corps">
          <option value="PNT">PNT</option>
          <option value="PNC">PNC</option>
        </select>
        <select name="classe" id="classe">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
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