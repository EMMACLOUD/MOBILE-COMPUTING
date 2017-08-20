<?php

include('../inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
echo '<!-- Custom stylesheet - for your changes -->
    <link href="'.$set['url'].'/assets/style.css" rel="stylesheet">';
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
		echo '<br/><h3 class="title left">Merge User<h3>';
		echo '<div class="menu2"><div class="main"><form method="GET">
		<label style="color:green;">Search User with Username:</label>
		<br/><input type="text" style="width:50%;" name="q" value="'.$_GET['q'].'"/>
		<button name="sch" value="flash">Search</button></form><br/>';
		if(isset($_POST['mergu'])){
			$merguss = $flash->query("SELECT * FROM `user` WHERE `username`='{$_POST['duser']}'");
			$mergus = $merguss->fetch();
			$ttmm = $mergus['totaltomerge'];
			$cmerge = $flash->query("SELECT * FROM `user` WHERE `plan`='{$mergus['plan']}'
			AND `username` NOT IN
			(SELECT `sender` FROM `merge` WHERE id>'0')
			AND `username` NOT IN
			(SELECT `reciever` FROM `merge` WHERE id>'0') AND `tomerge`<'1'
			AND `switched`<'1'
			ORDER BY `id` DESC LIMIT {$ttmm}");
			while($setmerg = $cmerge->fetch()){
				$merjon = date('d-m-Y');
				$meTimex  = (time() + (60 * 60 * 1));
				$flash->query("INSERT INTO `merge`(sender,reciever,mergeon,xtime) VALUES('{$setmerg['username']}',
				'{$mergus['username']}','{$merjon}','{$meTimex}')");
				if($cmerge->rowCount() < $ttmm){
				$ttm = ($ttmm - $cmerge->rowCount());
				$flash->query("UPDATE `user` SET `totaltomerge`='{$ttm}' WHERE `username`='{$mergus['username']}'");
			}
			else {
				$flash->query("UPDATE `user` SET `totaltomerge`='0' WHERE `username`='{$mergus['username']}'");
			}
			}
			if($cmerge->rowCount() < 1){
				echo '<p><div class="info">No User Available To Merge Now!</div></p>';
			}
			else {
				echo '<p><div class="alert">Successfully Merged '.$cmerge->rowCount().' out of '.$mergus['totaltomerge'].'!</div></p>';
			}
			}
		if(isset($_GET['q'])){
			$searchr = $_GET['q'];
			$suser = $flash->prepare("SELECT * FROM `user` WHERE MATCH(username) AGAINST(:sch) 
			LIMIT {$startpoint} , {$limit}");
			$suser->bindParam(':sch',$searchr);
			$suser->execute();
			echo '<p><div class="main"><div class="main title">Search Result For
			" <font color="red"> '.$_GET['q'].'</font> "</div> ';
			if($suser->rowCount() < 1){
				echo '<div class="info">User Not Found!</div>';
			}
			while($sresult = $suser->fetch()){
			echo '<div class="left"><b>First Name: '.$sresult['firstname'].' <br/>
			Last Name: '.$sresult['lastname'].' <br/>
			Username: '.$sresult['username'].'<br/>
            Email: '.$sresult['email'].'<br/>
            Phone: '.$sresult['phone'].'<br/>
            Location: '.$sresult['location'].'<br/>
			Merge Assigned: '.$sresult['totaltomerge'].'<br/>
			Member Since: '.$sresult['joined'].'</b></div>
			<form method="POST">
			<input type="hidden" name="duser" value="'.$sresult['username'].'"/>
			<button style="float:left;" name="mergu">Marge All</button></form><br/><br/>
			<hr/>';		
			}
			echo '</div></p>';
			$statement = "`user` WHERE MATCH(username) AGAINST('{$searchr}')";
            $query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
            echo Ben::page($statement,$limit,$page,'?q='.$_GET['q'].'&');
		}
//Rest User
            $hssuser = $flash->query("SELECT * FROM `user` WHERE id>0");
			$ssuser = $flash->query("SELECT * FROM `user` WHERE id>0 ORDER BY `id` ASC
			LIMIT {$startpoint} , {$limit}");
			echo '<p><div class="main"><div class="main title left">All Users</div> ';
			while($ssresult = $ssuser->fetch()){
			echo '<div class="left"><b>First Name: '.$ssresult['firstname'].' <br/>
			Last Name: '.$ssresult['lastname'].' <br/>
			Username: '.$ssresult['username'].'<br/>
            Email: '.$ssresult['email'].'<br/>
            Phone: '.$ssresult['phone'].'<br/>
            Location: '.$ssresult['location'].'<br/>
			Merge Assigned: '.$sresult['totaltomerge'].'<br/>
			Member Since: '.$ssresult['joined'].'</b></div>
			<form method="POST">
			<input type="hidden" name="duser" value="'.$ssresult['username'].'"/>
			<button style="float:left;" name="mergu">Marge All</button></form><br/><br/>
			<hr/>';	
			}
			echo '</div></p>';
			$statement = "`user` WHERE id>0";
            $query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
            echo Ben::page($statement,$limit,$page,'?');
		echo '<br/><p><a class="buttong" href="'.$set['url'].'/member/main">Go Back</a></p>
	<br/></div></div></center>';
    }
	else {
		header('Location: '.$set['url'].'/member/main');
		exit;
	}
}
include('../inc/footer.php');
?>