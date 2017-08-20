<?php

include('../inc/header.php');
echo '<!-- Custom stylesheet - for your changes -->
    <link href="'.$set['url'].'/assets/style.css" rel="stylesheet">';
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
if(!$Function->isLogin()){
   include '../member/login2.php';
}
else {
	FlashTitle('Admin Panel | ' . $set['title']);
	if($prof['right'] > 0){
	FlashTitle('Main Admin Panel | '.$set['title']);
	$donax = $flash->query("SELECT * FROM `donation` WHERE `id`>'0'");
	echo '<hr /><div class="main left content container">
	<h3 class="title">Main Admin Panel</h3><hr/>
	<a href="'.$set['url'].'/admin/setting.php"><i class="fa fa-hand-o-right"> </i> Site Setting</a><hr/>
	<a href="'.$set['url'].'/admin/merge.php"><i class="fa fa-hand-o-right"> </i> Merge Manually</a><hr/>
	<a href="'.$set['url'].'/admin/referralpayment.php"><i class="fa fa-hand-o-right"> </i> Referral PayMent</a><hr/>
	<a href="'.$set['url'].'/admin/user.php"><i class="fa fa-hand-o-right"> </i> Delete Member</a><hr/>
	<a href="'.$set['url'].'/admin/merged.php"><i class="fa fa-hand-o-right"> </i> All Merging</a><hr/>
	<a href="'.$set['url'].'/admin/donations.php"><i class="fa fa-hand-o-right"> </i> All Donations('.$donax->rowCount().')</a><hr/>
	<a href="'.$set['url'].'/admin/changeplan.php"><i class="fa fa-hand-o-right"> </i> Change User Plan</a><hr/>
	<a href="'.$set['url'].'/admin/mergeduser.php"><i class="fa fa-hand-o-right"> </i> Already Merged User</a><hr/>
	<a href="'.$set['url'].'/admin/notmergeduser.php"><i class="fa fa-hand-o-right"> </i> Fresh Unmerge User</a><hr/>
	<a href="'.$set['url'].'/admin/confirm.php"><i class="fa fa-hand-o-right"> </i> Confirm PayMent</a><hr/>
	<a href="'.$set['url'].'/admin/assignmerge.php"><i class="fa fa-hand-o-right"> </i> Assign Merge</a><hr/>
	<a href="'.$set['url'].'/admin/mergeassigned.php"><i class="fa fa-hand-o-right"> </i> Merge Assign</a><hr/>
	<a href="'.$set['url'].'/admin/switcheduser.php"><i class="fa fa-hand-o-right"> </i> Purged/Recycle Bin</a><hr/>
	<b>PonZi Script Developed By: KEMTECH Inc ,By: SUNGPAC , <br/>
	Mr_ BennySwag, @<font color="red">'.$prof['username'].'</font> , if You need Any Help or Other Project Call(09022165970,08110446569) or <br/>
	Email: KEMTECH@gmail.com , or WhatsApp: 09022165970 Thanks For Using our Ponzi Script..
	</div><br/>';
	}
	else {
		header('Location: '.$set['url'].'/member/main');
		exit;
	}
}
include('../inc/footer.php');
?>