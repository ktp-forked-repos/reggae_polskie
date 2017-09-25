<?php
   include("init.php");

   // Check for empty fields
   if(empty($_POST['name'])      ||
      empty($_POST['email'])     ||
      empty($_POST['phone'])     ||
      empty($_POST['message'])   ||
      !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
      {
         echo "Brak argumentów!";
         return false;
      }
      
   $name = strip_tags(htmlspecialchars($_POST['name']));
   $email_address = strip_tags(htmlspecialchars($_POST['email']));
   $phone = strip_tags(htmlspecialchars($_POST['phone']));
   $message = strip_tags(htmlspecialchars($_POST['message']));
      
   // Create the email and send the message
   $to = 'admin@reggaepolskie.pl'; 
   $email_subject = "Wiadomość ze strony od:  $name";
   $email_body = "Treść wiadomości:\n\n"."Nazwa: $name\n\nEmail: $email_address\n\nTelefon: $phone\n\nWiadomość:\n$message";
   $headers = "Automat: noreply@reggaepolskie.pl\n";
   $headers .= "Nadawca: $email_address";   
   mail($to,$email_subject,$email_body,$headers);

   return true;  
?>   