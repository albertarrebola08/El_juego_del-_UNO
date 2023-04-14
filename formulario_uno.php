<!DOCTYPE html>
<html lang="es">
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=,initial-scale=1.0">
	<title>Formulario</title>

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Open+Sans:wght@300&family=Press+Start+2P&family=Rubik&family=Staatliches&family=Syne&family=Yellowtail&display=swap');
		
		#video_background {
			position: absolute;
			bottom: 0px;
			right: 0px;
			width: 120%;
			height: 120%;
			z-index: -1000;
			overflow: hidden;
		}

		#video_pattern {
			background:#fff;
			position: fixed;
			opacity: 0.8;
			left: 0px;
			top: 0px;
			right: 0px;
			width: 50%;
			height: 50%;
			z-index: 1;
		}
		form{
			padding:20px;
			margin:auto;

		}
		hr{
			background-color: white;
		}
		
		h1{
			margin-left: 0px;
			font-family: 'Fredericka the Great', cursive;
			color:white;
		}
		h3{
			font-family: 'Fredericka the Great', cursive;
			color: white;
		}
		.caja_ej{
			background-color: #ECECEC;
			border-radius: 5px;
			margin:15px;
			padding:20px;
			margin-bottom: 15px;

		}
		label{
			color:white;
		}
		.btn:hover{
			background-color: #8B0000;
			border:0px;
		}
		.btn{
			border:0px;
		}

	</style>	
</head>
<body>
	<video muted loop autoplay id="video_background" preload="auto" volume="50"/>

	  <source src="./cartas_uno_p6/video_fondo_uno.mp4" type="video/mp4" />

	</video/>

	<form action="index_.php" method = "get">
		<br>
		<h1>Pràctica 6 - El joc del UNO</h1>
		<h3>Albert Arrebola Sans</h3>
		<hr>
		<br>
	  <div class="form-group">
	    <label>Introdueix el numero de jugadors</label>
	    <input type="number" class="form-control" style ="width:200px" name="njugadors" min = 1 max= 5 placeholder="NºJugadors">
	    <br>	
	 
	  <div class="form-group">
	    <label>Introdueix el numero de cartes (x jugador)</label>
	    <input type="number" class="form-control" style ="width:200px" name="ncartas"min = 1 max = 7 placeholder="NºCartes">
	  </div>
	  <br>	
	  <button type="submit" class="btn btn-primary">A jugar!</button>

	   </div>
	</form>

	


</body>
</html>





