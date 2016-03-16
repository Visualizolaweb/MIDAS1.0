<div id="main">

  <div id="content" class="page_module">
    <div class="row">
      <div class="col-lg-7">
        <div class="panel">
          <header class="panel-heading">
            <h3><strong>CREAR</strong> UN NUEVO USUARIO </h3>
          </header>

          <div class="panel-body">
              <form name="frm_create" parsley-validate action="../../controller/crud_usuarios.controller.php" method="post">

              <?php

                // Crear el código
                require_once("../../model/class/codigopk.class.php");

                $unique_code = Codigo_PK::GenerarCodigo("usu_codigo","ges_usuarios","USU");

              ?>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Código</label>
                          <input name="txt_usu_codigo" type="text" class="form-control" readonly value="<?php echo $unique_code;?>">
                        </div>

                       <?php
                          require_once("../../model/class/perfiles.class.php");
                          require_once("../../model/class/sedes.class.php");

                          $rowperfiles = Gestion_Perfiles::ReadAll();
                          $rowsedes    = Gestion_Sedes::ReadAll();
                       ?>

                       <div class="form-group">
                          <label class="control-label">Perfil dentro de MIDAS</label>
                          <select  name="txt_ges_perfiles_per_codigo"  class="form-control" parsley-required="true"  parsley-trigger="change">
                              <option value="">Seleccione un Perfil</option>
                              <?php

                              foreach($rowperfiles as $row_per){
                                echo "<option value='".$row_per[0]."'>$row_per[1]</option>";
                              }

                              ?>
                          </select>
                        </div>


                        <div class="form-group">

                        <div class="row">
                          <div class="col-sm-5">
                            <label class="control-label">Tipo de Documento</label>
                            <select  name="txt_usu_tipodocumento"  class="form-control">
                                <option value="Cedula"> Cedula (Preterminado)</option>
                                <option value="Pasaporte"> Pasaporte</option>
                                <option value="Tarjeta de Identidad"> Tarjeta de Identidad </option>
                            </select>
                          </div>

                          <div class="col-sm-7">
                            <label class="control-label"># Documento</label>
                            <input name="txt_usu_documento"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" >
                          </div>
                         </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label">Nombre Completo</label>

                          <div class="row">
                              <div class="col-sm-4">
                                <input name="txt_usu_nombre"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" placeholder="Nombre">
                              </div>

                              <div class="col-sm-4">
                                <input name="txt_usu_apellido_1"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" placeholder="Primer Apellido">
                              </div>

                              <div class="col-sm-4">
                                <input name="txt_usu_apellido_2"  type="text" class="form-control" parsley-trigger="change" placeholder="Segundo Apellido">
                                <span class="help-block"><i class="fa fa-info"></i> (Campo Opcional)</span>
                            </div>
                          </div>
                        </div>

                       <div class="form-group">
                          <label class="control-label">Contraseña</label>
                            <input name="txt_acc_clave" type="password" class="form-control" parsley-trigger="change" parsley-rangelength="[8,50]" parsley-required="true">
                        </div>

                         <div class="form-group">
                          <label class="control-label">Correo Electronico</label>
                            <input name="txt_usu_email"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                         <div class="form-group">
                          <label class="control-label">Teléfono</label>
                          <div class="row">
                            <div class="col-sm-9">
                              <input name="txt_usu_telefono"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" placeholder="Teléfono">
                            </div>
                            <div class="col-sm-3">
                              <input name="txt_usu_extension"  type="text" class="form-control" parsley-trigger="change" placeholder="Ext">
                              <span class="help-block"><i class="fa fa-info"></i> (Campo Opcional)</span>
                            </div>
                          </div>
                         </div>

                         <div class="form-group">
                          <label class="control-label">Celular</label>
                            <input name="txt_usu_movil"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>


                       <div class="form-group">
                        <div class="row">
                              <div class="form-group">
                              <div class="col-sm-6">
                                <label class="control-label">Cargo</label>
                                <input name="txt_usu_cargo"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                              </div>



                              <div class="col-sm-6">
                                <label class="control-label">Sede en la que trabaja</label>
                                <select  name="txt_ges_sede_sed_codigo"  class="form-control" parsley-required="true"  parsley-trigger="change">
                                    <option  value="">Seleccione una Sede</option>

                                    <?php

                                    foreach($rowsedes as $row_sed){
                                      echo "<option value='".$row_sed[0]."'>$row_sed[1]</option>";
                                    }

                                    ?>
                                </select>
                              </div>
                              </div>
                          </div>
                       </div>
                      <div class="form-group">
                          <label class="control-label">Estado</label>
                          <select  name="txt_usu_estado"  class="form-control" parsley-required="true"  parsley-trigger="change">
                            <option  value="Activo">Activo (Predeterminado)</option>
                            <option  value="Incapacitado">Incapacitado</option>
                            <option  value="Inactivo">Inactivo</option>
                            <option  value="Licencia">Licencia</option>
                            <option  value="Suspendido">Suspendido</option>
                          </select>
                      </div>

                      <div class="form-group">
                        <div>El registro se va a guardar con la fecha: <span class="label bg-inverse"> <?php echo substr($hoy,0,10); ?></span></div>
                      </div>

                       <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block" name="btn_continue" value="guardar">Guardar Usuario</button>
                          <a href="dashboard.php?m=<?php echo base64_encode("module/usuarios.php");?>&pagid=<?php echo base64_encode("PAG-100016");?>" class="btn btn-info btn-block ">Cancelar</a>
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
              require_once("../../model/class/usuarios.class.php");

              $row = Gestion_Usuarios::ReadLastItem();
          ?>
          <div class="well bg-theme">
            <p><strong>Código: &nbsp;</strong><?php echo $row[0];?></p>
  		  </div>
          <div class="textpanel">
            <p><strong>Usuario: &nbsp;</strong><?php echo $row[5].' '.$row[6].' '.$row[7];?></p><hr>
            <p><strong><?php echo $row[3]?>: &nbsp;</strong><?php echo $row[4];?></p><hr>
            <p><strong>Telefono: &nbsp;</strong><?php echo $row[9];?></p><hr>

            <p><strong>Correo Electronico: &nbsp;</strong><?php echo $row[8];?></p><hr>

            <p><strong>Autor: &nbsp;</strong><?php echo $row[15];?></p><hr>

            <p><strong>Fecha y hora de Creación: &nbsp;</strong><?php echo $row[14];?></p>

            <a href='dashboard.php?m="<?php echo base64_encode("module/usuarios_editar.php"); ?>"&pid="<?php echo base64_encode($row[0]); ?>"'class="btn btn-inverse btn-block">Editar Registro</a>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
