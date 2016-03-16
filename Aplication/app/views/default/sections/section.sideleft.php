<div id="nav">
  <div id="nav-scroll">

    <div class="avatar-slide">
      <span class="easy-chart avatar-chart" data-color="theme-warning" data-percent="100" data-track-color="rgba(148,214,10,0.5)" data-line-width="5" data-size="118">
			<img alt="" src="assets/img/avatar.jpg" class="img-circle">
	  </span>

      <div class="avatar-detail">
          <p><strong>Hola</strong>, <?php echo $once_name[0];?></p>

      <span>
        <?php
          require_once("../../model/class/clientes.class.php");
          $afiliados = Gestion_Clientes::Numafiliados();

          if($afiliados[0] < 1){
            echo "Aun no hay afiliados en este lab";
          }else{
            echo "Este lab cuenta con ".$afiliados[0]." afiliado(s)";
          }
        ?>
      </span>
      </div>

      <div class="avatar-link btn-group btn-group-justified">
          <a class="btn" href="#"  title="Configurar mi cuenta"><i class="fa fa-briefcase"></i></a>
          <a class="btn"  data-toggle="modal" href="#md-notification" title="Ultimas Notificaciones"><i class="fa fa-bell-o"></i><em class="green"></em></a>
          <a class="btn"  data-toggle="modal" href="#md-messages"  title="Mensajes"><i class="fa fa-envelope-o"></i><em class="active"></em></a>
		  <a class="btn" href="#menu-right" title="Visitas de hoy"><i class="fa fa-book"></i></a>
      </div>
    </div>

    <div class="widget-collapse dark">
		<header>
			<a data-toggle="collapse" href="#collapseSummary"><i class="collapse-caret fa fa-angle-down"></i>
              Saldo(s) del laboratorio
            </a>
		</header>

        <section class="collapse out" id="collapseSummary">
            <div class="collapse-boby" style="padding:0">
              <?php
                $finanzas_sede = Gestion_Home::Finanzas_Sede($_usu_sed_codigo);

                foreach ($finanzas_sede as $row) {
                  if($row["fin_tipo_cuenta"] != "Efectivo"){
                    $cuenta = "Cuenta ".$row["ban_banco"]."<br> <span style='color:#e2e2e2'> # ".$row["fin_numero_cuenta"]." (".$row["fin_tipo_cuenta"].")</span>";
                  }else{
                    $cuenta = $row["ban_banco"]." (".$row["fin_tipo_cuenta"].")";
                  }
                  echo "<div class='widget-mini-chart align-xs-left'>
                          <p style='color:#a3f607'>".$cuenta."</p>
                          <h4>$ ".number_format($row["fin_saldo"])."</h4>
                        </div>";
                }
              ?>
            </div>
        </section>

    </div>

    <div class="widget-collapse dark">
        <header>
                <a data-toggle="collapse" href="#collapseSummary2"><i class="collapse-caret fa fa-angle-down"></i>
                 Ingresos de la franquicia<br>
                </a>
        </header>

        <section class="collapse out" id="collapseSummary2">
            <div class="collapse-boby" style="padding:0">
              <div class='widget-mini-chart align-xs-left'>
                <small> Total de ingresos de todos los laboratorios que tiene la franquicia</small>
              </div>
              <?php
                $finanzas_franquicia = Gestion_Home::Finanzas_Franquicia($_emp_codigo);

                foreach ($finanzas_franquicia as $row) {

                  echo "<div class='widget-mini-chart align-xs-left'>
                          <h4>$ ".number_format($row["total"])."</h4>
                        </div>";
                }
              ?>

            </div>
        </section>

    </div>
  </div>
</div>
