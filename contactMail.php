<?php

$name = strip_tags($_POST['fname']);
$email = strip_tags($_POST['email']);
$contact = strip_tags($_POST['phone']);
$comment = strip_tags($_POST['message']);

$bccEmailAddress1 = "prashanth11391@gmail.com";

if($name !== "" && $email !=="" && $comment !==""){

$email_from = 'SGTestingInstitute.com';
$email_subject = "$name"." has dropped you a message";

$message = '<html><body>';
$message .= '<div>';
$message .= '<hr style="border: 1px solid #00bfff;"/>';
$message .= '<div style="padding: 10px; font-size: 16px;"><strong>Name:</strong> ' . strip_tags($_POST['fname']) . '</div>';
$message .= '<div style="padding: 10px; font-size: 16px;"><strong>Email:</strong> ' . strip_tags($_POST['email']) . '</div>';
$message .= '<div style="padding: 10px; font-size: 16px;"><strong>Phone:</strong> ' . strip_tags($_POST['phone']) . '</div>';
$message .= '<div style="padding: 10px; font-size: 16px;"><strong>Message:</strong> ' . strip_tags($_POST['message']) . '</div>';
$message .= '</div>';
$message .= '</body></html>';

$to = "info@sgtestinginstitute.com,prabhakargudi@gmail.com";
$headers = "From: $email_from \r\n";
$headers.= "bcc: " . $bccEmailAddress1 . "\r\n" ;
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to,$email_subject,$message,$headers);
echo "Thank you! <br/>";
echo "Your mail has been sent <br/>";
}else{
    echo "<div style='width:100%;text-align:center;font-weight:bold;font-size:20px;'>Direct access restricted!</div>";
}

   
?>