<?php require_once RUTA_APP. "/vistas/inc/heater.php";?>

	
<div class="container">
	<a class="btn btn-success" href="<?php echo RUTA_URL;?>/Paginas/VistaAgregar">Agregar</a>
</div>
	 <div class="container">
 <table class="table  table-striped table-bordered table-hover">
	  <tr >
	    <th>Id</th>
	    <th>Nombre</th>
	    <th>Apellido</th>
	     <th>Opciones</th>
	  </tr>
<?php
foreach ($datos['Personas'] as $per) {
echo <<<HTML
	  <tr>
	    <td>$per->id</td>
	    <td>$per->nombre</td>
	    <td>$per->apellido</td>
	    <td>
HTML;
	    ?>
	    	<a href="<?php echo RUTA_URL;?>/Paginas/VistaEditar/<?php echo $per->id; ?>/<?php echo $per->nombre; ?>/<?php echo $per->apellido; ?>" class="btn btn-warning"> Editar</a>
	    	<script type="text/javascript">
	    		function url($id){
	    		var confi=confirm("¿Esta Seguro de Eliminar este Dato?");
	    		if(confi){
	    			location.href="<?php echo RUTA_URL;?>/Paginas/Eliminar/"+$id;
	    		}
	    	}
	    	</script>
	    	<button  value="<?php echo $per->id; ?>" class="btn btn-danger" onclick="url(<?php echo $per->id; ?>);" id="Eliminar">Eliminar</button>
	    </td>
	  </tr>
<?php
}
?>
	</table> 
	</div>
<?php require_once RUTA_APP. "/vistas/inc/footer.php";?>