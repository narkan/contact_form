<?php

	session_start();  // ensure session variable is created incase no ajax (see bottom of file) 
		
		
	if( isset($_POST) ){
		
		//form validation vars
		$formok = true;
		$errors = array();
		
		//sumbission data
		$ipaddress = $_SERVER['REMOTE_ADDR'];
		$date = date('d/m/Y');
		$time = date('H:i:s');
		
		//form data
		$name = $_POST['name'];	
		$email = $_POST['email'];
		$telephone = $_POST['telephone'];
		$message = $_POST['message'];
		
		//validate form data
		
		//validate name is not empty
		if(empty($name)){
			$formok = false;
			$errors[] = "Please enter your name";
		}
		
		//validate email address is not empty
		if(empty($email)){
			$formok = false;
			$errors[] = "Please enter a valid email address";
		//validate email address is valid
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$formok = false;
			$errors[] = "Please enter a valid email address";
		}
		
		//validate message is not empty
		if(empty($message)){
			$formok = false;
			$errors[] = "Please enter a message";
		}
		//validate message is greater than 10 charcters
		elseif(strlen($message) < 6){
			$formok = false;
			$errors[] = "Please give more information in your message";
		}
		
		//send email if all is ok
		if($formok){
			$headers = "From: toby@narkan.co.uk" . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			$emailbody = "<p>You have received a new message via your Leading Leaders website.</p>
						  <p><strong>Name: </strong> {$name} </p>
						  <p><strong>Email Address: </strong> {$email} </p>
						  <p><strong>Telephone: </strong> {$telephone} </p>
						  <p><strong>Message: </strong> {$message} </p>
						  <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";
			
			mail("toby@narkan.co.uk","Leading Leaders Contact Form",$emailbody,$headers);
			
			
			/******* CHANGE THE FOUR ITEMS ABOVE (2 in emailbody, 2 in mail)  *******/
			
		}
		
		// what we need to return back to our form
		$returndata = array(
			'posted_form_data' => array(
				'name' => $name,
				'email' => $email,
				'telephone' => $telephone,
				'message' => $message
			),
			'form_ok' => $formok,
			'errors' => $errors
		);
	
		// if this is not an ajax request
		if(empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
		

			// no ajax, therefore use session variable to send form data back for processing in contact.php
			$_SESSION['cf_returndata'] = $returndata;
			
			// redirect back to contact.php
			header('location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
?>
