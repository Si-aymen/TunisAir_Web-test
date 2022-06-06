<?php
	include '../config.php';
	include_once '../Model/Adherent.php';
	class DemandeC {
		function afficherDemande(){
			$sql="SELECT * FROM Demande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerDemande($matricule){
			$sql="DELETE FROM Demande WHERE Matricule=:Matricule";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Matricule', $matricule);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterDemande($demande){
			$sql="INSERT INTO Demande (Matricule, Mois, Type, Description) 
			VALUES (:Matricule,:Mois,:Type,:Description)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Matricule' => $demande->getMatricule(),
					'Mois' => $demande->getMois(),
					'Type' => $demande->getType(),
					'Description' => $demande->getDescription()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererDemande($Matricule){
			$sql="SELECT * from demande where Matricule=$Matricule";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$demande=$query->fetch();
				return $demande;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierDemande($demande, $matricule){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE demande SET 
						Matricule= :Matricule, 
						Mois= :Mois, 
						Type= :Type, 
						Description= :Description, 
					WHERE matricule= :Matricule'
				);
				$query->execute([
					'Matricule' => $demande->getMatricule(),
					'Mois' => $demande->getMois(),
					'Type' => $demande->getType(),
					'Description' => $demande->getDescription()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
	
?>