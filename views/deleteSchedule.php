<?PHP
	include "../controller/ScheduleC.php";

	$scheduleC=new ScheduleC();
	
	if (isset($_POST["id"])){
		$scheduleC->supprimerUtilisateur($_POST["id"]);
		header('Location:afficherSchedule.php');
	}

?>