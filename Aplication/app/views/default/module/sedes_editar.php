<div id="main">

  <div id="content" class="page_module">
    <div class="row">

      <div class="col-lg-2"></div>

      <div class="col-lg-8">
        <div class="panel">
          <header class="panel-heading">
            <h3><strong>MODIFICAR</strong> LABORATORIO </h3>
          </header>

          <div class="panel-body">
              <form name="frm_create" parsley-validate action="../../controller/crud_sedes.controller.php" method="post">

              <?php

                require_once("../../conf.ini.php");
                require_once("../../model/class/sedes.class.php");
                $row = Gestion_Sedes::ReadbyID(base64_decode($_GET["pid"]));

              ?>

                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Código</label>
                          <input name="txt_sed_codigo" type="text" class="form-control" readonly value="<?php echo $row[0];?>">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Nombre de la Sede</label>
                          <input name="txt_sed_nombre"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" value="<?php echo $row[2];?>">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Teléfono</label>
                            <input name="txt_sed_telefono"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" value="<?php echo $row[3];?>">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Email <span>(Opcional)</span></label>
                            <input name="txt_sed_email"  type="text" class="form-control" parsley-trigger="change" value="<?php echo $row[4];?>">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Dirección</label>
                            <input name="txt_sed_direccion"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" value="<?php echo $row[5];?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Pais de origen</label>
                            <select name="txt_sed_pais" id="countries_states1" class="form-control bfh-countries" data-country="<?php echo $row['sed_pais'];?>" data-filter="true"></select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Departamento</label>
                            <select id="countries_states2" name="txt_sed_departamento" class="form-control bfh-states" data-country="countries_states1" data-state="<?php echo $row['sed_departamento'];?>"> </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Ciudad</label>
                            <div id="drop-city">
                              <?php
                              require_once("../../model/class/localizacion.class.php");

                              $ciudades = Gestion_Localidad::Read_City();
                              ?>

                              <select class="form-control" id="txt-ciudad" name="txt_sed_ciudad" >
                                <?php
                                  foreach($ciudades as $ciudad){
                                    if($row['emp_ciudad']==$ciudad[1]){
                                      $selected = "selected";
                                    }else{
                                      $selected = "";
                                    }
                                    echo "<option value='".$ciudad[1]."' $selected>".ucwords(strtolower($ciudad[2]))."</option>";
                                  }
                                ?>
                              </select>
                             </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label">Abierto desde: </label>
                            <input name="txt_sed_horainicio"  type="time" class="form-control" parsley-trigger="change" parsley-required="true"  value="<?php echo $row[12];?>">
                        </div>

                          <div class="form-group">
                          <label class="control-label">Hasta:   </label>
                            <input name="txt_sed_horacierre"  type="time" class="form-control" parsley-trigger="change" parsley-required="true"  value="<?php echo $row[13];?>">
                        </div>


                       <div class="form-group">
                          <button type="submit" class="btn btn-success btn-block" name="btn_continue" value="modificar">Modificar Laboratorio</button>
                          <a href="dashboard.php?m=<?php echo base64_encode("module/sedes.php");?>&pagid=<?php echo base64_encode("PAG-100015");?>" class="btn btn-info btn-block ">Volver</a>
                       </div>
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
