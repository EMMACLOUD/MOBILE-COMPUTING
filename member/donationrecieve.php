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
	FlashTitle('Donation Recieved | '.$set['title']);
	$donre = $flash->query("SELECT * FROM `donation` WHERE `reciever`='{$prof['username']}' AND `status`>0 
	ORDER BY `id` DESC LIMIT {$startpoint} , {$limit}");
	if($donre->rowCount() > 0){
	echo '<br/><p>
	<h2 class="titlex">Donation(s) Recieved</h2><div class="menu2">';
	while($donrec = $donre->fetch()){
	echo '<div class="wborderx" style="text-align:left;"> 
	<b><font color="black">From: '.$donrec['sender'].'<br/>
	Amount: ₦'.$donrec['amount'].'.00<br/>
	Payed On: '.$donrec['payedon'].'</font></b>
	</div><br/>';
	}
	echo '</div></p>';
		$statement = "`donation` WHERE `reciever`='{$prof['username']}' AND `status`>'0'";
$query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
echo Ben::page($statement,$limit,$page,'?');
	}
	else {
		echo '<p><div class="error">No Donationt Recieved Yet!</div></p>';
	}
}
include('../inc/footer.php');
?>