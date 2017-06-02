<?php
	//Session Started
	session_start();

	//FIle Inclusion
	include "PHPMailer/PHPMailerAutoload.php";
	// include "includes/phpMailer/class.phpmailer.php'";
	// include "includes/phpMailer/class.smtp.php'";
	$servername = "blitzschlag.org";
	$username = "blitzschlag";
	$password = "Blitz@2017";
	$db="blitz";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}

	// select database
    if (mysqli_select_db( $conn, $db) === false)
        die("Could not select database");
    

	//Fetch Details using email
	$email=$_SESSION['email'];
	//$phone=$_SESSION['phone'];

	//Creating mail Object for phpMailer
	$mail = new PHPMailer;
	
	$selectData="SELECT `id`,`fn`,`ln`,`phone`,`institute`,`city`  from `registration` WHERE `email`='".$email."';";
	$selectResult=$conn->query($selectData);
	$selectRow=mysqli_fetch_array($selectResult);
	$name=$selectRow['fn']+" "+$selectRow['ln'];
	$id=$selectRow['id'];
	$count=mt_rand(0,999);
	$count=sprintf("%03d",$count);
	$count=(string)$count;
	$str='QLAC'.$count;	

	//Enable SMTP debugging. 
	$mail->SMTPDebug = 2;       
	$mail->Debugoutput = 'html';                        
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "smtp.gmail.com";
	//Set TCP port to connect to 
	$mail->Port = 587;

	$mail->SMTPSecure = "tls"; 
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = "mnit.cacs@mnit.ac.in";                 
	$mail->Password = "cacs2k17";                           
	
	                        

	$mail->From = "mnit.cacs@mnit.ac.in";
	$mail->FromName = "Blitzschlag Team";

	$mail->addAddress($email, $name);

	$mail->isHTML(true);
	
	//header("Location: http://$host$path/registered.php?id=$last_reg_id");
	$url="http://blitzschag.org/registered.php?id=".$id;
	$mail->Subject = "Verification email";
	$mail->Body = '<i>Greetings '.$name.', Please click on the link to verify your email.</i><a href ="'.$url.'">"'.$str.'"</a>';
	$mail->AltBody = "This is the plain text version of the email content";

	if(!$mail->send()) 
	{
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	   header('Location: ../waiting_for_verification.php');
	}

?>