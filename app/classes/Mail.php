<?php

namespace App\Classes;

use PHPMailer;

class Mail {

	protected $mail;

	function __construct()
	{
		$this->mail = new PHPMailer\PHPMailer\PHPMailer();

		$this->setUp();

	}

	public function setUp()
	{
		$this->mail->isSMTP();

		$this->mail->Mailer = 'smtp';

		$this->mail->SMTPAuth = true;

		$this->mail->SMTPSecure = 'tls';

		$this->mail->SMTPOptions = array(
			'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			));


		$this->mail->Host = getenv('SMTP_HOST');

		$this->mail->Port = getenv('SMTP_PORT');


		$environment = getenv('APP_ENV');

		//if($environment === 'local'){
		//	$this->mail->SMTPDebug = 2;
		//}

		//auth info

		$this->mail->Username = getenv('EMAIL_USERNAME');

		$this->mail->Password = getenv('EMAIL_PASSWORD');


		$this->mail->isHTML(true);

		$this->mail->SingleTo = true;


		//sender info

		$this->mail->From = getenv('ADMIN_EMAIL');

		$this->mail->FromName = getenv('APP_NAME');

	}

	public function send($data)
	{

		$this->mail->addAddress($data['to'], $data['name']);

		$this->mail->Subject = $data['subject'];

		$this->mail->Body = make($data['view'], array('data' => $data['body']));

		return $this->mail->send();
	}
}