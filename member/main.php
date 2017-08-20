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
	FlashTitle('Main Panel | '.$set['title']);
	if($prof['plan'] == 1){
		$planx = $mcplan1;
		$emoney = $mcprice1;
	}
	elseif($prof['plan'] == 2){
		$planx = $mcplan2;
		$emoney = $mcprice2;
	}
	elseif($prof['plan'] == 3){
		$planx = $mcplan3;
		$emoney = $mcprice3;
	}
	elseif($prof['plan'] == 4){
		$planx = $mcplan4;
		$emoney = $mcprice4;
	}
	elseif($prof['plan'] == 5){
		$planx = $mcplan5;
		$emoney = $mcprice5;
	}
	else{
		$planx = 'NO PLAN';
		$emoney = '00';
	}
	echo '<div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>My Account / 
						 Dashboard</font></h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>My Account / Main Panel</li>
                        </ul>

                    </div>
	<i class="fa fa-user"> </i>
	<b>Hi, '.htmlspecialchars($prof['firstname']).' '.htmlspecialchars($prof['lastname']).' ['.htmlspecialchars($prof['username']).']</b>
                </div>
            </div>
        </div>';
		if($prof['username']  == ''){
	echo '<p><div class="error">Your Account Might Have Been Deleted! click bellow button<br/><br/>
	<form method="POST"><button name="dlo"  class="label label-success" style="padding:10px;">
	<i class="fa fa-sign-in"> </i> Continue</button></form>
	</div></p>';
if(isset($_POST['dlo'])){
if(session_destroy()){
	session_unset();
header('Location: '.$set['url'].'/member/main');
exit;
}
}
}
if(isset($_GET['pro']) && $_GET['pro'] == 'success'){
echo '<div class="success" style="padding:8px;"><i class="fa fa-check"></i> Success!  </div>';
}
	//Select Donations
	$donsend = $flash->query("SELECT * FROM `donation` WHERE `sender`='{$prof['username']}' AND `status`>0");
	$dontaken = $flash->query("SELECT * FROM `donation` WHERE `reciever`='{$prof['username']}' AND `status`>0");
	
	$donsendlast = $flash->query("SELECT * FROM `donation` WHERE `sender`='{$prof['username']}' AND `status`>0 ORDER BY `id` DESC LIMIT 1");
	$dontakenlast = $flash->query("SELECT * FROM `donation` WHERE `reciever`='{$prof['username']}' AND `status`>0 ORDER BY `id` DESC LIMIT 1");
	$allref = $flash->query("SELECT * FROM `user` WHERE `referral`='{$prof['username']}'");
	$susref = $flash->query("SELECT * FROM `user` WHERE `referral`='{$prof['username']}' AND refstat>0");
    $donre = $dontakenlast->fetch();
	$donse = $donsendlast->fetch();
	echo '</p><div class="container">';
echo '<div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box center">
                        <a class="label label-info" style="padding:20px;" href="'.$set['url'].'/member/donationsent.php">
						<b><i class="fa fa-map-marker"> </i> Donation(s) Send('.$donsend->rowCount().')</b></a>
                    </div></div><div class="col-md-6">
					<div class="box center">
                        <a class="label label-success" style="padding:20px;" href="'.$set['url'].'/member/donationsent.php">
						<b><i class="fa fa-credit-card">  </i> Donations(s) Recieved('.$dontaken->rowCount().')</b></a>
                    </div></div>
					<div class="col-md-6">
					<div class="box center">
                        <span class="label label-danger" style="padding:20px;">
						<b><i class="fa fa-trophy"> </i> '.$planx.'</b></span>
                    </div></div>
					<div class="col-md-6">
					<div class="box center">
                        <span class="label label-warning" style="padding:20px;">
						<b><i class="fa fa-money"> </i> ₦ '.$emoney.'.00</b></span>
                    </div></div>
					</div></div></div></div></div></div></div></div></div></div></div></div></div>';
?>
<?php
//Update Paid
if(isset($_POST['paidx'])){
$meTimexx  = (time() + (60 * 60 * 5));
if($flash->query("UPDATE `merge` SET `xtime`='{$meTimexx}' WHERE `sender`='{$_POST['sendi']}' 
AND `reciever`='{$_POST['rendi']}'")){
	header('Location: '.$set['url'].'/member/main?pro=success');
exit;
echo '<p><div class="success">Successfully request sent try contact the
 Reciever to fastly confirm your payment thanks!</div></p>';
 $flash->query("UPDATE `merge` SET `status`='1' WHERE `sender`='{$_POST['sendi']}' 
AND `reciever`='{$_POST['rendi']}'");
}
}
// To Marge
$mergvt = $flash->query("SELECT * FROM `merge` WHERE `sender`='{$prof['username']}'");
$mergto = $mergvt->fetch();
$mergv = $flash->query("SELECT * FROM `merge` WHERE `reciever`='{$prof['username']}'");
$mergon = $mergv->fetch();
$youmerge = $flash->query("SELECT * FROM `user` WHERE `username` IN
   (
   SELECT `reciever`
   FROM `merge`
   WHERE `sender`='{$prof['username']}')");
   if($mergvt->rowCount() > 0){
$umprof = $youmerge->fetch();
if($prof['tomerge'] < 1){
// To Payout
echo '<center class="fa-boardx">
<div class="x fa-boardx"><div class="container">';
echo '<div id="heading-breadcrumbs" style="width:94%;border:2px solid grey;">
            <div class="container">
                <div class="row">
<h2>MARGED DETAILS!</h2></div></div>
<div class="fa-boardx" style="width:90%;border:2px solid grey;"></div>';
if($set['autopurge'] > 0){
echo '<code>Note: Your Accout will be Deleted if You Fail To Pay before 1 hour 
(<font color="green"><i class="fa fa-clock-o"> </i> '.ceil(($mergto['xtime'] - time())/60).'</font>) Minutes Left!<br/>';
include '../count.php';
echo '</code><br/>';
}
 echo '<b class="green"><i class="fa fa-user">
 </i> '.htmlspecialchars($umprof['firstname']).' '.$umprof['lastname'].' <br/>
 <i class="fa fa-phone"> </i> '.htmlspecialchars($umprof['phone']).'<br/>

<i class="fa fa-certificate"> </i> '.htmlspecialchars($umprof['bankname']).'<br/>
 
<i class="fa fa-map-marker"> </i> '.htmlspecialchars($umprof['accname']).'<br/>
<i class="fa fa-credit-card"> </i> '.htmlspecialchars($umprof['accno']).'</b>';
if($mergto['status'] < 1){
echo '<form method="POST">
<input type="hidden" name="sendi" value="'.$mergto['sender'].'"/>
<input type="hidden" name="rendi" value="'.$mergto['reciever'].'"/>
<button class="label label-success" style="padding:10px;" name="paidx"><i class="fa fa-trophy"> </i> 
I have Paid
</button></form><p>If Contact Not Reachable in 30Mins?</p><br/>
<a class="label label-danger" style="padding:10px;" href="'.$set['url'].'/contact">
 <i class="fa fa-envelope-o"> </i> Contact Admin</a><br/><br/>';
}
else {
	echo '<br/><br/><b class="red" style="color:red;"><i class="fa fa-refresh"> </i> Waiting for Confirmation...</b><br/><br/>
	<p>If payment not confirm in 3hours please ?</p><br/>
<a class="label label-danger" style="padding:10px;" href="'.$set['url'].'/contact">
 <i class="fa fa-envelope-o"> </i> Contact Admin</a><br/><br/>';
}
echo '</div></div></div></div></div></div></div></div></div></center>';
}
  }
 else{
	 if($prof['plan'] > 0 && $prof['tomerge'] < 1){
	 echo '	<center> <p>
	 <div class="x"><div class="xx"><div class="xxx"><div class="xxxx">
	 <div id="heading-breadcrumbs" style="width:94%;border:2px solid grey;">
            <div class="container">
                <div class="row">
	 <h3>NOT YET MERGED!</h3>
	 </div></div>
	<hr style="background:grey;padding:3px;"/>
	 <b style="color:blue;">You will be merged to pay a participant.
	 Refresh or Login every 10Mins Time!</b><br/>
	 <img src="'.$set['url'].'/img/progress.gif"/>
	 </div></div></div></div></div></p></center>';
   }
 }
$mergeyou = $flash->query("SELECT * FROM `user` WHERE `username` IN
   (
   SELECT `sender`
   FROM `merge`
   WHERE `reciever`='{$prof['username']}')");
   $uwonm = $flash->query("SELECT * FROM `merge` WHERE `reciever`='{$prof['username']}'");
   $muproff = $uwonm->fetch();
   if($mergeyou->rowCount() > 0){
//Update Paid
if(isset($_POST['conpay'])){
	$paydon = date('d-M-Y');
	$flash->query("INSERT INTO `donation` (sender,reciever,amount,payedon,status) 
	VALUES('{$_POST['sender']}','{$muproff['reciever']}','{$emoney}','{$paydon}','1')");
	$mergsens = date('dmYhi');
	$flash->query("DELETE FROM `merge` WHERE `reciever`='{$prof['username']}' AND `sender`='{$_POST['sender']}'");
	$seemer = $flash->query("SELECT * FROM `merge` WHERE `reciever`='{$prof['username']}'");
	if($seemer->rowCount() < 1 AND $prof['right'] < 1){
	$flash->query("UPDATE `user` SET `tomerge`='100',mergesince='{$mergsens}' WHERE `username`='{$muproff['reciever']}'");
    } 
	$flash->query("UPDATE `user` SET `tomerge`='1',mergesince='{$mergsens}' WHERE `username`='{$_POST['sender']}'");
	$updref = $flash->query("SELECT * FROM `user` WHERE `username` IN
	(
	SELECT `referral` FROM `user` WHERE `username`='{$_POST['sender']}' AND `refstat`<1
	)");
	if($updatref = $updref->fetch()){
		$refvbon = ($emoney/10);
		$newrefbonus = ($updatref['refbonus'] + $refvbon);
		if($flash->query("UPDATE `user` SET `refbonus`='{$newrefbonus}' WHERE `username`='{$updatref['username']}' LIMIT 1")){
			$flash->query("UPDATE `user` SET refstat='1' WHERE `username`='{$_POST['sender']}'");
		}
	}
	header('Location: '.$set['url'].'/member/main?pro=success');
    exit;

}
//Update Switch
if(isset($_POST['switch'])){
	$flash->query("UPDATE `user` SET `switched`='1' WHERE `username`='{$_POST['sender']}'");
	$flash->query("DELETE FROM `merge` WHERE `reciever`='{$prof['username']}' AND `sender`='{$_POST['sender']}'");
	$sedu = $flash->query("SELECT * FROM `user` WHERE `plan`='{$prof['plan']}' AND `tomerge`<'1' 
	AND `switched`<'1' AND 
	`username` NOT IN
	(SELECT `sender` FROM `merge` WHERE id>0)
	AND
	`username` NOT IN
	(SELECT `reciever` FROM `merge` WHERE id>'0') 
	AND `username`!='{$_POST['sender']}' LIMIT 1");
	$dtiMx = (time() + 30);
	$flash->query("UPDATE `user` SET `switch`='{$dtiMx}' WHERE `username`='{$prof['username']}'");
	if($sedu->rowCount() > 0){
		$mervg = date('d-m-Y');
		$meTimex  = (time() + (60 * 60 * 1));
		$cedu = $sedu->fetch();
		$flash->query("INSERT INTO `merge`(sender,reciever,mergeon,xtime)
		VALUES('{$cedu['username']}','{$prof['username']}','{$mervg}','{$meTimex}')");
		echo '<div class="success center">Success!</div>';
	}
	else{
mail($set['email'],'Hello Merge Me Please on "'.$set['name'].'"','Merge Me Manually Please
 my username is '.$prof['username'].' i just delete my merge which is '.$_POST['sender'].' 
 Who fail to send my money please merge another person to me Thanks!','merge@'.$set['slug']);
		echo '<div class="info">No User Available which you can be Merge with wait for some momment for Admin to Help you!</div>';
	}
	header('Location: '.$set['url'].'/member/main?pro=success');
    exit;
}
//End Switch
echo '<div class="container center">
<div class="x center"><div class="xx center"><div class="center xxx">';
echo '<div id="content">
            <div class="container center">';
while($muprof = $mergeyou->fetch()){
                echo '<div class="row">
                    <div class="col-md-5">
                        <div class="box center">
						<div style="width:97%;" class="center">
<h2 class="label label-success" style="padding:10px;">MARGED TO YOU!</h2><br/><br/>';
echo '<b><i class="fa fa-user"> </i>
 '.htmlspecialchars($muprof['firstname']).' '.htmlspecialchars($muprof['lastname']).' <br/>
 <i class="fa fa-phone"> </i> '.htmlspecialchars($muprof['phone']).'<br/></b>
<b><i class="fa fa-certificate"> </i> '.htmlspecialchars($muprof['bankname']).'<br/>
 
 <i class="fa fa-map-marker"> </i> '.htmlspecialchars($muprof['accname']).'<br/>
 
 <i class="fa fa-credit-card"> </i> '.htmlspecialchars($muprof['accno']).'</b>
 <form method="POST">
 <input type="hidden" name="sender" value="'.htmlspecialchars($muprof['username']).'"/>
<button class="label label-success" style="padding:10px;" name="conpay"> <i class="fa fa-check"> </i> 
Confirm Payment</button></form><br/>
<a class="label label-info" style="padding:10px;" href="'.$set['url'].'/contact"><i class="fa fa-envelope-o"> </i>
Contact Admin</a> <br/>';
if(time() > $prof['switch']){
echo '<br/><form method="POST"><input type="hidden" name="sender" value="'.$muprof['username'].'"/> 
<button name="switch" class="label label-danger" style="padding:10px;"><i class="fa fa-ban">
 </i> Purge </button></form><br/>';
}
echo '</div></div></div>';
   }
   echo '</div></div></div></div></div></div>';
					
   }
 else{
	 if($prof['plan'] > 0 && $prof['tomerge'] > 0 && $prof['tomerge'] < 10){
	 echo '<center><p>
	 <div class="x"><div class="xx"><div class="xxx"><div class="xxxx">
	 <div id="heading-breadcrumbs" 
	 style="width:94%;border:2px solid grey;">
            <div class="container">
                <div class="row">
	 <h3>YOUR MERGE IS LOADING!</h3>
	 </div></div>
	<hr style="background:grey;padding:3px;"/>
	 <b style="color:blue;">Wait patiently to be merged!</b><br/>
	 <img src="'.$set['url'].'/img/progress.gif"/>
	 </div></div></div></div></div></p></center>';
 }
 }
  echo '</div></p>';
//Update Recycle
if(isset($_POST['recyc'])){
	$flash->query("UPDATE `user` SET `tomerge`='0',`plan`='0' WHERE `username`='{$prof['username']}'");
	echo '<div class="success center">Successfully Recycled!</div>';
	header('Location: '.$set['url'].'/member/main?pro=success');
exit;
}
//End Recycle
if($prof['tomerge'] > 10){
	echo '<center><p>
	 <div class="x"><div class="xx"><div class="xxx"><div class="xxxx">
	 <div id="heading-breadcrumbs" 
	 style="width:94%;border:2px solid grey;">
            <div class="container">
                <div class="row">
	 <h3>YOU PASSED OUT!</h3></div></div>
	 <hr style="background:grey;padding:3px;"/>
	 you have passed a Test still want to continue donation?<br/>
	<form method="POST"><button name="recyc" class="btn btn-template-main"><i class="fa fa-refresh"></i>
	Recycle</button></form>
	</div></div></div></div></div></div></p></center>';
}
if($prof['plan'] < 1){
echo '<center><p>
	 <div class="x"><div class="xx"><div class="xxx"><div class="xxxx">
	 <div id="heading-breadcrumbs" 
	 style="width:94%;border:2px solid grey;">
            <div class="container">
                <div class="row">
	 <h3>YOU HAVE NO PLAN!</h3></div></div>
	 <hr style="background:grey;padding:3px;"/>
	 You have no plan currently please choose plan to get started..<br/>
	<a href="'.$set['url'].'/member/plan.php" class="btn btn-template-main"><i class="fa fa-recycle"></i>
	Choose Plan</a>
	</div></div></div></div></div></div></p></center>';
 }
 echo '</div></div></div></div></div></div>';
}
include('../inc/footer.php');
?>