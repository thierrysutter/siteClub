<?php
class Semaine {

	// Durées en secondes
	const DAY = 86400;
	const WEEK = 604800;

	// Arguments éventuellement fournis
	private $_year;
	private $_week;

	// Timestamp du premier jour de la semaine
	var $lundi;

	// Constructeur
	function __construct () {

		// On récupère les arguments
		$arg_n = func_num_args();
		$arg_s = func_get_args();

		// Par défaut, on prend l'année courante
		// et la semaine courante
		$this -> _year = intval(date("Y"));
		$this -> _week = intval(date("W"));

		switch ( $arg_n ) {
			case 1: // 1 argument : l'année
				$this -> _year = intval($arg_s[0]); // année fournie
				$this -> _week = 1;				 // semaine 1
				break;
			case 2: // 2 arguments : l'année et la semaine
				$this -> _year = intval($arg_s[0]); // année fournie
				$this -> _week = intval($arg_s[1]); // semaine fournie
				break;
		}

		// Timestamp du premier jeudi de l'année
		$debut = strtotime("first thursday of january ".$this->_year);
		// Timestamp du lundi correspondant
		$debut -= 3*86400;
		// Offset pour la semaine fournie
		$debut += ( $this -> _week - 1 ) * 604800;

		// Stockage du timestamp du premier jour de la semaine
		$this -> lundi = $debut;

		//return self;
		//return $this;
	}
	/* Premier jour de la semaine */
	function firstDay() {
		return $this -> lundi;
	}
	/* Dernier jour de la semaine */
	function lastDay() {
		return $this -> lundi + 6*86400;
	}
	/* nième jour de la semaine (lundi = 1) */
	function nthDay($nth = 1) {
		return $this -> lundi + ( $nth - 1 ) % 7 * 86400;
	}
	/* Petite description en clair */
	function description () {
		$desc  = "La semaine #".$this->_week." de ".$this->_year." commence le ";
		$desc .= strftime( "%A %e %B %Y" , $this -> lundi );
		$desc .= " et se termine le ";
		$desc .= strftime( "%A %e %B %Y" , $this -> lastDay() );
		return $desc;
	}
}
?>