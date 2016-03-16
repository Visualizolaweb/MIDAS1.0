<?php
  require_once("../../controller/validosession.controller.php");
  require_once("../../conf.ini.php");
  require_once("../../ChromePhp.php");
  require('../../fpdf/fpdf.php');
  require_once('fpdf_js.php');
  require('rotation.php');
  require_once("../../model/class/empresa.class.php");
  require_once("../../model/class/factura.class.php");
  require_once("../../model/class/clientes.class.php");


  switch ($_REQUEST["e"]) {
    case 3:
          class PDF_AutoPrint extends PDF_JavaScript{
              function AutoPrint($dialog=false){
                //Open the print dialog or start printing immediately on the standard printer
                $param=($dialog ? 'true' : 'false');
                $script="print($param);";
                $this->IncludeJS($script);
            }

            function AutoPrintToPrinter($server, $printer, $dialog=false){
                //Print on a shared printer (requires at least Acrobat 6)
                $script = "var pp = getPrintParams();";
                if($dialog)
                    $script .= "pp.interactive = pp.constants.interactionLevel.full;";
                else
                    $script .= "pp.interactive = pp.constants.interactionLevel.automatic;";
                $script .= "pp.printerName = '\\\\\\\\".$server."\\\\".$printer."';";
                $script .= "print(pp);";
                $this->IncludeJS($script);
            }
        }
    break;

    case 4:
      // clase para la marca de agua de anulada
      class PDF extends PDF_Rotate{
          function Header(){
              //Put the watermark
              $this->SetFont('Arial','B',50);
              $this->SetTextColor(255,192,203);
              $this->RotatedText(35,190,'FACTURA ANULADA',45);
          }

          function RotatedText($x, $y, $txt, $angle){
              //Text rotated around its origin
              $this->Rotate($angle,$x,$y);
              $this->Text($x,$y,$txt);
              $this->Rotate(0);
          }
      }
    break;
  }
  if(isset($_GET["fc"])){
    $codigo_factura = $_GET["fc"];
    $dato_factura    = Gestion_Factura::facturabyID($codigo_factura);
  }else{
    $codigo_factura = $_GET["fn"];
    $dato_factura    = Gestion_Factura::facturabySede_bynum($codigo_factura, $_usu_sed_codigo);
  }

  $dato_franquicia = Gestion_Empresa::ReadbyID($_emp_codigo);
  $dato_clientes   = Gestion_Factura::CliprobyID($dato_factura["ges_clientes_cli_codigo"]);
  $detalle_factura = Gestion_Factura::DetalleFac($dato_factura["fac_codigo"]);
  $detalle_Impueto = Gestion_Factura::DetalleImp($dato_factura["fac_codigo"]);


  $subtotal = 0;
  $subtotalcondescuento = 0;
  $vlrimpuestos = 0;
  $subtotalfactura = 0;

  $documento_Factura = $_emp_codigo.'FAC'.$dato_factura["fac_numero"].'CC'.$dato_clientes["cli_identificacion"];
  $rutaFactura = $documento_Factura.".pdf";

  Gestion_Factura::RutaFactura($rutaFactura, $dato_factura['fac_codigo']);

if($_REQUEST["e"] == 3){
    $pdf=new PDF_AutoPrint();
}elseif($_REQUEST["e"] == 4){
  $pdf=new PDF();
}else{
    $pdf=new FPDF();
}

  $pdf->AddPage("P","Letter");
  // Logo

  $pdf->SetTextColor(110,110,110);
  $pdf->Image("assets/img/logo_2x.png",10,5,13);
  $pdf->SetFont('Arial','B',15);
  $pdf->SetXY(25, 2);
  $pdf->Cell(100,10,utf8_decode($dato_franquicia["emp_razon_social"]),0,1,"L" );
  $pdf->SetFont('','',11);
  $pdf->SetXY(25, 10);
  $pdf->Cell(100,8,utf8_decode('NIT: '.$dato_franquicia["emp_nit"].''),0);
  $pdf->Ln();
  $pdf->SetXY(25, 15);
  $pdf->Cell(100,8,utf8_decode('Régimen '.$dato_franquicia["emp_regimen"]),0);
  $pdf->SetTextColor( 154, 154, 154);
  $pdf->SetXY(77, 3);
  $pdf->Cell(130,8,utf8_decode($dato_franquicia["emp_direccion"]),0,0,"R");
  $pdf->SetXY(77, 8);
  $pdf->Cell(130,8,utf8_decode($dato_franquicia["emp_ciudad"].' - '.$dato_franquicia["emp_pais"]),0,0,"R");
  $pdf->SetXY(77, 13);
  $pdf->Cell(130,8,utf8_decode('T. '.$dato_franquicia["emp_telefono"].' - '.$dato_franquicia["emp_email"]),0,0,"R");
  $pdf->SetXY(77, 18);
  $pdf->Cell(130,8,utf8_decode($dato_franquicia["emp_sitioweb"]),0,0,"R");
  $pdf->Ln(17);

  $pdf->SetFont('','B',12);
  $pdf->SetTextColor( 255, 255, 255);
  $pdf->SetFillColor( 200,200,200);
  $pdf->Cell(100,8,utf8_decode('FACTURA DE VENTA'),0,1,"C",true);
  $pdf->SetDrawColor(200,200,200);
  $pdf->Line(55, 43, 269, 43);
  $pdf->SetFillColor( 240,240,240);
  $pdf->SetFont('','B',10);
  $pdf->SetTextColor(110,110,110);
  $pdf->Cell(100,8,utf8_decode('DATOS CLIENTE'),0,1,"L",true);
  $pdf->SetFont('','',10);
  $pdf->Cell(100,6,utf8_decode($dato_clientes["cli_nombre"].' '.$dato_clientes["cli_apellido"]." - C.C/Nit: ".$dato_clientes["cli_identificacion"]),0,1,"L",true);
  $pdf->Cell(100,7,utf8_decode('T: '.$dato_clientes["cli_celular"].' - '.$dato_clientes["cli_direccion"]),0,1,"L",true);


  $pdf->SetXY(116, 34);
  $pdf->SetTextColor(110,110,110);
  $pdf->SetFont('','B',13);
  $pdf->Cell(90,8,utf8_decode('FACTURA Nº '.$dato_factura["fac_numero"]),0,0,"R",false);
  $pdf->SetXY(116, 44);
  $pdf->SetFont('','',10);
  $pdf->Cell(90,8,utf8_decode('Fecha: '.$dato_factura["fac_fecha"]),0,0,"R",false);
  $pdf->SetXY(116, 50);
  $pdf->Cell(90,8,utf8_decode('Vencimiento: '.$dato_factura["fac_vencimiento"]),0,0,"R",false);
  $pdf->SetXY(116, 60);
  $pdf->SetFont('','B',10);
  $pdf->Cell(90,8,utf8_decode('Factura de venta original'),0,0,"R",false);
  $pdf->Ln(5);
  $pdf->SetFont('','B',9);

  $pdf->SetXY(10, 70);
  $pdf->Cell(78,8,utf8_decode('Item'),"TB",0,"L",true);
  $pdf->Cell(34,8,utf8_decode('Precio'),"TB",0,"C",true);
  $pdf->Cell(15,8,utf8_decode('Cant.'),"TB",0,"C",true);
  $pdf->Cell(34,8,utf8_decode('Descuento'),"TB",0,"C",true);
  $pdf->Cell(34,8,utf8_decode('Total'),"TB",0,"C",true);
  $pdf->SetFont('','',9);
  $pdf->Ln(10);
  //Tabla Factura
  foreach ($detalle_factura as $row) {

     $pdf->Cell(78,8,utf8_decode($row["prod_nombre"]),"B",0,"L");
     $pdf->Cell(34,8,"$ ".number_format($row["prod_valor"]),"B",0,"C");
     $pdf->Cell(15,8,utf8_decode($row["det_cantidad"]),"B",0,"C");
     $pdf->Cell(34,8,utf8_decode($row["prod_descuentos"].'%'),"B",0,"C");



     $total = $row["prod_valor"]*$row["det_cantidad"];
     $total = $total - ($total * $row["prod_descuentos"] / 100);

     $pdf->Cell(34,8,"$ ".number_format($row["prod_valorTotal"]*$row["det_cantidad"]),"B",0,"C");
     $pdf->Ln(10);


     $subtotal += $row["prod_valor"]*$row["det_cantidad"];
     $subtotalcondescuento += $total;

     $total_producto  = $row["prod_valorTotal"]*$row["det_cantidad"];

     $impuesto_producto  = ($total_producto - (round($total_producto / str_replace("0.","1.",$row["imp_porcentaje"]))));
     $subtotalfactura   += $total_producto - $impuesto_producto + (($row["prod_valor"]*$row["det_cantidad"])* $row["prod_descuentos"] / 100) ;


  }

  $total_factura = $subtotal;

  $pdf->Ln(5);


  $pdf->SetX(137);
  $pdf->Cell(34,8,utf8_decode('Subtotal'),0,0,"C",true);
  $pdf->Cell(34,8,"$ ".number_format($subtotalfactura),0,0,"R");
  $descuento = 0;
  // Si la factura tiene descuento
  if($subtotalcondescuento != $subtotal){
      $pdf->Ln();
      $pdf->SetX(137);
      $pdf->Cell(34,8,utf8_decode('Descuento'),0,0,"C",true);
      $pdf->Cell(34,8,"$ ".number_format($subtotalcondescuento - $subtotal),0,0,"R");
      // Subtotal con descuento


      $descuento = $subtotal - $subtotalcondescuento;

  }

  if($detalle_Impueto){
    foreach ($detalle_Impueto as $impuesto) {
      $pdf->Ln();
      $pdf->SetX(137);
      $pdf->Cell(34,8,utf8_decode($impuesto["imp_nombre"]),0,0,"C",true);
      $pdf->Cell(34,8,"$ ".number_format($impuesto["ValorImpuesto"]),0,0,"R");

      $vlrimpuestos += $impuesto["ValorImpuesto"];
     }
  }
  $pdf->Ln();
  $pdf->SetX(137);

  $pdf->SetTextColor(255,255,255);
  $pdf->SetFillColor( 80,80,80);
  $pdf->Cell(34,8,utf8_decode('Total'),0,0,"C",true);
    $pdf->SetFillColor( 140,140,140);
  $pdf->Cell(34,8,"$ ".number_format(($subtotalfactura - $descuento) + $vlrimpuestos),0,0,"R",true);


  $pdf->SetTextColor(110,110,110);
  $pdf->Ln(12);
  $pdf->SetX(10);
  $pdf->SetFont('','B',8);
  $pdf->Cell(100,8,utf8_decode('Observaciones'),0,0,"L");
  $pdf->Ln();
  $pdf->SetX(10);
  $pdf->SetFont('','',7);
  $txt_observaciones = "1. Iniciado el plan NO se hace devolución del dinero. 2. El plan tiene vencimiento. 3. Las citas se deben cancelar con un minimo de 4 horas. 4. Programa flotante esta sujeto a disponibilidad horaria, se programa por semana. 5. Maximo 2 sesiones para reprogramar por mes. 6. NO efectuar retención en la fuente, acogidos a la ley 1429 de 2010 Art 4 Paragrafo 2.";
  $txt_terminos = "Esta factura se asimila en todos sus afectos a una letra de cambio de conformidad con el Art. 774 del código de comercio. Autorizo que en caso de incumplimiento de esta obligación sea reportado a las centrales de riesgo, se cobraran intereses por mora.";

  $pdf->SetX(10);
  $pdf->MultiCell(195,4,utf8_decode($txt_terminos));
  $pdf->SetX(10);
  $pdf->SetFont('','B',8);
  $pdf->Cell(95,8,utf8_decode('Términos y Condiciones'),0,0,"L");
  $pdf->Ln();
  $pdf->SetX(10);
  $pdf->SetFont('','',7);
  $pdf->MultiCell(195,4,utf8_decode($txt_observaciones));
  $pdf->Ln();

  $pdf->SetFont('','',8);
  $pdf->Cell(195,8,utf8_decode('Resolución DIAN No 110000564929 2014/01/30 De 1 a 100000'),0,0,"C");

  switch ($_REQUEST["e"]) {
    case 1:
        $pdf->Output("F","../../facturas/".$rutaFactura);
        $pdf->Output();
      break;
    case 2:
        $pdf->Output("F","../../facturas/".$rutaFactura);
        $pdf->Output("D","../../facturas/".$rutaFactura);
      break;
    case 3:
      $pdf->AutoPrint(true);
      $pdf->Output();
    break;
    case 4:
        $pdf->Output("F","../../facturas/".$rutaFactura);
        $pdf->Output();
    break;
    case 5:
        $pdf->Output("F","../../facturas/".$rutaFactura);
        $emails = str_replace(' ',"",$_GET["dir"]);
        $emails = explode(",", $emails);

        require_once('../../PHPMailer/PHPMailerAutoload.php');

        $correo = new PHPMailer();
        $correo->IsSMTP();
        $correo->SMTPAuth = true;
        $correo->SMTPSecure = 'tls';
        $correo->Host = "smtp.gmail.com";
        $correo->Port = 587;
        $correo->Username   = "guivalen@gmail.com";
        $correo->Password   = "guillermo1037571915";
        $correo->SetFrom("guivalen@gmail.com", "MIDAS");
        $correo->AddReplyTo("guivalen@gmail.com","MIDAS");

        foreach ($emails as $row) {
            $correo->AddAddress($row);
        }

        $correo->Subject = "Factura BES # ".$dato_factura["fac_numero"];
        $correo->MsgHTML("
        <img src='assets/img/logo_2x.png' style='float:left' width='65'>
        <div style='padding: 12px; background-color: #90d127; color: #fff; margin-left:70px'>

          <h1>FACTURA DE COMPRA EN UN LABORATORIO BES</h1>
        </div>
        <br>
        <p style='clear:both; font-size: 14px; color: #6e6e6e'>
          Estimado(a) ".$dato_clientes["cli_nombre"].' '.$dato_clientes["cli_apellido"]." este correo se ha generado automaticamente desde la aplicación MIDAS con el fin de adjuntarle la factura de compra Nº ".$dato_factura["fac_numero"]." generada para usted el dia ".$dato_factura["fac_fecha"]."
        </p>
        <div style='text-align:center'>
          <img src='assets/img/unnamed.png'>
        </div>
        <small style='display:block; margin-top:20px; color: #ccc'>
        <p style='color:rgb(83, 171, 22); font-weight:bold;' >Be Smart protege el ambiente, hazlo tú también e imprime este correo sólo si es necesario.
                Be Green. Be Smart.</p>

                <p>Este mensaje y los archivos anexos son confidenciales, privilegiados y/o protegidos por derechos de autor. Están dirigidos única y exclusivamente para uso del destinatario. Su reproducción, distribución, lectura y uso están prohibidos a cualquier persona diferente y puede ser ilegal. Si por error lo ha recibido, por favor discúlpenos, notifíquenoslo y elimínelo. Las opiniones, conclusiones y otra información contenida en este correo no relacionada con el negocio oficial del remitente, deben entenderse como personales y de ninguna manera son avaladas por BE SMART y/o sus filiales.
                Gracias.

                This e-mail and any files transmitted with it contain confidential and privileged information and are for the sole use of the intended recipient(s). If you are not the intended recipient we offer apology, please contact the sender by reply e-mail and destroy all copies of the original message. Any unauthorized review, use, disclosure, dissemination, forwarding, printing or copying of this e-mail or any action taken in relation to this e-mail is strictly prohibited and may be unlawful. Opinions, conclusions and any other information contained in this message no related with official business of the expeditor, must to be understood as personal and by no means, in no way represent the opinions of BE SMART and/or it's subsidiaries.
                Thank you.</p>        </small>
        ");
        $correo->AddAttachment("../../facturas/".$rutaFactura);

        if(!$correo->Send()) {
          echo "Hubo un error: " . $correo->ErrorInfo;
        } else {
          echo "Mensaje enviado con exito.";
        }



    break;
  }
?>
