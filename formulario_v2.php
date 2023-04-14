<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Press+Start+2P&family=Rubik&family=Syne&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PROCESA</title>

	<style>
	*{
		font-family: 'Syne';
	}
	h2{
		margin:0px;
		padding: 0px;
	}
	header{
		text-align: center;
		background-color: #2E2E2E;
		padding: 20px;
		color:white;
	}
	.imps {
	   width: 15%;
	   height: 15%;
	   padding: 5px;
	   margin:2px;
	   margin-bottom: 0px;
	   margin-right: 30px;
	   color:black;

	}
	.ppp{
		font-size: 10px;
		margin:0px;
		margin-left: 3px;
		background-color: #F8F8F8;
		border:solid 1px lightblue;
		color:black;
		word-wrap: break-word;
	}
	.progress{
		margin:2px;
	}
	.fila{
		padding: 20px;
		display: flex;
		width: 100%;
		flex-wrap: wrap;
	}
	
	.container{
		display:flex;
		margin-left: 10px;
		

	}
	.derimpr{
		width:100%;
		margin-top: 30px;
		padding: 0px;
		margin:0px;
	}
	.izqform{
		width:60%;
		height: 425px;
		margin-top: 30px;
		margin-right: 30px;
		padding: 15px;
		border:1px lightgray solid;
		background-color: #FFF8DC;
	}
	.barra_magenta{
		background-color: magenta;
	}
	.barra_cyan{
		background-color: cyan;
	}
	.barra_negra{
		background-color: black;
	}
	.barra_amarilla{
		background-color: yellow;
	}


	</style>

</head>
<body>
	<?php 
	require_once 'funciones.php';
	inicia_comprueba_sesion(); 
	
	?>
	<header>
		<h2>Copistería de Albert Arrebola</h2>
	</header>
	<div class="container">
	

	<div class="izqform">
		<!--FORMULARIO PARA CREAR Y AÑADIR IMPRESORAS-->
		<form action="formulario_v2.php" method="get">
			<p style="font-weight: bold; font-size: 14px;">AÑADE TANTAS IMPRESORAS COMO DESEES USAR. </p>
			<p style="font-size: 12px;">Asigna un 'id' y el formato (tamaño).</p> 
		<input type="text" name="id" placeholder="Identificador impresora"> 
		<label> Formato </label>
		<select name="formato">
			<option value="a2" name="a2"> A2 </option>
			<option value="a3" name="a3"> A3 </option>
			<option value="a4" name="a4"> A4 </option>
		</select><br><br>
		<input type="submit" value=" AÑADIR IMPRESORA " name="add">
		
		<hr style="background-color: black;">
		<p style="font-weight: bold; font-size: 14px;">SELECCIONA Y ESCRIBE LO QUE QUIERAS IMPRIMIR. </p>
		</form>
		<!--FORMULARIO PARA ESCRIBIR Y ESCOGER Y AÑADIR A LA COLA-->
		<form action="formulario_v2.php" method="get">
		<label> Escoge impresora </label>
		<select name="choose_imp">
			<?php 
				$contador = 0;
				foreach ($_SESSION['mi_sesion']['array_imp'] as $impresora) {
					echo '<option value="'.$contador.'">'.$impresora['ident'].'</option>';
					$contador++;
				}	

			 ?>
		</select> <br><br>
		<textarea placeholder="Texto a imprimir: "name="text"></textarea> <br>
		<br><input type="submit" value=" ENVIAR A LA COLA "name="enviar"/>
	</form>

	</div>
	<div class="derimpr">
		<?php
		$hojas = 0;
		echo '<div class="fila">';
			//muestra_impresoras();
			if(isset($_REQUEST['id'])){
				muestra_impresoras();
			}
			
			if(isset($_REQUEST['text'])){
				$valorindex = $_REQUEST['choose_imp'];
				//echo $valorindex;
				add_cola($valorindex);
				muestra_impresoras();
			}
			if(isset($_GET['impresora'])){
				//echo $_GET['impresora'];
				$numimp = $_GET['impresora'];
				$impresora = $_SESSION['mi_sesion']['array_imp'][$numimp];
				
				if(sizeof($impresora['cola']) > 0){
					$doc = $impresora['cola'][0];
					restar_tinta($doc,$numimp);
					array_shift($_SESSION['mi_sesion']['array_imp'][$numimp]['cola']);
					
				}
				else{
					echo '<script language="javascript">alert("No hay ningún documento en cola.");</script>';
				}
				//print_r($_SESSION['mi_sesion']['array_imp'][$numimp]['cola']);
			
			muestra_impresoras();
			}

		
		echo '</div>';
		?>

	</div>
	<?php echo '<h4>Hojas impresas: '.$_SESSION['mi_sesion']['hojas'].'</h4>'; ?>	

</div> <!--FIN CONTAINER-->

	
		

	
	
	 
</body>
</html>