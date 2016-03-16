<div id="main">
   <?php
  //Gestionar_Breadcrumbs::breadcrumbs(base64_decode($pagid));

     require_once("../../conf.ini.php");
     require_once("../../model/class/formas_pago.class.php");
     $row = Gestion_formas_pago::ReadbyID(base64_decode($_GET["pid"]));
   ?>

  <div id="content" class="page_module">
    <div class="row">
       <div class="col-lg-12">
            <div class="panel" style="width:50%;margin:auto">
               <header class="panel-heading">
                <h3><strong>EDITAR</strong> FORMA DE PAGO</h3>
               </header>

          <div class="panel-body">
              <form name="frm_create" parsley-validate action="../../controller/crud_formas_pago.controller.php" method="post">

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Código Forma Pago:</label>
                          <input value="<?php echo $row[0];?>" name="txt_forpag_codigo" type="text" class="form-control" readonly >
                        </div>

                   <div class="form-group">
                          <label class="control-label">Nombre Forma Pago:</label>
                          <input value="<?php echo $row[1];?>" name="txt_forpag_nombre"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                    </div>

                   <div class="form-group">
                          <label class="control-label">Descripción Forma Pago:</label>
                          <input value="<?php echo $row[2];?>" name="txt_forpag_descripcion"  type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                    </div>                       
                  </div>

                    <div class="col-md-6">
                      
                        <div class="form-group">
                          <label class="control-label">Estado forma de Pago:</label>
                            <input value="<?php echo $row[3];?>" name="txt_forpag_estado"  type="text" class="form-control"  parsley-trigger="change">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Autor:</label>
                            <input value="<?php echo $row[4];?>" name="txt_forpag_autor"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Fecha de Creación:</label>
                            <input required name="txt_forpag_fecha_creacion"  type="date" value="<?php echo substr($hoy,0,10);?>" class="form-control" readonly value="">
                        </div>                                             
                       
                    </div>
                    <div class="form-group">
                          <button type="submit" class="btn btn-success btn-block" name="btn_continue" value="modificar">Modificar Forma de Pago</button>
                                      
                          <?php
                           if($row_permiso["pag_codigo"]=="PAG-10008"){
                           echo '<a href="dashboard.php" class="btn btn-info btn-block ">Cancelar</a>' ;
                           }else{
                          ?>
                           <a href="dashboard.php?m=<?php echo base64_encode("module/formas_pago.php"); ?>&pagid=<?php echo base64_encode("PAG-100046"); ?>" class="btn btn-primary btn-block ">Cancelar</a>
                        <?php } ?>
                       </div>
                    
              </form>
          </div>

        </div>
      </div>
      <div class="col-lg-2"></div>

    </div>
  </div>

</div>
