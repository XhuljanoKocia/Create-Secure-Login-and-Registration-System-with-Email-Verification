<?php
	//mail('gyroballtrunks@gmail.com', 'Testing', 'This is just a test to check localhost email', 'From: gyroballtrunks@gmail.com');

	$emailTo = "gyroballtrunks@gmail.com";
	$subject = "testing";
	$body = "lets check its working or not using better variable way";
	$headers = "From:gyroballtrunks@gmail.com";

	if(mail($emailTo, $subject, $body, $headers)){
		echo "Mail sent successfully!";
	} else {
		echo "Mail not sent!";
	}
?>