<?php
require_once('config.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
define('CopyR','©');
define('RitR','®');
ini_set('session.use_cookies', true);
ini_set('session.use_trans_sid', true);
ini_set('arg_separator.output', '&amp;');
ignore_user_abort(true);
ini_set('default_charset','UTF-8');
session_set_cookie_params(31556926); // 31556926 FOr 1year
ini_set('session.gc_divisor',1);
mb_internal_encoding('UTF-8');
ini_set('session.cookie_domain', $_SERVER['HTTP_HOST']);
// Current Session Timeout Value
$currentTimeout= ini_get('session.gc_maxlifetime');
// Change session timeout
ini_set('session.gc_maxlifetime', 31556926); // 1 Year
ob_start();
session_start();
include 'connect.php';
$sett = $flash->query("SELECT * FROM `setting`");
$set = $sett->fetch();
//Set Prof Fetch
$vxemail = $_SESSION['email'];
$profv = $flash->prepare("SELECT * FROM `user` WHERE `email`=:em");
$profv->bindParam(':em',$vxemail);
$profv->execute();
$prof = $profv->fetch();
// PerPage 
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = $set['perpage'];
    	$startpoint = ($page * $limit) - $limit;
if($_SERVER['HTTP_HOST'] == 'megafunds.net' || $_SERVER['HTTP_HOST'] == 'http://megafunds.net' ||
$_SERVER['HTTP_HOST'] == 'www.megafunds.net' || $_SERVER['HTTP_HOST'] == 'https://megafunds.net' ||
$_SERVER['HTTP_HOST'] == 'http://www.megafunds.net' || $_SERVER['HTTP_HOST'] == 'https://www.megafunds.net'
 && $licensekey == 'flash-megafunds-net_090L2'){	

}
else {
	exit('<title>Access Violated & Declined!</title>
	<div style="background:blue;padding:5px;">
	<div style="border:2px solid white;padding:5px;font-weight:bold;background:green;color:white;">
	You Have No Script Access Only Valid Client Can Use This PonZi Script Developed By FlashWebTech INC
	To Get Full Script Access Just Message Us on FB:
	<a href="http://facebook.com/adesanoye.adeleye.9">
	<font color="red">Order From BennySwag DacyberPower on FB</font></a>
	Or Call us:(+234) 09022165970, (+234) 08110446469 We are the FlashWebTechCian Code is All We Know!
	<br/><hr/><center>&copy; 2017 - '.date('Y').'<br/>
	&reg; FlashWebTech Inc <br/>
	DacyberPower Limited</center></div></div>');
	
}

//Auto Marge
if($sets->automerge > 0){
 $seetoM = $flash->query("SELECT * FROM `user` WHERE `tomerge`>'0' AND `tomerge`<'10' 
 AND `plan`>'0'
 AND `username` 
NOT IN(SELECT `sender` FROM `merge` WHERE `id`>'0')
 ORDER BY RAND() LIMIT 1");
if($seetoM->rowCount() > 0){
	$meMerg = $seetoM->fetch();
	$seeko = $flash->query("SELECT * FROM `merge` WHERE `reciever`='{$meMerg['username']}'");
	if($seeko->rowCount() > 0 OR $seeko->rowCount() < 1){
		if($seeko->rowCount() == '0'){
			$newma = '2';
			$lims = "LIMIT 2";
		}
		elseif($seeko->rowCount() == '1'){
			$newma = '1';
			$lims = "LIMIT 1";
		}
		elseif($seeko->rowCount() == '2' || $seeko->rowCount() > '2'){
			$newma = '0';
			$lims = "";
		}
		$seepM = $flash->query("SELECT * FROM `user` WHERE `tomerge`<'1' AND `plan`>'0' AND
		`plan`='{$meMerg['plan']}' AND `username` 
 NOT IN(SELECT `sender` FROM `merge` WHERE `id`>'0') {$lims}");
 while($vb = $seepM->fetch()){
	 $mmvdd = date('d-m-Y');
		 $flash->query("INSERT INTO `merge`(sender,reciever,mergeon) 
		 VALUES('{$vb['username']}','{$meMerg['username']}','{$mmvdd}')"); 
 }
 
	}
}

}

?>