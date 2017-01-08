<?php 

//We will declare the variables in this section

$Firstname =  $_POST['Firstname']; 
$Telephone =  $_POST['Telephone'];
$Email =  $_POST['Email'];
$Age =  $_POST['Age'];
$Height =  $_POST['Height'];
$DressSize =  $_POST['DressSize'];
$Nationality =  $_POST['Nationality'];
$Language =  $_POST['Language'];
$Bisexual =  $_POST['Bisexual'];
$HourlyRate =  $_POST['HourlyRate'];
$Availability =  $_POST['Availability'];
$OtherWbsites =  $_POST['OtherWbsites'];
$ServicesProvided =  $_POST['ServicesProvided'];
$WhyGreatGirl =  $_POST['WhyGreatGirl'];
$Services =  $_POST['Services'];
$Personality =  $_POST['Personality'];
$GreatWeekend =  $_POST['GreatWeekend'];
$MostDangerours =  $_POST['MostDangerours'];
$FavouriteFood =  $_POST['FavouriteFood']; 
$GirlsForParty =  $_POST['GirlsForParty'];

 





//this will show a message to confirm that the email was sent

//----------EMAIL SENT TO CLIENT TO with summary of the offer that they have created----------------------------------------
//---------------------------------------------------------------------------------------------------------------------
// Now we will be sending the email to the users
$to  = $Email;
//uncomment below for multiple recipients
//$to  = 'admin@bashircarpets.com' . ', '; // note the comma
//$to .= 'info@bashircarpets.com';
$subject = "Thank you for applying for our casting";
$message = '
<div style="line-height:150%;">

Thank you for applying for our casting<br>

We will contact you in the next 24-48 hours with more information<br>

Do not forget to send your pictures to pleasureincgirls@gmail.com <br>

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
$subject = "A new Girl submited information for casting - " . $Firstname;
$message = '
<div>
Hello a new girl called '. $Firstname .' has submitted information for pleasure girls casting<br>

Name: '.$Firstname.' <br>
Phone: '.$Telephone.'<br>
Email: '.$Email.'<br>
Age: '.$Age.' <br>
Height: '.$Height.'<br>
Dress Size: '.$DressSize.'<br>
Nationality: '.$Nationality.' <br>
Language: '.$Language.'<br>
Bisexual: '.$Bisexual.'<br>
Hourly Rate: '.$HourlyRate.' <br>


Availability: '.$Availability.'<br>
Other Websites: '.$OtherWbsites.'<br>

Services Provided: '.$ServicesProvided.'<br>
Why are you a Great Girl: '.$WhyGreatGirl.'<br>

Services: '.$Services.'<br>
Personality: '.$Personality.'<br>


What is a Great Weekend?: '.$GreatWeekend.'<br>
Most Dangerous thing you ever done?: '.$MostDangerours.'<br>
Favourite Food: '.$FavouriteFood.'<br>
Girls For Party: '.$GirlsForParty.'<br>





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


