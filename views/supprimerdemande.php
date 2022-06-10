<?PHP
	include "../controller/DemandeC.php";

	$demandeC=new DemandeC();

	if (isset($_POST["id"])){
		$demandeC->supprimerDemande($_POST["id"]);
		header('Location:afficherDemande.php');
	}

?>
