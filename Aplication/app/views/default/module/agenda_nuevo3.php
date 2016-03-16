<?php
require_once("../../../conf.ini.php");
require_once("../../../model/class/clientes.class.php");
require_once("../../../model/class/sedes.class.php");
require_once("../../../model/class/planes.class.php");

  $misede = $_REQUEST["misede"];
  $codcliente = $_REQUEST["cli_codigo"];

  date_default_timezone_set('America/Bogota');
  $fecha_actual = date("Y-m-d");
  $fecha = $_REQUEST["fechini"];
  $hora_actual=date('H:i:s');

  $mes = $fecha[4].$fecha[5].$fecha[6];
  $ano = $fecha[11].$fecha[12].$fecha[13].$fecha[14];
  $dia = $fecha[8].$fecha[9];
  $hora = $fecha[16].$fecha[17].$fecha[18].$fecha[19].$fecha[20].$fecha[21].$fecha[22].$fecha[23];
  $nuevo_mes = date_create($mes);
  $mes = date_format($nuevo_mes, 'm');

  $nueva_fecha = "$ano-$mes-$dia";

  if(($fecha_actual > $nueva_fecha) or (($fecha_actual == $nueva_fecha) and ($hora_actual > $hora))){
    echo "Lo sentimos, no se puede crear una cita para una fecha anterior.";
  }else{


  $cliente = Gestion_Clientes::ReadbyCC($codcliente);
  $sedes   = Gestion_Sedes::ReadbyID($_REQUEST["misede"]);
  $plan    = Gestion_Planes::ReadbyID($cliente[13]);

  
?>

<form class="form-horizontal" action="../../controller/c_agenda.controller.php" method="post" id="target">
      <input type="hidden" name="txt_cli_codigo" value="<?php echo $cliente[0];?>">
      <input type="hidden" name="txt_sed_codigo" value="<?php echo $misede;?>">
      <input type="hidden" name="txt_color_cita" value="<?php echo $plan["pla_color"];?>">
      <input type="hidden" name="txt_cli_plan" value="<?php echo $cliente[13];?>">
      <input type="hidden" name="txt_age_sala" value="1">

      <div class="form-group">
        <label class="control-label col-md-4" style="text-align: left;">Afiliado:</label>
        <div class="col-md-8 ">
          <p class="form-control"><?php echo $cliente[3].' '.$cliente[4];?></p>
          <input class="form-control" type="hidden" value="<?php echo $cliente[3].' '.$cliente[4];?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-4" style="text-align: left;">Plan:</label>
        <div class="col-md-8 ">
          <p class="form-control"><?php echo $plan["pla_nombre"];?></p>
          <input class="form-control" type="hidden" value="<?php echo $cliente[3].' '.$cliente[4];?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-4" style="text-align: left;">Sede:</label>
        <div class="col-md-8 ">
          <p class="form-control"><?php echo $sedes[2];?></p>
          <input  class="form-control" readonly  type="hidden" id="misede" value="<?php echo $sedes[2];?>">
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-md-4" style="text-align: left;">Fecha de la cita:</label>
        <div class="col-md-8 ">
          <input type="date" name="txt_fech_fin" readonly class="form-control" value="<?php echo $nueva_fecha; ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-4" style="text-align: left;">Hora de la cita:</label>
        <div class="col-md-8 ">
          <input type="time" name="txt_hora"  readonly class="form-control" value="<?php echo $hora; ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-4" style="text-align: left;">Tipo de Usuario:</label>
        <div class="col-md-8 ">
          <p class="form-control"><?php echo $cliente["tipo_usuario"] ?></p>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-4" style="text-align: left;">Citas x programar:</label>
        <div class="col-md-8 " >
          <p ><?php echo $cliente["cli_credito"];  ?></p>
        </div>
      </div>

<br/>
<br/>
<div class="col-md-12 ">
      <div class="align-md-right">
          <button class="btn btn-primary" name="btn_continue" value="crear">Crear cita</button>
          <button type="button" data-dismiss="modal" class="btn btn-inverse">Cancelar</button>
      </div>
</div>
</form>

<?php
  }
?>
