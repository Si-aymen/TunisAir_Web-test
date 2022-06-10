<?PHP
	class Demande{
		private ?int $id = null;
		private ?int $matricule = null;
		private ?string $mois = null;
		private ?string $type = null;
		private ?string $description = null;

		function __construct(int $matricule, string $mois, string $type, string $description){

			$this->matricule=$matricule;
			$this->mois=$mois;
			$this->type=$type;
			$this->description=$description;
		}

		function getId(): int{
			return $this->id;
		}
		function getMatricule(): int{
			return $this->matricule;
		}
		function getMois(): string{
			return $this->mois;
		}
		function getDescription(): string{
			return $this->description;
		}
		function getType(): string{
			return $this->type;
		}


		function setNom(int $matricule): void{
			$this->matricule=$matricule;
		}
		function setMois(string $mois): void{
			$this->mois;
		}
		function setDescription(string $description): void{
			$this->description=$description;
		}
		function setType(string $type): void{
			$this->type=$type;
		}

	}
?>
