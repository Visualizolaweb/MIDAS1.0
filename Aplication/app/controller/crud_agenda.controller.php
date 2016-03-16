<?php

  require_once("../conf.ini.php");
  require_once("../model/class/agenda.class.php");
  require_once("../model/class/clientes.class.php");
  require_once("validosession.controller.php");

  $accion = $_REQUEST["btn_continue"];

  switch($accion){
     case "crear":

      $cli_codigo         = $_POST["txt_cli_codigo"];
      $sed_codigo         = $_POST["txt_sed_codigo"];
      $age_sala           = $_POST["txt_age_sala"];
      $age_fecha          = $_POST["txt_fech_fin"];
      $age_hora           = $_POST["txt_hora"];
      $colorcita          = $_POST["txt_color_cita"];
      $age_estado         = "Activa";
      $emp_fecha_creacion = $hoy;
      $emp_autor          = $_usu_nombre." ".$_usu_apellido_1;
      $cupo               = $_POST["cupo"];
        try{
          Gestion_Agenda::Create($cli_codigo,$sed_codigo,$age_sala,$age_fecha,$age_hora,$colorcita,$age_estado, $emp_autor,  $emp_fecha_creacion);
          Gestion_Clientes::UpdateCupo($cli_codigo, $cupo);
          $alert_type = base64_encode("alert-success");
          $alert_msn  = base64_encode("La cita quedo guardada");

        }catch(Exception $e){

               require_once("exceptions.controller.php");

               $alert_type = base64_encode("alert-danger");
               $alert_msn  = $exception_e;

               //Almacenamos el error en el log del sistema

               error($e->getMessage(),$e->getFile(),$e->getLine());
        }

        $pagina = "UEFHLTEwMDA2";
        $pagina2 = base64_encode("module/agenda.php");

    break;

    case "modificar":

      $emp_codigo         = $_POST["txt_emp_codigo"];
      $emp_nit            = $_POST["txt_emp_nit"];
      $emp_razon_social   = $_POST["txt_emp_razon_social"];
      $emp_representante  = $_POST["txt_emp_representante"];
      $emp_pais           = $_POST["txt_emp_pais"];
      $emp_ciudad         = $_POST["txt_emp_ciudad"];
      $emp_telefono       = $_POST["txt_emp_telefono"];
      $emp_direccion      = $_POST["txt_emp_direccion"];
      $emp_email          = $_POST["txt_emp_email"];
      $emp_sitioweb       = $_POST["txt_emp_sitioweb"];
      $emp_moneda         = $_POST["txt_emp_moneda"];

        try{
          Gestion_Empresa::Update($emp_codigo, $emp_nit, $emp_razon_social, $emp_representante, $emp_pais, $emp_ciudad, $emp_telefono, $emp_direccion, $emp_email, $emp_sitioweb, $emp_moneda);
          $alert_type = base64_encode("alert-success");
          $alert_msn  = base64_encode("<strong>Perfecto!</strong> tu registro se ha guardado correctamente. ");

        }catch(Exception $e){

               require_once("exceptions.controller.php");

               $alert_type = base64_encode("alert-danger");
               $alert_msn  = $exception_e;

               //Almacenamos el error en el log del sistema

               error($e->getMessage(),$e->getFile(),$e->getLine());
        }

    break;

  case "cancelar":

   $age_codigo         = $_GET["id"];
   $emp_autor          = $_usu_nombre." ".$_usu_apellido_1;

     try{
       Gestion_Agenda::Cancelacion($age_codigo,$emp_autor);

       $alert_type = base64_encode("alert-success");
       $alert_msn  = base64_encode("La cita se ha cancelado");

     }catch(Exception $e){

            require_once("exceptions.controller.php");

            $alert_type = base64_encode("alert-danger");
            $alert_msn  = $exception_e;

            //Almacenamos el error en el log del sistema

            error($e->getMessage(),$e->getFile(),$e->getLine());
     }

         $pagina = "UEFHLTEwMDA2";
         $pagina2 = base64_encode("module/agenda.php");

 break;
  }

 header("location: ../views/default/dashboard.php?m=".$pagina2."=&alert=true&alty=$alert_type&almsn=$alert_msn&pagid=$pagina");
?>
