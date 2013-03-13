<?php 

	include 'includes.php';

	if(strlen($_POST['optionpastel']) >0)
		$comma_separated = implode(",", $_POST['optionpastel']);
	else
		$comma_separated ='';

	$id= $_POST['id'];
	$consulta="UPDATE empresa SET permiso_pastel='$comma_separated' WHERE id_empresa=$id";
	mysql_query($consulta) or die(mysql_error());
	header('Location: http://monchys.com/pedidos/empresaIndex.php');

?>
