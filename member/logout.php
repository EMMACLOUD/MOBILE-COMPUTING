<?php

require_once('../inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
if(!$Function->isLogin()){
	include('login2.php');
}
else{
	FlashTitle('Logout | '.$set['title']);
if(isset($_POST['logout'])){
	SESSION_DESTROY();
	SESSION_UNSET();
	header('Location: '.$set['url']);
	exit;
}
echo '<!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>My Account / Logout</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>My Account / Logout</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
		<div id="content">
            <div class="container">

                <div class="row">
                    <div class="form-group">
					<div class="box">
					<h2>Logout</h2>
Are You Sure You Want To Logout????<br/>
<form method="POST"><button name="logout" class="btn btn-template-main"><i class="fa fa-sign-out"></i>YES LOGOUT</button>
</form><br/></div>
</div>	</div>
</div> </div>';
}
require_once('../inc/footer.php');
?>