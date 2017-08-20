<?php

include('../inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
if(!$Function->isLogin()){
	include 'login2.php';
}
else {
	FlashTitle('Choose Plan | '.$set['title']);
	if(isset($_POST['cp'])){
		$nplan = $_POST['plan'];
		if(isset($_GET['user']) AND $prof['right'] > 0){
			$useran = $_GET['user'];
		}
		else {
			$useran = $prof['username'];
		}
		if($flash->query("UPDATE `user` SET `plan`='{$nplan}' WHERE `username`='{$useran}'")){
			$succs .= '<p><div class="success">SuccessFully Your Plan have been change!</div></p>';
		}
		else {
			$error .= '<p><div class="error">Cannot change your plan!</div>';
		}
	}
	$plans = array($mcplan1 .' ₦'. $mcprice1,$mcplan2 .' ₦'. $mcprice2,$mcplan3 .' ₦'. $mcprice3,$mcplan4 .' ₦'. $mcprice4,$mcplan5 .' ₦'. $mcprice5);
?>
<!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>My Account / Choose Plan</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a>
                            </li>
                            <li>My Account / Choose Plan</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">How <?php echo $set['name']; ?> Works</h2>
                            <p align="justify"> Firstly, you have to register your account, 
							after registration proceed to login and supply your login details.
							Supply your bank details after login. You will have to donate the sum of either 
							N<?php echo $mcprice1; ?>, N<?php echo $mcprice2; ?>, N<?php echo $mcprice3; ?>
							, <?php echo $mcprice4; ?> or N<?php echo $mcprice5; ?>
							to a fellow member assigned by the system, 
							and the member will then confirm your donation and then the system will 
							automatically assign 2 other registered people under you from spillovers
							who will also pay you the joining amount each, into your bank account, 
							making 100% (i.e. 100% of N<?php echo $mcprice1; ?>  
							is N<?php echo ($mcprice1*2); ?>,
							100% of N<?php echo $mcprice2; ?> is N<?php echo ($mcprice2*2); ?>,
							100% of N<?php echo $mcprice3; ?> is N<?php echo ($mcprice3*2); ?> ,
							100% of N<?php echo $mcprice4; ?> is N<?php echo ($mcprice4*2); ?>
							AND 100% of N<?php echo $mcprice5; ?> is N<?php echo ($mcprice5*2); ?>).</p>

                            <p align="justify"><?php echo $set['name']; ?> will assign people to pay you.
							After you have received payment from 2 people under you, 
							the system will automatically EXIT you and allows unlimited registration.</p>

                            <p align="justify">All donations are made directly to member bank account. 
							Share <?php echo $set['name']; ?> to people and make the world a better place.</p>
<hr>
<p align="justify"> <?php echo $set['name']; ?> will never sending Messages to participants.
 Please discard any message bearing <?php echo $set['name']; ?>. They are from hackers that wants to ruin your account. 
 Please be careful.</p>                         
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="box">
                            <h2 class="text-uppercase">Choose A New Plan</h2>

                            <p class="lead">Already Have Plan On <?php echo $set['name']; ?>?</p>
                            <p class="text-muted">You Cannot Change Plan yourself bacause Save button not Showing?? 
							try to contact Admin.</p> 

                            <hr>
<?php 
echo '<form method="POST">
<label for="plan">PLANS</label><br/>
<select name="plan" class="form-control">';
$n = 1;
foreach($plans as $planx){
	echo '<option value="'.$n.'"';
	if($_GET['plan'] == $n){
		echo 'selected = "selected"';
	}
	echo '><b>'.$planx.'</b></option>';
	$n++;
}
  echo '</select>';
  if($prof['plan'] < 1 OR $prof['right'] > 0){
  echo '<button name="cp" type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Save</button>
  <br/><br/>';
  } 
  else {
	  $error .= '<p><div class="info">You already have a plan..</div></p><br/>';
  }
?>
</div>
						 <div class="form-group">
						<?php 
						echo $error; 
						echo $succs;
						?>
						</div>
								
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        
<?php
	}
include('../inc/footer.php');
?>