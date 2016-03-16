<?php

  require_once("../conf.ini.php");
  require_once("../model/class/sedes.class.php");
  require_once("validosession.controller.php");

  $accion = $_POST["btn_continue"];

  switch($accion){
    case "eliminar":
       $sed_codigo = $_POST["codigoid"];

            try{
               Gestion_Sedes::Delete($sed_codigo);
               $alert_type = base64_encode("alert-success");
               $alert_msn  = base64_encode("Listo! tu registro ha sido eliminado correctamente. ");
            }catch(Exception $e){

               require_once("exceptions.controller.php");

               $alert_type = base64_encode("alert-danger");
               $alert_msn  = $exception_e;

               //Almacenamos el error en el log del sistema

               error($e->getMessage(),$e->getFile(),$e->getLine());

            }

    break;

    case "guardar":

        $sed_codigo        = $_POST["txt_sed_codigo"];
        $sed_nombre        = $_POST["txt_sed_nombre"];
        $sed_telefono      = $_POST["txt_sed_telefono"];
        $sed_email         = $_POST["txt_sed_email"];
        $sed_direccion     = $_POST["txt_sed_direccion"];
        $sed_pais          = $_POST["txt_sed_pais"];
        $sed_departamento  = $_POST["txt_sed_departamento"];
        $sed_ciudad        = $_POST["txt_sed_ciudad"];
        $sed_geoubicacion  = "";
        $sed_autor         = $_usu_nombre." ".$_usu_apellido_1;
        $sed_horainicio    = $_POST["txt_sed_horainicio"];
        $sed_horacierre    = $_POST["txt_sed_horacierre"];        
        

        try{
          Gestion_Sedes::Create($sed_codigo, $_emp_codigo, $sed_nombre, $sed_telefono, 
            $sed_email, $sed_direccion, $sed_pais, $sed_departamento, $sed_ciudad, 
            $sed_geoubicacion, $hoy, $sed_autor, $sed_horainicio, $sed_horacierre);
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

    case "modificar":

        $sed_codigo        = $_POST["txt_sed_codigo"];
        $sed_nombre        = $_POST["txt_sed_nombre"];
        $sed_telefono      = $_POST["txt_sed_telefono"];
        $sed_email         = $_POST["txt_sed_email"];
        $sed_direccion     = $_POST["txt_sed_direccion"];
        $sed_pais          = $_POST["txt_sed_pais"];
        $sed_departamento  = $_POST["txt_sed_departamento"];
        $sed_ciudad        = $_POST["txt_sed_ciudad"];
        $sed_geoubicacion  = "";
        $sed_horainicio    = $_POST["txt_sed_horainicio"];
        $sed_horacierre    = $_POST["txt_sed_horacierre"]; 

        try{
          Gestion_Sedes::Update($sed_codigo, $sed_nombre, $sed_telefono, $sed_email, $sed_direccion, $sed_pais, $sed_departamento, $sed_ciudad, $sed_geoubicacion, $sed_horainicio, $sed_horacierre);
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

  }

  header("location: ../views/default/dashboard.php?m=".base64_encode("module/sedes.php")."&pagid=".base64_encode("PAG-100015")."&alert=true&alty=$alert_type&almsn=$alert_msn");
?>
