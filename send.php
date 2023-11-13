<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
	$mail = new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'adamovsvatoslav05@gmail.com';
	$mail->Password = 'ofhhqwadlozhmrlt';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	$mail->setFrom('adamovsvatoslav05@gmail.com');

	$mail->addAddress($_POST["email"]);

		$mail->isHTML(true);

		$mail->Subject = $_POST["form_subject"];
	    $name = $_POST["Name"];
	    $age = $_POST ["age"];
	    $date = $_POST ["date"];
		$mail->Body = "ФИО: $name
		\nВозраст: $age
		\n\nДата: $date";
        
		$mail->send();

		foreach ($_POST as $key => $value){
			if( $value !="" && $key 
				!="Name" && $key 
				!="age" && $key 
				!="date"  )
				$message .= "
			".(($c= !$c)? ' <tr>':'<tr style="background-color: #f8f8f8;">')."
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$value</tb></tr>
			";
};


		echo
		"
		<script>
		alert('Sent Successfully');
		document.location.href='index.php';
		</script>
		";
};
 ?>
