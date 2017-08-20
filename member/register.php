<?php

include('../inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
FlashTitle('Register | '.$set['title']);
if($Function->isLogin()){
	header('Location: '.$set['url'].'/member/main');
	exit;
}
$breg = $flash->query("SELECT * FROM `user` WHERE `id`>0");
if($breg->rowCount() > $set['memberallowed'] AND $set['memberallowed'] > 0){
	echo '<div class="info">Registration Closed Contact Admin for More!</div>';
}
else {
if(isset($_POST['reg'])){
	if(isset($_SESSION['ref'])){
		$uref = $_SESSION['ref'];
	}
	else {
		$uref = 'none';
	}
$uemail = $_POST['email'];
$uname = $_POST['uname'];
$upass = $_POST['pass'];
$uplan = $_POST['plan'];
$pass = base64_encode($_POST['pass']);
$upass2 = $_POST['pass2'];
$ufname = $_POST['fname'];
$ulname = $_POST['lname'];
$uphone = $_POST['phone'];
$ubankname = $_POST['bankname'];
$uaccname = $_POST['accname'];
$uaccno = $_POST['accno'];
$ulocation = $_POST['location'];
$uextra = 	$_POST['extra'];
$udate = date('d-M-Y h:ia');
$utoken = md5(uniqid(rand()));
 if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)$/", $uemail)) {
	$ck=$flash->prepare("SELECT * FROM `user` WHERE `email`=:email");
    $ck->bindParam(':email',$uemail);
    $ck->execute();
 if($ck->rowCount()) {
 $error .= '<p><div class="error">Email Already Exists Please use another one or Recover the password!</div></p>';
 }
}
else {
	echo '<p><div class="error">Invalid E-mail format!</div></p>';
}
$cku=$flash->prepare("SELECT * FROM `user` WHERE `username`=:uname");
    $cku->bindParam(':uname',$uname);
    $cku->execute();
 if($cku->rowCount() > 0){
	 $error .= '<p><div class="error">Username Already Exists use something like '.$uname.rand(1,150).'</div></p>';
 }
	//More Validation
if(empty($uemail)){
	$error .= '<p><div class="error">E-mail cannot be empty it is required!</div></p>';
}

elseif(empty($uname)){
	$error .= '<p><div class="error">Username cannot be empty it is required!</div></p>';
}
elseif(mb_strlen($uname) < 2 || mb_strlen($uname) > 20) {
 $error .= '<p><div class="error">Username Minimum 2 and Maximum 20 Characters</div></p>';
}
elseif(empty($ufname)){
	$error .= '<p><div class="error">Firstname cannot be empty it is required!</div></p>';
}
elseif(empty($ulname)){
	$error .= '<p><div class="error">Lastname cannot be empty it is required!</div></p>';
}
elseif(empty($uplan)){
	$error .= '<p><div class="error">Please Choose Plan it is required!</div></p>';
}
elseif(mb_strlen($ufname) < 2 || mb_strlen($ufname) > 30) {
 $error .= '<p><div class="error">Email Minimum 2 and Maximum 80 Characters</div></p>';
}
elseif(mb_strlen($ulname) < 2 || mb_strlen($ulname) > 40) {
 $error .= '<p><div class="error">Lastname Minimum 2 and Maximum 40 Characters</div></p>';
}
elseif(empty($uphone)){
	$error .= '<p><div class="error">Phone Number cannot be empty Enter your Phone!</div></p>';
}
elseif(empty($ubankname)){
	$error .= '<p><div class="error">Bank Name cannot be empty Enter your Bank Name!</div></p>';
}
elseif(empty($uaccname)){
	$error .= '<p><div class="error">Account Name cannot be empty Enter Account Name!</div></p>';
}
elseif(empty($uaccno)){
	$error .= '<p><div class="error">Account Number cannot be empty Enter Account Number!</div></p>';
}
 elseif (empty($upass)) {
 $error .= '<p><div class="error">Please Enter Your Password It Is Required!</div></p>';
 }
 elseif(empty($upass2)) {
 $error .= '<p><div class="error">Please Enter Your ReType Password  It Is Required!</div></p>';
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
	elseif(mb_strlen($uemail) < 5 || mb_strlen($uemail) > 80) {
 $error .= '<p><div class="error">Email Minimum 5 and Maximum 80 Characters</div></p>';
}
elseif(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)$/", $uemail)) {
 $error .= '<div class="error">Your Email Is Invalid!</div>';
 }
if(empty($error)){
	$reg = $flash->prepare("INSERT INTO `user` (username,email,password,firstname,lastname,phone,bankname,
	accname,accno,location,joined,token,referral,plan) 
	VALUES (:uname,:email,:pass,:fname,:lname,:phone,:bname,:aname,:ano,:loc,:joined,:token,:ref,:plan)");
$reg->bindParam(':uname',$uname);
$reg->bindParam(':email',$uemail);
$reg->bindParam(':pass',$pass);
$reg->bindParam(':fname',$ufname);
$reg->bindParam(':lname',$ulname);
$reg->bindParam(':phone',$uphone);
$reg->bindParam(':plan',$uplan);
$reg->bindParam(':bname',$ubankname);
$reg->bindParam(':aname',$uaccname);
$reg->bindParam(':ano',$uaccno);
$reg->bindParam(':loc',$ulocation);
$reg->bindParam(':ref',$uref);
$reg->bindParam(':token',$utoken);
$reg->bindParam(':joined',$udate);
if($reg->execute()){
	$succs .= '<div class="success">Your Account Have Been Created Please Login to continue!</div>';
	$subject = 'Welcome To '.$set['name'].' your Registration was Sucessful';
$to = $uemail;
$message = "Welcome To ".$set['name']." The Great Family where to refill your wallet\r\n
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
}
	}
	else {
	$errr .= '</p><div class="error">Cannot register Right now Try again Later!</div></p>';	
	}
}
}

?>
<!-- *** REGISTER MODAL START *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>New account</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>Create An account</li>
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
						                                  
 <h4 class="text-uppercase"><div style="color:#9933FF">Create Account (CHOOSE A PLAN) </div> </h4>
							<p>Your registration with us gives new world of interest, fantastic income and much more opens to you! The whole process will not take you more than a minute!</p>
<p class="text-muted">If you have any questions, please feel free to <a href="<?php echo $set['url']; ?>/contact">contact us</a>, our customer service center is working for you 24/7.</p>

                            <hr>
								    
                            <form method="post" enctype="multipart/form-data" action="">
	<input type="hidden" class="form-control" value="<?php echo $_GET['sess']; ?>" name="id">
                                
				<div class="form-group">
             <?php echo '<input type="radio" name="plan" value="1"';
			 if($_GET['plan'] == '1'){
				 echo 'checked="checked"';
			 }
				 echo '>
 <font color="red"><b> '.$mcplan1.' ₦'.$mcprice1.'</b></font></input>';
 ?> <br/>
<?php echo '<input type="radio" name="plan" value="2"';
			 if($_GET['plan'] == '2'){
				 echo 'checked="checked"';
			 }
				 echo '>
 <font color="blue"><b> '.$mcplan2.' ₦'.$mcprice2.'</b></font></input>';
 ?> <br/>
 <?php echo '<input type="radio" name="plan" value="3"';
			 if($_GET['plan'] == '3'){
				 echo 'checked="checked"';
			 }
				 echo '>
 <font color="purple"><b> '.$mcplan3.' ₦'.$mcprice3.'</b></font></input>';
 ?> <br/>
  <?php echo '<input type="radio" name="plan" value="4"';
			 if($_GET['plan'] == '4'){
				 echo 'checked="checked"';
			 }
				 echo '>
 <font color="orange"><b> '.$mcplan4.' ₦'.$mcprice4.'</b></font></input>';
?> <br/>
 <?php echo '<input type="radio" name="plan" value="5"';
			 if($_GET['plan'] == '5'){
				 echo 'checked="checked"';
			 }
				 echo '>
 <font color="brown"><b> '.$mcplan5.' ₦'.$mcprice5.'</b></font></input>';
 ?>
                                </div>
								<div class="form-group">
      <label for="name-login">First Name</label>
       <input type="text" class="form-control" placeholder = "First Name" name="fname" 
	   value="<?php echo htmlentities($ufname); ?>" required>
                                </div>
								
         <div class="form-group">
           <label for="email-login">Last Name</label>
                                    
 <input type="text" class="form-control" placeholder = "Last Name" name="lname" 
 value="<?php echo htmlentities($ulname); ?>" required>
                              </div>
								
                 <div class="form-group">
              <label for="email">Email Address</label>
    <input type="email" class="form-control" placeholder = "Email Address" name="email"
 value="<?php echo htmlentities($uemail); ?>" required>
                                </div>
			<!-- Bank Details -->
			<div class="form-group">
      <label for="name-login">Bank Name</label>
       <input type="text" class="form-control" placeholder = "Bank Name" name="bankname" 
	   value="<?php echo htmlentities($ubankname); ?>" required>
                                </div>
								
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box">
						<!-- Bank details 2-->
						<div class="form-group">
           <label for="email-login">Account Name</label>
                                    
 <input type="text" class="form-control" placeholder = "Account Name" name="accname" 
 value="<?php echo htmlentities($uaccname); ?>" required>
                              </div>
								
                 <div class="form-group">
              <label for="email">Account Number</label>
    <input type="number" class="form-control" placeholder = "Account Number" name="accno"
 value="<?php echo htmlentities($uaccno); ?>" required>
                                </div>
						<div class="form-group">
                                    <label for="password-login">Mobile Number</label>
      <input type="text" class="form-control" placeholder="Mobile Number" name="phone"
 value="<?php echo htmlentities($uphone); ?>"  required>
                                </div>
                           
                                <div class="form-group">
                                    <label for="email">Location</label>
           <input type="text" class="form-control" placeholder="City,State" name="location"
 value="<?php echo htmlentities($ulocation); ?>"   required>
                                </div>
								
                                <div class="form-group">
                                    <label for="name-login">Username</label>
         <input type="text" class="form-control" placeholder="Username" name="uname"
 value="<?php echo htmlentities($uname); ?>"		 required>
                                </div>
								
								
								<div class="form-group">
                                    <label for="password">Password</label>
           <input type="password" class="form-control" placeholder="Password" name="pass"
 value="<?php echo htmlentities($_POST['pass']); ?>"  required>
                                </div>
								
								
                                <div class="form-group">
                                    <label for="password-login">Retype password</label>
	<input  name="pass2"  type="password" class="form-control" placeholder="Retype your password"
 value="<?php echo htmlentities($_POST['pass2']); ?>"	required>
                                </div>
	<?php
     if(isset($_SESSION['ref'])){
      echo ' <div class="form-group">
	  <label for="referral">Referral ID</label><br/>
     <input type="text" class="form-control" name="ref" value="'.$_SESSION['ref'].'" disabled="disabled"/>
	  </div>';
        }
	?>
                           <div class="text-right">
   <button type="submit" name="reg" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
                                   </div>
	<br/><div class="form-group">
	<?php
	echo $succs;
	echo $errr;
	echo $error;
	?>
<br/> <a class="buttonw" href="<?php echo $set['url']; ?>/member/login"><font color="brown">Login Account</font></a>
 OR <a class="buttonw" href="<?php echo $set['url']; ?>/member/forgotpass"><font color="brown">Forgot Password??</font></a> 
	</div><br/><br/>
								

                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
      
<?php
}
include('../inc/footer.php');
?>