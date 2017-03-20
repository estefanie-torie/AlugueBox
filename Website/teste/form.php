<?php

include("class.phpmailer.php");


	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth   = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // use ssl
	$mail->Host = "smtp.gmail.com"; // GMAIL's SMTP server
	$mail->Port  = 465; // SMTP port used by GMAIL server
	$mail->Username   = "pipeatacadista@gmail.com"; // GMAIL username
	$mail->Password   = "p1p3atco"; // GMAIL password
	$mail->AddReplyTo($email,utf8_decode($nome)); // Reply email address
	$mail->From = $email;
	$mail->FromName = utf8_decode($nome); // Name to appear once the email is sent
	$mail->Subject = "Contato via Facebook da Pipe"; // Email's subject
	//$mail->AltBody = "This is a test email"; // optional, comment out and test
	$mail->WordWrap = 75; // set word wrap
	$body=utf8_decode($mensagem);
	$mail->MsgHTML($body); // [optional] Send body email as HTML
	$mail->AddAddress("anaclara@pipetubos.com.br", "Ana Clara");  // email address of recipient
	//$mail->AddAttachment("files/files.zip"); // [optional] attachment
	$mail->IsHTML(true); // [optional] send as HTML

	if(!$mail->Send())
		echo "Mailer Error: " . $mail->ErrorInfo;
	else
		echo("<script> alert('Mensagem enviada com sucesso!'); window.location.href='fale.html';</script>");
	
	//header("Location: http://www.facebook.com/pipeatacadista?sk=app_158201224294821");
?>
