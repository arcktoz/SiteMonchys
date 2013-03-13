<? 
include "includes.php";
include "head.php";

?>
<SCRIPT LANGUAGE="JavaScript">

function cambiaDia(){
	//Month in javascript goes from 0 to 11
	dia=new Date(document.forma.ano2.value, document.forma.mes2.value-1, document.forma.dia2.value)

	document.forma.weekday.value=diasemana(dia.getDay()+"")
} // function cambiaDia()

function mes(id){
 switch (id){
		case "1": return "Enero"; break;
		case "2": return "Febrero";break;
		case "3": return "Marzo";break;
		case "4": return "Abril";break;
		case "5": return "Mayo";break;
		case "6": return "Junio";break;
		case "7": return "Julio";break;
		case "8": return "Agosto";break;
		case "9": return "Septiembre";break;
		case "10": return "Octubre";break;
		case "11": return "Noviembre";break;
		case "12": return "Diciembre";break;
  }	  //switch
}

function diasemana(id){
	switch(id){
		case "0": return "Domingo";break;
		case "1": return "Lunes"; break;
		case "2": return "Martes";break;
		case "3": return "Miercoles";break;
		case "4": return "Jueves";break;
		case "5": return "Viernes";break;
		case "6": return "Sabado";break;
	}
} // dia

function verifica(){
<? if ($s_m_tipo!="0") {   ?>

	if (document.forma.id_empresa.value=="0"){
		alert("Selecciona una Empresa");
		return false;
	} 
<? }  ?>

fecha=document.forma.dia2.value+" de "+mes(document.forma.mes2.value)+" del "+document.forma.ano2.value
agree=confirm("     ¿Deseas Enviar el Pedido?      \n\n               Para el\n\n"+document.forma.weekday.value+" "+fecha+"    ");
		if (agree)
			return true ;
		else
			return false;	
	
}

function suma(tecla){
var res=0;
var name="";
if (!isNaN(tecla.value)){
//  for (var i=0;i < document.getElementsByTagName("input").length; i++) {
  for (var i=0;i < 93; i++) {
		name=document.getElementsByTagName("input").item(i).name
		if (document.getElementsByTagName("input").item(i).type=="text"&&name.substr(0,4)=="cod_")
			if (document.getElementsByTagName("input").item(i).value!=""){
				res=res+parseInt(document.getElementsByTagName("input").item(i).value);
				//alert (document.forma.elements[i].value);
				//alert (document.getElementsByTagName("input").item(i).value);
			}
	} //for
	document.forma.total.value=res;
	} else {
		alert ("La Cantidad tiene que ser numerica (0 - 99)");
		tecla.value="";
		tecla.focus();
	}
} // function suma
</SCRIPT>
<SCRIPT LANGUAGE="VBScript">

<!--
Function isNum()
   character = window.event.keycode
   If character < 48 or character > 57 then
	  window.event.keycode=0
   End if
End function
-->

</SCRIPT>

<TABLE align=center>
   <form name="forma" method="POST" action="pedidoGuardar.php" onSubmit="return verifica();">
<TR>
	<TD class="mision" align=center height="30">Nuevo Pedido</TD>
</TR>
 <TR height="30">
 <td align="center">
  <table>
 <tr>
 	<TD class="rojo">El Pedido es para el:</TD>
	<TD class=""><INPUT TYPE="text" NAME="weekday" value="<?=dia(date("w",mktime(0,0,0,date("m"),date("j")+2,date("Y"))))?>" class="nobordertxt" maxlength="20" size="10" READONLY></TD>
 	<TD>
	<SELECT NAME="dia2" class="texto" onChange="cambiaDia();">
	<?
	$endosdias=mktime(date("g"),date("i"),date("s"),date("m"),date("d")+2,gmdate("Y"));
	 for ($x=1;$x<32;$x++)
		echo "<option value='$x'".selid($x,date("d",$endosdias)).">$x";
	?>
	</SELECT>
	</TD>
 	<TD>
	<SELECT NAME="mes2" class="texto" onChange="cambiaDia();">
	<?
	 for ($x=1;$x<13;$x++)
		echo "<option value='$x'".selid($x,date("m",$endosdias)).">".mes($x);
	?>
	</SELECT>
	
	</TD>
 	<TD>	
	<SELECT NAME="ano2" class="texto" onChange="cambiaDia();">
	<?
	 for ($x=2010;$x<=date("Y")+1;$x++)
		echo "<option value='$x'".selid($x,date("Y",$endosdias)).">$x";
	?>
	</SELECT></TD>
	
 </TR>	
	</table> 
	</TD>
 </TR>

<? if ($s_m_tipo!="0") {
 ?>
<TR>
	<TD class="titulo" align=center height="30">Empresa:
	<SELECT NAME="id_empresa" class="texto">
	<option value='0'>- Selecciona una Empresa -
	<?
	$SQL="SELECT * FROM empresa WHERE tipo<>3 ORDER BY empresa";	
$res =mysql_query($SQL); 
while ($cur=mysql_fetch_object($res))
	echo "<option value='$cur->id_empresa'>$cur->empresa";
 
	?>
	
	</SELECT>
	
	</TD>
</TR>
<? } ?>
<TR>
	<TD align=center>
	<?
$pastelesin = $_SESSION['permiso_pastel'];
if ($s_m_tipo!="0" )
		$SQL="SELECT producto.id_producto, producto, codigo, orden, precio_local, precio_foraneo FROM producto Where pedido=1 AND producto.id_producto not in (SELECT id_producto From  usu_art_ex WHERE id_usuario=$s_m_id_usuario) Order by codigo";	
else 
	$SQL ="SELECT * from producto WHERE id_producto IN($pastelesin)  Order by codigo";

$res =mysql_query($SQL);
?>
<TABLE cellspacing="0" cellpadding="0" border=1 bordercolor="#00725e" width="600">
 <TR>
	<TD class=titulo align="center">Artículo</TD>
	<TD class=titulo align="center">Descripción</TD>
	<TD class=titulo align="center">Cant</TD>

</TR> 
<?
$x=0;
$bandera=0;
$pasopasteles=0;
while($cur=mysql_fetch_object($res)){ 
	$x++;
	$codigo=$cur->codigo;
	$id_producto=$cur->id_producto;
	$producto=$cur->producto;
	$orden=$cur->orden;

	if ($codigo=="03031004") {
		$pasopasteles=1;
		?>
		
	</table>
	</td>
	</tr>
	<TR>
		<TD class="texto" align="center">
		<TABLE cellpadding="2" cellspacing="0" border="1" bordercolor="#00725e" width="300">
		<TR>
			<TD class="textotable" align="right" width="230" bgcolor="#00725e">
			TOTAL PASTELES:&nbsp;&nbsp;&nbsp;</TD>
			<TD class="texto" align="center">&nbsp;
			<INPUT class="border0" value="0" TYPE="text" NAME="total" size="3" id="total" READONLY>
			</TD>
		</TR>
		</TABLE>
		</TD>
	</TR>
	   <tr>
	   <td align="center">
<TABLE cellspacing=0 cellpadding="0" border=1 bordercolor="#00725e" width="600">
	
	<?	}  ?>
	 <TR>
	<TD class="texto" align="center"><?=$codigo;?>&nbsp;</TD>
	<TD class="texto"><?=$producto?>&nbsp;</TD>
	<TD class="texto" align="center">
		<? if ($pasopasteles){ ?>
		<INPUT onKeyPress="isNum()" size="3" TYPE="text" NAME="cod_<?=$id_producto?>" maxlength="3">
		<? }else{ ?>
		<INPUT onKeyUp="suma(this)" size="3" TYPE="text" id="cod_<?=$id_producto?>" NAME="cod_<?=$id_producto?>" maxlength="3">
		<? } ?>
	</TD>
	</TR>
<?

	/*
	if ($bandera++){
		$bandera=0;
		echo "</TR><TR>";
	} // if bandera
	  */
		
	}  //while
?>
</table>
<TABLE cellspacing=0 cellpadding="0" border=0 bordercolor="#00725e" width="300">
<TR>
	<TD class="titulo" height="40">Observaciones:

	</TD>
</TR>

<TR>
	<TD align="center" class="titulo">
		<TEXTAREA NAME="observaciones" ROWS="5" COLS="40" class="texto"></TEXTAREA>
	</TD>
</TR>

<TR>
	<TD height="50" align=center>
	<INPUT TYPE="button" class="boton" value="Cancelar" onclick="javascript:history.back(1)">
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<INPUT TYPE="submit" value="Enviar Pedido" class="boton">
	</TD>
</TR>
  	<INPUT TYPE="hidden" name="guardar" value="nuevo">

</FORM>
</table>

	</TD>
</TR>
</TABLE>
<? include "pie.php"; 
mysql_close();
?>