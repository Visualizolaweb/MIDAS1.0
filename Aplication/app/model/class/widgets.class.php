<?php
class Gestion_Widgets{


  // Widget para saber el numero de afiliados de cada sede

  function Numafiliados($sede){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT COUNT(*) FROM ges_clientes WHERE ges_sedes_sed_codigo = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($sede));

    $result = $query->fetch(PDO::FETCH_BOTH);
    $promedio =  round($result[0] / 12,1);

    // Construccion del Widget
    echo '
    <div class="widget-tile">
       <section>
        <h5><strong>AFILIADOS EN EL</strong> LABORATORIO </h5>
        <h2>'.$result[0].'</h2>

        <div class="progress progress-xs progress-white progress-over-tile">
          <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="'.$promedio.'" aria-valuemax="20000"></div>
        </div>

        <label class="progress-label label-white">Hay un promedio de '.$promedio.' afiliados por mes</label>
       </section>

       <div class="hold-icon"><i class="fa fa-users"></i></div>
    </div>';

    MIDAS_DataBase::Disconnect();
  }

  // Widget para saber el numero de afiliados de la franquicia

  function Numafiliadosbycomp($empresa){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT COUNT(*) FROM ges_clientes inner join ges_sedes on ges_clientes.ges_sedes_sed_codigo = ges_sedes.sed_codigo inner join ges_empresa on ges_sedes.ges_empresa_emp_codigo = ges_empresa.emp_codigo WHERE ges_sedes.ges_empresa_emp_codigo = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($empresa));

    $result = $query->fetch(PDO::FETCH_BOTH);
    $promedio =  round($result[0] / 12,1);

    // Construccion del Widget
    echo '
    <div class="widget-tile">
       <section>
        <h5><strong>AFILIADOS EN LA</strong> FRANQUICIA </h5>
        <h2>'.$result[0].'</h2>

        <div class="progress progress-xs progress-white progress-over-tile">
          <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="'.$promedio.'" aria-valuemax="20000"></div>
        </div>

        <label class="progress-label label-white">Hay un promedio de '.$promedio.' afiliados por mes</label>
       </section>

       <div class="hold-icon"><i class="fa fa-users"></i></div>
    </div>';


    MIDAS_DataBase::Disconnect();
  }


  // Widget para saber el numero de traslados al mes
  function Trasladosdesdelasede($sede,$hoy){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT COUNT(*) FROM ges_traslados WHERE tra_laborigen = ? AND MONTH(?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($sede,$hoy));

    $result = $query->fetch(PDO::FETCH_BOTH);
    $promedio =  round($result[0] / 12,1);

    // Construccion del Widget
    echo '
    <div class="widget-tile">
       <section>
        <h5><strong>SOLICITUD DE</strong> TRASLADOS </h5>
        <h2>'.$result[0].'</h2>

        <div class="progress progress-xs progress-white progress-over-tile">
          <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="100" aria-valuemax="100"></div>
        </div>

        <label class="progress-label label-white">Afiliados que solicitaron traslado hacia otro laboratorio</label>
       </section>

       <div class="hold-icon"><i class="fa fa-share"></i></div>
    </div>';


    MIDAS_DataBase::Disconnect();
  }

  // Widget para saber los ingresos del mes
  function Ingresosbysede($sede){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT sum(pag_valor), monthname(pag_fechapag) FROM `ges_pagos` INNER JOIN ges_factura ON ges_facturas_fac_codigo = fac_codigo WHERE ges_sedes_sed_codigo = ? group by month(pag_fechapag)";
    $query = $pdo->prepare($sql);
    $query->execute(array($sede));

    $result = $query->fetchALL(PDO::FETCH_BOTH);

    return $result;
    MIDAS_DataBase::Disconnect();
    }

    // Widget para saber los usuarios que se les va a vencer el plan
    function precioplanes($ciudad_sede){

      $pdo = MIDAS_DataBase::Connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM  ges_planes JOIN ges_ciudades ON pla_ciudad = ciu_codigo WHERE ciu_codigo = ?";
      $query = $pdo->prepare($sql);
      $query->execute(array($ciudad_sede));

      $result = $query->fetchALL(PDO::FETCH_BOTH);

      return $result;
      MIDAS_DataBase::Disconnect();
      }
  // function DineroCaja($sede){
  //   $pdo = MIDAS_DataBase::Connect();
  //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   $sql = "SELECT ban_banco, fin_saldo, fin_tipo_cuenta, fin_numero_cuenta FROM ges_finanzas
  //             INNER JOIN ges_banco ON ban_codigo = fin_banco
  //             INNER JOIN ges_sedes ON sed_codigo = fin_sede
  //             WHERE fin_sede = ? AND fin_tipo_cuenta = 'Caja Menor' ";
  //
  //   $query = $pdo->prepare($sql);
  //   $query->execute(array($sede));
  //
  //
  //
  //   <div class="panel-group" id="accordion">
  //         <div class="panel panel-shadow">
  //             <header class="panel-heading" style="padding:0 10px">
  //             <a data-toggle="collapse" data-parent="#accordion" href="#accordionOne"><i class="collapse-caret fa fa-angle-up"></i> Accordion  Item #1</a>
  //             </header>
  //             <div id="accordionOne" class="panel-collapse collapse in">
  //              <div class="panel-body">
  //                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
  //              </div>
  //                <!-- //panel-body -->
  //               </div>
  //               <!-- //panel-collapse -->
  //         </div>
  //         <!-- //panel -->
  //
  //         <div class="panel panel-shadow">
  //             <header class="panel-heading" style="padding:0 10px">
  //             <a data-toggle="collapse" data-parent="#accordion" href="#accordionTwo"><i class="collapse-caret fa fa-angle-down"></i> Accordion Item #2</a>
  //             </header>
  //             <div id="accordionTwo" class="panel-collapse collapse">
  //              <div class="panel-body">
  //                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
  //              </div>
  //                <!-- //panel-body -->
  //               </div>
  //               <!-- //panel-collapse -->
  //         </div>
  //         <!-- //panel -->
  //
  //         <div class="panel panel-shadow">
  //             <header class="panel-heading" style="padding:0 10px">
  //             <a data-toggle="collapse" data-parent="#accordion" href="#accordionThree"><i class="collapse-caret fa fa-angle-down"></i> Accordion Item #3</a>
  //             </header>
  //               <div id="accordionThree" class="panel-collapse collapse">
  //                <div class="panel-body">
  //                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
  //                </div>
  //                <!-- //panel-body -->
  //               </div>
  //               <!-- //panel-collapse -->
  //         </div>
  //         <!-- //panel -->
  //   </div>
  // }
}
?>
