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
	FlashTitle('Settings Admin Panel | '.$set['title']);
		if(isset($_POST['set'])){
			if(empty($_POST['url'])){
				$error .= '<div class="error">Url Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['name'])){
				$error .= '<div class="error">Site Name Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['title'])){
				$error .= '<div class="error">Title Cannot Be Empty it is Required!</div>';
			}
			if(mb_strlen($_POST['title']) > 50){
				$error .= '<div class="error">Title too much Maximum is 50 Characters!</div>';
			}
			if(mb_strlen($_POST['title']) < 10){
				$error .= '<div class="error">Title too small Minimum is at least 10 Characters!</div>';
			}
			if(empty($_POST['author'])){
				$error .= '<div class="error">Author Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['email'])){
				$error .= '<div class="error">Email Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['phone'])){
				$error .= '<div class="error">Phone Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['fb'])){
				$error .= '<div class="error">Facebook Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['twitter'])){
				$error .= '<div class="error">Twitter Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['perpage'])){
				$error .= '<div class="error">List PerPage Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['keyword'])){
				$error .= '<div class="error">KeyWord Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['disc'])){
				$error .= '<div class="error">Discription Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['rules'])){
				$error .= '<div class="error">Rules Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['notif'])){
				$error .= '<div class="error">Notification Cannot Be Empty it is Required!</div>';
			}
			if(empty($_POST['slug'])){
				$error .= '<div class="error">Slug Cannot Be Empty it is Required!</div>';
			}
			if($_POST['perpage'] > 50 || $_POST['perpage'] < 2){
				$error .= '<div class="error">PerPage Limit '.$_POST['perpage'].' InValid Minimum is 2 And Maximum Limit is 50!</div>';
			}
			$urls = $_POST['url'];
			$sitenames = $_POST['name'];
			$titles = $_POST['title'];
			$authors = $_POST['author'];
			$slugs = $_POST['slug'];
			$emails = $_POST['email'];
			$phones = $_POST['phone'];
			$fbs = $_POST['fb'];
			$twitters = $_POST['twitter'];
			$perpages = $_POST['perpage'];
			$keywords = $_POST['keyword'];
			$discs = $_POST['disc'];
			$snotif = $_POST['notif'];
			$srules = $_POST['rules'];
			$sallowmem = $_POST['memallow'];
			$sautopurge = $_POST['autopurge'];
			$sautomerge = $_POST['automerge'];
			if(empty($error)){
			$upd = $flash->prepare("UPDATE setting SET url=:url,name=:sn,email=:email,title=:title,slug=:slug,
			author=:author,fb=:fb,twitter=:tw,phone=:phone,perpage=:pp,disc=:disc,keyword=:kw,
			notification=:notif,rules=:rules,memberallowed=:ma,automerge=:autm,autopurge=:autp");
			$upd->bindParam(':notif',$snotif);
			$upd->bindParam(':rules',$srules);
			$upd->bindParam(':autm',$sautomerge);
			$upd->bindParam(':autp',$sautopurge);
			$upd->bindParam(':ma',$sallowmem);
			$upd->bindParam(':url',$urls);
			$upd->bindParam(':sn',$sitenames);
			$upd->bindParam(':email',$emails);
			$upd->bindParam(':title',$titles);
			$upd->bindParam(':slug',$slugs);
			$upd->bindParam(':author',$authors);
			$upd->bindParam(':fb',$fbs);
			$upd->bindParam(':tw',$twitters);
			$upd->bindParam(':phone',$phones);
			$upd->bindParam(':pp',$perpages);
			$upd->bindParam(':disc',$discs);
			$upd->bindParam(':kw',$keywords);
			if($upd->execute()){
				echo '<p><div class="success">Settings Updated!</div></p>';
			}
			else {
				echo '<p><div class="error">Cannot Update Right Now!</div></p>';
			}
			}
		}
		echo '<p>'.$error.'</p>';
		echo '<center><div class="myborder"><div class="menu menu2">
<h2>Main Site Settings</h2>
<hr class="dhr" style="background:white;"/>';
		
		echo '<form method="POST">
	   <b><label>Auto Merge </label><br/>
		<input type="radio" name="automerge" value="1"';
		if($set['automerge'] == '1'){
			echo 'checked="checked"';
		}
		echo '> Yes</input> 
		<input type="radio" name="automerge" value="0"';
        if($set['automerge'] == '0'){
			echo 'checked="checked"';
		}
		echo '> No</input><br/>
		<label>Auto Purge</label><br/>
		<input type="radio" name="autopurge" value="1"';
        if($set['autopurge'] == '1'){
			echo 'checked="checked"';
		}
		echo '> Yes</input> 
		<input type="radio" name="autopurge" value="0"';
        if($set['autopurge'] == '0'){
			echo 'checked="checked"';
		}
		echo '> No</input></b><hr/>
		<label>Site Url</label><br/>
		<input type="text" name="url" value="'.$set['url'].'" required/>
		<br/>
		<label>Site Name</label><br/>
		<input type="text" name="name" value="'.$set['name'].'" required/>
		<br/>
		<label>Site Title</label><br/>
		<input type="text" name="title" value="'.$set['title'].'" required/>
		<br/>
		<label>Site Slug</label><br/>
		<input type="text" name="slug" value="'.$set['slug'].'" required/>
		<br/>
		<label>Site Author</label><br/>
		<input type="text" name="author" value="'.$set['author'].'"/>
		<br/>
		<label>Site Email</label><br/>
		<input type="text" name="email" value="'.$set['email'].'" required/>
		<br/>
		<label>Site Phone</label><br/>
		<input type="text" name="phone" value="'.$set['phone'].'"/>
		<br/>
		<label>Site FB Page</label><br/>
		<input type="text" name="fb" value="'.$set['fb'].'"/>
		<br/>
		<label>Site Twitter Page</label><br/>
		<input type="text" name="twitter" value="'.$set['twitter'].'"/>
		<br/>
		<label>Allow Register User(<small>0 for Unlimited</small>)</label><br/>
		<input type="text" name="memallow" value="'.$set['memberallowed'].'"/>
		<br/>
		<label>List Per Page</label><br/>
		<input type="text" name="perpage" value="'.$set['perpage'].'"/>
		<br/>
		<label>Notification</label><br/>
		<textarea name="notif" required>'.$set['notification'].'</textarea>
		<br/>
		<label>Rules</label><br/>
		<textarea name="rules" required>'.$set['rules'].'</textarea>
		<br/>
		<label>KeyWord</label><br/>
		<textarea name="keyword" required>'.$set['keyword'].'</textarea>
		<br/>
		<label>Discription</label><br/>
		<textarea name="disc" required>'.$set['disc'].'</textarea><br/><br/>
		<input name="set" type="submit" value="Save"/>
	</form>';
	echo '<br/><p><a class="buttonw" href="'.$set['url'].'/member/main">Go Back</a></p>
	<br/></div></div></center>';
	}
	else {
		header('Location: '.$set['url'].'/memeber/main');
		exit;
	}
}
include('../inc/footer.php');
?>