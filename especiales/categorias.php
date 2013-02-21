<!DOCTYPE html>
<html lang="es">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<title>Bienvenido a Especiales Monchys</title>
		
		<link href="css/resetHtml5Doctor.css" rel="stylesheet" type="text/css" />
		<link href="css/portal.css" rel="stylesheet" type="text/css" />				        
	        <link href="css/transiciones.css" rel="stylesheet" type="text/css"/>

		<script type="text/javascript" src="js/librerias/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/galery/modernizr.custom.53451.js"></script>
		<script type="text/javascript" src="js/galery/jquery.gallery.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#dg-container').gallery();
			});
		</script>														
		<!--<script type="text/javascript" src="js/librerias/modernizr.js"></script>-->
	</head>
	<body>
		<div class="container">
			<div class="codrops-top">
				<a>
					<strong>Monchys: </strong>catalogo de pasteles especiales
				</a>
				<span class="right">
					<a>Nombre de Sucursal o Persona Logueada</a>
					<a href="cerrar.php"><strong>Cerrar Sesi&oacute;n</strong></a>
				</span>
			<div class="clr"></div>
			</div>

			<div id="contLogoCat">
				<div id="logoCat"></div>
			</div>
			
			<div id="dg-container" class="contSlide dg-container">
				<div class="dg-wrapper">
					<a href="tradicionales.php"><img src="img/5.jpg" alt="tradicionales"><div>Pasteles Tradicionales</div></a>
					<a href="kekis.php"><img src="img/6.jpg" alt="kekis"><div>Pastel de Kekis</div></a>
					<a href="fondant.php"><img src="img/7.jpg" alt="fondant"><div >Pastel con Fondant</div></a>
				</div>
			
				<nav>	
					<span class="dg-prev">&lt;</span>
					<span class="dg-next">&gt;</span>
				</nav>
			</div>
		</div>		
	</body>
</html>