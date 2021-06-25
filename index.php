<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Marvel Comics</title>
	<script>if( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}</script>
</head>
<body>
	<div>
		<form action="index.php" method="post">
			<input type="text" name="email" placeholder="email" autocomplete="off" />
			<input type="submit" name="submit" required />
		</form>
	</div>
<?php
if($_SERVER['REQUEST_METHOD']==='POST') {
	$email=$_POST['email'];
	try{
		if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
  			echo $email;



$mail = new PHPMailer;

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.gmail.com";    // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->SMTPSecure = 'tls';
$mail->Username   = "masterrrx007@gmail.com";            // SMTP account username example
$mail->Password   = "rtcampprojectpass";            // SMTP account password example
$mail->addAddress($email);
$mail->addReplyTo("masterrrx007@gmail.com", "Reply");
// Content
$mail->isHTML(true);                       
$mail->Subject = 'Confirmation of your Marvel comic subscription';
$mail->Body    = 'Thankyou For Subscribing to: <b>Marvel Comics!!</b>';
$mail->AltBody = 'Thankyou For Subscribing to: Marvel Comics!';
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
try {
    $mail->send();
    echo "<br><br>Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
		}
		else{
			throw new Exception("<h4>Please enter a valid email address<h4>");
		}
	}catch(Exception $err){
		echo $err->getmessage();
	}
}
?>
</body>
</html>