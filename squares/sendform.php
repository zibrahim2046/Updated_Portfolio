<?php
	//Enter your email here
  	$your_email = "youremail@example.com";
	//Enter the subject of the mail here
	$subject = "Squares Portfolio Contact Form";
	
	
    $name = $_POST['name']; 
    $email = $_POST['email']; 
	//Filter HTML characters
    $message = filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS);
	
	$error = "ERROR: ";
	
	//Default message if unsuccessful and no other reason found
	$return_message = $error."Something went wrong, try emailing me directly at ".$your_email." instead";
	if(strlen($name) > 0 && strlen($email) > 0 && strlen($message) > 0) {
	    if(filter_var(filter_var($email, FILTER_VALIDATE_EMAIL), FILTER_SANITIZE_EMAIL)) {
	        try {
	        	$body = "You've received a message from ".$name." (".$email."):\n".$message."\n(Sent from Squares portfolio contact form)";
    			$header	= "From: ".$email;
	            mail($your_email, $subject, $body, $header);
	            $return_message	= "Your message has been sent successfully";
	        }
	        catch(Exception $e) { }
	    } else {
		    $return_message = $error."You have entered an invalid email address";
	    }
	} else {
		$return_message = $error."One or more fields are missing";		
	}
    echo $return_message;
?>