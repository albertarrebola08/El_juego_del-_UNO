<?php 
//clase baraja

class Baraja{
	//Propiedades
	public $conjunto_cartas;

	//Metodos
	function __construct(){ //Cuando haga una intancia de baraja ya estará creada por el constructor con sus propiedades.
		$this->conjunto_cartas = [];
	}

	//METODO PARA CREAR BARAJA CON TODAS LAS CARTAS
	function crea_baraja(){
		$palo = ['yellow','red','green','blue']; //Introduzco los diferentes palos que hay en mi baraja
		$numero = [1,2,3,4,5,6,7,8,9,0,'reverse','skip','picker',]; // Introduzco los diferentes numeros que hay en mi baraja
	
		$ind = 0;
		//Para cada color
		foreach ($palo as $value1) {
			// Para cada numero
			foreach ($numero as $value2) { 
				$ind ++;
				//Creo el objeto $c de la clase carta 
				$c = new Carta($value1,$value2,$ind); 
				array_push($this->conjunto_cartas,$c); //Y la voy metiendo en la baraja.
			}
		} //Tengo en 'baraja' muchos objetos con sus propiedades y metodos definidos en clase carta
	}

	//FUNCIÓN PARA MEZCLAR LA BARAJA CREADA
	public function mezcla(){
		shuffle ($this->conjunto_cartas);
	}
	//Funcion para pintar baraja
	public function pinta_baraja(){
		foreach ($this->conjunto_cartas as $posicion=>$w){
			$w->pinta_carta_link($posicion);
			echo '<br>';
		}
	}

	public function pinta_baraja_girada(){
		foreach ($this->conjunto_cartas as $posicion=>$v){
			$v->pinta_carta_girada($posicion);
			echo '<br>';
		}
	}
}

 ?>
