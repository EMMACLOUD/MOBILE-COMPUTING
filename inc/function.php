<?php

defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
class Functions{
	public static function isLogin(){
		if(isset($_SESSION['email'])){
			return true;
		}
		else {
			return false;
		}
	}
public static function CLEAN($code){
	$code = htmlspecialchars($code);
$code = nl2br($code);
	return $code;
}
public static function thumb($post,$h,$w){
	preg_match_all('/\[img\](.*?)\[\/img\](\s)/',$post, $url);
	$th = $url[1][0];
	$array = array('/\[\/img\]/is'=>'');
	$url = preg_replace(array_keys($array), array_values($array), $th);
	if(!empty($url)){ 
		$thumbnail = '<img src="'.$url.'" width="'.$w.'" height="'.$h.'" style="padding:0px;"/>';
	}
	else {
		$thumbnail = '<img src="'.$set['url'].'/icon/nothumb.png" width="'.$w.'" height="'.$h.'" style="padding:0px;"/>';
	}
	return $thumbnail;
}
public static function thumb2($post){
	preg_match_all('/\[img\](.*?)\[\/img\](\s)/',$post, $url);
	$th = $url[1][0];
	$array = array('/\[\/img\]/is'=>'');
	$url = preg_replace(array_keys($array), array_values($array), $th);
	if(!empty($url)){ 
		$thumbnail = $url;
	}
	else {
		$thumbnail = $set['url'].'/icon/nothumb.png';
	}
	return $thumbnail;
}
}


?>