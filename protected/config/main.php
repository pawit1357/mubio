<?php
return array (
		'name' => 'mubio',
		'defaultController' => 'site',
        'language' => 'th', 
        'timeZone' => 'Asia/Bangkok',
		'import' => array (
				'application.models.*',
				'application.components.*' 
		),
		'components' => array (
				'urlManager' => array (
						'urlFormat' => 'path' 
				),
				'db' => array (
						'class' => 'CDbConnection',
						'connectionString' => 'mysql:host=localhost;dbname=mubio',
						'emulatePrepare' => true,
						'username' => 'root',
						'password' => 'P@ssw0rd',
						'charset' => 'utf8' 
				),
		  
// 		     	'db' => array (
// 						'class' => 'CDbConnection',
// 						'connectionString' => 'mysql:host=localhost;dbname=cp900485_mubio',
// 						'emulatePrepare' => true,
// 						'username' => 'cp900485_mubio',
// 						'password' => 'mubioP@ssw0rd',
// 						'charset' => 'utf8' 
// 				),
		   
				'Smtpmail' => array (
						'class' => 'application.extensions.smtpmail.PHPMailer',
						'Host' => "smtp.gmail.com",
						'Username' => 'pawitvaap@gmail.com',
						'Password' => '',
						'Mailer' => 'smtp',
						'Port' => 587,
						'SMTPAuth' => true,
						'SMTPSecure' => 'ssl',
						'SMTPDebug' => 1 
				) 
		)
		 
);
?>