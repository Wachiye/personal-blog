<?php
	session_start();
	
	if(isset($_POST['submit']){ 
		$to = "siranjofuw@gmail.com"; // Recipient Email address 
		$from = $_POST['email']; // sender's Email address 
		$from_name = $_POST['name']; 
		$send_subject = "Portfolio Hire Me Form submission"; 
		$response_subject = "Copy of your form submission on My Portfolio"; 
		$send_message = "Hey " . $to_name . ", \r\n" . "I am ". $from_name . "A got a project :" . "\n\n Project Name:\r\n\n ". $project_name . "\r\n\Project Description : \r\n\n" . $project_description . " Help Me"
		$message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message']; 
		$headers = "From:" . $from; 
		$headers2 = "From:" . $to; 
		mail($to,$subject,$message,$headers); 
		mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender 
		echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly."; // You can also use header('Location: thank_you.php'); to redirect to another page.  
	}
	else()
?>