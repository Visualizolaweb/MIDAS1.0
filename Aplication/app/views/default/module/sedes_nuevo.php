<div id="main">


  <div id="content" class="page_module">
    <div class="row">
      <div class="col-lg-7">
        <div class="panel">
          <header class="panel-heading">
            <h3><strong>CREAR</strong> UN LABORATORIO</h3>
          </header>

          <div class="panel-body">
              <form name="frm_create" parsley-validate action="../../controller/crud_sedes.controller.php" method="post">   

              <?php

                // Crear el código
                require_once("../../model/class/codigopk.class.php");

                $unique_code = Codigo_PK::GenerarCodigo("sed_codigo","ges_sedes","SED");

              ?>




                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Código</label>
                          <input name="txt_sed_codigo" type="text" class="form-control" readonly value="<?php echo $unique_code;?>">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Nombre de la Sede</label>
                          <input name="txt_sed_nombre"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Teléfono</label>
                            <input name="txt_sed_telefono"  type="text" class="form-control"  parsley-type="phone" parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Email <span>(Opcional)</span></label>
                            <input name="txt_sed_email"  type="text" class="form-control" parsley-type="email" parsley-trigger="change">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Dirección</label>
                            <input name="txt_sed_direccion"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">País </label>
                            <input name="txt_sed_pais"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Departamento </label>
                            <input name="txt_sed_departamento"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Ciudad   </label>
                            <input name="txt_sed_ciudad"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Abierto desde: </label>
                            <input name="txt_sed_horainicio"  type="text" class="form-control" parsley-trigger="change">
                        </div>

                          <div class="form-group">
                          <label class="control-label">Hasta:   </label>
                            <input name="txt_sed_horacierre"  type="text" class="form-control" parsley-trigger="change">
                        </div>

                        <div class="form-group">
                          <div>El registro se va a guardar con la fecha: <span class="label bg-inverse"> <?php echo substr($hoy,0,10); ?></span></div>
                        </div>

                       <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block" name="btn_continue" value="guardar">Guardar el laboratorio</button>
                          <a href="dashboard.php?m=<?php echo base64_encode("module/sedes.php");?>&pagid=<?php echo base64_encode("PAG-100015");?>" class="btn btn-info btn-block ">Volver</a>
                       </div>
                    </div>
                  </div>

              </form>
          </div>

        </div>
      </div>

      <div class="col-lg-5">
        <div class="panel">
          <header class="panel-heading">
            <h3><STRONG>ULTIMO</STRONG> REGISTRO GUARDADO</h3>
          </header>

          <?php

              require_once("../../conf.ini.php");
              require_once("../../model/class/sedes.class.php");

              $row = Gestion_Sedes::ReadLastItem();
          ?>
          <div class="well bg-theme">
            <p><strong>Código: &nbsp;</strong><?php echo $row[0];?></p>
  		  </div>
          <div class="textpanel">
            <div><strong>Sede: &nbsp;</strong><?php echo $row[1];?></div><hr>
            <p><strong>Telefono: &nbsp;</strong><?php echo $row[2];?></p><hr>

            <p><strong>Ciudad: &nbsp;</strong><?php echo $row[7];?></p><hr>

            <p><strong>Autor: &nbsp;</strong><?php echo $row[10];?></p><hr>

            <p><strong>Fecha y hora de Creación: &nbsp;</strong><?php echo $row[9];?></p>

            <a href='dashboard.php?m="<?php echo base64_encode("module/sedes_editar.php"); ?>"&pid="<?php echo base64_encode($row[0]); ?>"'class="btn btn-inverse btn-block">Editar Registro</a>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
