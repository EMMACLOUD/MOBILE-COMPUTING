<?php

include('../inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
FlashTitle('Login | '.$set['title']);
if($Function->isLogin()){
	header('Location: '.$set['url'].'/member/main');
	exit;
}
if(isset($_POST['log'])){
	$uemail = $_POST['email'];
	$upass = $_POST['pass'];
	$pass = base64_encode($_POST['pass']);
	if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)$/", $uemail)) {
	$ck=$flash->prepare("SELECT * FROM `user` WHERE `email`=:email");
    $ck->bindParam(':email',$uemail);
    $ck->execute();
 if($ck->rowCount() < 1) {
 $error .= '<p><div class="error">User with E-mail does not Exists!</div></p>';
 }
 else {
	 $userLog = $ck->fetch();
 }
}
else {
	$error .= '<p><div class="error">Invalid E-mail format!</div></p>';
}
	if(empty($uemail)){
	$error .= '<p><div class="error">E-mail cannot be empty it is required!</div></p>';
 }
  elseif(empty($upass)){
	$error .= '<p><div class="error">Password cannot be empty it is required!</div></p>';
 }
 if(empty($error)){
	 $dlog=$flash->prepare("SELECT * FROM `user` WHERE `email`=:email AND password=:pass");
     $dlog->bindParam(':email',$uemail);
	 $dlog->bindParam(':pass',$pass);
     $dlog->execute();
    if($dlog->rowCount() > 0) {
	 $_SESSION['email'] = $uemail;
	 header('Location: '.$set['url'].'/member/main');
	exit;
      }
	  else {
			$error .= '<p><div class="error">PassWord Is Incorrect!</div></p>';
		}
     }
   }
?>
<!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>My Account / Sign in</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>My Account / Sign in</li>
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
                            <p align="justify"> Firstly, you have to register your account, 
							after registration proceed to login and supply your login details.
							Supply your bank details after login. You will have to donate the sum of either 
							N<?php echo $mcprice1; ?>, N<?php echo $mcprice2; ?>, N<?php echo $mcprice3; ?>
							, <?php echo $mcprice4; ?> or N<?php echo $mcprice5; ?>
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
							After you have received payment from 2 people under you, 
							the system will automatically EXIT you and allows unlimited registration.</p>

                            <p align="justify">All donations are made directly to member bank account. 
							Share <?php echo $set['name']; ?> to people and make the world a better place.</p>
<hr>
<p align="justify"> <?php echo $set['name']; ?> will never sending Messages to participants.
 Please discard any message bearing <?php echo $set['name']; ?>. They are from hackers that wants to ruin your account. 
 Please be careful.</p>                         
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="box">
                            <h2 class="text-uppercase">Login</h2>

                            <p class="lead">Already a Member of <?php echo $set['name']; ?>?</p>
                            <p class="text-muted">Sign in and see what we have for you today.</p>

                            <hr>

                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" value="<?php echo htmlentities(['email']); ?>" type="text" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="pass" value="<?php echo htmlentities(['pass']); ?>" type="password" class="form-control"  id="password">
                                </div>
                              <div class="text-left">
                                    <button name="log" type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Or Click here for <span class="style1"><a href="<?php echo $set['url']; ?>/member/forgotpass">
														Forgot Password?</a></span></div>
								                   
								
								
									  
								
								
								
                            </form>
                        </div>
						 <div class="form-group">
						<?php echo $error; ?>
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