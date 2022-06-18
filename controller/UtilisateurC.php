<?PHP
	include "../config.php";
	require_once '../Model/Utilisateur.php';

	class UtilisateurC {

		function ajouterUtilisateur($Utilisateur){
			$sql="INSERT INTO Utilisateur (matricule,mdp, firstname, lastname, corps, classe)
			VALUES (:matricule,:mdp,:firstname,:lastname,:corps,:classe)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$query->execute([
					'matricule' => $Utilisateur->getMatricule(),
					'mdp' => $Utilisateur->getMdp(),
					'firstname' => $Utilisateur->getFirstname(),
					'lastname' => $Utilisateur->getLastname(),
					'corps' => $Utilisateur->getCorps(),
					'classe' => $Utilisateur->getclasse()
				]);
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

		function afficherUtilisateurs(){

			$sql="SELECT * FROM Utilisateur ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function supprimerUtilisateur($id){
			$sql="DELETE FROM Utilisateur WHERE id= :id";
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
		function modifierUtilisateur($Utilisateur, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Utilisateur SET
						matricule = :matricule,
						mdp = :mdp,
						firstname = :firstname,
						lastname = :lastname,
						corps = :corps
					WHERE id = :id'
				);
				$query->execute([
					'matricule' => $Utilisateur->getMatricule(),
					'mdp' => $Utilisateur->getMdp(),
					'firstname' => $Utilisateur->getFirstname(),
					'lastname' => $Utilisateur->getlastname(),
					'corps' => $Utilisateur->getCorps(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererUtilisateur($id){
			$sql="SELECT * from Utilisateur where id=$id";
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

		function recupererUtilisateurmat($matricule){
			$sql="SELECT * from Utilisateur where matricule=$matricule";
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

	 function connexionUser($matricule,$mdp)
        {
            $sql="SELECT * FROM Utilisateur WHERE username='" .$matricule. "' and mdp='".$mdp."'";
            $db=config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0)
                {
                    $message ="incorrect";
                }else{
                    $x=$query->fetch();
                    $message=$x['matricule'];
                }
            }
            catch(Exception $e){
                $message="".$e->getMessage();
            }
            return $message;


        }

		public function recherche($key)
		{
			$sql = "SELECT * FROM utilisateur WHERE Matricule LIKE '%$key%' OR Lastname LIKE '%$key%' OR Mdp LIKE '%$key%'";
			$db = config::getConnexion() ;
			try {
				$liste = $db->query($sql);
				return $liste;
			} catch (Exception $e) {
				die('Erreur: ' .$e->getMessage());
			}
		}
		
		function classe_R($Utilisateur, $id){

			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Utilisateur SET
						matricule = :matricule,
						mdp = :mdp,
						firstname = :firstname,
						lastname = :lastname,
						corps = :corps,
						classe = :classe
					WHERE id = :id'
				);
				$query->execute([
					'matricule' => $Utilisateur->getMatricule(),
					'mdp' => $Utilisateur->getMdp(),
					'firstname' => $Utilisateur->getFirstname(),
					'lastname' => $Utilisateur->getlastname(),
					'corps' => $Utilisateur->getCorps(),
					'classe' => $Utilisateur->getclasse(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


	}

?>
