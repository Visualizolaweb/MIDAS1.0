<?php
require_once("../../model/class/agenda.class.php");
require_once("../../model/class/sedes.class.php");
require_once("../../model/class/planes.class.php");
require_once("../../model/class/clientes.class.php");

$cli_sede = $_usu_sed_codigo;

$tipo_plan  = $_REQUEST["typ"];
$cli_codigo = $_REQUEST["CID"];

$agenda  = Gestion_Agenda::ReadbySede($cli_sede);
$sedes   = Gestion_Sedes::ReadbyID($cli_sede);
$plan    = Gestion_Planes::ReadbyID($_REQUEST["PID"]);
$cliente = Gestion_Clientes::ReadbyID($cli_codigo);

$numagenda = count($agenda);


if($tipo_plan=="cortesia"){
   $cli_plan = "PLA-00001";
}else{
   $cli_plan = $_REQUEST["cli_plan"];
}
?>


<div id="main">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel">
        <header class="panel-heading">
          <h2>
            <?php
              if($tipo_plan=="cortesia"){
                echo "RESERVAR CITA PARA LA CORTESIA";
              }else{
                echo "RESERVAR HORARIO DE CITAS DEL PLAN";
              }
            ?>
          </h2>
          <span>Para realizar una reserva simplemente se hace clic sobre la fecha seleccionada</span>
        </header>

      </div>
  </div>
  </div>

  <div id="md-ajax" class="modal fade md-stickTop" tabindex="-1">
  		<div class="modal-header bg-inverse">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h3>Administrar citas</h3>
  		</div>
  		<div class="modal-body">
  		</div>
  </div>

  <div class="tabbable" id="tables">
        <ul class="nav nav-tabs" data-provide="tabdrop">
              <li><a href="#" class="change" data-change="prev"><i class="fa fa-chevron-left"></i> Anterior</a></li>
           <li><a href="#" class="change" data-change="next"> Siguiente  <i class="fa fa-chevron-right"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="row">

                <div class="col-lg-10" >
                    <div id="calendar"></div>
                </div>

                <div class="col-lg-2">
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
                    <div>
                        <input type="hidden" id="misede" value="<?php echo $_usu_sed_codigo; ?>">
                        <!-- <div id="btn-crearcita" class="btn btn-inverse btn-block"><i class="fa fa-file-text"></i> Crear cita</div> -->
                        <!--  <div id="btn-movercita" class="btn btn-inverse btn-block"><i class="fa fa-arrows"></i> Mover cita</div><hr>-->
                        <!-- <div id="btn-cancelacita" class="btn btn-inverse btn-block"><i class="fa fa-trash-o"></i> Cancelar cita</div><hr> -->
                        <h4><strong>TABLA</strong> de colores </h4>
                        <hr>
                        <span class="external-event label btn-block " style="background-color:#E5E9EC;">Disponible</span>
                        <span class="external-event label btn-block " style="background-color:#69c9ff;">No Disponible</span>
                        <span class="external-event label btn-block " style="background-color:#da3f72;">Reserva ultima sem.</span>

                        <div id="test"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/plugins/fullcalendar/fullcalendar.js"></script>

<link href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" />


<script>
	$(document).ready(function() {

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
    var plan_cupo = "<?php echo $plan['pla_cupo']?>";
    var cupo_restante = 0;
		$('#external-events span.external-event').draggable({
				zIndex: 999,
				revert: true,
				revertDuration: 0 ,
				drag: function() { $("#slide-trash").addClass("active") },
				stop: function() { $("#slide-trash").removeClass("active") }
		});

	    $( "#slide-trash" ).droppable({
		 accept: "#external-events span.external-event , .fc-event",
		 hoverClass: "active-hover",
		 drop: function( event, ui ) {
			 ui.draggable.remove();

			 $(this).removeClass( "active" );
		 }
	    });
		var isElemOverDiv = function(draggedItem, dropArea) {
			// Prep coords for our two elements
			var a = $(draggedItem).offset;
			a.right = $(draggedItem).outerWidth + a.left;
			a.bottom = $(draggedItem).outerHeight + a.top;

			var b = $(dropArea).offset;
			a.right = $(dropArea).outerWidth + b.left;
			a.bottom = $(dropArea).outerHeight + b.top;

			// Compare
			if (a.left >= b.left
				&& a.top >= b.top
				&& a.right <= b.right
				&& a.bottom <= b.bottom) { return true; }
			return "Registro actualizado";
		}
		$('#calendar').fullCalendar({
			eventDragStop: function(event, jsEvent, ui, view) {
				var x = isElemOverDiv(ui, $('#slide-trash'));

			},
			header: {
				left: '',
				center: 'title',
				right: ''
			},
      lang: 'es',
      allDaySlot: false,
			editable: false,
      disableResizing: true,
      eventDurationEditable: false,
      hiddenDays:[0],
      defaultEventMinutes: 30,

      <?php
      if($tipo_plan == "cortesia"){
        if($cliente["cli_cortesia"] == 0){
          echo "selectable: true,";
        }else{
          echo "selectable: false,";
        }
      }else{
        if(($cliente["cli_credito"] >= $plan["pla_cupo"])){
          echo "selectable: true,";
        }else{
          echo "selectable: false,";
        }
      }

      ?>

      select: function(start, end) {
        $('body').modalmanager('loading');
  		  setTimeout(function(){
          var cli_sede = $("#misede").val();
          var cli_codigo = "<?php echo $cliente["cli_identificacion"]; ?>";
          var pla_codigo = "<?php echo $_REQUEST["PID"]; ?>";
  			  $('#md-ajax').find(".modal-body").load('module/agenda_nuevo3.php',{cli_codigo:cli_codigo,misede:cli_sede, fechini:start, fechfin:end}, function(){
  			  $('#md-ajax').modal();
  			});
  		  }, 2000);
			},

			droppable: true,
      eventLimit: true, // allow "more" link when too many events
      minTime: '<?php echo $sedes["sed_horainicio"]; ?>',
      maxTime: '<?php echo $sedes["sed_horacierre"]; ?>',
      displayEventEnd: true,
      slotEventOverlap: true,
      slotLabelFormat: 'h:mm tt',
      slotMinutes:30.1,
      axisFormat: 'h:mm tt',
			events: [


        <?php
        $x = 0;
        foreach ($agenda as $item) {
          echo "{
            start:  '".$item[7]."T".$item[8]."',
            rendering: 'background',
            overlap: false,
            color: '#69c9ff'";
          echo "}";

          $x += 1;

          if($x < $numagenda){
            echo ",";
          }
        }

        ?>
			],

      // eventClick: function(calEvent, jsEvent, view) {
      //   // change the border color just for fun
      //   $(this).css('background-color', '#da3f72');
      //   $(this).css('border-color', '#da3f72');
      //
      // },


      eventDrop: function(event, delta, revertFunc) {
          $('#test').load("module/agenda_muevo.php",{cita:event.start, id:event.id});


   }
		});
		$(".change").click(function(){
			  var data=$(this).data();
			$('#calendar').fullCalendar( data.change );
		});

	});

</script>
