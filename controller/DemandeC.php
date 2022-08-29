<?PHP
	require_once '../Model/Demande.php';
	require_once 'UtilisateurC.php';

	class DemandeC {

		function ajouterDemande($Demande){
			$sql="INSERT INTO Demande (matricule, mois, type, description)
			VALUES (:matricule,:mois,:type, :description)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$query->execute([
					'matricule' => $Demande->getMatricule(),
					'mois' => $Demande->getMois(),
					'type' => $Demande->getType(),
					'description' => $Demande->getDescription()
				]);
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}


			function afficherDemande(){

			$sql="SELECT * FROM Demande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function supprimerDemande($id){
			$sql="DELETE FROM Demande WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierDemande($Demande, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Demande SET
						matricule = :matricule,
						mois = :mois,
						type = :type,
						description = :description
					WHERE id = :id'
				);
				$query->execute([
					'matricule' => $Demande->getMatricule(),
					'mois' => $Demande->getMois(),
					'type' => $Demande->getType(),
					'description' => $Demande->getDescription(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererDemande($id){
			$sql="SELECT * from Demande where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		public function calculerDemande() {
	        $sql = "SELECT COUNT(*) FROM Demande ";
	        $db = config::getConnexion();
	        $stmt = $db->query($sql);
	        $count = $stmt->fetchColumn();
	        return $count;
	        // print $count;
	    }
			public function sommeDemande($matricule) {
		        $sql = "SELECT COUNT(Matricule) FROM Demande WHERE Matricule=$matricule";
		        $db = config::getConnexion();
		        $stmt = $db->query($sql);
		        $count = $stmt->fetchColumn();
		        return $count;
		        // print $count;
		    }

		
			function  recupererDemandematricule($matricule){

				$sql="SELECT * FROM Demande where Matricule=$matricule";
				$db = config::getConnexion();
				try{
					$liste = $db->query($sql);
					return $liste;
				}
				catch (Exception $e){
					die('Erreur: '.$e->getMessage());
				}
			}



	}

?>
