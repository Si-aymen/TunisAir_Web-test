<?PHP
	include "../config.php";
	require_once '../model/Schedule.php';

	class ScheduleC {
		
		function ajouterUtilisateur($Utilisateur){
			$sql="INSERT INTO schedule (day_off_origin, tlc, ac_type_code, airline, flight_no ,
			departure_date,departure_time,arrival,arrival_time,aireport_c_is_dep,aireport_c_is_dest,code,type) 
			VALUES (:day_off_origin,:tlc,:ac_type_code, :airline, :flight_no ,
			:departure_date,:departure_time,:arrival,:arrival_time,:aireport_c_is_dep,:aireport_c_is_dest,:code,:type)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'day_off_origin' => $Utilisateur->getDay_off_origin(),
					'tlc' => $Utilisateur->getTlc(),
					'ac_type_code' => $Utilisateur->getAc_type_code(),
					'airline' => $Utilisateur->getAirline(),
					'flight_no' => $Utilisateur->getFlight_no(),
					'departure_date' => $Utilisateur->getDeparture_date(),
					'departure_time' => $Utilisateur->getDeparture_time(),
					'arrival' => $Utilisateur->getArrival(),
					'arrival_time' => $Utilisateur->getArrival_time(),
					'aireport_c_is_dep' => $Utilisateur->getAireport_c_is_dep(),
					'aireport_c_is_dest' => $Utilisateur->getAireport_c_is_dest(),
					'code' => $Utilisateur->getCode(),
					'type' => $Utilisateur->getType(),


				
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherUtilisateurs(){
			
			$sql="SELECT * FROM schedule";
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
			$sql="DELETE FROM schedule WHERE id= :id";
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
					'UPDATE schedule SET 
						day_off_origin = :day_off_origin, 
						tlc = :tlc,
						ac_type_code = :ac_type_code,
						airline = :airline,
						flight_no = :flight_no,
						departure_date = :departure_date,
						departure_time = :departure_time,
						arrival = :arrival,
						arrival_time = :arrival_time,
						aireport_c_is_dep = :aireport_c_is_dep,
						aireport_c_is_dest = :aireport_c_is_dest,
						code = :code,
						type = :type

					WHERE id = :id'
				);
				$query->execute([
					'day_off_origin' => $Utilisateur->getDay_off_origin(),
					'tlc' => $Utilisateur->getTlc(),
					'ac_type_code' => $Utilisateur->getAc_type_code(),
					'airline' => $Utilisateur->getAirline(),
					'flight_no' => $Utilisateur->getFlight_no(),
					'departure_date' => $Utilisateur->getDeparture_date(),
					'departure_time' => $Utilisateur->getDeparture_time(),
					'arrival' => $Utilisateur->getArrival(),
					'arrival_time' => $Utilisateur->getArrival_time(),
					'aireport_c_is_dep' => $Utilisateur->getAireport_c_is_dep(),
					'aireport_c_is_dest' => $Utilisateur->getAireport_c_is_dest(),
					'code' => $Utilisateur->getCode(),
					'type' => $Utilisateur->getType(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererUtilisateur($id){
			$sql="SELECT * from schedule where id=$id";
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

		function recupererUtilisateur1($id){
			$sql="SELECT * from schedule where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>