<?php

  require_once("../conf.ini.php");
  require_once("../model/class/agenda.class.php");
  require_once("../model/class/planes.class.php");
  require_once("../model/class/clientes.class.php");
  require_once("validosession.controller.php");
  require_once("../model/class/historiaplan.class.php");

  $cli_codigo         = $_POST["txt_cli_codigo"];
  $sed_codigo         = $_POST["txt_sed_codigo"];
  $age_sala           = $_POST["txt_age_sala"];
  $age_fecha          = $_POST["txt_fech_fin"];
  $age_hora           = $_POST["txt_hora"];
  $colorcita          = $_POST["txt_color_cita"];
  $cli_plan          = $_POST["txt_cli_plan"];
  $age_estado         = "Sin Facturar";
  $emp_fecha_creacion = $hoy;
  $autor          = $_usu_nombre." ".$_usu_apellido_1;


  $planes = Gestion_Planes::ReadbyID($cli_plan);
  $color = $planes['pla_color'];
      try{

        if($cli_plan == "PLA-00001"){
          Gestion_Agenda::Create($cli_codigo,$sed_codigo,$age_sala,$age_fecha,$age_hora,$colorcita,$age_estado, $autor,  $emp_fecha_creacion);
          Gestion_Clientes::UpdateCortesia($cli_codigo, 1);
        }else{
            $cupos = Gestion_Agenda::Disponibilidadunafecha($sed_codigo, $age_fecha,$age_hora);
            if(count($cupos)<2){
              for ($i=1; $i <= $planes["pla_cupo"]; $i++) {
                if($i == $planes["pla_cupo"]){
                  $color = "#ff0000";
                }
                Gestion_Agenda::Create($cli_codigo,$sed_codigo,1,$age_fecha,$age_hora,$color,"Sin facturar", $autor,  $hoy);
                $nueva_fecha = new DateTime($age_fecha);
                $nueva_fecha->add(new DateInterval('P7D'));
                $age_fecha = $nueva_fecha->format('Y-m-d');

                Gestion_Clientes::UpdateCupo($cli_codigo, $i);
              }

            }
            // $hpla_fecha_compra = $emp_fecha_creacion;
            // $vencimiento = $planes["pla_vigencia"];
            // $hpla_fecha_vence_tmp = new DateTime($hpla_fecha_compra);
            // $hpla_fecha_vence_tmp->add(new DateInterval('P'.$vencimiento.'D'));
            // $hpla_fecha_vence = $nueva_fecha->format('Y-m-d');
            //
            // Gestion_Historia_Plan::Create($cli_codigo,$cli_plan,$hpla_fecha_compra,$hpla_fecha_vence,0,0,"Sin Facturar");

          $color = "#5d5d5d";
          Gestion_Agenda::Create($cli_codigo,$sed_codigo,1,$age_fecha,$age_hora,$color,"Reservada", $autor,  $hoy);

        }

          $alert_type = base64_encode("alert-success");
          $alert_msn  = base64_encode("La cita quedo guardada");

        }catch(Exception $e){

               require_once("exceptions.controller.php");

               $alert_type = base64_encode("alert-danger");
               $alert_msn  = $exception_e;

               //Almacenamos el error en el log del sistema

               error($e->getMessage(),$e->getFile(),$e->getLine());
        }


        if($cli_plan == "PLA-00001"){
          $pagina = "UEFHLTEwMDA2";
          $pagina2 = base64_encode("module/agenda.php");
header("location: ../views/default/dashboard.php?m=".$pagina2."=&alert=true&alty=$alert_type&almsn=$alert_msn&pagid=$pagina");
        }else{
          // Aquí empieza, llamo la clase Gestion_Clientes y utilizo el método ReadbyID
          $datos  =  Gestion_Clientes::ReadbyID($_REQUEST['txt_cli_codigo']); // Aqui retorna la consulta "array" dentro de la variable datos

            //codifico l array en base64 y a su vez en json y lo paso por url
        header("location: ../views/default/facturar.php?data=".base64_encode(json_encode($datos))."&pl=".base64_encode(json_encode($planes)));
        }
?>
