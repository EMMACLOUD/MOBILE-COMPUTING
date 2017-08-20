<?php

include '../inc/header.php';
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
$usernm = $_GET['ref'];
$ckdu = $flash->prepare("SELECT * FROM `user` WHERE `username`=:un");
$ckdu->bindParam(':un',$usernm);
$ckdu->execute();
if($ckdu->rowCount() > 0){
$_SESSION['ref'] = $_GET['refs'];
}
header('Location: '.$set['url'].'/member/register');
exit;
?>