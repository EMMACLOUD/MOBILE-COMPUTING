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
		$muser = $flash->query("SELECT * FROM `merge` WHERE `id`>0 
		ORDER BY `id` DESC LIMIT {$startpoint}, {$limit}");
echo '<p><div class="main"><div class="main title">Marges Available</div> ';
if(isset($_POST['conf'])){
	$cdu = $flash->query("SELECT * FROM `user` WHERE `username`='{$_POST['reciever']}'");
	$cdun = $cdu->fetch();
	if($cdun['plan'] == 1){
		$planxx = $mcplan1;
		$emoney = $mcprice1;
	}
	elseif($cdun['plan'] == 2){
		$planxx = $mcplan2;
		$emoney = $mcprice2;
	}
	elseif($cdun['plan'] == 3){
		$planxx = $mcplan3;
		$emoney = $mcprice3;
	}
	elseif($cdun['plan'] == 4){
		$planxx = $mcplan4;
		$emoney = $mcprice4;
	}
	elseif($cdun['plan'] == 5){
		$planxx = $mcplan5;
		$emoney = $mcprice5;
	}
	else{
		$planxx = 'NO PLAN';
		$emoney = '00';
	}
		$paydon = date('d-M-Y');
	$flash->query("INSERT INTO `donation` (sender,reciever,amount,payedon,status) 
	VALUES('{$_POST['sender']}','{$_POST['reciever']}','{$emoney}','{$paydon}','1')");
	$mergsens = date('dmYhi');
	$flash->query("DELETE FROM `merge` WHERE `reciever`='{$_POST['reciever']}' AND `sender`='{$_POST['sender']}'");
	$seemer = $flash->query("SELECT * FROM `merge` WHERE `reciever`='{$_POST['reciever']}'");
	if($seemer->rowCount() < 1){
	$flash->query("UPDATE `user` SET `tomerge`='100',mergesince='{$mergsens}' WHERE `username`='{$_POST['reciever']}' AND `right`<'1'");
    } 
	$flash->query("UPDATE `user` SET `tomerge`='1',mergesince='{$mergsens}' WHERE `username`='{$_POST['sender']}'");
echo '<div class="success">SuccessFully Done!</div>';
	}
while($dmerge = $muser->fetch()){
	echo '<div class="main"><b>
	To Pay: '.$dmerge['sender'].'<br/>
	To Recieve: '.$dmerge['reciever'].'<br/>
	Merge Since: '.$dmerge['mergeon'].'
	</b>
	<div class="left"><form method="POST">
	<input type="hidden" name="sender" value="'.$dmerge['sender'].'"/>
	<input type="hidden" name="reciever" value="'.$dmerge['reciever'].'"/>
<button name="conf">ConFirm Paid</button>
</form>
	</div></div>';
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