<?php

include('../inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
if(!$Function->isLogin()){
	include 'login2.php';
}
else {
	FlashTitle('Edit Details | '.$set['title']);
	if(isset($_POST['epro'])){
$ufname = $_POST['fname'];
$ulname = $_POST['lname'];
$uphone = $_POST['phone'];
$ubankname = $_POST['bankname'];
$uaccname = $_POST['accname'];
$uaccno = $_POST['accno'];
$ulocation = $_POST['location'];
$uextra = 	$_POST['extra'];
$uemail = $prof['email'];
if(empty($ufname)){
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
if(empty($error)){
	$upd = $flash->prepare("UPDATE `user` SET firstname=:fname,lastname=:lname,phone=:phone,bankname=:bname,
	accname=:aname,accno=:ano,location=:loc,extra=:extra WHERE email=:email");
	$upd->bindParam(':email',$uemail);
    $upd->bindParam(':fname',$ufname);
    $upd->bindParam(':lname',$ulname);
    $upd->bindParam(':phone',$uphone);
    $upd->bindParam(':bname',$ubankname);
    $upd->bindParam(':aname',$uaccname);
    $upd->bindParam(':ano',$uaccno);
    $upd->bindParam(':loc',$ulocation);
    $upd->bindParam(':extra',$uextra);
    if($upd->execute()){
    $succs .= '<p><div class="success">Your Account Have Been Update!</div></p>';
	}
	else {
		$errr .= '<p><div class="error">Cannot Update your account Try again Later!</div></p>';
	}
}
	}
	echo '<!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>My Account / Edit Profile</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>My Account / Edit Profile</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
		<div id="content">
            <div class="container">

                <div class="row">
                    <div class="form-group">
                        <div class="box">
<h2>Edit Profile</h2>
<hr class="dhr" style="background:white;"/>
<form method="POST">
<label>First Name</label><br/>
<input type="text" class="form-control"  name="fname" value="'.$prof['firstname'].'"/><br/>
<label>Last Name</label><br/>
<input type="text" class="form-control" name="lname" value="'.$prof['lastname'].'"/><br/>
<label>Phone Number</label><br/>
<input type="text" class="form-control" name="phone" value="'.$prof['phone'].'"/><br/>
<label>Bank Name</label><br/>
<input type="text" class="form-control" name="bankname" value="'.$prof['bankname'].'"/><br/>
<label>Account Name</label><br/>
<input type="text" class="form-control" name="accname" value="'.$prof['accname'].'"/><br/>
<label>Account Number</label><br/>
<input type="text" class="form-control" name="accno" value="'.$prof['accno'].'"/><br/>
<label>Location(state,city)</label><br/>
<input type="text" class="form-control" name="location" value="'.$prof['location'].'"/><br/>
<label>Additional Information</label><br/>
<textarea name="extra" class="form-control"  rows="6">'.$prof['extra'].'</textarea><br/>
<br/><button type="submit" name="epro" class="btn btn-template-main"><i class="fa fa-edit"></i>
Save</button><rm>
<div class="form-group">';
						echo $error; 
						echo $succs;
						echo $errr;
						echo '</div>
</div>	</div>
</div> </div>';
}
include('../inc/footer.php');
?>