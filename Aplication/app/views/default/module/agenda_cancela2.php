<?php
require_once("../../../conf.ini.php");
require_once("../../../model/class/clientes.class.php");
require_once("../../../model/class/sedes.class.php");
require_once("../../../model/class/planes.class.php");
require_once("../../../model/class/agenda.class.php");

  $misede = $_REQUEST["misede"];
  $codcliente = $_REQUEST["cliid"];

  $cliente = Gestion_Clientes::ReadbyCC($codcliente);
  $sedes   = Gestion_Sedes::ReadbyID($_REQUEST["misede"]);
  $plan    = Gestion_Planes::ReadbyID($cliente[13]);
  $agenda  = Gestion_Agenda::ReadAllCitasNuevas($cliente[0]);

  if($cliente[0]==""){
    echo "<br/><div class='label bg-theme btn-block'>No hay ningún afiliado asociado a esa cédula</div>";
  }else{
?>
<form class="form-horizontal" action="" method="post" id="target">
      <input type="hidden" name="txt_cli_codigo" value="<?php echo $cliente[0];?>">
      <input type="hidden" name="txt_sed_codigo" value="<?php echo $misede;?>">
      <br/>
      <label class="control-label col-md-4" style="text-align: left;">Afiliado:</label>
      <div class="col-md-8 ">
        <input class="form-control" readonly value="<?php echo $cliente[3].' '.$cliente[4];?>">
      </div>
<br/>
<br/>
<br/>
      <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>Sala º</th>
                      <th>Fecha de la cita</th>
                      <th>Hora</th>
                      <th>Cancelar</th>
                  </tr>
              </thead>
              <tbody align="center">
                  <?php
                    foreach ($agenda as $cita) {
                      if($cita[5]>=13){
                        $meridiano = "pm";
                      }else{
                        $meridiano = "am";
                      }

                      $fecha_actual = date("Y-m-d");
                      $hora = date_create($cita[5]);
                      $horalimite = $cita[5] - 4;
                      $hora_actual=date('H:i:s');

                      if(($fecha_actual == $cita[3])and($hora_actual >= $horalimite)){
                        $accion = "- Ya no se puede cancelar - ";
                      }else{
                        $accion = "<a href='../../controller/crud_agenda.controller.php?btn_continue=cancelar&id=".$cita[0]."'><span class='fa fa-times'></span></a>";
                      }

                      if($cita[6]=="Cancelada"){
                        $accion = "- Cita cancelada - ";
                      }
                      echo "<tr style='background-color:<?php echo $cita[6]; ?>'>";
                        echo "<td>".$cita[3]."</td>";
                        echo "<td>".$cita[4]."</td>";
                        echo "<td>".date_format($hora, 'g:i')." ".$meridiano."</td>";
                        echo "<td>".$accion."</td>";
                      echo "</tr>";
                    }

                  ?>
              </tbody>
          </table>
      </div>

</form>

<?php
  }
?>
