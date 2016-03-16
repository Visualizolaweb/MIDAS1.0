<?php

  require_once("../conf.ini.php");
  require_once("../model/class/franquicias.class.php");

        // Captura de datos desde el formulario
        $empresa_nit            = $_POST["empresa_nit"];
        $empresa_razon          = $_POST["empresa_razon"];
        $banco_cuenta           = $_POST["banco_cuenta"];
        $banco_tipocuenta       = $_POST["banco_tipocuenta"];
        $banco_codigo           = $_POST["banco_nombre"];
        $banco_saldo            = $_POST["banco_saldo"];
        $laboratorio_nombre     = $_POST["laboratorio_nombre"];
        $laboratorio_telefono   = $_POST["laboratorio_telefono"];
        $laboratorio_direccion  = $_POST["laboratorio_direccion"];
        $laboratorio_horaini    = $_POST["laboratorio_horaini"];
        $laboratorio_horafin    = $_POST["laboratorio_horafin"];
        $usuario_nombre         = $_POST["usuario_nombre"];
        $usuario_apellido       = $_POST["usuario_apellido"];
        $usuario_email          = $_POST["usuario_email"];
        $usuario_tipodocumento  = $_POST["usuario_tipodocumento"];
        $usuario_dni            = $_POST["usuario_dni"];
        $usuario_clave          = password_hash($_POST["usuario_clave"],PASSWORD_BCRYPT,["cost" => 9]);

        // Captura fecha de creacion y autor
        $hoy = $hoy_fecha;
        $autor = "MIDAS BES";

        // Creacion de codigos unicos
        require_once("../model/class/codigopk.class.php");
        $empresa_codigo = Codigo_PK::GenerarCodigo("emp_codigo","ges_empresa","EMP");
        $sede_codigo = Codigo_PK::GenerarCodigo("sed_codigo","ges_sedes","SED");
        $usuario_codigo = Codigo_PK::GenerarCodigo("usu_codigo","ges_usuarios","USU");
        $acceso_codigo = Codigo_PK::GenerarCodigo("acc_codigo","ges_acceso","ACC");

        try{
          Gestion_Franquicias::Create_Empresa($empresa_codigo, $empresa_nit, $empresa_razon, $hoy, $autor);
          Gestion_Franquicias::Create_Sede($sede_codigo, $empresa_codigo, $laboratorio_nombre, $laboratorio_telefono, $laboratorio_direccion,  $hoy, $autor, $laboratorio_horaini, $laboratorio_horafin);
          Gestion_Franquicias::Create_Finanza($banco_codigo, $sede_codigo, $banco_tipocuenta, $banco_cuenta, $banco_saldo);
          Gestion_Franquicias::Create_Usuario($usuario_codigo, "PER-00002", $sede_codigo, $usuario_tipodocumento, $usuario_dni, $usuario_nombre, $usuario_apellido, $usuario_email, $usuario_clave, $acceso_codigo, $hoy, $autor);

          $alert_type = base64_encode("alert-success");
          $alert_msn  = base64_encode("<strong>Perfecto!</strong> Se ha registrado correctamente en poco tiempo recibirá un correo informando su activación. ");

        }catch(Exception $e){

               require_once("exceptions.controller.php");

               $alert_type = base64_encode("alert-danger");
               $alert_msn  = $exception_e;

               //Almacenamos el error en el log del sistema

               error($e->getMessage(),$e->getFile(),$e->getLine());
        }



  header("location: ../views/default/login.php?alert=true&alty=$alert_type&almsn=$alert_msn");
?>
