<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<!-- Title-->
<title>Bienvenido a MIDAS</title>
<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/ico/favicon.ico">
<!-- CSS Stylesheet-->
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap-themes.css" />
<link type="text/css" rel="stylesheet" href="assets/css/style.css" />

<!-- Styleswitch if  you don't chang theme , you can delete -->
<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="assets/css/styleTheme1.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="assets/css/styleTheme2.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="assets/css/styleTheme3.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="assets/css/styleTheme4.css" />

<style>
#validate-wizard{
	width:480px;
	margin:auto;
	}
</style>

</head>
<body class="full-lg">
<div id="wrapper">

<div id="loading-top">
		<div id="canvas_loading"></div>
		<span>Checking...</span>
</div>

<div id="main">
		<div class="real-border">
				<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
						<div class="col-xs-1"></div>
				</div>
		</div>
		<div class="container">
				<div class="row">
						<div class="col-lg-12">
						
								<div class="account-wall">
										<section class="align-lg-center">
										<div class="site-logo"></div>
										<h1 class="login-title"><span>CONFIGURA TU MIDAS </span><small> Pedimos unos minutos para la configuración de tu cuenta MIDAS</small></h1>
										<br>
										</section>
										<form id="validate-wizard" class="wizard-step shadow">
												<ul class="align-lg-center" style="display:none">
														<li><a href="#step1" data-toggle="tab">1</a></li>
														<li><a href="#step2" data-toggle="tab">2</a></li>
														<li><a href="#step3" data-toggle="tab">3</a></li>
														<li><a href="#step4" data-toggle="tab">4</a></li> 
												</ul>
											
												<div class="progress progress-stripes progress-sm" style="margin:0">
														<div class="progress-bar" data-color="theme"></div>
												</div>
												<div class="tab-content">
														<div class="tab-pane fade" id="step1" parsley-validate parsley-bind>
															<h2>PASO 1: REGISTRAR LA EMPRESA</h2>
															<span>Ingresa los datos basicos de su empresa, mas adelante podrá actualizarlos y completarlos</span><br><br>
																<div class="form-group">
																		<label class="control-label">Nit</label>
																		<input type="text" class="form-control" >
																</div>
																<div class="form-group">
																		<label class="control-label">Razón Social</label>
																		<input type="text" class="form-control"    parsley-trigger="keyup">
																</div> 
														</div>
														<div class="tab-pane fade" id="step2" parsley-validate parsley-bind>
																<h3>PASO 2: ASOCIAR UN LAB</h3>
															<span>Mas adelante podrá asociar mas labs</span><br><br>
															
																<div class="form-group">
																		<label class="control-label">Nombre Sede</label>
																		<input type="text" class="form-control" >
																</div>
															
																<div class="form-group">
																		<label class="control-label">Teléfono</label>
																		<input type="text" class="form-control" >
																</div>
															
																<div class="form-group">
																		<label class="control-label">Dirección</label>
																		<input type="text" class="form-control" >
																</div> 
														</div>
													<div class="tab-pane fade" id="step3" parsley-validate parsley-bind>
																<h3>PASO 3: CONFIGURAR BANCO</h3>
															<span>Asocia la cuenta bancaria de la sede inscrita</span><br><br>
															
																<div class="form-group">
																		<label class="control-label">Nombre del Banco</label>
																		<input type="text" class="form-control" >
																</div>
															
																<div class="form-group">
																		<label class="control-label">Tipo de Cuenta</label>
																		<select  name="txt_usu_estado"  class="form-control" parsley-required="true"  parsley-trigger="change">
                            <option  value="Cuenta de Ahorros">Cuenta de Ahorros</option>  
                            <option  value="Cuenta Corriente">Cuenta Corriente</option> 
                          </select>
																</div>
															
																<div class="form-group">
																		<label class="control-label">Numero de Cuenta</label>
																		<input type="text" class="form-control" >
																</div> 
														</div>
													 
														<div class="tab-pane fade align-lg-center" id="step4">
																<br><h3>Muchas Gracias <span></span> .....</h3><br>
															<?php $_SESSION["acc_primeravez"] = 1; 
																  $_acc_primeravez =1;?>
												
														</div>
														
														<footer class="row">
															<div class="col-sm-12">
																	<section class="wizard">
																			<button type="button"  class="btn  btn-default previous pull-left"> <i class="fa fa-chevron-left"></i></button>
																			<button type="button"  class="btn btn-theme next pull-right">Siguiente </button>
																	</section>
															</div>
														</footer>
												</div>
										</form>
										<section class="clearfix align-lg-center"> 
										</section>	

								</div>	
								<!-- //account-wall-->
								
						</div>
						<!-- //col-sm-6 col-md-4 col-md-offset-4-->
				</div>
				<!-- //row-->
		</div>
		<!-- //container-->
		
</div>
<!-- //main-->

		
</div>
<!-- //wrapper-->


<!--
////////////////////////////////////////////////////////////////////////
//////////     JAVASCRIPT  LIBRARY     //////////
/////////////////////////////////////////////////////////////////////
-->
		
<!-- Jquery Library -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.ui.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/bootstrap.min.js"></script>
<!-- Modernizr Library For HTML5 And CSS3 -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="assets/plugins/mmenu/jquery.mmenu.js"></script>
<script type="text/javascript" src="assets/js/styleswitch.js"></script>
<!-- Library 10+ Form plugins-->
<script type="text/javascript" src="assets/plugins/form/form.js"></script>
<!-- Datetime plugins -->
<script type="text/javascript" src="assets/plugins/datetime/datetime.js"></script>
<!-- Library Chart-->
<script type="text/javascript" src="assets/plugins/chart/chart.js"></script>
<!-- Library  5+ plugins for bootstrap -->
<script type="text/javascript" src="assets/plugins/pluginsForBS/pluginsForBS.js"></script>
<!-- Library 10+ miscellaneous plugins -->
<script type="text/javascript" src="assets/plugins/miscellaneous/miscellaneous.js"></script>
<!-- Library Themes Customize-->
<script type="text/javascript" src="assets/js/caplet.custom.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		   //Login animation to center 
			function toCenter(){
					var mainH=$("#main").outerHeight();
					var accountH=$(".account-wall").outerHeight();
					var marginT=(mainH-accountH)/2;
						   if(marginT>30){
							   $(".account-wall").css("margin-top",marginT-15);
							}else{
								$(".account-wall").css("margin-top",30);
							}
				}
				var toResize;
				$(window).resize(function(e) {
					clearTimeout(toResize);
					toResize = setTimeout(toCenter(), 500);
				});
				
			//Canvas Loading
			  var throbber = new Throbber({  size: 32, padding: 17,  strokewidth: 2.8,  lines: 12, rotationspeed: 0, fps: 15 });
			  throbber.appendTo(document.getElementById('canvas_loading'));
			  throbber.start();
			  	
			$('#validate-wizard').bootstrapWizard({
					tabClass:"nav-wizard",
					onNext: function(tab, navigation, index) {
									var content=$('#step'+index);
									if(typeof  content.attr("parsley-validate") != 'undefined'){
													var $valid = content.parsley( 'validate' );
													if(!$valid){
																	return false;
													}
									};
									
					// Set the name for the next tab
					$('#step3 h3').find("span").html($('#fullname').val());
					},
					onTabClick: function(tab, navigation, index) {
									$.notific8('Please click <strong>next button</strong> to wizard next step!! ',{ life:5000, theme:"danger" ,heading:" Wizard Tip :); "});
									return false;
					},
					onTabShow: function(tab, navigation, index) {
									tab.prevAll().addClass('completed');
									tab.nextAll().removeClass('completed');
									if(tab.hasClass("active")){
													tab.removeClass('completed');
									}
									var $total = navigation.find('li').length;
									var $current = index+1;
									var $percent = ($current/$total) * 100;
									$('#validate-wizard').find('.progress-bar').css({width:$percent+'%'});
									$('#validate-wizard').find('.wizard-status span').html($current+" / "+$total);
									
									toCenter();
									
									var main=$("#main");
									//scroll to top
									main.animate({
										scrollTop: 0
									}, 500);
									if($percent==100){
										setTimeout(function () { main.addClass("slideDown") }, 100);
										setTimeout(function () { main.removeClass("slideDown") }, 3000);
										setTimeout( "window.location.href='dashboard.php?pvez=1'", 3500 );
									}
									
					}
			});


});
</script>
</body>
</html>