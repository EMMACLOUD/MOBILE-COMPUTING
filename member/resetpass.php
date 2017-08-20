<?php

include('../inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
FlashTitle('Reset Password | '.$set['title']);
echo '<!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>My Account / Reset PassWord</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>My Account / Reset PassWord</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
<div id="content">
            <div class="container">

                <div class="row">
                    <div class="form-group">
                        <div class="box">';
if($Function->isLogin()){
	header('Location: '.$set['url'].'/member/main');
	exit;
}
if(!isset($_GET['token']) || !isset($_GET['email'])){
	echo '<p><div class="error">Not Authorized!</div></p>';
}
else {
	$utoken = $_GET['token'];
	$uemail = $_GET['email'];
	$rek = $flash->prepare("SELECT * FROM `user` WHERE `email`=:email AND `token`=:token");
	$rek->bindParam(':token',$utoken);
	$rek->bindParam(':email',$uemail);
	$rek->execute();
	if($rek->rowCount() > 0){
		if(isset($_POST['res'])){
			//Update New PassWord
			$upass = $_POST['pass'];
			$upass2 = $_POST['pass2'];
			$pass = base64_encode($_POST['pass']);
			$nutoken = md5(uniqid(rand()));
			 if (empty($upass)) {
 $error .= '<p><div class="error">Please Enter Your New Password It Is Required!</div></p>';
 }
 elseif(empty($upass2)) {
 $error .= '<p><div class="error">Please Enter Your Re-Type Password  It Is Required!</div></p>';
}
elseif($upass != $upass2){
		$error .= '<p><div class="error">PassWord Do Not Match each other!</div></p>';
	}
	elseif(mb_strlen($upass) < 6 || mb_strlen($upass) > 100) {
 $error .= '<p><div class="error">Password Minimum Is 6 and Maximum is 100 Characters!</div></p>';
}
elseif($upass == '123456' || $upass == 'abcdef' || $upass == 'ABCDEF' || $upass == '111111' || $upass == '222222') {
 $error .= '<p><div class="error">Password Too Weak '.rand(9,12).'% Secure!  Use Something 
 like '.substr(md5(uniqid(rand())),0,8).'</div></p>';
}
if(empty($error)){
			$resp = $flash->prepare("UPDATE `user` SET `password`=:pass,`token`=:token WHERE `email`=:email");
			$resp->bindParam(':pass',$pass);
			$resp->bindParam(':email',$uemail);
			$resp->bindParam(':token',$nutoken);
			if($resp->execute()){
					$subject = 'Password Reset on '.$set['name'];
$to = $uemail;
$message = "Password Reset on ".$set['name']." The Great Family where to refill your wallet\r\n
Your Details Below:\r\n
Email: ".$uemail."\r\n
PassWord: ".substr($upass,0,3)."******   \r\n
To Login Click Below Link or Copy To your Browser:\r\n
".$set['url']."/member/login \r\n
Contact Details: \r\n
Mobile: ".$set['phone']."\r\n
Email: ".$set['email']."\r\n
Brought By: ".$set['name']." Inc \r\n
".CopyR. ' '.date('Y')." - ".$set['name']." \r\n
".RitR. ' '.$set['name']." Concept\r\n";
$header ="From: <admin@".$set['slug'].">\r\n" .
    "Reply-To: " . $set['email'] . "\r\n"; 
		if(mail($to,$subject,$message,$header)){
		$succs .= '<p><div class="success">Password Changed!</div></p>';
	}
	$_SESSION['email'] = $uemail;
	header('Location: '.$set['url'].'/member/main');
	exit;
			}
		}
		}
		echo '<form method="POST"><label>New PassWord</label><br/>
		<input type="password" name="pass" class="form-control" value="'.htmlentities($upass).'"/><br/>
		<label>Retype PassWord</label><br/>
		<input type="password" name="pass2" class="form-control" value="'.htmlentities($upass2).'"/><br/>
		<br/>
		<button type="submit" name="res" class="btn btn-template-main"><i class="fa fa-sign-in"></i>
		Reset Password</button></form>';
		echo '<div class="form-group">';
						echo $error; 
						echo $succs;
						echo $errr;
						echo '</div>
</div>	</div>
</div> </div>';	
	}
	else {
		$errr .= '<p><div class="error">Wrong Authorization!</div></p>';
	}
}
echo '</div>';
include('../inc/footer.php');
?>