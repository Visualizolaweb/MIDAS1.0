<?php
require_once("../../../conf.ini.php");
require_once("../../../model/class/localizacion.class.php");

$ciudades = Gestion_Localidad::Read_City_byState($_REQUEST["municipio"]);
?>

<select class="form-control" id="txt-ciudad" >
  <?php
    foreach($ciudades as $ciudad){
      echo "<option value='".$ciudad[0]."'>$ciudad[2]</option>";
    }
  ?>
</select>
