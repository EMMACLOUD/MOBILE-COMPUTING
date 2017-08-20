<?php

include('../inc/header.php');
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
		echo '<br/><h3 class="title">Manage User<h3>';
		echo '<div class="menu2"><div class="main"><form method="GET">
		<label style="color:green;">Search User with Username:</label>
		<br/><input type="text" style="width:50%;" name="q" value="'.$_GET['q'].'"/>
		<button name="sch" value="flash">Search</button></form><br/>';
		if(isset($_POST['delu'])){
			if($flash->query("DELETE FROM `user` WHERE `username`='{$_POST['duser']}' LIMIT 1")){
				$flash->query("DELETE FROM `merge` WHERE `sender`='{$_POST['duser']}' OR
				`reciever`='{$_POST['duser']}' LIMIT 1");
				echo '<p><div class="success">Successfully User Deleted! </div></p>';
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
			Member Since: '.$sresult['joined'].'</b></div>
			<form method="POST">
			<input type="hidden" name="duser" value="'.$sresult['username'].'"/>
			<button style="float:left;" name="delu">Delete User</button></form><br/><br/>
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
			echo '<p><div class="main"><div class="main title">All Users</div> ';
			while($ssresult = $ssuser->fetch()){
			echo '<div class="left"><b>First Name: '.$ssresult['firstname'].' <br/>
			Last Name: '.$ssresult['lastname'].' <br/>
			Username: '.$ssresult['username'].'<br/>
            Email: '.$ssresult['email'].'<br/>
            Phone: '.$ssresult['phone'].'<br/>
            Location: '.$ssresult['location'].'<br/>
			Member Since: '.$ssresult['joined'].'</b></div>
			<form method="POST">
			<input type="hidden" name="duser" value="'.$ssresult['username'].'"/>
			<button style="float:left;" name="delu">Delete User</button></form><br/><br/>
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