<?php
	include '../Controller/AdherentC.php';
	$demandeC=new DemandeC();
	$demandeC->supprimerDemande($_GET["Matricule"]);
	header('Location:afficherListeAdherents.php');
?>