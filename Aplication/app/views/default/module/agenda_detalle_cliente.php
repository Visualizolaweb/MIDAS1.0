<?php
require_once("../../../conf.ini.php");
require_once("../../../model/class/clientes.class.php");
require_once("../../../model/class/sedes.class.php");
require_once("../../../model/class/planes.class.php");
require_once("../../../model/class/agenda.class.php");

  $misede = $_REQUEST["misede"];
  $age_codigo = $_REQUEST["id"];

  $agenda  = Gestion_Agenda::Readbyid($age_codigo);
  $cliente = Gestion_Clientes::ReadbyID($agenda["cli_codigo"]);
  $sedes   = Gestion_Sedes::ReadbyID($_REQUEST["misede"]);
  $plan    = Gestion_Planes::ReadbyID($cliente[13]);


  $citas_programadas = Gestion_Agenda::CountCitas($cliente["cli_codigo"]);
  $citas_canceladas = Gestion_Agenda::CountCitasCanceladas($cliente["cli_codigo"]);

  if($cliente[0]==""){
    echo "<br/><div class='label bg-theme btn-block'>No hay ningún afiliado asociado a esa cédula</div>";
  }else{
?>
<form class="form-horizontal" action="../../controller/crud_agenda.controller.php" method="post" id="target">
  <input type="hidden" name="txt_cli_codigo" value="<?php echo $cliente[0];?>">
  <input type="hidden" name="txt_sed_codigo" value="<?php echo $misede;?>">
  <input type="hidden" name="txt_color_cita" value="<?php echo $plan["pla_color"];?>">
  <input type="hidden" name="txt_cli_plan" value="<?php echo $cliente[13];?>">
  <input type="hidden" name="txt_age_sala" value="1">
  <br/>
<div class="row">
  <div class="col-md-6">
  <?php
    // Compruebo que existe la foto
      $foto_cliente = $cliente["cli_foto"];

  ?>
  <img src="<?php echo "../".$foto_cliente?>" class="img-rounded avatar">
</div>


<div class="col-md-6">
  <div class="form-group">
    <label class="control-label">Nombre:</label>

      <p><?php echo $cliente[3].' '.$cliente[4];?></p>


        <label class="control-label"><?php echo $cliente[1] ?>:</label>

          <p><?php echo $cliente[2];?></p>

    <label class="control-label" >Contacto:</label>
      <p><?php
            if($cliente["cli_telefono"]!=""){
              echo "Teléfono: ".$cliente["cli_telefono"]."</br>";
            }

            if($cliente["cli_celular"]!=""){
              echo "Celular: ".$cliente["cli_celular"]."</br>";
            }
      ?>
       Email: <?php echo $cliente["cli_email"];?></p>


           <label class="control-label" >Historico de citas:</label>
           <?php echo ($citas_programadas[0]-1); ?><br>

           <label class="control-label">Citas Canceladas:</label>
           <?php echo $citas_canceladas[0]; ?>
  </div>


</div>
</div>

<div class="row">
  <div class="col-md-10 col-md-offset-1">

  <div class="form-group">
    <div class="col-md-8 ">
    </div>
  </div>


  <div class="form-group">
    <label class="label label-default">Plan: <?php echo $plan["pla_nombre"]?></label>
      <label class="label label-primary">Citas para programar: <?php echo ($cliente["cli_credito"]-$plan["pla_cupo"]);?></label>

  </div>
</div>
</div>
</form>

<?php
  }
?>
