<!DOCTYPE html>
<html lang="es">
	<?php 
			include('conexion.php');
	?>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<title>Tradicionales</title>

		<link href="css/resetHtml5Doctor.css" rel="stylesheet" type="text/css" />
		<link href="css/portal.css" rel="stylesheet" type="text/css" />			
			<link rel="stylesheet" type="text/css" href="css/elast/elastislide.css" />
			<link rel="stylesheet" type="text/css" href="css/elast/custom.css" />
			<!--<script src="js/elast/modernizr.custom.17475.js"></script>-->
		<script type="text/javascript" src="js/librerias/modernizr.js"></script>
			<script type="text/javascript" src="js/librerias/jquery-1.9.1.min.js"></script>
			<script type="text/javascript" src="js/elast/jquerypp.custom.js"></script>
			<script type="text/javascript" src="js/elast/jquery.elastislide.js"></script>
			
	</head>
	<body>
		<div class="container demo-1">
			<div class="codrops-top">
				<a href="categorias.php">
					<strong>Monchys: </strong>catalogo de pasteles especiales
				</a>
				<span class="right">
					<a>Nombre de Sucursal o Persona Logueada</a>
					<a href="cerrar.php"><strong>Cerrar Sesi&oacute;n</strong></a>
				</span>
			<div class="clr"></div>
			</div>

			<div id="selector">
				<div class="main">					
					<!--
					<ul id="carousel" class="elastislide-list">
						<li><a href="#"><img src="img/tipos/18.png" alt="image01" /></a></li>
						<li><a href="#"><img src="img/tipos/22.png" alt="image02" /></a></li>
						<li><a href="#"><img src="img/tipos/26.png" alt="image03" /></a></li>
						<li><a href="#"><img src="img/tipos/34.png" alt="image04" /></a></li>
						<li><a href="#"><img src="img/tipos/42.png" alt="image05" /></a></li>
						<li><a href="#"><img src="img/tipos/cascada.png" alt="image06" /></a></li>
						<li><a href="#"><img src="img/tipos/fuente.png" alt="image07" /></a></li>
						<li><a href="#"><img src="img/tipos/herreria.png" alt="image08" /></a></li>
						<li><a href="#"><img src="img/tipos/mediaplancha.png" alt="image09" /></a></li>
						<li><a href="#"><img src="img/tipos/plancha.png" alt="image10" /></a></li>						
					</ul>
					-->

					<ul id="carousel" class="elastislide-list">
						<?php 
							$consulta = "SELECT * FROM tamaños";
							$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
							$total = mysql_num_rows($resultado);
						
							if ($total> 0) {
								while ($columna = mysql_fetch_array($resultado)):
						?>
						
						<li>
							<a href="#">
								<img src="img/tamaños/<?php echo $columna['icono']; ?>"/>
							</a>
						</li>
						
							<?php 
								endwhile;
							}
							?>						
					</ul>
				</div>				
					<script type="text/javascript">			
						$( '#carousel' ).elastislide();			
					</script>					
				<div class="main">				
					<ul id="carousel2" class="elastislide-list">
						<li><a href="#"><img src="img/sabores/chocolate.png" alt="image01" /></a></li>
						<li><a href="#"><img src="img/sabores/almendra.png" alt="image02" /></a></li>
						<li><a href="#"><img src="img/sabores/esponjachocolate.png" alt="image03" /></a></li>
						<li><a href="#"><img src="img/sabores/pina.png" alt="image04" /></a></li>
						<li><a href="#"><img src="img/sabores/nuez.png" alt="image05" /></a></li>
						<li><a href="#"><img src="img/sabores/esponjavainilla.png" alt="image06" /></a></li>
						<li><a href="#"><img src="img/sabores/vainilla.png" alt="image07" /></a></li>						
					</ul>
				</div>										
					<script type="text/javascript">			
						$( '#carousel2' ).elastislide();
					</script>
				<div class="main">				
					<ul id="carousel3" class="elastislide-list">
						<li><a href="#"><img src="img/betunes/chantilly.png" alt="image01" /></a></li>
						<li><a href="#"><img src="img/betunes/chocolate.png" alt="image02" /></a></li>
						<li><a href="#"><img src="img/betunes/limon.png" alt="image03" /></a></li>
						<li><a href="#"><img src="img/betunes/chantillychoco.png" alt="image04" /></a></li>						
					</ul>
				</div>										
					<script type="text/javascript">			
						$( '#carousel3' ).elastislide();
					</script>
				<div class="main">				
					<ul id="carousel4" class="elastislide-list">
						<li><a href="#"><img src="img/rellenos/sinrelleno.png" alt="image01" /></a></li>
						<li><a href="#"><img src="img/rellenos/mermfresa.png" alt="image02" /></a></li>
						<li><a href="#"><img src="img/rellenos/mermchabacano.png" alt="image03" /></a></li>
						<li><a href="#"><img src="img/rellenos/mermpina.png" alt="image04" /></a></li>						
						<li><a href="#"><img src="img/rellenos/mermnaranja.png" alt="image04" /></a></li>						
					</ul>
				</div>										
					<script type="text/javascript">			
						$( '#carousel4' ).elastislide();
					</script>
			</div>
			<div id="buscador">

				
			</div>
			<div id="cotizador">

				
			</div>
			
				<div class="clr"></div>

			<div class="privacidad">
				<p>Especiales Monchys&copy; Marzo 2013 <br> <span>Dise&ntilde;o @arcktoz</span></p>
			</div>
		</div>
	</body>
</html>