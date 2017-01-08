<?php 

//We will declare the variables in this section

$Firstname =  $_POST['Firstname']; 
$Telephone =  $_POST['Telephone'];
$Email =  $_POST['Email'];
$Subject =  $_POST['Subject'];
$Message =  $_POST['Message'];
 





//this will show a message to confirm that the email was sent

//----------EMAIL SENT TO CLIENT TO with summary of the offer that they have created----------------------------------------
//---------------------------------------------------------------------------------------------------------------------
// Now we will be sending the email to the users
$to  = $Email;
//uncomment below for multiple recipients
//$to  = 'admin@bashircarpets.com' . ', '; // note the comma
//$to .= 'info@bashircarpets.com';
$subject = "Thank you for contacting us";
$message = '
<div style="line-height:150%;">

Thank you for contating us<br>

We will contact you in the next 24-48 hours<br>

http://www.pleasureincgirls.com

</div>
';
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// sending a copy to the following emails, anonymously
//$headers .= 'BCC: info@bashircarpets.com, samina@bashircarpets.com, jose@bashircarpets.com'. "\r\n";
// This will indicate the sender information
$headers .= 'From: Pleasure Girls Inc <pleasureincgirls@gmail.com>' . "\r\n";
//uncomment this to send a copy to another email
//$headers .= 'Cc: juangarciamtl@gmail.com' . "\r\n";
//this will send the email
mail($to,$subject,$message,$headers)  or die('Mail Error');
echo 'Your email has been sent.<br>';
	
	
	
	
//-------------THIS WILL SEND AND EMAIL TO admin@bashircarpets.com-------------------------------------
//---------------------------------------------------------------------------------------------------------------------
// Now we will be sending the email to the users
$to  = 'pleasureincgirls@gmail.com';
//uncomment below for multiple recipients
//$to  = 'admin@bashircarpets.com' . ', '; // note the comma
//$to .= 'info@bashircarpets.com';
$subject = "You have been contacted by " . $Firstname;
$message = '
<div>
Hello you have been contacted by '. $Firstname .' <br>

Name: '.$Firstname.' <br>
Phone: '.$Telephone.'<br>
Email: '.$Email.'<br>
Subject: '.$Subject.'<br><br>
Message: <br>'.$Message.'
 


</div>
';
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// sending a copy to the following emails, anonymously
//$headers .= 'BCC:  juangarciamtl@gmail.com, juangarciamtl@gmail.com'. "\r\n";
// This will indicate the sender information
$headers .= 'From: Pleasure Girls Inc <pleasureincgirls@gmail.com>' . "\r\n";
//uncomment this to send a copy to another email
//$headers .= 'Cc: myboss@example.com' . "\r\n";
//this will send the email
mail($to,$subject,$message,$headers)  or die('Mail Error');
echo 'Thank you, we will contact you.<br>';
?> 


