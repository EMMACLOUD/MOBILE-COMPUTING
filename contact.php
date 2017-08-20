<?php

include 'inc/header.php';
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
FlashTitle('Contact Us | '.$set['title']);

if(isset($_POST['mess'])){
	$memail = $_POST['email'];
	$msub = $_POST['subject'];
	$mbody = $_POST['body'];
	if(empty($memail)){
	$error .= '<p><div class="error">E-mail cannot be empty it is required!</div></p>';
}
	elseif(mb_strlen($memail) < 5 || mb_strlen($memail) > 80) {
 $error .= '<p><div class="error">Email Minimum 5 and Maximum 80 Characters</div></p>';
}
elseif(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)$/", $memail)) {
 $error .= '<div class="error">Your Email Is Invalid!</div>';
 }
 if(empty($msub)){
	$error .= '<p><div class="error">Subject cannot be empty it is required!</div></p>';
}
if(empty($mbody)){
	$error .= '<p><div class="error">Message Body cannot be empty it is required!</div></p>';
}
if(empty($error)){
	$to = $set['email'];
$message = "Message from: ".$set['name']." The Great Family where to refill your wallet\r\n
 ".$mbody."\r\n
Contact Details: \r\n
Mobile: ".$set['phone']."\r\n
Email: ".$set['email']."\r\n
Brought By: ".$set['name']." Inc \r\n
".CopyR. ' '.date('Y')." - ".$set['name']." \r\n
".RitR. ' '.$set['name']." Concept\r\n";
$header ="From: <".$memail.">\r\n" .
    "Reply-To: " . $memail . "\r\n"; 
		if(mail($to,$subject,$message,$header)){
		$succs .= '<p><div class="alert" align="center">Successfully Message Sent We get back to you later!</div></p>';
	}
	else{
		echo '<p><div class="info" align="center">Cannot Contact Try Later!</div></p>';
	}
}
}
?>
<!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>My Account / Contact Support</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a>
                            </li>
                            <li>My Account / Contact Support</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

       <?php  
	   echo'<div id="content">
            <div class="container">

                <div class="row">
                    <div class="form-group">
                        <div class="box">
						<h2>Contact Us</h2>
<hr class="dhr" style="background:white;"/>
<form method="POST">
<label>Email</label><br/>
<input type="text" name="email" class="form-control" value="'.$prof['email'].'"/><br/>
<label>Subject</label><br/>
<input type="text" class="form-control" name="subject" value="'.htmlentities($_POST['subject']).'"/><br/>
<label>Message Body</label><br/>
<textarea name="body" rows="8" class="form-control">'.htmlentities($_POST['body']).'</textarea><br/><br/>
<button type="submit" name="mess" class="btn btn-template-main"><i class="fa fa-envelope"></i>SEND</button><br/>
</form>
<div class="form-group">';
						echo $error; 
						echo $succs;
						echo '</div>
</div>	</div>
</div> </div>';					
include 'inc/footer.php';
?>