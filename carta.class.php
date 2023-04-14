<style>
	.imagen_carta{
		width: 50px;
		transition: width 0.2s;
	}

	.imagen_carta:hover{
		width: 65px;
	}
	.imagen_carta_girada{
		width: 50px;
	}

</style>

<?php 
//Clase carta
class Carta{
	//Propiedades
	public $palo;
	public $numero;
	public $indice;
	
	function __construct($p,$n,$indx){
		$this->palo = $p;
		$this->numero = $n;
		$this->indice = $indx;

		
	}
	//Métodos
	public function pinta_carta(){ 
		//echo $this->palo.'-'.$this->numero;
		echo '<img class ="imagen_carta" src ="./cartas_uno_p6/'.$this->numero.'_'.$this->palo.'.png">';
	}
	public function pinta_carta_link($posicion){ 
		echo'<a href ="index_.php?indice='.$this->indice.'&palo='.$this->palo.'&posicion='.$posicion.'&numero='.$this->numero.'"><img class ="imagen_carta" src ="./cartas_uno_p6/'.$this->numero.'_'.$this->palo.'.png"></a>';
	}

	public function pinta_carta_girada($posicion){ 
		echo'<img class ="imagen_carta_girada" src ="./cartas_uno_p6/carta_girada.png">';
	}
}


 
?>