<?php 

//This is creating the mysql connection where you specify the right information
$link = mysqli_connect("host.com","username","password","databasename");




//We will declare the variables in this section

$PriceOffered1 =  mysqli_real_escape_string($link, $_POST['PriceOffered']);
$YourComments1 = mysqli_real_escape_string($link, $_POST['YourComments']);
$ClientName1 =  mysqli_real_escape_string($link,  $_POST['ClientName']);  
$Email1 = mysqli_real_escape_string($link, $_POST['Email']);
$Phone1 = mysqli_real_escape_string($link, $_POST['Phone']);
$CarpetSKU1 = mysqli_real_escape_string($link, $_POST['CarpetSKU']);
$ProductName1 = mysqli_real_escape_string($link, $_POST['ProductName']);
$SizeFT1 = mysqli_real_escape_string($link,  $_POST['SizeFT']);  
$SizeM1 = mysqli_real_escape_string($link,$_POST['SizeM']);
$URLPost1 = mysqli_real_escape_string($link, $_POST['URLPost']);
$OfferDate1 = mysqli_real_escape_string($link, date("Y/m/d"));



$PriceOffered =  $_POST['PriceOffered'];
$YourComments =  $_POST['YourComments'];
$ClientName =   $_POST['ClientName'];  
$Email =  $_POST['Email'];
$Phone =  $_POST['Phone'];
$CarpetSKU =  $_POST['CarpetSKU'];
$ProductName =  $_POST['ProductName'];
$SizeFT =  $_POST['SizeFT'];  
$SizeM = $_POST['SizeM'];
$URLPost =  $_POST['URLPost'];
$OfferDate = date("Y/m/d");




//need to create database for saving the information in mysql

$sql="INSERT INTO ClientOffers (PriceOffered, YourComments, ClientName, Email, Phone, CarpetSKU, ProductName, SizeFT, SizeM, URLPost, OfferDate) VALUES ('$PriceOffered1', '$YourComments1', '$ClientName1', '$Email1', '$Phone1', '$CarpetSKU1', '$ProductName1', '$SizeFT1', '$SizeM1', '$URLPost1', '$OfferDate1')";



//echo'<br><br>';


// Perform a query, check for error
if (!mysqli_query($link,$sql))
  {
  echo("Error description: " . mysqli_error($link)  .'<br><br>');
  }




mysqli_close($link);


echo 'Votre offre a &#233;t&#233; soumise pour approbation.<br>';



//----------EMAIL SENT TO CLIENT TO with summary of the offer that they have created----------------------------------------


//---------------------------------------------------------------------------------------------------------------------

// Now we will be sending the email to the users

$to  = $Email;

//uncomment below for multiple recipients
//$to  = 'admin@bashircarpets.com' . ', '; // note the comma
//$to .= 'info@bashircarpets.com';


$subject = "Confirmation d’offre de prix reçu pour le tapis " . $ProductName;


$message = '
<div style="line-height:150%;">

Bonjour '.$ClientName.'. La pr&#233;sente est pour vous remercier pour votre offre r&#233;cemment effectu&#233; de $ ' . $PriceOffered .' pour le tapis '. $ProductName .' au num&#233;ro de r&#233;f&#233;rence: '. $CarpetSKU .'  <br><br>


Votre offre est en cours de r&#233;vision par un membre de notre &#233;quipe qui vous r&#233;pondera sous peu. <br><br>


<h3>D&#233;tails de votre offre de prix:</h3>


<u>Votre prix offert</u>: $ ' . $PriceOffered .' <br><br>


<u>Lien internet</u> : <a target="_blank" href="'. $URLPost .'" >'. $URLPost .'</a>

<br><br>


<u>Votre message</u> : <br> '.$YourComments.' <br><br>


Nous vous remercions pour votre patience et vous souhaitons une agr&#233;able journ&#233;e.<br><br>


<br><br><br>
Cordialement,<br><br>
L&#39;&#233;quipe de services clients, <br><br>
<img src="http://tapisdorientbashir.com/wp-content/uploads/2016/07/french-logo-300x90px.png"><br><br>
Tapis d&#39;Orient Bashir | 8461, boulevard D&#233;carie, Montr&#233;al, QC  H4P 2J2  Canada<br><br>
T&#233;l.: bureau: (514) 735-1958 | T&#233;l&#233;copieur: (514) 735-9095<br><br>
<a target="_blank" href="http://tapisdorientbashir.com">TapisBashir.com</a>   | Courriel: <a href="mailto:info@tapisbashir.com">info@tapisbashir.com</a><br><br>

<div style="color:#808080;margin-top:25px;">
<strong>AVIS IMPORTANT</strong>:&nbsp;Ce courriel et toutesses  pi&#232;ces jointes peuvent contenir de l&#39;information de nature confidentielle ou  privil&#233;gi&#233;e. Si vous avez re&#231;u ce courriel par erreur, merci de ne pas  letransf&#233;rer, le copier ou l&#39;utiliser. Veuillez communiquer imm&#233;diatement avec  l&#39;exp&#233;diteuret supprimer le message dans son int&#233;gralit&#233;. Le fait de vous avoir  envoy&#233; ce courriel par erreur ne signifie pas que l&#39;exp&#233;diteur renonce &#224; ses  droits. Tapis d&rsquo;Orient Bashir et ses affili&#233;es ne peuvent &#234;tre tenues  responsables de toute perte ou dommages li&#233;s au pr&#233;sent courriel et peuvent  effectuer un suivi de ce courriel, le conserver et l&#39;examiner. Les opinions  exprim&#233;es dans le pr&#233;sent courriel sont celles de son auteur et non celles de  Tapis d&rsquo;Orient Bashir et de ses soci&#233;t&#233;s affili&#233;es. Les instructions de  n&#233;gociation re&#231;ues par messagerie vocale ne seront pas appliqu&#233;es. </div>


</div>
';





// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// sending a copy to the following emails, anonymously
//$headers .= 'BCC: info@bashircarpets.com, samina@bashircarpets.com, jose@bashircarpets.com'. "\r\n";


// This will indicate the sender information
$headers .= 'From: Services clients | Tapis d\'Orient Bashir <info@tapisdorientbashir.com>' . "\r\n";

//uncomment this to send a copy to another email
//$headers .= 'Cc: myboss@example.com' . "\r\n";

//this will send the email
mail($to,$subject,$message,$headers)  or die('Mail Error');

echo 'Nous confirmons la r&#233;ception de votre demande. Veuillez nous accorder un d&#233;lai maximale de 72 heures ouvrable afin de vous r&#233;pondre.<br>
	
	
	
	';








//-------------THIS WILL SEND AND EMAIL TO admin@bashircarpets.com-------------------------------------





//---------------------------------------------------------------------------------------------------------------------

// Now we will be sending the email to the users

$to  = 'admin@bashircarpets.com';

//uncomment below for multiple recipients
//$to  = 'admin@bashircarpets.com' . ', '; // note the comma
//$to .= 'info@bashircarpets.com';


$subject = "Prix offert reçu pour " . $ProductName;


$message = '
<div>

Cher &#233;quipe de service, <br><br>

'.$ClientName.' viens de vous faire une offre de prix pour le tapis suivant: <br><br><br>

<u>Nom du tapis</u> : '. $ProductName .'  <br><br>
<u>SKU du tapis</u> : '. $CarpetSKU .'<br><br>
<u>Dimensions en pieds</u> : '. $SizeFT .'<br><br>
<u>Dimensions en mètres</u> : '. $SizeM .'<br><br>
<br>
<a target="_blank" href="'. $URLPost .'" >'. $URLPost .'</a>
<br><br><br>

<h3>D&#233;tails de l&#39;offre:</h3>

<u>Prix offert par prospect</u> : $ '. $PriceOffered .' <br><br>
<u>Date de la demande</u> :   '. $OfferDate .'<br><br><br>

<u>Message du client</u> :<br><br>
'.$YourComments.' <br><br><br>


<h3>Coordonn&#233;e du prospect:</h3>
<u>Nom</u> :  '.$ClientName.' <br><br>

<u>Courriel</u> :  '.$Email.' <br><br>

<u>Téléphone</u> :  '.$Phone.' <br><br>

<u>Langue</u> :  Francais



<br><br><br>
Cordialement,<br><br>
L&#39;&#233;quipe de services clients, <br><br>
<img src="http://tapisdorientbashir.com/wp-content/uploads/2016/07/french-logo-300x90px.png"><br><br>
Tapis d&#39;Orient Bashir | 8461, boulevard D&#233;carie, Montr&#233;al, QC  H4P 2J2  Canada<br><br>
T&#233;l.: bureau: (514) 735-1958 | T&#233;l&#233;copieur: (514) 735-9095<br><br>
<a target="_blank" href="http://tapisdorientbashir.com">TapisBashir.com</a>   | Courriel: <a href="mailto:info@tapisbashir.com">info@tapisbashir.com</a><br><br>

<div style="color:#808080;margin-top:25px;">
<strong>AVIS IMPORTANT</strong>:&nbsp;Ce courriel et toutesses  pi&#232;ces jointes peuvent contenir de l&#39;information de nature confidentielleou  privil&#233;gi&#233;e. Si vous avez re&#231;u ce courriel par erreur, merci de ne pas  letransf&#233;rer, le copier ou l&#39;utiliser. Veuillez communiquer imm&#233;diatement avec  l&#39;exp&#233;diteuret supprimer le message dans son int&#233;gralit&#233;. Le fait de vous avoir  envoy&#233; ce courriel par erreur ne signifie pas que l&#39;exp&#233;diteur renonce &#224; ses  droits. Tapis d&rsquo;Orient Bashir et ses affili&#233;es ne peuvent &#234;tre tenues  responsables de toute perte ou dommages li&#233;s au pr&#233;sent courriel et peuvent  effectuer un suivi de ce courriel, le conserver et l&#39;examiner. Les opinions  exprim&#233;es dans le pr&#233;sent courriel sont celles de son auteur et non celles de  Tapis d&rsquo;Orient Bashir et de ses soci&#233;t&#233;s affili&#233;es. Les instructions de  n&#233;gociation re&#231;ues par messagerie vocale ne seront pas appliqu&#233;es. </div>



</div>
';




// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// sending a copy to the following emails, anonymously
$headers .= 'BCC: info@bashircarpets.com, samina@bashircarpets.com, jose@bashircarpets.com'. "\r\n";


// This will indicate the sender information
$headers .= 'From: Services clients | Tapis D\'Orient Bashir <info@tapisdorientbashir.com>' . "\r\n";

//uncomment this to send a copy to another email
//$headers .= 'Cc: myboss@example.com' . "\r\n";

//this will send the email
mail($to,$subject,$message,$headers)  or die('Mail Error');



echo 'Merci, Nous vous contacterons.<br>';


?> 









