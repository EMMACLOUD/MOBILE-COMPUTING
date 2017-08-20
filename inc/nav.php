<?php

defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
if(!$Function->isLogin()){
?>
<style>
a.fit{width:98%;}
</style>
<script> function nav(){
document.getElementById("nav").innerHTML = '<div class="mai"><ul class="nav"><li><a href="<?php echo $set['url'];?>">Home</a></li> <hr/> <li><a href="<?php echo $set['url'];?>/member/register">Register</a></li><hr/> <li><a href="<?php echo $set['url'];?>/member/login">Login</a></li><hr/> <li><a href="<?php echo $set['url'];?>/member/forgotpass">Forgot Password</a></li><hr/> <li><a href="<?php echo $set['url'];?>/about">About</a></li><hr/> <li><a href="<?php echo $set['url'];?>/contact">Contact</a></li><hr/><li><a href="<?php echo $set['url'];?>/rules">Rules</a></li><hr/> <li><a href="<?php echo $set['url'];?>/member/plan.php">Choose Plan</a></li></ul></div>';
}
</script>
<?php
}
if($Function->isLogin()){
?>
<script> function nav(){
document.getElementById("nav").innerHTML = '<div class="mai"><ul class="nav"><li><font color="red">Hello, </font><font color="green"><?php echo $prof['username'];?></font></li> <hr/> <li><a href="<?php echo $set['url'];?>/member/main">Main Panel</a></li> <hr/> <li><a href="<?php echo $set['url'];?>/member/set/profile">Edit Profile</a></li> <hr/> <li><a href="<?php echo $set['url'];?>/member/set/password">Change Password</a></li> <hr/><li><a href="<?php echo $set['url'];?>/member/logout">Logout</a></li> <hr/> <li><a href="<?php echo $set['url'];?>/about">About</a></li> <hr/> <li><a href="<?php echo $set['url'];?>/contact">Contact</a></li> <hr/> <li><a href="<?php echo $set['url'];?>/rules">Rules</a></li> <hr/> <li><a href="<?php echo $set['url'];?>/member/plan.php">Choose Plan</a></li></ul></div>';
}
</script>
<?php }
?>