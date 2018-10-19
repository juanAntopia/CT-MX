<?php

//revisar que los campos no estén vacíos
if(empty($_POST['nombre']) || 
   empty($_POST['email']) ||
   empty($_POST['phone']) || 
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
       printf("<script type='text/javascript'>alert('Revisa que no hayas dejado los campos en blanco.');</script>");
       return false;
   } 

   //Campos del formulario
   $nombre = $_POST['nombre'];
   $correo = $_POST['email'];
   $telefono = $_POST['phone'];
   $mensaje = $_POST['message'];
   $asunto = $_POST['asunto'];

   //correo de destino
   $destino = $_POST['para'];

   //los encabezados para el uso de html en el cuerpo de un correo
   $headers = 'MIME-Version: 1.0' . "\r\n"; 
   $headers.= "Content-type: text/html; charset=UTF-8\r\n";
   
   //contenido del mensaje
   $contenido = '
    <html lang="es">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>Haz recibido un correo a través del formulario de contacto de tu sitio web</h2>

        <h4>'.$nombre. ' te ha enviado el siguiente mensaje:</h4>
        <p>'.$mensaje.'</p>
        </ br> 
        </ br> 
        <p>Correo electrónico: '.$correo.' </ br> </p>
        <p>Teléfono o celular: '.$telefono.'</p>
    </body>
    </html>
   ';

   $envio=mail($destino, $asunto, $contenido, $headers);

   if($envio){
        printf("<script type='text/javascript'>alert('Informaci\u00F3n enviada exit\u00F3samente.');</script>");
        //Enviando autorespuesta
        $pwf_header = "From: info@ct-mx.com\n"
        ."Reply-to: info@ct-mx.com\n";
        $pwf_asunto = "Mensaje recibido";
        $pwf_dirigido_a = "$correo";
        $pwf_mensaje = "Muchas gracias $nombre por enviar su información desde la sección de contacto\n"
        ."Su mensaje ha sido recibido satisfactoriamente.\n"
        ."Nos pondremos en contacto lo antes posible a su e-mail: $correo\n"
        ."\n"
        ."\n"
        ."-----------------------------------------------------------------"
        ."Favor de NO responder este e-mail ya que es generado Automáticamente.\n"
        ."Atte: CTMX - Soluciones integrales de manufactura. \n"
        ."http://www.ct-mx.com/";
        
        @mail($pwf_dirigido_a, $pwf_asunto, $pwf_mensaje, $pwf_header);

        printf("<script type='text/javascript'>window.location.reload(true);</script>");
   }
   else{
       printf("<script type='text/javascript'>alert('Porfavor int\u00E9ntalo de nuevos en unos momentos.');</script>");
       printf("<script type='text/javascript'>window.location.reload(true);</script>");
   }
?>