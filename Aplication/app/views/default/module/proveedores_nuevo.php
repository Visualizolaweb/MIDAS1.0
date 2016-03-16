<div id="main">


  <div id="content" class="page_module">
    <div class="row">
      <div class="col-lg-7">
        <div class="panel">
          <header class="panel-heading">
            <h3><strong>CREAR</strong> UN NUEVO PROVEEDOR </h3>
          </header>

          <div class="panel-body">
              <form name="frm_create" parsley-validate action="../../controller/crud_proveedores.controller.php" method="post">

              <?php

                // Crear el código
                require_once("../../model/class/codigopk.class.php");

                $unique_code = Codigo_PK::GenerarCodigo("pro_codigo","ges_proveedores","PRO");

              ?>

                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Código</label>
                          <input name="txt_pro_codigo" type="text" class="form-control" readonly value="<?php echo $unique_code;?>">
                        </div>


                        <div class="form-group">
                          <label class="control-label">Nit</label>
                          <input name="txt_pro_nit" type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Razón Social</label>
                          <input name="txt_pro_nombre" type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Representante Legal</label>
                          <input name="txt_pro_representante" type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Dirección</label>
                          <input name="txt_pro_direccion" type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Pais</label>
                          <input name="txt_pro_pais" type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Municipio</label>
                          <input name="txt_pro_municipio" type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Ciudad</label>
                          <input name="txt_pro_ciudad" type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Correo Electronico</label>
                          <input name="txt_pro_email" type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Teléfono</label>
                          <div class="row">
                            <div class="col-sm-9">
                              <input name="txt_pro_telefono"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" placeholder="Teléfono">
                            </div>
                            <div class="col-sm-3">
                              <input name="txt_pro_extension"  type="text" class="form-control" parsley-trigger="change" placeholder="Ext">
                              <span class="help-block"><i class="fa fa-info"></i> (Campo Opcional)</span>
                            </div>
                          </div>
                         </div>

                        <div class="form-group">
                          <label class="control-label">Fax</label>
                          <input name="txt_pro_fax" type="text" class="form-control"  parsley-trigger="change"><span class="help-block"><i class="fa fa-info"></i> (Campo Opcional)</span>
                        </div>

                       <hr>

                       <div class="form-group">
                          <div class="row">
                            <div class="col-sm-6">

                              <label class="control-label">Contacto Directo</label>
                              <input name="txt_pro_contacto_directo"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                            </div>
                            <div class="col-sm-4">
                              <label class="control-label">Teléfono del Contacto</label>
                              <input name="txt_pro_contacto_celular"  type="text" class="form-control" parsley-trigger="change" >
                            </div>
                          </div>
                       </div>

                       <div class="form-group">
                          <label class="control-label">Terminos de Pago</label>
                          <select  name="txt_pro_terminos_pago"  class="form-control">
                              <option value="Vencimiento Mensual">Vencimiento Mensual</option>
                              <option value="De Contado">De Contado</option>
                              <option value="8 días">8 días</option>
                              <option value="15 días">15 días</option>
                              <option value="30 días">30 días</option>
                              <option value="60 días">60 días</option>
                          </select>
                       </div>

                       <div class="form-group">
                          <label class="control-label">Observaciones </label>
                          <textarea  name="txt_pro_observaciones" class="form-control" rows="5" maxlength="225" data-always-show="true"  data-position="bottom-right"  ></textarea>
                          <span class="help-block"><i class="fa fa-info"></i> (Campo Opcional)</span>
                       </div>

                       <div class="form-group">
                          <div>El registro se va a guardar con la fecha: <span class="label bg-inverse"> <?php echo substr($hoy,0,10); ?></span></div>
                       </div>

                       <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block" name="btn_continue" value="guardar">Guardar Proveedor</button>
                          <a href="dashboard.php?m=<?php echo base64_encode("module/proveedores.php"); ?>&pagid=<?php echo base64_encode("PAG-100014");?>" class="btn btn-info btn-block ">Cancelar</a>
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
              require_once("../../model/class/proveedores.class.php");

              $row = Gestion_Proveedores::ReadLastItem();
          ?>
          <div class="well bg-theme">
            <p><strong>Código: &nbsp;</strong><?php echo $row[0];?></p>
  		  </div>
          <div class="textpanel">
            <p><strong>Nit: &nbsp;</strong><?php echo $row[2];?></p><hr>
            <p><strong>Razón Social: &nbsp;</strong><?php echo $row[1];?></p><hr>
            <p><strong>Telefono: &nbsp;</strong><?php echo $row[9];?></p><hr>

            <p><strong>Correo Electronico: &nbsp;</strong><?php echo $row[8];?></p><hr>

            <p><strong>Autor: &nbsp;</strong><?php echo $row[17];?></p><hr>

            <p><strong>Fecha y hora de Creación: &nbsp;</strong><?php echo $row[16];?></p>

            <a href='dashboard.php?m="<?php echo base64_encode("proveedores_editar"); ?>"&pid="<?php echo base64_encode($row[0]); ?>"'class="btn btn-inverse btn-block">Editar Registro</a>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
