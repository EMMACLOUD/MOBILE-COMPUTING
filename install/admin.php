<?php

include('../inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
echo '<link rel="stylesheet" type="text/css" href="/assets/style.css"/>';
FlashTitle('Admin Register | '.$set['title']);
if($Function->isLogin()){
	header('Location: '.$set['url'].'/member/main');
	exit;
}
$breg = $flash->query("SELECT * FROM `user` WHERE `id`>0");
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
	 echo '<p><div class="error">Username Already Exists use something like '.$uname.rand(1,150).'</div></p>';
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
	$uriG = '1';
        $TOm = '1';
$regs = $flash->prepare("INSERT INTO `user` (username,email,password,firstname,lastname,phone,bankname,accname,accno,location,joined,token,extra,referral,`right`,tomerge) 
	VALUES (:uname,:email,:pass,:fname,:lname,:phone,:bname,:aname,:ano,:loc,:joined,:token,:extra,:ref,:rg,:tom)");
$regs->bindParam(':uname',$uname);
$regs->bindParam(':email',$uemail);
$regs->bindParam(':rg',$uriG);
$regs->bindParam(':tom',$TOm);
$regs->bindParam(':pass',$pass);
$regs->bindParam(':fname',$ufname);
$regs->bindParam(':lname',$ulname);
$regs->bindParam(':phone',$uphone);
$regs->bindParam(':bname',$ubankname);
$regs->bindParam(':aname',$uaccname);
$regs->bindParam(':ano',$uaccno);
$regs->bindParam(':loc',$ulocation);
$regs->bindParam(':extra',$uextra);
$regs->bindParam(':ref',$uref);
$regs->bindParam(':token',$utoken);
$regs->bindParam(':joined',$udate);
if($regs->execute()){
	$mersc = date('dmYhi');
	$flash->query("UPDATE `user` SET `right` = '1',`tomerge` = '1',`mergesince` = '{$mersc}'
	WHERE `email` = '{$_POST['email']}' OR `username` = '{$_POST['uname']}'");
	//$_SESSION['email'] = $uemail;
	echo '<p><br/><div class="success">Your Account Have Been Created As Admin!</div></p><br/><br/>
	<p class="center"><a class="buttong" href="'.$set['url'].'/member/login">Continue Login</a><br/><br/></p>';
	$subject = 'Welcome To '.$set['name'].' your Registration was Sucessful As Admin';
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
	echo '</p><div class="error">Cannot register Right now Try again Later!</div></p>';	
	}
}
}
echo $error;
echo '<center><div class="myborder"><div class="menu menu2">
<h2>Register As Admin</h2>
<hr class="dhr" style="background:white;"/>';

echo '<form method="POST">
<label>Email</label><br/>
<input type="text" name="email" value="'.htmlentities($uemail).'"/><br/>
<label>Username</label><br/>
<input type="text" name="uname" value="'.htmlentities($uname).'"/><br/>
<label>Password</label><br/>
<input type="password" name="pass" value="'.htmlentities($upass).'"/><br/>
<label>Retype Password</label><br/>
<input type="password" name="pass2" value="'.htmlentities($upass2).'"/><br/>
<label>First Name</label><br/>
<input type="text" name="fname" value="'.htmlentities($ufname).'"/><br/>
<label>Last Name</label><br/>
<input type="text" name="lname" value="'.htmlentities($ulname).'"/><br/>
<label>Phone Number</label><br/>
<input type="text" name="phone" value="'.htmlentities($uphone).'"/><br/>
<label>Bank Name</label><br/>
<input type="text" name="bankname" value="'.htmlentities($ubankname).'"/><br/>
<label>Account Name</label><br/>
<input type="text" name="accname" value="'.htmlentities($uaccname).'"/><br/>
<label>Account Number</label><br/>
<input type="text" name="accno" value="'.htmlentities($uaccno).'"/><br/>
<label>Location(state,city)</label><br/>
<input type="text" name="location" value="'.htmlentities($ulocation).'"/><br/>
<label>Additional Information</label><br/>
<textarea name="extra" rows="6">'.htmlentities($uextra).'</textarea><br/>';
if(isset($_SESSION['ref'])){
echo '<label>Referral</label><br/><input type="text" name="ref" value="'.$_SESSION['ref'].'" disabled="disabled"/><br/>
';
}
echo '<br/>
<input type="submit" name="reg" value="Register"/><br/><br/>';
echo '<table><tr><td align="center" style="width:48%;"><a class="buttonw" href="'.$set['url'].'/member/login">Login Account</a>
</td><td align="center" style="width:48%;">
<a class="buttonw" href="'.$set['url'].'/member/forgotpass">Forgot Pass??</a></td></tr></table><br/>
</form>
</div></div></center>';
include('../inc/footer.php');
?>