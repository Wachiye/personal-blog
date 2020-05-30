<?php

if (!empty($_POST['submit'])) {

	$type = "";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = "New Portfolio Contact Form Received";

	$emailOpener ="<p>Hey, you have a new message from your contact page.</p> \r\n ";
	$emailOpener .= "<p>User Details: <br> Name: " .$name ." <br> Email : " .$email ." <br> Phone : " .$phone ."</p> \r\n";
	$emailContent = $emailOpener ." <p> Message: <br>" .$_POST['message'];

	$emailTo = "siranjofuw@gmail.com";

	$emailHeaders = "From " .$name ."<" .$email ."> \r\n";

	if(mail($emailTo, $subject, $emailContent, $emailHeaders)){
		
		$type = "success";
	}
	else{
		$type = "error";
	}

	header("Location : ../contact.php?res =" .$type);
}

?>
