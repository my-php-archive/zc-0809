<html>
  <body>
    <form action="" method="post">
<?php

require_once('recaptcha/recaptchalib.php');
require_once("includes/configuracion.php");
$publickey = $public_key;
$privatekey = $private_key;

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# are we submitting the page?
$ip = no_i($_SERVER['REMOTE_ADDR']);
if ($_POST["submit"]) {
  $resp = recaptcha_check_answer ($privatekey,
                                  $ip,
                                  xss(no_i($_POST["recaptcha_challenge_field"])),
                                  xss(no_i($_POST["recaptcha_response_field"])));

  if ($resp->is_valid) {
    echo "You got it!";
    # in a real application, you should send an email, create an account, etc
  } else {
    # set the error code so that we can display it. You could also use
    # die ("reCAPTCHA failed"), but using the error message is
    # more user friendly
    $error = $resp->error;
  }
}
echo recaptcha_get_html($publickey, $error);
?>
    <br/>
    <input type="submit" name="submit" value="submit" />
    </form>
  </body>
</html>