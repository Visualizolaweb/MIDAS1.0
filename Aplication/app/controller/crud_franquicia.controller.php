<?php

  require_once("../model/dbconn.model.php");
  require_once("../model/class/franquicias.class.php");

  function error($texto, $archivo, $linea){
    $ddf = fopen('../midas.log','a');
    fwrite($ddf,"---------- Error ocurrido al momento de registrar -----------\r\n [".date("r")."]: $texto, ubicado en el archivo $archivo Linea $linea. \r\n\r\n\r\n");
    fclose($ddf);
  }
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
        date_default_timezone_set('America/Bogota');
        $hoy = date("Y-m-d h:i:s");
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

          require_once('../PHPMailer/PHPMailerAutoload.php');

          $correo = new PHPMailer();
          $correo->IsSMTP();
          $correo->SMTPAuth = true;
          $correo->SMTPSecure = 'tls';
          $correo->Host = "smtp.gmail.com";
          $correo->Port = 587;
          $correo->Username   = "appmidas.bes@gmail.com";
          $correo->Password   = "90L1vfsj";
          $correo->SetFrom("appmidas.bes@gmail.com", "MIDAS");
          $correo->AddReplyTo("asistente.bes@gmail.com","MIDAS");
          $correo->AddAddress($usuario_email);


          $correo->Subject = "Su cuenta en MIDAS se ha creado con exito.";
          $correo->MsgHTML("
          <img src='http://midas.bes.com.co/app/views/default/assets/img/logo_2x.png' style='float:left' width='65'>
          <div style='padding: 12px; background-color: #90d127; color: #fff; margin-left:70px'>

            <h1>SU CUENTA EN MIDAS SE HA CREADO CON EXITO</h1>
          </div>
          <br>
          <p style='clear:both; font-size: 14px; color: #6e6e6e'>
            Estimado(a) ".$usuario_nombre.' '.$usuario_apellido." este correo se ha generado automaticamente desde la aplicación MIDAS con el fin de notificarle que la creación de su cuenta ha sido exitosa.
            <br>se ha enviado una notificación a la casa Matriz para la activación de su cuenta, al momento de esta estar activada se le estará enviando nuevamente un correo notificando dicha acción.
          </p>


          <div style='text-align:center'>
            <img src='http://midas.bes.com.co/app/views/default/assets/img/unnamed.png'>
          </div>
          <small style='display:block; margin-top:20px; color: #ccc'>
          <p style='color:rgb(83, 171, 22); font-weight:bold;' >Be Smart protege el ambiente, hazlo tú también e imprime este correo sólo si es necesario.
                  Be Green. Be Smart.</p>

                  <p>Este mensaje y los archivos anexos son confidenciales, privilegiados y/o protegidos por derechos de autor. Están dirigidos única y exclusivamente para uso del destinatario. Su reproducción, distribución, lectura y uso están prohibidos a cualquier persona diferente y puede ser ilegal. Si por error lo ha recibido, por favor discúlpenos, notifíquenoslo y elimínelo. Las opiniones, conclusiones y otra información contenida en este correo no relacionada con el negocio oficial del remitente, deben entenderse como personales y de ninguna manera son avaladas por BE SMART y/o sus filiales.
                  Gracias.

                  This e-mail and any files transmitted with it contain confidential and privileged information and are for the sole use of the intended recipient(s). If you are not the intended recipient we offer apology, please contact the sender by reply e-mail and destroy all copies of the original message. Any unauthorized review, use, disclosure, dissemination, forwarding, printing or copying of this e-mail or any action taken in relation to this e-mail is strictly prohibited and may be unlawful. Opinions, conclusions and any other information contained in this message no related with official business of the expeditor, must to be understood as personal and by no means, in no way represent the opinions of BE SMART and/or it's subsidiaries.
                  Thank you.</p>
                </small>
          ");

          if(!$correo->Send()) {
            echo "Hubo un error: " . $correo->ErrorInfo;

          } else {
            echo "Mensaje enviado con exito.";
          }

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
