<?PHP
session_start();
include_once '../controller/DemandeC.php';


	$demandeC=new DemandeC();

	if (isset($_POST["id"])){
		$demandeC->supprimerDemande($_POST["id"]);
		header('Location:affichagedemandefront.php');
	}

?>
