<?php

include 'start.php';
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
//Fill Database Details Bellow
date_default_timezone_set('Africa/Lagos');
$dbhost = 'localhost'; // Always LocalHost In Cloud/Shared Host
$dbuser = 'm2m'; // Database UserName
$dbpass = '12345'; // DataBase PassWord
$dbname = 'm2m'; //Database Name
// Plans Settings
//Plan1
$mcplan1 = 'BASIC PLAN';
$mcprice1 = '5000';
//Plan2
$mcplan2 = 'PROF PLAN';
$mcprice2 = '10000';
//Plan1
$mcplan3 = 'MASTER PLAN';
$mcprice3 = '20000';
//Plan2
$mcplan4 = 'LEADERS PLAN';
$mcprice4 = '50000';
//Plan2
$mcplan5 = 'KING PLAN';
$mcprice5 = '100000';
?>