<?php
// Check for empty fields
if(empty($_POST['nombre'])  		||
   empty($_POST['correo']) 		||
   empty($_POST['mensaje'])	||
   !filter_var($_POST['correo'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['nombre'];
$email_address = $_POST['correo'];
$message = $_POST['mensaje'];
	
// Create the email and send the message
$to = 'info@ct-mx.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Mensaje de contacto CT-MX:  $name";
$email_body = "Haz recibido un nuevo mensaje del formulario de contacto de tu sitio web.\n\n"."Aquí los detalles:\n\nNombre: $name\n\nEmail: $email_address\n\nMensaje:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>