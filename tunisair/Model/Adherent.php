<?php
	class Demande{
		private $matricule=null;
		private $mois=null;
		private $type=null;
		private $description=null;
		function __construct($matricule, $mois, $type, $description){
			$this->matricule=$matricule;
			$this->mois=$mois;
			$this->type=$type;
			$this->description=$description;
		}
		function getMatricule(){
			return $this->matricule;
		}
		function getMois(){
			return $this->mois;
		}
		function getType(){
			return $this->type;
		}
		function getDescription(){
			return $this->description;
		}
		
		function setMatricule(string $matricule){
			$this->matricule=$matricule;
		}
		function setMois(string $mois){
			$this->mois=$mois;
		}
		function setType(string $type){
			$this->type=$type;
		}
		function setDescription(string $description){
			$this->description=$description;
		}
		
		
	}


?>