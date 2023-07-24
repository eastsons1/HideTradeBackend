<?php
								$to	=	"jk2169910@gmail.com".", "."pushpendra@eastsons.com";	
								$subject = "Hello";
												$headers  = 'MIME-Version: 1.0' . "\r\n";
												$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
												$headers .=  'X-Mailer: PHP/'. phpversion();
												//$headers .= 'Bcc: test@yahoo.com' . "\r\n";
												$headers .= 'From: support@gmail.com' . "\r\n";		



												if(@mail($to, $subject, $message, $headers))  ////'-f orders@colwithfarm.co.uk'
												{
													echo "success";
												}
						
				


						
?>

<?php
    $to2 = "jk2169910@gmail.com";
    $subject2 = "Test mail";
    $message2 = "Hello! This is a simple email message.";
    $from2 = "foo2@gmail.com";
    $headers2 = "From:" . $from2;
    mail($to2,$subject2,$message2,$headers2);
    echo "Mail Sent.";
?>