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
$sets->automerge = $set['automerge'];
$sets->autopurge = $set['autopurge'];
//Auto Marge
if($sets->automerge > 0){
 $seetoM = $flash->query("SELECT * FROM `user` WHERE `tomerge`>'0' AND `tomerge`<'10' 
 AND `plan`>'0'
 AND `username` 
NOT IN(SELECT `sender` FROM `merge` WHERE `id`>'0') 
AND `username` 
NOT IN(SELECT `reciever` FROM `merge` WHERE `id`>'0')
 ORDER BY `mergesince` ASC,RAND() LIMIT 1");
if($seetoM->rowCount() > 0){
	$meMerg = $seetoM->fetch();
	$seeko = $flash->query("SELECT * FROM `merge` WHERE `reciever`='{$meMerg['username']}'");
	if($seeko->rowCount() < 1){
		$seepM = $flash->query("SELECT * FROM `user` WHERE `tomerge`<'1' AND `switched`<'1' AND `plan`>'0' AND
		`plan`='{$meMerg['plan']}' AND `username` 
 NOT IN(SELECT `sender` FROM `merge` WHERE `id`>'0')
AND `username` 
 NOT IN(SELECT `reciever` FROM `merge` WHERE `id`>'0')
 LIMIT 2");
 if($seepM->rowCount() > 1){
 while($vb = $seepM->fetch()){
	 $meTime  = (time() + (60 * 60 * 1));
	 $mmvdd = date('d-m-Y');
		 $flash->query("INSERT INTO `merge`(sender,reciever,mergeon,xtime) 
		 VALUES('{$vb['username']}','{$meMerg['username']}','{$mmvdd}','{$meTime}')"); 
 }
 }
 
	}
}

}
if($sets->autopurge > 0){
	$gTime = time();
	$getMer = $flash->query("SELECT * FROM `merge` WHERE `xtime`<='{$gTime}' AND `xtime`!='0'");
	if($getMer->rowCount() > 0){
		while($delMer = $getMer->fetch()){
			if($flash->query("DELETE FROM `merge` WHERE `sender`='{$delMer['sender']}' 
			AND `reciever`='{$delMer['reciever']}' LIMIT 1")){
				$flash->query("DELETE FROM `user` WHERE `username`='{$delMer['sender']}'");
			}
			
		}
	}
}
$flash->query("UPDATE `user` SET `mergesince`='1' WHERE `right`>'0'");
?>