<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=,initial-scale=1.0">
	<title>Formulario</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="index.css">

</head>
<body>
	<video muted loop autoplay id="video_background" preload="auto" volume="50">

	  <source src="./cartas_uno_p6/video_fondo_uno.mp4" type="video/mp4" />

	</video>

	<form action="index_.php" method ="GET">
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





