<?php
session_start();

    //$img_url = "localhost/admin/images/"; 


// Create connection
$conn = new mysqli("localhost","cl60-eschoppe","root","cl60-eschoppe");
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
extract($_POST);



if(isset($_POST['Verify']))
{
	$test1 = $_SESSION['test12'];
$sql = "update seller set verified=1,checked =1 where email='$test1'";
$result_run = mysqli_query($conn,$sql);


$to = $test1;
$subject = "Your Verification Status has been Changed";
$txt = "Hello,
  
Congratulation! Your request to be a verified seller for ESCHOPPE has been approved. 
Happy selling!

Your default password is eschoppe
  
Thank you,
ESCHOPPE team";
$headers = "From: ESCHOPPE" ;

#mail($to,$subject,$txt,$headers);

require_once 'swiftmailer/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('eshoppemailer@gmail.com')
  ->setPassword('eshoppeaccount');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Congratulations!')
  ->setFrom(array('eshoppemailer@gmail.com' => 'ESCHOPPE'))
  ->setTo(array($test1))
  ->setBody('
Hello,
  
Congratulation! Your request to be a verified seller for ESCHOPPE has been approved. 
Happy selling!

Your default password is eschoppe
  
Thank you,
ESCHOPPE team');

$result = $mailer->send($message);

echo "<script>
			alert('Seller Approved ');
window.location.href='seller_display.php';
</script>";


}
else if(isset($_POST['Reject']))
{
	$test1 = $_SESSION['test12'];
$sql = "delete from seller where email='$test1'";
$result = $conn->query($sql);


require_once 'swiftmailer/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('eshoppemailer@gmail.com')
  ->setPassword('eshoppeaccount');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('ESHOPPE verification rejected!')
  ->setFrom(array('eshoppemailer@gmail.com' => 'ESCHOPPE'))
  ->setTo(array($test1))
  ->setBody('
Hi team,
  
Your request to be a verified seller for ESCHOPPE has been rejected. 
Please contact support at support@ESCHOPPE.com
  
Thank you,
ESCHOPPE team');

$result = $mailer->send($message);
echo "<script>
			alert('Seller Rejected ');
window.location.href='seller_display.php';
</script>";    

}

?>