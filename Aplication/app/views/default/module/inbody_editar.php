<div id="main">
   <?php
  //Gestionar_Breadcrumbs::breadcrumbs(base64_decode($pagid));

     require_once("../../conf.ini.php");
     require_once("../../model/class/inbody.class.php");
     $row = Gestion_inbody::ReadbyID(base64_decode($_GET["pid"]));
   ?>

 <div id="content" class="page_module">
   <div class="row">
      <div class="col-lg-2"></div>
        <div class="col-lg-9">
          <div class="panel">
            <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
              <h3><?php echo $row_paginas[1];?></h3>
              <span><?php echo $row_paginas[2];?></span>
            </header>

         <div class="panel-body">
            <form name="frm_create" parsley-validate action="../../controller/crud_inbody.controller.php" method="post">

           <div class="row">
                 <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Código Inbody:</label>
                          <input value="<?php echo $row[0];?>" name="txt_inb_codigo" type="text" class="form-control" readonly >
                        </div>

                       <div class="form-group">
                          <label class="control-label">Nombre Cliente:</label>
                          <input value="<?php echo $row[1];?>" name="txt_inb_nombre"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                       </div>

                       <div class="form-group">
                          <label class="control-label">Edad:</label>
                          <input value="<?php echo $row[2];?>" name="txt_inb_edad"  type="text" class="form-control"  parsley-trigger="change" parsley-required="true">
                       </div>                       
                  
                  </div>

                <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Tasa Metabólica Básica(TMB) (Kcal):</label>
                            <input value="<?php echo $row[4];?>" name="txt_inb_tasmetbas"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Porcentaje de Grasa Corporal(PGC) (%):</label>
                            <input value="<?php echo $row[7];?>" name="txt_inb_porgrascor"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Dieta:</label>
                            <input value="<?php echo $row[8];?>" name="txt_inb_dieta"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>
                              
                        <div class="form-group">
                          <label class="control-label">Fecha del Inbody:</label>
                            <input value="<?php echo $row[9];?>" name="txt_inb_fecha"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>
                  </div>  
						       

                  <div class="form-group">
                       <?php } ?>
          
                        <div class="form-group">
                          <button type="submit" class="btn btn-success btn-block" name="btn_continue" value="modificar">Modificar InBody</button>

                             <?php
                             if($row_permiso["pag_codigo"]=="PAG-10008"){
                              echo '<a href="dashboard.php" class="btn btn-info btn-block ">Cancelar</a>' ;
                              }else{
                              ?>
                            <a href="dashboard.php?m=<?php echo base64_encode("module/inbody.php"); ?>&pagid=<?php echo base64_encode("PAG-100048"); ?>"     class="btn btn-info btn-block ">Cancelar</a>
                 
                             <?php } ?>
                        </div>
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
