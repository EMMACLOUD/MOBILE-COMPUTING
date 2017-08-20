<?php

defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);
$flash = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$flash->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>