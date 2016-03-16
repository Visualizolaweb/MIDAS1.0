<div id="main">
<!--
  <ol class="breadcrumb">
    <li><a href="dashboard.php">Inicio</a></li>
    <li><a href="dashboard.php?m=<?php echo base64_encode("configuracion");?>">Configuración</a></li>
    <li><a href="dashboard.php?m=<?php echo base64_encode("impuestos");?>">Gestionar Impuestos</a></li>
    <li class="active">Nuevo Impuesto</li>
  </ol>
-->

  <div id="content" class="page_module">
    <div class="row">
      <div class="col-lg-7">
        <div class="panel">
          <header class="panel-heading">
            <h3><strong>CREAR</strong> UN NUEVO IMPUESTO </h3>
          </header>

          <div class="panel-body">
              <form name="frm_create" parsley-validate action="../../controller/crud_impuestos.controller.php" method="post">

              <?php

                // Crear el código
                require_once("../../model/class/codigopk.class.php");

                $unique_code = Codigo_PK::GenerarCodigo("imp_codigo","ges_impuestos","IMP");

              ?>


                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Código</label>
                          <input name="txt_imp_codigo" type="text" class="form-control" readonly value="<?php echo $unique_code;?>">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Nombre del Impuesto</label>
                          <input name="txt_imp_nombre"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                       <div class="row">

                        <div class="col-md-9">
                        <div class="form-group">
                          <label class="control-label">Tipo de Impuesto</label>
                          <select  name="txt_imp_tipo_impuesto"  class="form-control">
                              <option value="IVA">IVA</option>
                              <option value="ICO">ICO</option>
                              <option value="OTRO">Otro tipo de impuesto</option>
                          </select>
                        </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="control-label">Porcentaje</label>

                           <div class="input-group">
                              <input name="txt_imp_porcentaje" type="text" class="form-control" parsley-trigger="change" placeholder="0.00" parsley-required="true">
                              <span class="input-group-addon">%</span>
                           </div>
                          </div>
                        </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Descripción <span>(Opcional)</span></label>
                          <textarea  name="txt_imp_descripcion" class="form-control" rows="5" maxlength="225" data-always-show="true"  data-position="bottom-right"  ></textarea>
                        </div>



                        <div class="form-group">
                          <div>El registro se va a guardar con la fecha: <span class="label bg-inverse"> <?php echo substr($hoy,0,10); ?></span></div>
                        </div>

                       <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block" name="btn_continue" value="guardar">Guardar Impuesto</button>
                          <a href="dashboard.php?m=<?php echo base64_encode("module/impuestos.php");?>&pagid=<?php echo base64_encode("PAG-100011");?>" class="btn btn-info btn-block ">Cancelar</a>
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
              require_once("../../model/class/impuestos.class.php");

              $row = Gestion_Impuestos::ReadLastItem();
          ?>
          <div class="well bg-theme">
            <p><strong>Código: &nbsp;</strong><?php echo $row[0];?></p>
  		  </div>
          <div class="textpanel">
            <div><strong>Nombre Impuesto: &nbsp;</strong><?php echo $row[1];?></div><hr>
            <p><strong>Tipo de Impuesto: &nbsp;</strong><?php echo $row[2];?></p><hr>

            <p><strong>Porcentaje: &nbsp;</strong><?php echo $row[3];?>%</p><hr>

            <p><strong>Descripción: &nbsp;</strong><?php echo $row[4];?>%</p><hr>
            <p><strong>Autor: &nbsp;</strong><?php echo $row[5];?></p><hr>

            <p><strong>Fecha y hora de Creación: &nbsp;</strong><?php echo $row[6];?></p>
			  <?php if($row_permiso["per_U"]==1){ ?>
            		<a href='dashboard.php?m="<?php echo base64_encode("impuestos_editar"); ?>"&pid="<?php echo base64_encode($row[0]); ?>"'class="btn btn-inverse btn-block">Editar Registro</a>
			  <?php } ?>
		  </div>
        </div>

      </div>
    </div>
  </div>

</div>
