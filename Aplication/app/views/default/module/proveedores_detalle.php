<div id="main">


  <div id="content" class="page_module">
    <div class="row">

      <div class="col-lg-9">
        <div class="panel">
          <header class="panel-heading">
            <h3><strong>INFORMACIÓN</strong> DE LA EMPRESA </h3>
          </header>

          <div class="panel-body">
              <form name="frm_create" parsley-validate action="../../controller/crud_proveedores.controller.php" method="post">

              <?php

                require_once("../../conf.ini.php");
                require_once("../../model/class/proveedores.class.php");

                $row = Gestion_Proveedores::ReadbyID(base64_decode($_GET["pid"]));

              ?>

                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Código:</strong></label>
                          <span><?php echo $row[0];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Nit:</strong></label>
                          <span><?php echo $row[2];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Razón Social:</strong></label>
                          <span><?php echo $row[1];?></span>
                        </div>

                        <hr>
                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Representante Legal:</strong></label>
                          <span><?php echo $row[3];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Dirección:</strong></label>
                          <span><?php echo $row[4];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Pais:</strong></label>
                          <span><?php echo $row[5];?></span>
                        </div>


                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Municipio:</strong></label>
                          <span><?php echo $row[6]; ?></span>
                        </div>


                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Ciudad:</strong></label>
                          <span><?php echo $row[7];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Correo Electronico:</strong></label>
                          <span><?php echo $row[8];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">PBX:</strong></label>
                          <span><?php echo $row[9];?></span>
                          <label class="control-label"><strong class="text-primary">Ext:</strong></label>
                          <span><?php echo $row[10];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Fax:</strong></label>
                          <span><?php echo $row[11];?></span>
                        </div>

                        <div class="form-group">
                          <label class="control-label"><strong class="text-primary">Creado por:</strong></label>
                          <span><?php echo $row[17];?> El dia <?php echo $row[16];?></span>
                        </div>

                       <div class="form-group">
                          <a href="dashboard.php?m=<?php echo base64_encode("module/proveedores.php"); ?>&pagid=<?php echo base64_encode("PAG-100014");?>" class="btn btn-info btn-block ">Volver</a>
                       </div>
                    </div>
                  </div>

              </form>
          </div>

        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel">
          <header class="panel-heading">
            <h3><strong>INFORMACIÓN</strong> DEL CONTACTO </h3>
          </header>

          <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label"><strong class="text-primary">Contacto Directo:</strong></label>
                    <span><?php echo $row[12];?></span>
                  </div>

                  <div class="form-group">
                    <label class="control-label"><strong class="text-primary">Celular:</strong></label>
                    <span><?php echo $row[13];?></span>
                  </div>

                  <div class="form-group">
                    <label class="control-label"><strong class="text-primary">Terminos de Pago:</strong></label>
                    <span><?php echo $row[14];?></span>
                  </div>

                  <div class="form-group">
                    <label class="control-label"><strong class="text-primary">Observaciones:</strong></label>
                    <span><?php echo $row[15];?></span>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
