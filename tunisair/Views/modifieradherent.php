<?php
    include_once '../Model/Adherent.php';
    include_once '../Controller/AdherentC.php';

    $error = "";

    // create adherent
    $demande = null;

    // create an instance of the controller
    $demandeC = new DemandeC();
    if (
        isset($_POST["matricule"]) &&
		isset($_POST["mois"]) &&		
        isset($_POST["type"]) &&
		isset($_POST["description"]) 
    ) {
        if (
            !empty($_POST["matricule"]) && 
			!empty($_POST['mois']) &&
            !empty($_POST["type"]) && 
			!empty($_POST["description"]) 
        ) { 
            $demande = new Demande(
                $_POST['matricule'],
				$_POST['mois'],
                $_POST['type'], 
				$_POST['description']
            );
            echo 'hi';
            $demandeC->modifierDemande($demande, $_POST["matricule"]);
            header('Location:afficherListeAdherents.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListeAdherents.php">Retour à la liste des adherents</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['Matricule'])){
				$demande = $demandeC->recupererDemande($_POST['Matricule']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="Matricule">Matricule:
                        </label>
                    </td>
                    <td><input type="text" name="matricule" id="matricule" value="<?php echo $demande['Matricule']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Mois">Mois:
                        </label>
                    </td>
                    <td><input type="date" name="mois" id="mois" value="<?php echo $demande['Mois']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="type">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="type" id="type" value="<?php echo $demande['Type']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adresse:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="description" value="<?php echo $demande['Description']; ?>" id="description">
                    </td>
                </tr>
               
                         
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>