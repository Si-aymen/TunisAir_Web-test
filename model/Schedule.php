<?PHP
	class Schedule{
		private ?int $id = null;
		private ?string $day_off_origin = null;
		private ?string $tlc = null;
		private ?string $ac_type_code = null;
		private ?string $airline = null;
		private ?string $flight_no = null;
		private ?string $departure_date = null;
		private ?string $departure_time = null;
		private ?string $arrival = null;
		private ?string $arrival_time = null;
		private ?string $aireport_c_is_dep = null;
		private ?string $aireport_c_is_dest = null;
		private ?string $code = null;
		private ?string $type = null;
		
		
		
		function __construct(string $day_off_origin, string $tlc, string $ac_type_code, string $airline, string $flight_no ,
		string $departure_date,string $departure_time ,string $arrival ,string $arrival_time ,
		 string $aireport_c_is_dep , string $aireport_c_is_dest,string $code ,string $type){
			
			$this->day_off_origin=$day_off_origin;
			$this->tlc=$tlc;
			$this->ac_type_code=$ac_type_code;
			$this->airline=$airline;
			$this->flight_no=$flight_no;
			$this->departure_date=$departure_date;
			$this->departure_time=$departure_time;
			$this->arrival=$arrival;
			$this->arrival_time=$arrival_time;
			$this->aireport_c_is_dep=$aireport_c_is_dep;
			$this->aireport_c_is_dest=$aireport_c_is_dest;
			$this->code=$code;
			$this->type=$type;
		}
		
		function getId(): int{
			return $this->id;
		}
		function getDay_off_origin(): string{
			return $this->day_off_origin;
		}
		function getTlc(): string{
			return $this->tlc;
		}
		function getAirline(): string{
			return $this->airline;
		}
		function getAc_type_code(): string{
			return $this->ac_type_code;
		}
		function getFlight_no(): string{
			return $this->flight_no;
		}
		function getDeparture_date(): string{
			return $this->departure_date;
		}
		function getDeparture_time(): string{
			return $this->departure_time;
		}
		function getArrival(): string{
			return $this->arrival;
		}
		function getArrival_time(): string{
			return $this->arrival_time;
		}
		function getAireport_c_is_dep(): string{
			return $this->aireport_c_is_dep;
		}
		function getAireport_c_is_dest(): string{
			return $this->aireport_c_is_dest;
		}
		function getCode(): string{
			return $this->code;
		}
		function getType(): string{
			return $this->type;
		}

	




		function setDay_off_origin(string $day_off_origin): void{
			$this->day_off_origin=$day_off_origin;
		}
		function seTtlc(string $tlc): void{
			$this->tlc;
		}
		function setAirline(string $airline): void{
			$this->airline=$airline;
		}
		function setEmail(string $ac_type_code): void{
			$this->ac_type_code=$ac_type_code;
		}
		function setFlight_no(string $flight_no): void{
			$this->flight_no=$flight_no;
		}
	//	function setAirline(string $airline): void{
	//		$this->airline=$airline;
	//	}
	//	function setEmail(string $ac_type_code): void{
	//		$this->ac_type_code=$ac_type_code;
	//	}
	//	function setFlight_no(string $flight_no): void{
	//		$this->flight_no=$flight_no;
	//	}
	}
?>