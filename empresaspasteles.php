<?

include 'includes.php';
$arregloPastel = explode(',', $_GET['pasteles']);


 if ($s_m_tipo!="1") 

    header ("location:admin.php");



include 'head.php';

?>
<style>
	/*ESTILOS PARA TABLA ZEBRA*/
/*
	.listaPasteles {
		text-align: left;
		background: rgba(123,40,0, .7);
		/*border: 1px solid silver;*/
		/*color:white;
		text-transform: uppercase;
	}

	.renglon:nth-child(2n+1) {		
		background-color: rgb(166, 206, 57);
		color:#7b2800
		
	}
*/
	.bordes{

		border:1px solid #7b2800;
	}
</style>

<!--
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

	

	</SCRIPT> -->

<div>
	<p style="font-size:16px; text-align:center">Selecciona los art&iacute;culos a mostrar en la lista de pedidos para esta franquicia</p>
	<p></p>
	
	<div style='margin:38px 0 0 300px; float:left; width:200px;'><? include "configuracionMenu.php"; ?></div>
	<div style='float:left; padding-top:10px; width:700px'>

<input type="button" style="margin:0 0 15px 355px" value="Seleccionar Todos" onclick="checkedAll(); "/>
<form name="frm1" id="frm1" action="addpasteles.php" method="POST">					
	<table class="listaPasteles">

			<?
				$SQL="SELECT producto.id_producto, producto, codigo, orden, precio_local, precio_foraneo FROM producto Where pedido=1  Order by codigo";	
				$res =mysql_query($SQL);

				$x=0;
				$bandera=0;
				$pasopasteles=0;
				while($cur=mysql_fetch_object($res)): 
					$x++;
					$codigo=$cur->codigo;
					$id_producto=$cur->id_producto;
					$producto=$cur->producto;
					$orden=$cur->orden;
			?>
						<tr class="renglon">
							<td class="bordes">
								<p><?=$codigo;?></p>
							</td>

							<td class="bordes">
								<p><?=$producto;?></p>
							</td>
							<td class="bordes">
								<input id='pastel_<?=$id_producto;?>' type="checkbox" name="optionpastel[]" value="<?=$id_producto;?>" <?php if (in_array($id_producto, $arregloPastel)): ?>checked <?php endif; ?>>
							</td>
						</tr>

		<?php  endwhile; ?>

							</table>

					<input type="hidden" name="id" value="<?=$_GET['idempresa'];?>">
					<input  style="margin:20px 0 0 420px" type="submit" value="Asignar">

				</form>


	</div>

<div style="clear:both"></div>

</div>


<!--        copyright of arturo         -->
<script type="text/javascript">
checked=false;
function checkedAll (frm1) {
	var aa= document.getElementById('frm1');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
      }
</script>



<div>
<?

mysql_close();

	include 'pie.php';

?>

</div>

