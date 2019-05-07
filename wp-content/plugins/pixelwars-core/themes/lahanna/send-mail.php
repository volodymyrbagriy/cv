<?php

	if (! defined(ABSPATH))
	{
		$pagePath = explode('/wp-content/', dirname(__FILE__));
		include_once(str_replace('wp-content/' , '', $pagePath[0] . '/wp-load.php'));
	}


/* ============================================================================================================================================= */


	// site owner
	
	$site_name     = get_bloginfo('name');
	$sender_domain = trim($_POST['sender_domain']);
	$to            = get_option('pixelwars_core_contact_form_to', "");
	$subject       = trim($_POST['subject']);


/* ============================================================================================================================================= */


	// contact form fields
	
	$name    = trim($_POST['name']);
	$email   = trim($_POST['email']);
	$message = trim($_POST['message']);


/* ============================================================================================================================================= */


	// check for errors
	
	$error = false;
	
	if ( $name === "" )
	{
		$error = true;
	}
	elseif ( $email === "" )
	{
		$error = true;
	}
	elseif ( $message === "" )
	{
		$error = true;
	}
	elseif ( $to === "" )
	{
		$error = true;
	}


/* ============================================================================================================================================= */


	// captcha
	
	$captcha = trim( $_POST['captcha'] );
	
	if ( $captcha == 'yes' )
	{
		$sum_user = trim( $_POST['sum_user'] );
		$sum_random = trim( $_POST['sum_random'] );
		
		if ( $sum_user != $sum_random )
		{
			$error = true;
		}
	}


/* ============================================================================================================================================= */


	// send mail
	
	if ( $error == false )
	{
		$body = "Name: $name" . "\n\n" . "Email: $email" . "\n\n" . "Message: $message";
		
		$headers = "From: " . $site_name . ' <' . $sender_domain . '> ' . "\r\n";
		$headers .= "Reply-To: " . $name . ' <' . $email . '> ' . "\r\n";
		
		
		$mail_result = mail( $to, $subject, $body, $headers );
		
		if ( $mail_result == true )
		{
			echo 'success';
		}
		else
		{
			echo 'unsuccess';
		}
	}
	else
	{
		echo 'error';
	}

?>