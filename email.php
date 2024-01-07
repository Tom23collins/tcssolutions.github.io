<?php
if(isset($_POST['submit'])){
	//Get form data
	$name = $_POST['name']; 
	$email = $_POST['email'];
	$service = $_Post['service'];
	$message = $_POST['message'];
	
    //Email address validation and display error message
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if (!preg_match($email_exp, $email)) {
        echo '<br><span style="color:red;">The Email address you entered is not valid.</span>';
		exit;
    }
	
	$to = "tom23collins@gmail.com";  //recipient email address
	$subject = $service;  //Subject of the email
	
	//Message content to send in an email
	$message = "Name: ".$name."<br>Email: ".$email."<br> Message".$message;
	
	//Email headers
	$headers = "From: yourname@yourdomain.com"."\r\n";
	$headers = "CC: someone@example.com";
	$headers .= "Reply-To:".$email."\r\n";
	
	//Send email 
	mail($to, $subject, $message, $headers);
	or die("Error!");
}
?>