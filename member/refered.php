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
	FlashTitle('People You Refered | '.$set['title']);
	$refa = $flash->query("SELECT * FROM `user` WHERE `referral`='{$prof['username']}'
	ORDER BY `id` DESC LIMIT {$startpoint} , {$limit}");
	if($refa->rowCount() > 0){
	echo '<br/><p>
	<h2 class="title">User Refered</h2><div class="menu2">';
	while($refarral = $refa->fetch()){
		if($refarral['refstat'] > 0){
		$rst = 'Successfully';
		}
		else {
			$rst = 'Pending';
		}
	echo '<div class="wborderx" style="text-align:left;"> 
	<b><font color="black">Username:   '.$refarral['username'].'<br/>
	Name:   '.$refarral['firstname'].' '.$refarral['lastname'].'<br/>
	Email:   '.$refarral['email'].'<br/>
	Phone:   '.$refarral['phone'].'<br/>
	Referral Status: '.$rst.'</font></b>
	</div><br/>';
	}
	echo '</div></p>';
		$statement = "`user` WHERE `referral`='{$prof['username']}'";
$query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
echo Ben::page($statement,$limit,$page,'?');
	}
	else {
		echo '<p><div class="error">No User Refered Yet!</div></p>';
	}
	
	}
include('../inc/footer.php');
?>