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
	FlashTitle('Donation Send | '.$set['title']);
	$donse = $flash->query("SELECT * FROM `donation` WHERE `sender`='{$prof['username']}' AND `status`>0 
	ORDER BY `id` DESC LIMIT {$startpoint} , {$limit}");
	if($donse->rowCount() > 0){
	echo '<br/><p>
	<h2 class="titlex">Donation(s) Sent</h2><div class="menu2">';
	while($donsend = $donse->fetch()){
	echo '<div class="wborderx" style="text-align:left;"> 
	<b><font color="black">To: '.$donsend['reciever'].'<br/>
	Amount: ₦'.$donsend['amount'].'.00<br/>
	Payed On: '.$donsend['payedon'].'</font></b>
	</div><br/>';
	}
	echo '</div></p>';
	$statement = "`donation` WHERE `sender`='{$prof['username']}' AND `status`>'0'";
$query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
echo Ben::page($statement,$limit,$page,'?');
	}
	else {
		echo '<p><div class="error">No Donationt Send Yet!</div></p>';
	}
}
include('../inc/footer.php');
?>