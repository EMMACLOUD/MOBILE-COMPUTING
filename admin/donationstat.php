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
	include 'login2.php';
}
else {
	if($prof['right'] > 0){
	$ckiu = $flash->query("SELECT * FROM `user` WHERE `username`='{$_GET['user']}'");
	if($ckiu->rowCount() > 0){
		$dstatu = $ckiu->fetch();
	FlashTitle('Donation Stat By '.$dstatu['username'].' | '.$set['title']);
	$donre = $flash->query("SELECT * FROM `donation` WHERE `reciever`='{$dstatu['username']}' OR
	`sender`='{$dstatu['username']}' AND `status`>0 
	ORDER BY `id` DESC LIMIT {$startpoint} , {$limit}");
	if($donre->rowCount() > 0){
	echo '<br/><p>
	<h2 class="title">Donation(s) Statistics</h2><div class="menu2">';
	while($donrec = $donre->fetch()){
	echo '<div class="wborderx" style="text-align:left;"> 
	<b><font color="black">Sender: '.$donrec['sender'].'<br/>
	<b><font color="black">Reciever: '.$donrec['reciever'].'<br/>
	Amount: ₦'.$donrec['amount'].'.00<br/>
	Payed On: '.$donrec['payedon'].'</font></b>
	</div><br/>';
	}
	echo '</div></p>';
		$statement = "`donation` WHERE `reciever`='{$dstatu['username']}' OR `sender`='{$dstatu['username']}' AND `status`>'0'";
$query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
echo Ben::page($statement,$limit,$page,'?user='.$dstatu['username'].'&');
	}
	else {
		echo '<p><div class="error">No Donationt Statistics Yet!</div></p>';
	}
}
else {
		echo '<div class="info">User With UserName Does Not Exists!</div>';
	}
	}
	else {
		header('Location: '.$set['url'].'/memeber/main');
		exit;
	}
}
include('../inc/footer.php');
?>