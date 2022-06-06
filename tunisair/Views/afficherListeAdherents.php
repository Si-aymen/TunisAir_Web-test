<?php
	include '../Controller/AdherentC.php';
	$demandeC=new DemandeC();
	$listeDemande=$demandeC->afficherDemande(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterAdherent.php">Ajouter un Adherent</a></button>
		<center><h1>Liste des adherents</h1></center>
		<table border="1" align="center">
			<tr>
				<th>Matricule</th>
				<th>Mois</th>
				<th>Type</th>
				<th>Description</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeDemande as $demande){
			?>
			<tr>
				<td><?php echo $demande['Matricule']; ?></td>
				<td><?php echo $demande['Mois']; ?></td>
				<td><?php echo $demande['Type']; ?></td>
				<td><?php echo $demande['Description']; ?></td>
				<td>
					<form method="POST" action="modifieradherent.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $demande['Matricule']; ?> name="matricule">
					</form>
				</td>

				<td>
					<a href="supprimeradherent.php?Matricule=<?php echo $demande['Matricule']; ?>">Supprimer</a>
				</td>
			</tr>

			<?php
				}
			?>
		</table>
	</body>
</html>
