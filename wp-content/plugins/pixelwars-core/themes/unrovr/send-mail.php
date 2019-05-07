<?php

	if (! defined(ABSPATH))
	{
		$pagePath = explode('/wp-content/', dirname(__FILE__));
		include_once(str_replace('wp-content/', '', $pagePath[0] . '/wp-load.php'));
	}


/* ============================================================================================================================================= */


	// site owner

	$site_name = get_bloginfo( 'name' );
	$sender_domain = trim( $_POST['sender_domain'] );
	$admin_email = get_bloginfo( 'admin_email' );
	$to = get_option( 'contact_form_to', $admin_email );
	$subject = trim( $_POST['subject'] );


/* ============================================================================================================================================= */


	// contact form fields
	
	$name = trim( $_POST['name'] );
	$email = trim( $_POST['email'] );
	$message = trim( $_POST['message'] );
	$url = trim( $_POST['url'] );


/* ============================================================================================================================================= */


	// check for errors
	
	$error = false;
	
	if ( $name === "" ) { $error = true; }
	elseif ( $email === "" ) { $error = true; }
	elseif ( $message === "" ) { $error = true; }
	elseif ( $to === "" ) { $error = true; }


/* ============================================================================================================================================= */


	// send mail
	
	if ( isset( $url ) && $url == "" )
	{
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
	}

?>