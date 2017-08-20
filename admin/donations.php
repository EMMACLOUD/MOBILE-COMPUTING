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
	FlashTitle('Donation Recieved | '.$set['title']);
	$donre = $flash->query("SELECT * FROM `donation` WHERE `status`>0 
	ORDER BY `id` DESC LIMIT {$startpoint} , {$limit}");
	if($donre->rowCount() > 0){
	echo '<br/><p>
	<h2 class="title">Total Donation(s) ['.$donre->rowCount().'] </h2><div class="menu2">';
	while($donrec = $donre->fetch()){
	echo '<div class="wborderx" style="text-align:left;"> 
	<b><font color="black">Sender: '.$donrec['sender'].' [
	<a href="'.$set['url'].'/admin/donationstat.php?user='.$donrec['sender'].'">View Stat</a>]
	<br/> 
	<b><font color="black">Reciever: '.$donrec['reciever'].' [
	<a href="'.$set['url'].'/admin/donationstat.php?user='.$donrec['reciever'].'">View Stat</a>]<br/>
	Amount: ₦'.$donrec['amount'].'.00<br/>
	Payed On: '.$donrec['payedon'].'</font></b>
	</div><br/>';
	}
	echo '</div></p>';
		$statement = "`donation` WHERE `status`>'0'";
$query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
echo Ben::page($statement,$limit,$page,'?');
	}
	else {
		echo '<p><div class="error">No Donationt Yet!</div></p>';
	}
}
	else {
		header('Location: '.$set['url'].'/member/main');
		exit;
	}
}
include('../inc/footer.php');
?>