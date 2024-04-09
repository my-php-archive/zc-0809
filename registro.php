<?php
		# the response from reCAPTCHA
		$resp = null;
		# the error code from reCAPTCHA, if any
		$error = null;
		require_once("recaptcha/recaptchalib.php");
		require_once("includes/configuracion.php");
			$privatekey = $private_key;
		$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_REQUEST["recaptcha_challenge_field"],
                                $_REQUEST["recaptcha_response_field"]);
        if ($resp->is_valid) {
                $var = 1;
        } else {
                $var = 0;
        }
		 
        $activacion = "0";
		$ban = "0";
		$rango = "12"; 
		$nombre = trim(htmlentities($_REQUEST["nombre"]));
		$nick = trim(htmlentities($_REQUEST["nick"])); 
		$password1 = md5($_REQUEST["password1"]);
		$password2 = md5($_REQUEST["password2"]);
		$puntos = "0";
		$puntosdar = "0"; 
		$mail1 = trim(htmlentities($_REQUEST["mail1"]));
		$mail2 = trim(htmlentities($_REQUEST["mail2"]));
		
		if ($_REQUEST["avatar"] == "")
		$avatar	=	$url."/images/avatar.gif";
		else
		$avatar = trim(htmlentities($_REQUEST["avatar"]));
		$pais = trim(htmlentities($_REQUEST["pais"]));
		$ciudad = htmlentities($_REQUEST["ciudad"]); 
		$sexo = htmlentities($_REQUEST["sexo"]); 
		$dia = htmlentities($_REQUEST["dia"]);
		$mes = htmlentities($_REQUEST["mes"]);
		$ano = htmlentities($_REQUEST["ano"]);
		$sitio_web = htmlentities($_REQUEST["sitio_web"]);
		$mensajero = trim(htmlentities($_REQUEST["mensajero"]));
		$mensaje = trim(htmlentities($_REQUEST["mensaje"])); 
		$id_extreme = md5(uniqid(rand(), true));
		
		if($var==1)
		{
				include("includes/configuracion.php");
				$sql = "SELECT id FROM usuarios WHERE nick='".$_REQUEST["nick"]."'";
        		$result = mysql_query($sql);
        		if($row = mysql_fetch_array($result))
					header("Location: registro.form.php?nombre=$nombre&nick=$nick&mail1=$mail1&mail2=$mail2&avatar=$avatar&pais=$pais&ciudad=$ciudad&sexo=$sexo&dia=$dia&mes=$mes&ano=$ano&sitio_web=$sitio_web&mensajero=$mensajero&mensaje=$mensaje&error=1");
        		else
        		{
          			$sql = "SELECT id FROM usuarios WHERE mail='".$_REQUEST["mail1"]."'";
        			$result = mysql_query($sql);
					if($row = mysql_fetch_array($result))
						header("Location: registro.form.php?nombre=$nombre&nick=$nick&mail1=$mail1&mail2=$mail2&avatar=$avatar&pais=$pais&ciudad=$ciudad&sexo=$sexo&dia=$dia&mes=$mes&ano=$ano&sitio_web=$sitio_web&mensajero=$mensajero&mensaje=$mensaje&error=2");
					else
					{
						if (strlen(trim($nick))<3)
							header("Location: registro.form.php?nombre=$nombre&nick=$nick&mail1=$mail1&mail2=$mail2&avatar=$avatar&pais=$pais&ciudad=$ciudad&sexo=$sexo&dia=$dia&mes=$mes&ano=$ano&sitio_web=$sitio_web&mensajero=$mensajero&mensaje=$mensaje&error=3");
						else
						{
							$sql = "INSERT INTO usuarios (id_extreme,activacion,ban,rango,nombre,nick,password,puntos,puntosdar,mail,avatar,pais,ciudad,sexo,dia,mes,ano,sitio_web,mensajero,mensaje,fecha)";
       						$sql.= "VALUES ('$id_extreme','$activacion','$ban','$rango','$nombre','$nick','$password1','$puntos','$puntosdar','$mail1','$avatar','$pais','$ciudad','$sexo','$dia','$mes','$ano','$sitio_web','$mensajero','$mensaje',NOW())";
       						mysql_query($sql);
       						$ult_id = mysql_insert_id($con);
							$email="no-reply@tripiante.com";
							$asunto="Confirmación de ".$comunidad;
							$mensaje="<a href='".$url."/confirmacionmail.php?id=".$ult_id."?".$id_extreme."'>".$url."/confirmacionmail.php?id=".$ult_id."?".$id_extreme."</a>  <br><br>";
							$encabezados = "From: $email\nReply-To: $email\nContent-Type: text/html; charset=iso-8859-1"; 
							mail($mail1, $asunto, $mensaje, $encabezados);
							?>
							<SCRIPT LANGUAGE="javascript">
							location.href = "notificaciones/registrocon.php";
							</SCRIPT>
							<?
						}	
					}
					mysql_free_result($result);
        			mysql_close();
				}
  		}
		else
		{
		header("Location: registro.form.php?nombre=$nombre&nick=$nick&mail1=$mail1&mail2=$mail2&avatar=$avatar&pais=$pais&ciudad=$ciudad&sexo=$sexo&dia=$dia&mes=$mes&ano=$ano&sitio_web=$sitio_web&mensajero=$mensajero&mensaje=$mensaje&error=5");
		?>
		<SCRIPT LANGUAGE="javascript">
		location.href = "registro.form.php";
		</SCRIPT>
		<?
		}
		?> 
		
