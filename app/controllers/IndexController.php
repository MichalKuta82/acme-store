<?php

namespace App\Controllers;

use App\Classes\Mail;

/**
* 
*/
class IndexController extends BaseController
{
	public function show()
	{
		echo "Inside Homepage from controller class";

		$mail = new Mail();

		$data = [
		'to' => 'info@webmedia.ie',
		'subject' => 'Welcome to Ecommerce Store',
		'view' => 'welcome',
		'name' => 'John Doe',
		'body' => 'Testing email template' 
		];

		if($mail->send($data)){
			echo "Email send sucessfully";
		}else{
			echo "Email sending failed";
		}
	}
	
}