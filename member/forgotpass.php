<?php

include('../inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
FlashTitle('Forgot Password | '.$set['title']);
if($Function->isLogin()){
	header('Location: '.$set['url'].'/member/main');
	exit;
}
if(isset($_POST['sendit'])){
 	$uemail = $_POST['email'];
	if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)$/", $uemail)) {
	$ck=$flash->prepare("SELECT * FROM `user` WHERE `email`=:email");
    $ck->bindParam(':email',$uemail);
    $ck->execute();
 if($ck->rowCount() < 1) {
 $error .= '<p><div class="error">User with E-mail does not Exists!</div></p>';
 }
 else {
	 $reseT = $ck->fetch();
 }
}
else {
	$error .= '<p><div class="error">Invalid E-mail Format!</div></p>';
}
if(mb_strlen($uemail) < 5){
	$error .= '<p><div class="error">E-mail Minimum is 5 Characters!</div></p>';
}
if(empty($error)){
	$subject = 'Password Reset From '.$set['name'];
$to = $uemail;
$message = "Reset Your password on ".$set['name']." The Great Family where to refill your wallet\r\n
To Reset your Password Click Below Link or Copy To your Browser:\r\n
".$set['url']."/member/resetpass?token=".$reseT['token']."&email=".$uemail."&hash=".substr(md5(uniqid(rand())),3,9)." \r\n
Contact Details: \r\n
Mobile: ".$set['phone']."\r\n
Email: ".$set['email']."\r\n
Brought By: ".$set['name']." Inc \r\n
".CopyR. ' '.date('Y')." - ".$set['name']." \r\n
".RitR. ' '.$set['name']." Concept\r\n";
$header ="From: <admin@".$set['slug'].">\r\n" .
    "Reply-To: " . $set['email'] . "\r\n"; 
		if(mail($to,$subject,$message,$header)){
		$succs .= '<p><div class="success">Link to recover your password have been sent to your email!</div></p>';
	}
	else {
		$errr .= '<p><div class="error">Could not send your password reset Link try again later!</div></p>';
	}
  }
}
?>
<!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>My Account / Forgot PassWord</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>My Account / Forgot PassWord</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">How <?php echo $set['name']; ?> Works</h2>
                            <p align="justify">Firstly, you have to register your account, 
							after registration proceed to login and supply your login details.
							Supply your bank details after login. You will have to donate the sum of either 
							N<?php echo $mcprice1; ?>, N<?php echo $mcprice2; ?>, N<?php echo $mcprice3; ?>
							,N <?php echo $mcprice4; ?> or N<?php echo $mcprice5; ?>
							to a fellow member assigned by the system, 
							and the member will then confirm your donation and then the system will 
							automatically assign 2 other registered people under you from spillovers
							who will also pay you the joining amount each, into your bank account, 
							making 100% (i.e. 100% of N<?php echo $mcprice1; ?>  
							is N<?php echo ($mcprice1*2); ?>,
							100% of N<?php echo $mcprice2; ?> is N<?php echo ($mcprice2*2); ?>,
							100% of N<?php echo $mcprice3; ?> is N<?php echo ($mcprice3*2); ?> ,
							100% of N<?php echo $mcprice4; ?> is N<?php echo ($mcprice4*2); ?>
							AND 100% of N<?php echo $mcprice5; ?> is N<?php echo ($mcprice5*2); ?>).</p>

                            <p align="justify"><?php echo $set['name']; ?> will assign people to pay you.
							After you have received payment from 2 people under you, the system will 
							automatically EXIT you and allows unlimited registration.</p>

                            <p align="justify">All donations are made directly to member bank account.
							Share <?php echo $set['name']; ?> to people and make the world a better place.</p>
<hr>
<p align="justify"> <?php echo $set['name']; ?> will never sending Messages to participants. Please discard 
any message bearing <?php echo $set['name']; ?>. They are from hackers that wants to ruin your account.
 Please be careful.</p>                         
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="box">
                            <h2 class="text-uppercase">Forgot Password</h2>

                            <p class="lead">You are having problem in logging in?</p>
                            <p class="text-muted">Kindly fill in your email to recover your password.</p>

                            <hr>

                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" value="<?php echo $_POST['email']; ?>" type="text" class="form-control" id="email" Placeholder="Enter your Email" required>
                                </div>
                              <div class="text-left">
                                    <button name="sendit" type="submit" class="btn btn-template-main"><i class="fa fa-envelope"></i>Send to Mail</button>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Or Click here to go&nbsp;
														<span class="style1"><a href="<?php echo $set['url']; ?>/member/login">Back to Login</a></span></div>
								
				

								
                            </form>
                        </div>
						<div class="form-group">
			 <?php
			 echo $error;
			 echo $errr;
			 echo $succs;
			 ?>
			 </div>
                    </div>
             
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        
<?php
include('../inc/footer.php');
?>