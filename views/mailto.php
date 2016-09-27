<?php
	require_once '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
	require '../vendor/autoload.php';
	if (isset($_POST['date'], $_POST['hour'], $_POST['name'], $_POST['email'], $_POST['message'])) {
		$fields = [
			'date' => $_POST['name'],
			'hour' => $_POST['hour'],
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'message' => $_POST['message']
		];

		foreach ($fields as $field => $data) {
			
		}

		$m = new PHPMailer;
		$m -> isSMTP();
		$m -> SMTPAuth = true;
		$m -> SMTPDebug = 2;
		$m -> SMTPSecure = 'tls';
		$m -> Port = 25;
		$m -> Host = 'smtp.nomadscancun.com';
		$m -> Username = 'reservaciones@nomadscancun.com';
		$m -> Password = 'fo9Ld54?';
		$m -> setFrom('reservaciones@nomadscancun.com', 'Nomads');

		$m -> isHTML();

		$m -> Subject = 'RESERVA BLACK PUB';
		$m -> Body = 'From:' . $fields['name'] . '(' . $fields['email'] . ')'  . '<p><b>date:</b><br/>' . $fields['date'] . '<p><b>hour:</b><br/>' . $fields['hour'] . '</p>' . '<p><b>Message</b><br/>' . $fields['message'] . '</p>';
		$m -> AddAddress('luanzeir@gmail.com', 'Luis');

		if ($m -> send()) {
			echo 'Thank You'.$_POST["name"].'We will contact you soon';
			die();
		}else{
			echo "Try again later" . $m -> ErrorInfo;
		}
	}
 ?>