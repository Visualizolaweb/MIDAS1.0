<div id="main">

  <div id="content" class="page_module">
    <div class="row">

      <div class="col-lg-2"></div>

      <div class="col-lg-7">
        <div class="panel">
          <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
            <h3><strong>DETALLE</strong> DEL INBODY </h3>
          </header>

          <div class="panel-body">
              <form name="frm_create" parsley-validate action="../../controller/crud_inbody.controller.php" method="post">

              <?php

                require_once("../../conf.ini.php");
                require_once("../../model/class/inbody.class.php");
                $row = Gestion_inbody::ReadbyID(base64_decode($_GET["pid"]));

              ?>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Código InBody:</strong></label>
                          <span><?php echo $row[1];?></span>
                        </div>

                        
                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Nombre Cliente:</strong></label>
                          <span><?php echo $row[2];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Edad:</strong></label>
                          <span><?php echo $row[3];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Altura (cms):</strong></label>
                          <span><?php echo $row[4];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Sexo:</strong></label>
                          <span><?php echo $row[6];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Peso (kls):</strong></label>
                          <span><?php echo $row[5];?></span>
                       </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Tasa Metabólica Básica(TMB)-(Kcal):</strong></label>
                          <span><?php echo $row[7];?></span>
                       </div>

                       <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Porcentaje de Grasa Corporal(PGC)-(%):</strong></label>
                          <span><?php echo $row[8];?></span>
                       </div>

                       <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Dieta:</strong></label>
                          <span><?php echo $row[9];?></span>
                       </div>

                       <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Fecha del Inbody:</strong></label>
                          <span><?php echo $row[11];?></span>
                       </div>
                       <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Patologías:</strong></label>
                          <span><?php echo $row[10];?></span>
                       </div>

                    </div>

                       
                       <div class="form-group">
                          <a href="dashboard.php?m=<?php echo base64_encode("module/inbody.php");?>&pagid=<?php echo base64_encode("PAG-100051"); ?>" class="btn btn-primary btn-block ">Volver</a>
                       </div>
                    </div>
                  

              </form>
          </div>

        </div>
      </div>
      <div class="col-lg-2"></div>

    </div>
  </div>

</div>
