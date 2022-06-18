<?PHP
	class Utilisateur{
		private ?int $id = null;
		private ?int $matricule = null;
		private ?string $mdp = null;
		private ?string $firstname = null;
		private ?string $lastname = null;
		private ?string $corps = null;
		private ?string $classe = null;

		function __construct(int $matricule,string $mdp, string $firstname, string $lastname, string $corps, string $classe){

			$this->matricule=$matricule;
			$this->mdp=$mdp;
			$this->firstname=$firstname;
			$this->lastname=$lastname;
			$this->corps=$corps;
			$this->classe=$classe;

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
		function getclasse(): string{
			return $this->classe;
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
		function setclasse(string $classe): void{
			$this->classe=$classe;
		}


	}
?>
