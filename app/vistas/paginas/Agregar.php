<?php require_once RUTA_APP. "/vistas/inc/heater.php";
       require_once RUTA_APP. "/librerias/Base.php";
?>

<div class="container">
<form>
    <div class="form-group">
      <label for="nom">Nombre:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="" required>
    </div>
	<div class="form-group">
      <label for="ape">Apellido:</label>
      <input type="text" class="form-control" id="apellido" placeholder="Apellido" value="" required>
    </div>

    <div class="form-group">
      <label for="ape">Archivo:</label>
      <input type="file" class="form-control" id="archivo" placeholder="Archivo"  required>
    </div>

  </form>
  <script type="text/javascript">
    function url(){
    var nom= document.getElementById("nombre").value;
    var ape= document.getElementById("apellido").value;
    var arch= document.getElementById("archivo").value;
    //var d=["ruta":arch]

      if(nom!="" && ape!="" && arch!=""){
        var confir= confirm("¿Esta seguro de agregar este usuario?");
        if(confir){
           <?php
            $con=new Base;
            $con->subir(arch);
          ?>
        location.href ="<?php echo RUTA_URL;?>"+"/Paginas/Agregar/"+nom+"/"+ape;
        }
      }else{
        alert("campos vacios")
      }
      }
  </script>
   <button  id="agregar" class="btn btn-success" onclick="url();">Agregar</button>
   <a class="btn btn-danger" href="<?php echo RUTA_URL;?>/Paginas/index">Cancelar</a>
</div>
<?php require_once RUTA_APP. "/vistas/inc/footer.php";?>