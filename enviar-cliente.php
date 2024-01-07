<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("header.php");
//llamado a phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';
// Verifica si se han recibido las variables necesarias
if(isset($_GET['id_venta']) && isset($_GET['nombre_cliente']) && isset($_GET['email_cliente']) && isset($_GET['ruta_ticket']) && isset($_GET['fecha_venta'])) {
    // Recupera las variables GET
    $idVenta = $_GET['id_venta'];
    $nombreCliente = $_GET['nombre_cliente'];
    $emailCliente = $_GET['email_cliente'];
    $rutaTicket = $_GET['ruta_ticket'];
    $fechaVenta = $_GET['fecha_venta'];

    //formateamos la variable con la fecha deseada
    $fechaVenta = date('d-m-Y');

// Configuración de PHPMailer
$mail = new PHPMailer(true); // 'true' activa excepciones
try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->isHTML(true);
    $mail->Host = 'smtp.gmail.com'; // Puedes usar 'smtp.gmail.com' para Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'ceballosmarincristiancamilo@gmail.com'; // Tu dirección de correo
    $mail->Password = 'mbxj llvv vrbm jwyf'; // Tu contraseña de correo
    $mail->SMTPSecure = 'tls'; // 'tls' o 'ssl' dependiendo del servidor
    $mail->Port = 587; // Puerto para 'tls', 465 para 'ssl'

    // Configuración del correo
    $mail->setFrom('ceballosmarincristiancamilo@gmail.com', 'Shampoo ABC');
    $mail->addAddress($emailCliente);
    $mail->Subject = 'Ticket de Venta';
    $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="x-apple-disable-message-reformatting"><title></title><!--[if gte mso 9]><xml><o:officedocumentsettings><o:allowpng><o:pixelsperinch>96</o:pixelsperinch></o:officedocumentsettings></xml><style type="text/css">table{border-collapse:collapse!important}.banner_ecard a{text-decoration:none!important}</style><![endif]--><style type="text/css">body{min-width:100%}.ReadMsgBody{width:100%}.ExternalClass{width:100%}.ExternalClass *{line-height:100%}body,p,table,td,th{color:#5d5e5d;font-family:Arial,Helvetica,sans-serif;font-weight:400;font-size:16px;margin:0;margin:0;padding:0;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}a{color:inherit;font-size:inherit!important;text-decoration:inherit!important}a[href],a[href^=tel]{color:inherit!important;text-decoration:none}.footer_ecard font a{font-size:12px;text-decoration:underline!important}a.button,a.button:active,a.button:hover,a.button:link,a.button:visited{color:#fff;text-decoration:none}.single_cta a{color:#fff!important;text-decoration:none!important}@media(max-width:320px){.block_av_branding{text-align:center!important;min-width:100%!important}}@media(max-width:680px){.column{max-width:100%!important;width:100%!important}.d100{width:100%!important;display:block}.punto-venta .column{display:block;text-align:center!important;width:150px!important}.h_column{max-width:100%!important;width:100%!important;display:inline-block}.small_100{height:350px!important;min-width:100%!important}.h_divider_shared_cta{width:5%!important}.main_cta_shared{min-width:250px!important;width:90%!important}.block_av_branding,.block_av_cobranding{text-align:right!important}.block_av_cobranding{padding-top:10px!important}.banner_ecard p{text-align:center!important}a.user_actions{display:block}}</style></head><body style="border-spacing:0;border-collapse:collapse;height:100%;margin:0;margin:0;padding:0"><table class="wrapper" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;border-collapse:collapse;background-color:#ececec;margin:0;margin:0;padding:0;width:100%"><tbody><tr><td style="border-spacing:0;border-collapse:collapse;padding:0"><center style="margin:0 auto;margin:0 auto;max-width:692px;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;width:100%;padding:0"><!--[if (gte mso 9)|(IE)]><table width="692" style="border-collapse:collapse;border-spacing:0;max-width:692px!important" cellpadding="0" cellspacing="0"><tr><td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0"><![endif]--><table class="main" align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#fff;border-spacing:0;border-collapse:collapse;box-sizing:border-box;max-width:692px!important;margin:0 auto;margin:0 auto;min-width:100%;padding:0;table-layout:fixed;width:100%"><tbody><tr><td style="border-spacing:0;border-collapse:collapse"><table bgcolor="#ff0000" border="0" cellpadding="0" cellspacing="0" width="100%" class="banner_ecard" style="border-spacing:0;border-collapse:collapse;table-layout:fixed"><tbody><tr><td width="100%" style="border-spacing:0;border-collapse:collapse" class="main_banner"><!--[if gte mso 9]><v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" height="151" stroke="false" width="692" style="background-color:red;height:151px;width:692px"><v:fill type="frame" color="#ff0000" height="151" width="692"><v:textbox inset="0,0,0,0"><![endif]--><table align="right" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0;border-collapse:collapse;table-layout:fixed;background:#000"><tbody><tr><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;line-height:10px;height:10px">&nbsp;</td></tr><tr><td valign="middle" style="border-spacing:0;border-collapse:collapse;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:right"><!--[if (gte mso 9)|(IE)]><table width="141" style="border-collapse:collapse;border-spacing:0;table-layout:fixed"><tr><td align="left" valign="middle" width="100%" valign="middle" style="border-collapse:collapse;border-spacing:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;min-width:191px!important"><![endif]--><div class="column" style="display:inline-block;min-width:300px;max-width:300px;vertical-align:middle;width:100%"><table width="100%" style="border-spacing:0;border-collapse:collapse;table-layout:fixed"><tr><td style="border-spacing:0;border-collapse:collapse;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0"><table style="border-spacing:0;border-collapse:collapse;width:100%;table-layout:fixed;text-align:right"><tr><td style="border-spacing:0;border-collapse:collapse;text-align:right"><p style="color:#fff;padding-right:32px;font-size:25px;font-weight:700">WEB | POS</p></td></tr></table></td></tr></table></div><!--[if (gte mso 9)|(IE)]><![endif]--></td><tr><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;line-height:20px;height:20px">&nbsp;</td></tr></tr><tr><td valign="middle" style="border-spacing:0;border-collapse:collapse;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:left"><!--[if (gte mso 9)|(IE)]><table width="290" style="border-collapse:collapse;border-spacing:0;table-layout:fixed"><tr><td align="right" valign="middle" width="100%" valign="middle" style="border-collapse:collapse;border-spacing:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;min-width:365px!important"><![endif]--><div class="column" style="display:inline-block;min-width:280px;max-width:290px;vertical-align:middle;width:100%"><table width="100%" style="border-spacing:0;border-collapse:collapse;table-layout:fixed"><tr><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;min-width:20px;width:20px">&nbsp;</td><td style="border-spacing:0;border-collapse:collapse;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0"><table style="border-spacing:0;border-collapse:collapse;width:100%;table-layout:fixed;text-align:center"><tr><td style="border-spacing:0;border-collapse:collapse;text-align:center"><p style="color:#fff;padding-right:32px;font-size:25px;font-weight:700">Shampoo ABC</p></td></tr><tr><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;line-height:20px;height:20px">&nbsp;</td></tr></table></td><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;min-width:10px;width:10px">&nbsp;</td></tr></table></div><!--[if (gte mso 9)|(IE)]><![endif]--></td></tr></tbody></table><!--[if gte mso 9]><![endif]--></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0;border-collapse:collapse;table-layout:fixed"><tbody><tr><td align="center" style="border-spacing:0;border-collapse:collapse"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0;border-collapse:collapse;max-width:650px"><tbody><tr><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;min-width:20px;width:20px">&nbsp;</td><td align="center" valign="middle" style="border-spacing:0;border-collapse:collapse"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0;border-collapse:collapse;table-layout:fixed"><tbody><tr><td style="border-spacing:0;border-collapse:collapse"><p style="color:#333;font-family:Arial,Helvetica,sans-serif;font-size:20px;font-style:normal;font-weight:400;line-height:30px;margin:0 auto;margin:0 auto;text-align:left">&nbsp;</p><p style="color:#333;font-family:Arial,Helvetica,sans-serif;font-size:15px;font-style:normal;font-weight:400;line-height:20px;margin:0 auto;margin:0 auto;text-align:left">Hola, '.$nombreCliente.'<br>Adjunto encontrara el comprobante de Venta, Gracias por su Compra</p><p style="color:#333;font-family:Arial,Helvetica,sans-serif;font-size:25px;font-style:normal;font-weight:400;line-height:25px;margin:0 auto;margin:0 auto;text-align:left">&nbsp;</p></td></tr></tbody></table></td><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;min-width:30px;width:30px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="footer_ecard" style="border-spacing:0;border-collapse:collapse"><tr><td style="border-spacing:0;border-collapse:collapse"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="block_cols_vert" style="border-spacing:0;border-collapse:collapse"><tbody><tr><td height="1" style="border-spacing:0;border-collapse:collapse;background-color:#000;color:transparent!important;font-size:1px;height:1px;line-height:1px;max-height:1px;width:100%">&nbsp;</td></tr><tr><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;line-height:10px;height:10px;width:100%">&nbsp;</td></tr><tr><td style="border-spacing:0;border-collapse:collapse"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0;border-collapse:collapse"><tr><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;min-width:20px;width:20px">&nbsp;</td><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;min-width:20px;width:20px">&nbsp;</td></tr></table></td></tr></tbody></table></td></tr><tr><td style="border-spacing:0;border-collapse:collapse"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="block_cols_vert_no_space" style="border-spacing:0;border-collapse:collapse;background-color:#f5f5f5"><tbody><tr><td style="border-spacing:0;border-collapse:collapse"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0;border-collapse:collapse"><tr><td class="cont_1_columns" valign="middle" style="border-spacing:0;border-collapse:collapse"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0;border-collapse:collapse"><tr><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;min-width:20px;width:20px">&nbsp;</td><td align="center" style="border-spacing:0;border-collapse:collapse"><p style="color:#2b333c;font-family:Arial,Helvetica,sans-serif;font-size:18px;font-style:normal;font-weight:400;line-height:18px;margin:0 auto;margin:0 auto;text-align:center">&nbsp;</p><p style="color:#2b333c;font-family:Arial,Helvetica,sans-serif;font-size:10px;font-style:normal;font-weight:400;line-height:12px;margin:0 auto;margin:0 auto;text-align:center">BigTic, 20&#65279;23 Copyright @ Todos los derechos reservados. No responda este e-mail, fue enviado de manera automática</p><p style="color:#2b333c;font-family:Arial,Helvetica,sans-serif;font-size:18px;font-style:normal;font-weight:400;line-height:18px;margin:0 auto;margin:0 auto;text-align:center">&nbsp;</p></td><td style="border-spacing:0;border-collapse:collapse;color:transparent!important;min-width:20px;width:20px">&nbsp;</td></tr></table></td></tr></table></td></tr></tbody></table></td></tr></table></td></tr></tbody></table><!--[if (gte mso 9)|(IE)]><![endif]--></body></html>';

    // Adjuntar archivo
    $mail->addAttachment('tickets/' . $rutaTicket);

    // Enviar el correo
    $mail->send();
    echo '<script>';
    echo 'Swal.fire({';
    echo '    title: "Correo enviado correctamente",';
    echo '    icon: "success",';
    echo '}).then(function() {';
    echo '    location.href = "tickets.php";';
    echo '});';
    echo '</script>';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
} else {
    // Si alguna de las variables no está presente, muestra un mensaje de error o realiza alguna acción
    echo "Error: No se han proporcionado todas las variables necesarias.";
}

include("footer.php");

?>