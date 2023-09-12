<?php 
//Clase partida
class Partida{
	//Propiedades
	public $numero_jugadores;
	public $numero_cartas;
	public $turno;
	public $baraja;
	public $carta_en_mesa;
	public $mesa;
	public $array_jugadores;
	public $constante_sentido;


	//Metodos
	function __construct(){
		$this->baraja = new Baraja ();
		$this->array_jugadores = [];
		$this->turno = 0;
		$this->constante_sentido = 1;

	}

	public function jugar(){
		if(sizeof(($this->array_jugadores[$this->turno]->mano->conjunto_cartas)) == 0){
			echo '<h2>El jugador'.$this->turno.'se ha quedado sin cartas y ha ganado la partida! Felicidades !!!</h2>';
		}

		else{
			echo '<div class = "box_game">';
				echo '<div class = "box_cartas">';
				for ($i=0; $i < $this->numero_jugadores; $i++){ 
					echo '<div class = "columna_cartas">';
					echo 'Jugador '.($i+1).'<br><hr>';
					if ($this->turno == $i){
							$this->array_jugadores[$i]->mano->pinta_baraja();
						}else{
							$this->array_jugadores[$i]->mano->pinta_baraja_girada();
						}	
					echo '</div>';//fin div columna_cartas
					//4. Sacar una carta a la mesa.
					
				
				}
				echo '</div>'; //fin div box_cartas
				
				echo '<div class="cartademesayboton">';
				$this->carta_en_mesa->pinta_carta();
				echo '<br>';
				if(sizeof($this->baraja->conjunto_cartas) != 0){
					echo '<a href="index_.php?robar=true"><button type="button">Robar</button></a>';
				}else{
					echo 'Se han acabado las cartas para robar, seguir jugando hasta que gane el mejor!';
				}
				echo '</div>';  //fin cartamesa
			echo '</div">'; //fin div box_game
		}
		
	}

	function normas_uno($numero_carta,$palo_carta,$posicion_carta,$indice_carta){
		//Solo entraremos a las condiciones "especiales" si se cumple la condición 1 (numero o color).
		//1a condicion (reverse)
			if ($numero_carta == 'reverse'){
				$this->cambiar_sentido();
			}

		//2a condición especial (+2)
			// Si el numero o propiedad de la carta que he clicado == a picker{
			if ($numero_carta == 'picker'){
				//Augmento el turno 
				$this->cambiar_turno();
				//Le añado 2 cartas al jugador con el turno siguiente
				$carta_robada = array_pop($this->baraja->conjunto_cartas);
				array_push($this->array_jugadores[$this->turno]->mano->conjunto_cartas,$carta_robada);
				$carta_robada = array_pop($this->baraja->conjunto_cartas);
				array_push($this->array_jugadores[$this->turno]->mano->conjunto_cartas,$carta_robada);
				
			}
		//3a condición especial (bloqueo) 
			//Si el numero o propiedad de la carta que he clicado == 'skip'...
			if ($numero_carta == 'skip'){
				//Augmento el turno 2 veces para "saltarme" al siguiente jugador.
				$this->cambiar_turno();
			}
			$this->carta_en_mesa = new Carta($palo_carta,$numero_carta,$indice_carta);
	}

	


	function cambiar_turno(){
		if(sizeof(($this->array_jugadores[$this->turno]->mano->conjunto_cartas)) == 0){
			echo '<h1>El jugador '.($this->turno)+1 .' se ha quedado sin cartas y ha ganado la partida! <br><br> Felicidades !!!</h1>';
		}
		$this->turno = $this->turno + $this->constante_sentido; //Augmento el turno y si supera el numero de jugadores vuelvo al primer jugador.
		if ($this->turno >= $this->numero_jugadores){
			$this->turno = 0;
		}
		if ($this->turno < 0){
			$this->turno = ($this->numero_jugadores) -1 ;
		}
	}

	function cambiar_sentido(){
		$this->constante_sentido =  $this->constante_sentido * (-1);
		
	}

}
 
?>
