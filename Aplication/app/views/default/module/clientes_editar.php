<?php

$codigo_cliente = base64_decode($_REQUEST['cli']);

require_once("../../model/class/clientes.class.php");
$clientes = Gestion_Clientes::ReadbyID($codigo_cliente);

?>
<div id="md-ajax" class="modal fade md-flipHor" tabindex="-1">
		<div class="modal-header bg-success">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>Administración Avanzada</h3>
		</div>
		<div class="modal-body">
		</div>
</div>

<div id="main">
  <?php echo $row_paginas["pag_migapan"];?>
  <div id="content" class="page_module">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel">
          <header class="panel-heading">
            <h1><?php echo $row_paginas["pag_nombre"];?> </h1>
						<p>Editar la información del afiliado  C.C. <?php echo $clientes[2].' - '. $clientes[3].' '.$clientes[4];?></p>
          </header>
					<div class="panel-tools fully color" align="left" data-toolscolor="#6CC3A0">
						<?php
							if(isset($_REQUEST["alert"])){
								if($_REQUEST["alert"] == true){

									 $alert_type = base64_decode($_GET["alty"]);
									 $alert_msn  = base64_decode($_GET["almsn"]);

									 echo "<div id='notificacion' class='alert ".$alert_type."'>
														$alert_msn &nbsp <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'> &times;</span></button>
												 </div>";
								}
							}
						?>
					</div>
						<form name="frm_create" parsley-validate action="../../controller/crud_clientes.controller.php" method="post" autocomplete="off" enctype="multipart/form-data">

<div class="panel-body">
			<div class="row">

        <div class="col-md-12">
					  <div class="row">
						<div class="col-md-4 align-lg-right">
							<?php echo "<img src='../".$clientes[14]."' class='img-preview img-thumbnail	'/>"?>
              <div class="btn-group align-lg-right" data-btn-group="monochromatic" data-btn-color="#15A6B7">
									<button type="button" class="btn right" style="border-color: rgb(21, 166, 183); color: rgb(255, 255, 255); background-color: rgb(21, 166, 183);">Administración avanzada</button>
									<button type="button" class="btn dropdown-toggle right" data-toggle="dropdown" style="border-color: rgb(0, 140, 157); color: rgb(255, 255, 255); background-color: rgb(0, 140, 157);"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
									<ul class="dropdown-menu align-xs-left " role="menu">
										<?php if($clientes[20]!="Cancelado"){?>
											<li><a href="#" class="md-conjelarplan"><span class="glyphicon glyphicon-pause "></span> Congelar plan</a></li>
											<li><a href="#" class="md-solicitar"><span class="glyphicon glyphicon-log-out"></span> Solicitar traslado</a></li>
										<?php } ?>
											<li><a href="#" class="md-cancelarplan"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar plan</a></li>
									</ul>
							</div>
            </div>

						<div class="col-md-8">
						  <div class="form-group">
								<?php if($clientes[20]=='Activo'){
											$bglabel = 'bg-success';
											}elseif($clientes[20]=='Congelado'){
													$bglabel = 'bg-info';
												}else{
													$bglabel = 'bg-theme';
												}?>
							<label class="label <?php echo $bglabel; ?> ">
							El plan en el momento se encuentra <?php echo $clientes[20]; ?>
							<?php if($clientes[20]=='Cancelado'){
								echo "- <a href='../../controller/crud_clientes.controller.php?btn_continue=react&uid=".$codigo_cliente."' style='color:#F9FF03'>Activarlo nuevamente</a>";
							}
							?>
							</label>
						</div>
						  <div class="form-group">
							<label class="control-label">Código</label>
							<input id="txt_cli_codigo" name="txt_cli_codigo" type="text" class="form-control" readonly value="<?php echo $clientes[0];?>">
						  </div>

							<div class="form-group">

                        <div class="row">
                          <div class="col-sm-5">
                            <label class="control-label">Tipo de Documento</label>
                            <select  name="txt_cli_tipo_identificacion"  class="selectpicker form-control">
                                <option <?php if($clientes[1] == "Cedula"){ echo "selected"; } ?> value="Cedula"> Cedula (Preterminado)</option>
                                <option <?php if($clientes[1] == "Pasaporte"){ echo "selected"; } ?> value="Pasaporte"> Pasaporte</option>
                                <option <?php if($clientes[1] == "Tarjeta de Identidad"){ echo "selected"; } ?> value="Tarjeta de Identidad"> Tarjeta de Identidad </option>
                            </select>
                          </div>

                          <div class="col-sm-7">
                            <label class="control-label"># Documento</label>
                            <input name="txt_cli_identificacion"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" value="<?php echo $clientes[2];?>">
                          </div>
                         </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label">Nombre Completo</label>

                          <div class="row">
                              <div class="col-sm-6">
                                <input value="<?php echo $clientes[3];?>" name="txt_cli_nombre"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" placeholder="Nombre">
                              </div>

                              <div class="col-sm-6">
                                <input value="<?php echo $clientes[4];?>" name="txt_cli_apellido"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" placeholder="Primer Apellido">
                              </div>
                          </div>
                        </div>

                       <div class="form-group">
                          <label class="control-label">Sexo</label>
						              <ul class="iCheck" data-color="red">
              							<li>
              								<i class="fa fa-mars"></i>
              								<input type="radio" name="txt_cli_sexo" value="Hombre" <?php if($clientes[5] == "Hombre"){ echo "checked='checked' "; } ?>>
              								<span>Hombre</span>
              							</li>
              							<li>
              								<i class="fa fa-venus"></i>
              								<input  type="radio" name="txt_cli_sexo"  value="Mujer"  <?php if($clientes[5] == "Mujer"){ echo "checked='checked' "; } ?>>
              								<span>Mujer</span>
              							</li>
							 					  </ul>
                       </div>
                       <div class="form-group">
          							<label class="control-label">Fecha de Nacimiento</label>
          							<div>
          								<div class="row">
          									<div class="input-group date form_datetime col-lg-6" data-picker-position="bottom-left"  >
          											<input type="text" class="form-control" name="txt_cli_fecha_nac" value="<?php echo $clientes[6];?>">
          											<span class="input-group-btn">
          											<button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
          											<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
          											</span>
          									</div>
          								</div>
          							</div>
          						</div>

                         <div class="form-group">
                          <div class="row">
                            <div class="col-sm-6">
	                           <label class="control-label">Teléfono</label>
                              <input name="txt_cli_telefono" id="txt-phone" type="text" class="form-control" parsley-trigger="change" parsley-required="true" value="<?php echo $clientes[7];?>">
                            </div>
                            <div class="col-sm-6">
															<label class="control-label">Celular</label>
																<input name="txt_cli_celular" id="txt-cel" type="text" class="form-control" parsley-trigger="change" parsley-required="true" value="<?php echo $clientes[8];?>">

                            </div>
                          </div>
                         </div>

                         <div class="form-group">
													 <label class="control-label">Email  Address</label>
													 <div class="row">
															<div class="col-md-12"><input type="text" name="txt_cli_email" class="form-control" parsley-type="email" parsley-required="true" parsley-trigger="keyup" placeholder="email" value="<?php echo $clientes[9];?>"></div>
													 </div>
                         </div>


                       <div class="form-group">
												 <label class="control-label">Dirección de Residencia</label>
                        <div class="row">
                              <div class="form-group">
                              <div class="col-sm-4">
																<select  name="txt_cli_direccion1"  class="form-control selectpicker" parsley-required="true"  parsley-trigger="change">

			                            <option  value="Cr" <?php if(substr($clientes[10], 0, 2) == "Cr"){ echo "selected"; } ?>>Carrera</option>
			                            <option  value="Cl" <?php if(substr($clientes[10], 0, 2) == "Cl"){ echo "selected"; } ?>>Calle</option>
			                            <option  value="Cq" <?php if(substr($clientes[10], 0, 2) == "Cq"){ echo "selected"; } ?>>Circular</option>
			                            <option  value="Tv" <?php if(substr($clientes[10], 0, 2) == "Tv"){ echo "selected"; } ?>>Transversal</option>
			                          </select>
                              </div>

															<div class="col-sm-8">
																<input name="txt_cli_direccion2"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" placeholder="Ej. 77 B # 47 - 6" value="<?php echo substr($clientes[10], 3);?>">
															</div>


                              </div>
                          </div>
                       </div>
                      <div class="form-group">
													<div class="row">
														 <div class="col-md-4">
			                           <label class="control-label">Pais de origen</label>
										 						 <select name="txt_cli_pais" id="countries_states1" class="form-control bfh-countries" data-country="<?php echo $clientes[18]?>" data-filter="true"></select>
														 </div>
	 													 <div class="col-md-4">
	 			                       	 <label class="control-label">Departamento</label>
																 <select name="txt_cli_dpto" id="countries_states2" class="form-control bfh-states" data-country="countries_states1" data-state="<?php echo $clientes[19]?>" > </select>
												 		 </div>
	 													 <div class="col-md-4">
	 			                       	 <label class="control-label">Ciudad</label>
																 <div id="drop-city">
																	 <?php
																	 require_once("../../model/class/localizacion.class.php");

																	 $ciudades = Gestion_Localidad::Read_City_byState($clientes[19]);
																	 ?>
																	 <select class="form-control" id="txt-ciudad" name="txt_cli_ciudad" >
																	   <?php
																	     foreach($ciudades as $ciudad){

																				 if($clientes[11] == $ciudad[1]){
				                                   $select = "selected";
				                                 }else{
				                                   $select = "";
				                                 }

																	       echo "<option value='".$ciudad[1]."' $select>$ciudad[2]</option>";
																	     }
																	   ?>
																	 </select>
												 		 			</div>
															</div>
                      		</div>
												</div>

												<div class="form-group">
													<label class="control-label">Sede de afiliación</label>
													<?php
														require_once("../../model/class/sedes.class.php");
														$sede = Gestion_Sedes::ReadbyID($_usu_sed_codigo);
														echo "<p>".$sede["sed_nombre"]."</p>";
													?>
                          <input type="hidden" id="misede" value="<?php echo $sede["sed_nombre"]; ?>"
												</div>

												<div class="form-group">
													<label class="control-label">Escoger plan:</label>
														<?php
														require_once("../../model/class/planes.class.php");
														$planes = Gestion_Planes::ReadAll();
														?>

													<select name="txt_cli_plan" class="selectpicker form-control" data-size="10" data-live-search="true">
																	<option value="">Escoger Plan </option>
														<?php
															foreach($planes as $plan){

																if($clientes[13] == $plan[0]){
                                  $select = "selected";
                                }else{
                                  $select = "";
                                }

																echo "<option value='".$plan[0]."' $select>$plan[1]</option>";
															}
														?>
													</select>
												</div>


	                       <div class="form-group">
	                          <button type="submit" class="btn btn-primary btn-block" name="btn_continue" value="modificar">Modificar Cliente</button>
	                          <a href="dashboard.php?m=<?php echo base64_encode("usuarios");?>" class="btn btn-info btn-block ">Cancelar</a>
	                       </div>
						</div>

					  </div>
			  </div>
		  </div>

</form>
          </div>

        </div>
      </div>


    </div>
  </div>

</div>
