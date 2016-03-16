<div id="main">

  <div id="content" class="page_module">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel" style="width:50%;margin:auto">
          <header class="panel-heading">
            <h3><strong>CREAR</strong> UN NUEVO INBODY </h3>
          </header>

        <div class="panel-body">
           <form name="frm_create" parsley-validate action="../../controller/crud_inbody.controller.php" method="post">

              <?php

                // Crear el código
                require_once("../../model/class/codigopk.class.php");
                require_once("../../model/class/clientes.class.php");

               $unique_code = Codigo_PK::GenerarCodigo("inb_codigo","ges_inbody","INB");
          
              ?>

                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group" style="display:none">Código InBody:</label>
                          <input name="txt_inb_codigo" type="text" class="form-control" readonly value="<?php echo $unique_code;?>">
                       </div>
                    </div>
                </div>
                        <input type="hidden" id="inbody">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group input-group">
                                                       <select  onclick='seleccion(this)' style='position:absolute;visibility:hidden;width:100%;height:40px;z-index:3;margin-top:35px' id="clientes_data">
                               <option value="">- Selecciona una opción - </option>
                               </select>
                              <input type="hidden" id="sed_" value="<?php echo $_usu_sed_codigo?>">
                              <input id='txt_src_cli'  type='text' name="txt_imp_nombre" class="form-control trasl"  placeholder="Buscar cliente por nombre" onkeyup="buscarCli(this)"  name="clientes"  ><span class="input-group-addon"><span onclick="clearAll()" class="glyphicon glyphicon-refresh " style="cursor:pointer"></span>
                      </div>
                    </div>  
                </div>
                        
   <input type="hidden" id="sed_" value="<?php echo $_usu_sed_codigo?>">
               <div class="row">
                    <div class="col-md-6">
                        
                       <div class="form-group">
                          <label class="control-label">Código InBody Besmart:</label>
                            <input name="txt_inb_codigo_be"  type="text" class="form-control"  parsley-trigger="change">
                        </div>


                        <div class="form-group">
                          <label class="control-label">Edad:</label>
                            <input name="txt_inb_edad" id="edad" type="text" class="form-control trasl"  parsley-trigger="change">
                        </div> 
 <div class="form-group">
                          <label class="control-label">Peso (kl):</label>
                            <input name="txt_inb_peso"  type="text" class="form-control"  parsley-trigger="change">
                        </div>              
                              
                        <div class="form-group">
                          <label class="control-label">Altura (cms):</label>
                            <input name="txt_inb_altura"  type="text" class="form-control"  parsley-trigger="change">
                        </div>

                        <div class="form-group">
                         <label class="control-label">Sexo:</label>
                           <ul class="iCheck" data-color="red">
                           <li>
                              <i class="fa fa-venus"></i>
                              <input  type="radio" name="txt_inb_sexo" checked="checked"  value="Mujer">
                              <span>Mujer</span>
                          </li>
                          <li>
                            <i class="fa fa-mars"></i>
                            <input type="radio" name="txt_inb_sexo"value="Hombre">
                            <span>Hombre</span>
                          </li>
                          </ul>
                       </div>                    
                                  
                </div>
<div class="col-md-6">  
                     <div class="form-group">
                          <label class="control-label">Nombre del cliente:</label>
                            <input id="nombres"  type="text" name="txt_nombres" class="form-control trasl"  parsley-trigger="change">
                        </div>                            
                       </div>
                 <div class="col-md-6">  
                          
                       <div class="form-group">
                          <label class="control-label">Tasa Metabólica Básica (TMB) (Kcal):</label>
                           <input name="txt_inb_tasmetbas"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">                         
                        </div>

                        <div class="form-group">
                          <label class="control-label">Porcentaje de Grasa Corporal (PGC) (%):</label>
                          <input name="txt_inb_porgrascor"  type="text" class="form-control" parsley-trigger="change" parsley-required="true">
                        </div>

                        
                        <div class="form-group">
                                <label class="control-label">Dieta: </label>                                
                                 <select class="form-control selectpicker" name="txt_inb_dieta">
                                     <option value="">Seleccione Dieta Femenina </option>
                                     <option value="Dieta 1200Kcal (TMB <0 a 1200k - PGC >0 a 28%)">Dieta 1200Kcal (TMB <0 a 1200k - PGC >0 a 28%)</option>
                                     <option value="Dieta 1500Kcal (TMB 1200 y 1500k - PGC 18 y 28%)">Dieta 1500Kcal (TMB 1200 y 1500k - PGC 18 y 28%)</option>
                                     <option value="Dieta 1800Kcal (TMB >0 a 1500k - PGC <18%)">Dieta 1800Kcal (TMB >0 a 1500k - PGC <18%)</option>
                                     <option value="">Seleccione Dieta Masculina</option>
                                     <option value="Dieta 1500Kcal (TMB <0 a 1500k - PGC >0 a 20%)">Dieta 1500Kcal (TMB <0 a 1500k - PGC >0 a 20%)</option>
                                     <option value="Dieta 2000Kcal (TMB 1500 y 1800K - PGC 10 y 20%)">Dieta 2000Kcal (TMB 1500 y 1800K - PGC 10 y 20%)</option>
                                     <option value="Dieta de 2300Kcal (TMB >0 a 2000k - PGC <10% )">Dieta de 2300Kcal (TMB >0 a 2000k - PGC <10% )</option>
                                 </select>
                        </div>                                                                                                                    
                           
                       <div class="form-group">
                          <label class="control-label">Fecha del InBody:</label>
                         <div>
                            <div class="input-group date form_datetime " data-picker-position="bottom-left"  >
                              <input type="text" class="form-control" name="txt_inb_fecha" placeholder="aaaa-mm-dd">
                              <span class="input-group-btn">
                              <button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
                              <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                               </span>
                           </div>
                         </div>
                       </div> 
                                         
                 </div>

                    <div class="col-md-12">
                    <div class="form-group">
                         <label class="control-label">Patologías:</label>
                          <textarea class="form-control"  name="txt_inb_patologias"></textarea>
                      </div>

                      <div class="form-group">   
                         <button type="submit" class="btn btn-primary btn-block" name="btn_continue" value="guardar">Guardar InBody <span class="label bg-inverse"></button></span>
                          <a href="dashboard.php?m=<?php echo base64_encode("module/inbody.php"); ?>&pagid=<?php echo base64_encode("PAG-100051"); ?>" class="btn btn-info btn-block ">Cancelar</a>
                     </div>

               </div>
            </form>
          </div>

        </div>
      </div>


    </div>
  </div>

</div>

<script src="javascript/buscador.js"></script>