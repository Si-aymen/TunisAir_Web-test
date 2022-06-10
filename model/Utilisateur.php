<?PHP
	class Utilisateur{
		private ?int $id = null;
		private ?int $matricule = null;
		private ?string $mdp = null;
		private ?string $firstname = null;
		private ?string $lastname = null;
		private ?string $corps = null;

		function __construct(int $matricule,string $mdp, string $firstname, string $lastname, string $corps){

			$this->matricule=$matricule;
				$this->mdp=$mdp;
			$this->firstname=$firstname;
			$this->lastname=$lastname;
			$this->corps=$corps;
		}

		function getId(): int{
			return $this->id;
		}
		function getMatricule(): int{
			return $this->matricule;
		}
		function getMdp(): string{
			return $this->mdp;
		}
		function getFirstname(): string{
			return $this->firstname;
		}
		function getCorps(): string{
			return $this->corps;
		}
		function getlastname(): string{
			return $this->lastname;
		}


		function setNom(int $matricule): void{
			$this->matricule=$matricule;
		}
		function setFirstname(string $firstname): void{
			$this->prenom;
		}
		function setCorps(string $corps): void{
			$this->corps=$corps;
		}
		function setlastname(string $lastname): void{
			$this->lastname=$lastname;
		}

	}
?>
