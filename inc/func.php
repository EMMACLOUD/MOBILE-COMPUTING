<?php
class Func{
	public static function LatestPost($var){
		$latp = $flash->query("SELECT * FROM `post` WHERE `topic`!='music' AND `topic`!='video' AND `topic`!='request'
		AND `topic`!='' ORDER BY `id` DESC LIMIT {$startpoint}, {$limit}");
		while($var = $lapt->fetch()){
			return $var;
		}
	}
	public static function friendly_size($size,$round=2)
{
$sizes=array(' BYTES',' KB',' MB',' GB',' TB');
$total=count($sizes)-1;
for($i=0;$size>1024 && $i<$total;$i++){
$size/=1024;
}
return round($size,$round).$sizes[$i];
}
}

?>
