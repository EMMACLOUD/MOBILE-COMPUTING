<?php

include('../inc/header.php');
FlashTitle('All Merging |' .$set['title']);
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
		$muser = $flash->query("SELECT * FROM `merge` WHERE `id`>0 ORDER BY `id` DESC LIMIT {$startpoint}, {$limit}");
echo '<p><div class="main"><div class="main title">Marges Available</div> ';
while($dmerge = $muser->fetch()){
	echo '<div class="main"><b>
	To Pay:'.$dmerge['sender'].'<br/>
	To Recieve: '.$dmerge['reciever'].'<br/>
	Merge Since: '.$dmerge['mergeon'].'
	</b></div>';
}
echo '</div></p>';
			$statement = "`merge` WHERE id>0";
            $query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
            echo Ben::page($statement,$limit,$page,'?');
		echo '</center><center><br/><p><a class="buttong" href="'.$set['url'].'/member/main">Go Back</a></p>
	<br/></div></div></center>';
    }
	else {
		header('Location: '.$set['url'].'/member/main');
		exit;
	}
}
include('../inc/footer.php');
?>