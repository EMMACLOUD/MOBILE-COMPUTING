<?php

error_reporting(0); // Set to 1 if you want PHP error to Display But Mind you use Zero(0) To prevent  from Hackers..
require_once('flash.php');
require_once('detect.php');
require_once('function.php');
require_once('pagination.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
$Function = new Functions();
echo '<!DOCTYPE html>
<html lang="en">

<head>';
echo '<meta name="viewport" content="width=device-width,initial-scale=1"></meta>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
echo '<meta http-equiv="expires" content="0"/>
<meta http-equiv="expires" content="Never"/>
<meta http-equiv="Content-Language" content="en-us"/>
<meta http-equiv="content-type" content="Text/html;
charset=UTF-8"/>
<meta name="description" content="'.$set['disc'].'"/>
<meta name="keywords" content="'.$set['keyword'].'"/>
<meta name="copyright" content="Copyright (c) '.date('Y').' '.$set['name'].'"/>
<meta name="author" content="'.$set['author'].'@flashwebtechinc"/>
<meta name="charset" content="UTF-8"/>
<meta name="distribution" content="Global"/>
<meta name="rating" content="General"/>
<meta name="robots" content="Index,follow"/>
<meta name="expires" content="Never"/>';
echo '<meta name="revisit-after" content="3 Day"/>';
echo '<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Montserrat:400,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="'.$set['url'].'/assets/js/bbcode.js"></script>';
function FlashTitle($title){
	 echo '<title>' .htmlspecialchars($title). '</title>';
}
echo '    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">';
?>
    
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="<?php echo $set['url']; ?>/css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?php echo $set['url']; ?>/css/style.green.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?php echo $set['url']; ?>/css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9] -->
       <!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		-->
<!--[endif]-->


    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="<?php echo $set['url']; ?>/img/fav.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo $set['url']; ?>/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $set['url']; ?>/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $set['url']; ?>/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $set['url']; ?>/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $set['url']; ?>/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $set['url']; ?>/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $set['url']; ?>/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $set['url']; ?>/img/apple-touch-icon-152x152.png" />
    <link rel="icon" type="icon" href="<?php echo $set['url']; ?>/img/favicon.png"/>
	<!-- owl carousel css -->

    <link href="<?php echo $set['url']; ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $set['url']; ?>/css/owl.theme.css" rel="stylesheet">
</head>

<body>

    <div id="all">

        <header>

            <!-- *** TOP ***
_________________________________________________________ -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            <p class="hidden-sm hidden-xs">Contact us on support@<?php echo $set['slug']; ?>.</p>
                            <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-7">
                            <div class="social">
                                <a href="http://facebook.com/<?php echo $set['fb']; ?>" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="http://gogle.com/search?q=<?php echo $set['url']; ?>" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="http://twitter.com/<?php echo $set['twitter']; ?>" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="<?php echo $set['url']; ?>/contact.php" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div>

                            <div class="login">
							<?php
							if(!$Function->isLogin()){
                               echo ' <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a>
                                <a href="'.$set['url'].'/member/register"><i class="fa fa-user"></i>
								<span class="hidden-xs text-uppercase">Sign up</span></a>';
							}
							else{
								echo '<a href="'.$set['url'].'/member/main"><i class="fa fa-user"></i>
								<span class="hidden-xs text-uppercase">Main Panel</span></a>';
							}
						  echo '</div>';
							?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- *** TOP END *** -->

            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="<?php echo $set['url']; ?>/index.php">
                                <img src="<?php echo $set['url']; ?>/img/logo.png" alt="<?php echo $set['name']; ?> logo" class="hidden-xs hidden-sm">
                                <img src="<?php echo $set['url']; ?>/img/logo-small.png" alt="<?php echo $set['name']; ?> logo" class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Menu</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse yam" id="navigation">
                              <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown active">
                        <a href="<?php echo $set['url']; ?>" class="dropdown-toggle"><i class="fa fa-home"></i>HOME </a>
                                         </li>
										 
                                         <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa- fa-arrow-circle-up"></i>ABOUT <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                   
                                       <li><a href="<?php echo $set['url']; ?>/about"><i class="fa fa-edit"></i>About</a>
                                         </li>
                                          <li><a href="<?php echo $set['url']; ?>/rules"><i class="fa fa-edit"></i>Rules</a>
                                           </li>
                                                    
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trophy"></i>CHOOSE PLAN <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                                         <li><a href="<?php echo $set['url']; ?>/member/plan.php?plan=1">
														 <i class="fa fa-trophy"></i><?php echo $mcplan1; ?></a>
                                                            </li>
                                                          <li><a href="<?php echo $set['url']; ?>/member/plan.php?plan=2">
														 <i class="fa fa-trophy"></i><?php echo $mcplan2; ?></a>
                                                            </li>
                                                        <li><a href="<?php echo $set['url']; ?>/member/plan.php?plan=3">
														 <i class="fa fa-trophy"></i><?php echo $mcplan3; ?></a>
                                                            </li>
                                                        <li><a href="<?php echo $set['url']; ?>/member/plan.php?plan=4">
														 <i class="fa fa-trophy"></i><?php echo $mcplan4; ?></a>
                                                            </li>
                                                        <li><a href="<?php echo $set['url']; ?>/member/plan.php?plan=5">
														 <i class="fa fa-trophy"></i><?php echo $mcplan5; ?></a>
                                                            </li>															
                                                        </ul>
														</li>
                                <!-- ========== FULL WIDTH MEGAMENU ================== -->
                                <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200"><i class="fa fa-user"></i>ACCOUNT <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                                        <ul>
														<?php 
														if(!$Function->isLogin()){
                                                   echo '<li><a href="'.$set['url'].'/member/register"><i class="fa fa-edit"></i>Join Now</a>
                                                     </li>
													 <li><a href="'.$set['url'].'/member/login"><i class="fa fa-sign-in"></i>Login Now</a>
                                                    </li>
                                                     <li><a href="'.$set['url'].'/member/forgotpass"><i class="fa fa-trophy"></i>Recover Password</a>
                                                     </li>';
														}
														else {
															if($prof['right'] > 0){
												echo '<li><a href="'.$set['url'].'/admin/index.php"><i class="fa fa- fa-certificate"></i>Admin Panel</a>
												</li>';
															}
												echo '<li><a href="'.$set['url'].'/member/main"><i class="fa fa- fa-arrow-circle-up"></i>Main Panel</a>
                                                </li>
                                                <li><a href="'.$set['url'].'/member/set/profile"><i class="fa fa-edit"></i>Edit Profile</a>
                                                 </li>
                                                 <li><a href="'.$set['url'].'/member/set/password"><i class="fa fa-edit"></i>Change Password</a>
                                                  </li>
												  <li><a href="'.$set['url'].'/member/logout"><i class="fa fa-sign-out"></i>Logout</a>
                                                  </li>';
														}
														?>
                                                     </ul>
													 </li>
                                                    </ul>
													</li>
                                            <!-- /.yamm-content -->
                                <!-- ========== FULL WIDTH MEGAMENU END ================== -->

                                <li class="dropdown">
        <a href="<?php echo $set['url']; ?>/contact"><i class="fa fa-envelope"></i>Contact </a>
		</li>
                        <!--/.nav-collapse -->
                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->

        </header>

        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Client login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo $set['url']; ?>/member/login" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email_modal" placeholder="email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_modal" placeholder="password" name="pass">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main" name="log"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="<?php echo $set['url']; ?>/member/register"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** LOGIN MODAL END *** -->
<!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>

    

    <!-- owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
