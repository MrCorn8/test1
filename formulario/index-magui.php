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
       <title>.::YVES ROCHER MEXICO::.</title>
       
       <!-- the cascading style sheet-->
       <link href="style.css" rel="stylesheet" type="text/css" />
       
       <style type="text/css">
<!--
.style3 {font-family: Tahoma; font-size: 100%;}
.style4 {
	font-family: Tahoma;
	color: #333333;
}
.style6 {
	font-family: Tahoma;
	font-size: 100%;
	font-weight: bold;
	color: #666666;
}
-->
       </style>
</head>
  

<body>
<div id="contentForm">

                  <div align="center">
                    <!-- The contact form starts from here-->
                    <?php
                 $error    = ''; // error message
                 $name     = ''; // sender's name
                 $birthday = ''; // fecha de nacimiento
                 $calle = ''; // calle
                 $colonia = ''; // 
                 $cp = ''; // 
                 $ubicacion	 = ''; // entre que calles
                 $telefono = ''; // 
                 $delegacion = ''; // delegacion o municipio
                 $email    = ''; // sender's email address
                 $subject  = ''; // subject
                 $message  = ''; // the message itself
               

            if(isset($_POST['send']))
            {
                 $name     = $_POST['name'];
                 $birthday = $_POST['birthday'];
                 $calle = $_POST['calle'];
                 $colonia = $_POST['colonia'];
                 $cp = $_POST['cp'];
                 $ubicacion	 = $_POST['ubicacion'];
                 $telefono = $_POST['telefono'];
                 $delegacion = $_POST['delegacion'];
                 $email    = $_POST['email'];
                 $subject  = $_POST['subject'];
                 $message  = $_POST['message'];
               	 

                if(trim($name) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba su nombre!</div>';
                }
                else if(trim($birthday) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba su fecha de nacimiento!</div>';
                }
                else if(trim($calle) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba la calle!</div>';
                }
                else if(trim($colonia) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba la colonia!</div>';
                }
                else if(trim($cp) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba su codigo postal!</div>';
                }
                else if(trim($ubicacion) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba entre que calles está su direccion!</div>';
                }
                else if(trim($telefono) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba su telefono!</div>';
                }
                else if(trim($delegacion) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba la delegacion!</div>';
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
                if($error == '')
                {
                    if(get_magic_quotes_gpc())
                    {
                        $message = stripslashes($message);
                    }

                    // el mensaje será enviado aqui
                    // asegúrese de cambiar esto es su dirección de e-mail
                    //$to      = "manosquecuran2013@hotmail.com";
                    $to      = "ventas@yvesrochermexico-inscribete.com.mx";

                    // el asunto del correo electrónico
                    // '[Contact Form] :' aparecerá automáticamente en el tema
                    // Puede cambiarlo como quieras

                    $subject = '[Contacto web] : ' . $subject;

                    // el mensaje de correo (agregue cualquier información adicional si lo desea )
                    $msg     = "De : $name \r\nFecha de nacimiento : $birthday \r\nCalle : $calle \r\nColonia : $colonia \r\nCodigo Postal : $cp \r\nEntre calles : $ubicacion \r\nTelefono : $telefono \r\nDelegacion : $delegacion \r\nCorreo electronico : $email \r\nAsunto : $subject \r\n\n" . "Comentarios : \r\n$message";

                    mail($to, $subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n");
            ?>
                    
                    <!-- Mensaje enviado! (cambiar el texto que sigue a su gusto)-->
                  </div>
                  <div style="text-align:center;">
                    <h1 align="center" class="msgSent">Enviado</h1>
                       <p align="center"><span class="style4">Gracias</span> <b><?=$name;?></b>, <span class="style4">le responderemos lo antes posible.</span></p>
                  </div>
                  <div align="center">
                    <!--Fin mensaje enviado-->
                    
                    
                    <?php
                }
            }

            if(!isset($_POST['send']) || $error != '')
            {
            ?>
                    
  </div>
                  <h1 align="center" class="style3"><img src="images/header.jpg" width="900" height="534" align="center" /></h1>
            <h1 align="center" class="style3">&nbsp;</h1>
  <p align="left">
              <!--Error Message-->
              <?=$error;?>
  </p>
  <p align="center" class="style6">Recibe excelentes ingresos con la venta de nuestros productos, recibirás capacitación, podrás manejar tus propios horarios, ganar viajes y ser parte de nuestras convenciones. Y lo mejor sin descuidar a tu familia, solo tienes que enviar tus datos. </p>
  <form  method="post" name="contFrm" id="contFrm" action="">
    <label><span class="required">*</span> Nombre completo:</label>
    <input name="name" type="text" class="box" id="name" size="50" value="<?=$name;?>" />
    <label><span class="required">*</span> Fecha de nacimiento (ejemplo: 25/2/1992): </label>
    <input name="birthday" type="text" class="box" id="birthday" size="50" value="<?=$birthday;?>" />
    <label><span class="required">*</span> Calle y numero: </label>
    <input name="calle" type="text" class="box" id="calle" size="50" value="<?=$calle;?>" />
    <label><span class="required">*</span> Colonia: </label>
    <input name="colonia" type="text" class="box" id="colonia" size="50" value="<?=$colonia;?>" />
    <label><span class="required">*</span> Codigo Postal: </label>
    <input name="cp" type="text" class="box" id="cp" size="50" value="<?=$cp;?>" />
    <label><span class="required">*</span> Entre que calles: </label>
    <input name="ubicacion" type="text" class="box" id="ubicacion" size="50" value="<?=$ubicacion;?>" />
    <label><span class="required">*</span> Telefono: </label>
    <input name="telefono" type="text" class="box" id="telefono" size="50" value="<?=$telefono;?>" />
    <label><span class="required">*</span> Delegacion: </label>
    <input name="delegacion" type="text" class="box" id="delegacion" size="50" value="<?=$delegacion;?>" />
    <label><span class="required">*</span> Correo electronico: </label>
    <input name="email" type="text" class="box" id="email" size="50" value="<?=$email;?>" />
    <label><span class="required">*</span> Asunto: </label>
    <input name="subject" type="text" class="box" id="subject" size="50" value="<?=$subject;?>" />
    <label><span class="required">*</span> Comentarios: </label>
    <textarea name="message" cols="50" rows="6"  id="message"><?=$message;?>
  </textarea>
    <br />
    <!-- Submit Button-->
    <input name="send" type="submit" class="button" id="send" value="" />
  </form>
  <p align="center" class="style6">&nbsp;</p>
  <p>
              <!-- E-mail verification. Do not edit -->
              <?php
            }

            function isEmail($email)
            {
                return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
                        ,$email));
            }
            ?>
  </p>
            <p><span class="style4">De igual manera tu pedido lo prodrás hacer vía correo y te llegará a domicilio.<br />
            Cuando deposites los 100 pesos te llega una bolsa de mano, 2 productos y catálogo.<br />
            </span><span class="style6">Puedes escribirnos a: ventas@yvesrochermexico-inscribete.com.mx
            </span>
              <!-- END CONTACT FORM --> 
  </p>
            <p align="right">&nbsp;             </p>
            <p align="right"><a href="http://www.yvesrochermexico-inscribete.com.mx" target="_blank" class="style6">www.yvesrochermexico-inscribete.com.mx</a></p>
</div>
     <!-- /contentForm -->
     
</body>
</html>
