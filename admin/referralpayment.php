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
	if($prof['right'] > 0){
		echo '<br/><h3 class="title">Referral PayMent<h3>';
		echo '<p><div class="info">Dear Admin Make Sure You Have Payed This Referral 
		Bonus Before you Clear PayMent Here , if not so thier will be Problem in Future!</div></p>';
		echo '<div class="menu2"><div class="main"><form method="GET">
		<label style="color:green;">Search User with Username:</label>
		<br/><input type="text" style="width:50%;" name="q" value="'.$_GET['q'].'"/>
		<button name="sch" value="flash">Search</button></form><br/>';
		if(isset($_POST['delu'])){
			if($flash->query("UPDATE `user` SET `refbonus`='0' WHERE `username`='{$_POST['duser']}' LIMIT 1")){
				echo '<p><div class="success">Successfully PayMent Cleared! </div></p>';
			}
		}
		if(isset($_GET['q'])){
			$searchr = $_GET['q'];
			$suser = $flash->prepare("SELECT * FROM `user` WHERE MATCH(username) AGAINST(:sch) AND `refbonus`>0
			LIMIT {$startpoint} , {$limit}");
			$suser->bindParam(':sch',$searchr);
			$suser->execute();
			echo '<p><div class="main"><div class="main title">Qualified Search Result For
			" <font color="red"> '.$_GET['q'].'</font> "</div> ';
			if($suser->rowCount() < 1){
				echo '<div class="info">User Not Found Or None Qualified!</div>';
			}
			while($sresult = $suser->fetch()){
			echo '<div class="left"><b>First Name: '.$sresult['firstname'].' <br/>
			Last Name: '.$sresult['lastname'].' <br/>
			Username: '.$sresult['username'].'<br/>
            Email: '.$sresult['email'].'<br/>
            Phone: '.$sresult['phone'].'<br/>
			Ref Bonus: ₦'.$sresult['refbonus'].'<br/>
            Location: '.$sresult['location'].'</b></div>
			<form method="POST">
			<input type="hidden" name="duser" value="'.$sresult['username'].'"/>
			<button style="float:left;" name="delu">Clear PayMent</button></form><br/><br/>
			<hr/>';		
			}
			echo '</div></p>';
			$statement = "`user` WHERE MATCH(username) AGAINST('{$searchr}') AND `refbonus`>0";
            $query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
            echo Ben::page($statement,$limit,$page,'?q='.$_GET['q'].'&');
		}
//Rest User
			$ssuser = $flash->query("SELECT * FROM `user` WHERE id>0  AND`refbonus`>0 ORDER BY `id` ASC
			LIMIT {$startpoint} , {$limit}");
			echo '<p><div class="main"><div class="main title">Total Qualified
			" <font color="red"> '.$ssuser->rowcount().'</font> "</div> ';
			if($ssuser->rowcount() < 1){
				echo '<p><div class="info">No User Available For PayMent!</div></p>';
			}
			while($ssresult = $ssuser->fetch()){
			echo '<div class="left"><b>First Name: '.$ssresult['firstname'].' <br/>
			Last Name: '.$ssresult['lastname'].' <br/>
			Username: '.$ssresult['username'].'<br/>
            Email: '.$ssresult['email'].'<br/>
            Phone: '.$ssresult['phone'].'<br/>
			Ref Bonus: ₦'.$ssresult['refbonus'].'<br/>
            Location: '.$ssresult['location'].'</b></div>
			<form method="POST">
			<input type="hidden" name="duser" value="'.$ssresult['username'].'"/>
			<button style="float:left;" name="delu">Clear PayMent</button></form><br/><br/>
			<hr/>';	
			}
			echo '</div></p>';
			$statement = "`user` WHERE id>0 AND `refbonus`>0";
            $query = $flash->query("SELECT * FROM {$statement} ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
            echo Ben::page($statement,$limit,$page,'?');
		echo '<br/><p><a class="buttong" href="'.$set['url'].'/member/main">Go Back</a></p>
	<br/></div></div></center>';
	}
	else {
		header('Location: '.$set['url'].'/memeber/main');
		exit;
	}
}
include('../inc/footer.php');
?>