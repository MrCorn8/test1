<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--
 ____________________________________________________________
|                                                            |
|    DESIGN : Jeremie Tisseau { http://web-kreation.com }    |
|      DATE : 2007.08.31                                     |
|     EMAIL : webmaster@web-kreation.com                     |
|  DOWNLOAD : http://www.foroz.org/    |
|____________________________________________________________|
-->
<head>
       <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
       <title>Hocker Soluciones y Servicios</title>
       
       <!-- the cascading style sheet-->
       <link href="style.css" rel="stylesheet" type="text/css" />
       
</head>
  

<body>
     <div id="contentForm">

            <!-- The contact form starts from here-->
            <?php
                 $error    = ''; // error message
                 $name     = ''; // sender's name
                 $email    = ''; // sender's email address
                 $subject  = ''; // subject
                 $message  = ''; // the message itself
               	 $spamcheck = ''; // Spam check

            if(isset($_POST['send']))
            {
                 $name     = $_POST['name'];
                 $email    = $_POST['email'];
                 $subject  = $_POST['subject'];
                 $message  = $_POST['message'];
               	 $spamcheck = $_POST['spamcheck'];

                if(trim($name) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba su nombre!</div>';
                }
            	    else if(trim($email) == '')
                {
                    $error = '<div class="errormsg">POr favor indique su direccion Email!</div>';
                }
                else if(!isEmail($email))
                {
                    $error = '<div class="errormsg">Su Email no es valido, por favor intente de nuevo!!</div>';
                }
            	    if(trim($subject) == '')
                {
                    $error = '<div class="errormsg">Indique el asunto del mensaje!</div>';
                }
            	else if(trim($message) == '')
                {
                    $error = '<div class="errormsg">Escriba su mensaje!</div>';
                }
	          	else if(trim($spamcheck) == '')
	            {
	            	$error = '<div class="errormsg">REalice la suma para controlar el Spam!</div>';
	            }
	          	else if(trim($spamcheck) != '5')
	            {
	            	$error = '<div class="errormsg">Control Spam: El resultado de la suma no es correcta! 2 + 3 = ???</div>';
	            }
                if($error == '')
                {
                    if(get_magic_quotes_gpc())
                    {
                        $message = stripslashes($message);
                    }

                    // the email will be sent here
                    // make sure to change this to be your e-mail
                    $to      = "hockersands@gmail.com";

                    // the email subject
                    // '[Contact Form] :' will appear automatically in the subject.
                    // You can change it as you want

                    $subject = '[Contacto web] : ' . $subject;

                    // the mail message ( add any additional information if you want )
                    $msg     = "From : $name \r\ne-Mail : $email \r\nSubject : $subject \r\n\n" . "Message : \r\n$message";

                    mail($to, $subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n");
            ?>

                  <!-- Message sent! (change the text below as you wish)-->
                  <div style="text-align:center;">
                    <h1>Enviado</h1>
                       <p>Gracias <b><?=$name;?></b>, le responderemos lo antes posible!</p>
                  </div>
                  <!--End Message Sent-->


            <?php
                }
            }

            if(!isset($_POST['send']) || $error != '')
            {
            ?>

            <h1> Solicitar un presupuesto:</h1>
            <p><img src="../../../../../../formulario/logo_hocker2.png" width="160" height="160" /></p>
            <!--Error Message-->
            <?=$error;?>

            <form  method="post" name="contFrm" id="contFrm" action="">


                      <label><span class="required">*</span> Nombre:</label>
            			<input name="name" type="text" class="box" id="name" size="50" value="<?=$name;?>" />

            			<label><span class="required">*</span> Email: </label>
            			<input name="email" type="text" class="box" id="email" size="50" value="<?=$email;?>" />

            			<label><span class="required">*</span> Asunto: </label>
            			<input name="subject" type="text" class="box" id="subject" size="50" value="<?=$subject;?>" />

                 		<label><span class="required">*</span> Mensaje: </label>
                 		<textarea name="message" cols="50" rows="6"  id="message"><?=$message;?></textarea>

            			<label><span class="required">*</span> Control spam: <b>2 + 3=</b></label>
						<input name="spamcheck" type="text" class="box" id="spamcheck" size="4" value="<?=$spamcheck;?>" /><br /><br />

            			<!-- Submit Button-->
                 		<input name="send" type="submit" class="button" id="send" value="" />

            </form>

            <!-- E-mail verification. Do not edit -->
            <?php
            }

            function isEmail($email)
            {
                return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
                        ,$email));
            }
            ?>
            <!-- END CONTACT FORM -->

            <p align="center"><a href="http://www.hockersands.com" target="_blank">Hocker Soluciones y servicios</a></p>
            
     
</div> <!-- /contentForm -->
     
</body>
</html>
