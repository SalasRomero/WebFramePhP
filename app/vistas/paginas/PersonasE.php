<?php require_once RUTA_APP. "/vistas/inc/heater.php";?>

<div class="container">
<form>
    <div class="form-group">
      <label for="email">ID:</label>
      <input type="text" class="form-control" id="id" value="<?php echo $datos["id"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="nom">Nombre:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $datos["nombre"]; ?>" required>
    </div>
	<div class="form-group">
      <label for="ape">Apellido:</label>
      <input type="text" class="form-control" id="apellido" placeholder="Apellido" value="<?php echo $datos["apellido"]; ?>" required>
    </div>

  </form>

  <script type="text/javascript">
  	function url(){
      var id=document.getElementById("id").value;
      var nom=document.getElementById("nombre").value;
      var ape=document.getElementById("apellido").value;
      if(nom!="" && ape!=""){
          var confir=confirm("¿Esta seguro de guardar los cambios?");
      if(confir){
        location.href="<?php echo RUTA_URL;?>"+"/Paginas/Editar/"+id+"/"+nom+"/"+ape;
      }

      }else{
        alert("Campos vacios");
      }
  	}
  </script>
   <button type="submit" class="btn btn-success" onclick="url();">Editar</button>
   <a class="btn btn-danger" href="<?php echo RUTA_URL;?>/Paginas/index">Cancelar</a>
</div>
<?php require_once RUTA_APP. "/vistas/inc/footer.php";?>