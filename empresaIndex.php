<?

include 'includes.php';



 if ($s_m_tipo!="1") 

    header ("location:admin.php");



include 'head.php';

?>



	<SCRIPT LANGUAGE="JavaScript">

	<!--

function hola(renglon){

		if (renglon.bgColor=="#ffffff")

		 renglon.bgColor="#D1D1D1";

		else

		 renglon.bgColor="#ffffff";

	}

	function verificaEliminar(){

	var pasa=false;

	for (var i=0;i < forma.elements.length; i++) {

	if (forma.elements[i].type=="checkbox")

			if (forma.elements[i].checked){

				pasa = true;

				break;

			} //			if (forma.elements[i].checked){

}//for

		if (pasa){

				var agree=confirm("¿Estas seguro de Eliminar a las Empresas?");

					if (agree)

						return true ;

					else

						return false ;

		}else

			alert("Selecciona una Empresa");

		return false;

			

	}

	-->

	</SCRIPT>

<TABLE cellspacing="0" cellpadding="0" border="0" align='center' width='700'>

<TR>

	<TD class="texto" valign='top'><? include "configuracionMenu.php"; ?></TD>

	<TD align='center' width='550'>

<TABLE cellpadding=0 cellspacing=0 border=0 align='center'>

<FORM METHOD="POST" name="forma" ACTION="productoEliminar.php" onSubmit="return verificaEliminar();">



<TR>

	<TD align=center class="mision" height="40">

	  Empresas

	</TD>

</TR>

<TR height="30">

	<TD class="titulo16" align=center>

	<!-- 

<INPUT TYPE="image" SRC="/catalogo/Imagen/proyectoEliminar.gif">

	-->



	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	 <INPUT TYPE="button" value="&nbsp;Agregar Empresa&nbsp;" class="boton" onclick="javascript:window.location='empresaAgregar.php';">

	</TD>

</TR>

<TR>

	<TD align=center>

<TABLE BORDER=1 cellpadding="2" cellspacing="0" WIDTH="550" bordercolor="#00725e">

<TR bordercolor="#ffffff" bgcolor="#00725e">

	<TD></TD>

	<TD class="textotable" align="center"><TABLE class="" cellpadding="0" cellspacing="0" border="0" bordercolor="" width="">

	<TR>

		<TD class="">

		

		<TABLE class="" cellpadding="0" cellspacing="0" border="0" bordercolor="" width="">

		<TR>

			<TD class="" width="20" align="center">	<A HREF="empresaIndex.php?orderby=empresa&order=asc" class="linkbody"><IMG SRC="img/web/order_asc.gif" WIDTH="14" HEIGHT="10" BORDER=0 ALT="Ordenar Por Nombre Ascendente"></A></TD>

		</TR>

		<TR>

<TD class="" width="20" align="center"><A HREF="empresaIndex.php?orderby=ordenemp&order=desc" class="linkbody"><IMG SRC="img/web/order_desc.gif" WIDTH="14" HEIGHT="10" BORDER=0 ALT="Ordenar Por Nombre Descendente"></A></TD>		</TR>

		</TABLE>

	

		

		</TD>





		<TD class="textotable" rowspan="2">&nbsp;Nombre&nbsp;<BR>

		&nbsp;Abreviatura

		</TD>

		

	</TR>



	</TABLE></TD>

	<TD class="textotable" align="center">Franquicia</TD>

	<TD class="textotable" align="center">Dirección y Tel</TD>

	<TD class="textotable" align="center"><TABLE class="" cellpadding="0" cellspacing="0" border="0" bordercolor="" width="">

	<TR>

		<TD class="">

		<TABLE class="" cellpadding="0" cellspacing="0" border="0" bordercolor="" width="">

		<TR>

			<TD class="" width="20" align="center"><A HREF="empresaIndex.php?orderby=ordenemp&order=asc" class="linkbody"><IMG SRC="img/web/order_asc.gif" WIDTH="14" HEIGHT="10" BORDER=0 ALT="Ordenar Por Nombre Ascendente"></A></TD>

		</TR>

		<TR>

<TD class="" width="20" align="center"><A HREF="empresaIndex.php?orderby=ordenemp&order=desc" class="linkbody"><IMG SRC="img/web/order_desc.gif" WIDTH="14" HEIGHT="10" BORDER=0 ALT="Ordenar Por Nombre Descendente"></A></TD>		</TR>

		</TABLE>

		</TD>

		<TD class="textotable" rowspan="2">&nbsp;Orden&nbsp;

		</TD>

	</TR>


	</TABLE>	<TD class="" width="20" align="center"> &nbsp;Asignar pasteles&nbsp;</TD>
</TD>

</TR>

<?



if (empty($orderby)) {

	$orderby="empresa";

	$order="asc";

    

} //if () {



$SQL = "SELECT * FROM empresa as e, ciudad as c, estado as es WHERE e.id_estado=es.id_estado AND c.id_ciudad=e.id_ciudad ORDER BY e.";



$SQL=$SQL."$orderby $order";

$res= mysql_query($SQL);

$vrenglon=2;

 while ($cur=mysql_fetch_object($res))  {

	 $id_empresa =$cur->id_empresa;

 	 $empresa =$cur->empresa; 

 	 $vempresacorto =$cur->empresacorto; 

 	$permiso_pastel=$cur->permiso_pastel; 

	 //mapa

	 $calle =$cur->calle; 

 	 $colonia =$cur->colonia; 

 	 $estado =$cur->estado; 

 	 $ciudad =$cur->ciudad; 

 	 $tipo =$cur->tipo;  

 	 $telefono =$cur->telefono; 

 	 $ordenemp =$cur->ordenemp; 

	switch ($tipo){

		case "1":$tipo="Propia"; break;

		case "2":$tipo="Local"; break;

		case "3":$tipo="Foránea"; break;





	}

 

	?>

	<TR bgcolor=#ffffff id="ren<?=$vrenglon?>">

	<TD width='10'><INPUT onClick="hola(ren<?=$vrenglon?>)" TYPE="checkbox" NAME="sel<?=trim($id_empresa);?>" value="<?=$id_empresa?>"></TD>

		<TD class="texto"><A class="linkbody"  HREF="empresaModificar.php?id=<?=$id_empresa?>"><?=$empresa?></A><BR><?=$vempresacorto?></TD>

		<TD class="texto"><?=$tipo?></TD>

		<TD class="texto"><?=$calle?><BR><?=$colonia?><BR><?=$ciudad?>, <?=$estado?>

		<BR><?=$telefono?>&nbsp;

		</TD>

		<TD class="texto" align="center"><?=$ordenemp?>&nbsp;</TD>


		<TD class="texto" align="center"><a href='empresaspasteles.php?idempresa=<?=$id_empresa.'&pasteles='.$permiso_pastel; ?>' >Asignar/Ver</a></TD>

	</TR>

	<?

$vrenglon++;

  }  // while ?>

</TABLE>	

	</TD>

</TR>

</FORM>

</TABLE>



	</TD>

</TR>

</TABLE>





<?

mysql_close();

	include 'pie.php';

?>