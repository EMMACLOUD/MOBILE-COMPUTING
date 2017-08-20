<?php 

include('inc/header.php');
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
} 
FlashTitle('Home | '.$set['title']);
?>      
	   <section>
            <!-- *** HOMEPAGE CAROUSEL ***
 _________________________________________________________ -->

            <div class="home-carousel">

                <div class="dark-mask"></div>

                <div class="container">
                    <div class="homepage owl-carousel">
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <p>
                                        <img src="<?php echo $set['url']; ?>/img/logo.png" alt="">
                                    </p>
                                    <h1>Introducing <?php echo $set['name']; ?></h1>
                                    <p>Helping the masses..</p>
									<p>Join us now by clicking:</p>
                                    <p class="read-more" align="right">
                                    <a href="<?php echo $set['url']; ?>/member/register" class="btn btn-template-main"><i class="fa fa-user"></i>Register Now</a>  
                                   </p>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="<?php echo $set['url']; ?>/img/hdr-r.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">

                                <div class="col-sm-7 text-center">
                                    <img class="img-responsive" src="<?php echo $set['url']; ?>/img/mob-hero-bg.jpg" alt="">
                                </div>

                                <div class="col-sm-5">
                                    <h2><?php echo $set['name']; ?> Donations</h2>
                                    <ul class="list-style-none">
                                        <li>Helping masses is our watchword!</li>
                                        <li>Multiply your money beyond!</li>
										<li>A group of ordinary people, selflessly helping each other.</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <h1>Don't lose faith when you see others receive answers to their prayers.</h1>
                                    <ul class="list-style-none">
                                        <li>Don't be envious of others testimony</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="<?php echo $set['url']; ?>/img/fixed-background-2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="<?php echo $set['url']; ?>/img/home-try.jpg" alt="">
                                </div>
                                <div class="col-sm-5">
                                    <h1>If you haven't received your own blessings, don't despair. </h1>
                                    <ul class="list-style-none">
                                        <li>Say to yourself "My time is coming</li>
                                        <li>and when it hits the surface of the earth, people shall yield in admiration</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.project owl-slider -->
                </div>
            </div>

            <!-- *** HOMEPAGE CAROUSEL END *** -->
        </section>
<!-- More -->
        </section>

        <section class="bar background-gray no-mb padding-big text-center-sm">
		
            <div class="container">
<div style="color:#9933CC" align="center"><h2><?php echo $set['name']; ?> Processes</h2><div>
							<div class="col-md-3 col-sm-6">
                            <div class="box-image-text blog">

							     <div class="content">
								 
                                    <h4><a href="#">Register</a></h4>
                                    <p align="justify">Complete online registration form with full details, 
									contact number in international format (+1 901789098), 
									a valid and accessible email account will be carried out
									on your email address, so you are expected to use correct 
									email address. Your <?php echo $set['name']; ?> account is now confirmed and you 
									can proceed to login with username and password chosen during 
registration to access your newly created account.</p>
                  <p class="read-more" align="left">
				  <a href="<?php echo $set['url']; ?>/member/register?sess=<?php echo md5(uniqid(rand())); ?>" class="btn btn-template-main">Register Now</a>  </p>
                            </div>
                            </div>
                            <!-- /.box-image-text -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="box-image-text blog">
                                
                                <div class="content">
                                    <h4><a href="#">Add Payment Options</a></h4>
                                    <p align="justify">After confirming your newly registered account, 
									continue to login and complete your profile including your 
									fund processing options this includes local bank transfer,
									ATM deposits, Bank Deposit, Mobile Money and/or any other
									fund processor accepted in the system. Adding a payment processor
									will speed up the process to help you receive donations from other 
									participants in real time.</p>
                  <p class="read-more" align="left">
				  <a href="<?php echo $set['url']; ?>/member/register?sess=<?php echo md5(uniqid(rand())); ?>" class="btn btn-template-main">
				  Register Now</a>  </p>
                                </div>
                            </div>
                            <!-- /.box-image-text -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="box-image-text blog">
                               
                                <div class="content">
                                    <h4><a href="#">Donation schedule</a></h4>
                                    <p align="justify">Once you’re in your user dashboard,
									familiarize yourself with your account. We have four donation options
									(<?php echo $mcplan1; ?>, <?php echo $mcplan2; ?>, <?php echo $mcplan3; ?>,
									<?php echo $mcplan4; ?> and <?php echo $mcplan1; ?>) available 
									for specific 
									donation. Get in touch with the receiver to make fast possible donation 
									payment available and once funds is transfer or send, go to your outgoing 
									donation and click I have paid once fund is paid, 
									then recipient will
									confirm your donation on other end once fund is received in his/her account.</p>
                                </div>
                            </div>
                            <!-- /.box-image-text -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="box-image-text blog">
                                
                                <div class="content">
                                    <h4><a href="#">Receive Donation</a></h4>
                                    <p align="justify">Once you make a donation of specific amount 
									(<?php echo $mcplan1; ?>, <?php echo $mcplan2; ?>, <?php echo $mcplan3; ?>,
									<?php echo $mcplan4; ?> and <?php echo $mcplan1; ?>),
									you’re scheduled automatically to receive a donation from other 
									participants on a scheduled date (incoming donation in your dashboard)</p>
		
		
		INFORMATION FROM ADMINISTRATOR
		
		<div class="alert alert-danger">
<strong>NOTE:</strong> <?php echo $set['notification']; ?>.
<p>Thanks to <?php echo $set['name']; ?>!
</p></div>		

                                </div>
                            </div>

            </div>
        </div></div>
		<!-- End -->
		
		
                                </div>
                            </div>

            </div>
        </section>
		
		 <section class="bar background-white">
		 <div class="heading text-center">
                            <h2>Statistics</h2></div>
            <div class="container">
                <div class="row showcase">
				
                    <div class="col-md-3 col-sm-6">
					
                        <div class="item">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
		<?php
		// Plans Member Counter
		$cplans1 = $flash->query("SELECT * FROM `user` WHERE `plan`='1'");
		$cplans2 = $flash->query("SELECT * FROM `user` WHERE `plan`='2'");
		$cplans3 = $flash->query("SELECT * FROM `user` WHERE `plan`='3'");
		$cplans4 = $flash->query("SELECT * FROM `user` WHERE `plan`='4'");
		$cplans5 = $flash->query("SELECT * FROM `user` WHERE `plan`='5'");
		
		
		?>
		
                            <h4><span class="counter"><?php echo (58+$cplans1->rowCount()); ?></span><br>

		<?php echo $mcplan1; ?></h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <h4><span class="counter"><?php echo (50+$cplans2->rowCount()); ?></span><br>

		<?php echo $mcplan2; ?></h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <h4><span class="counter"><?php echo (38+$cplans3->rowCount()); ?></span><br>

		<?php echo $mcplan3; ?></h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <h4><span class="counter"><?php echo (41+$cplans4->rowCount()); ?></span><br> 
<?php echo $mcplan4; ?></h4>
                        </div>
                    </div>
	<div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <h4><span class="counter"><?php echo (27+$cplans5->rowCount()); ?></span><br> 

		<?php echo $mcplan5; ?></h4>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
		
<section class="bar background-pentagon no-mb" id="packages">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading text-center">
                            <h2>Packages we Offer</h2>
                        </div>

                        <p class="lead" align="center">Select the appropriate package that suites you and 
						make yourself stand out from the crowd</p>

                        <div class="row packages">
									                            <div class="col-md-3">
                                <div class="package ">
                                    <div class="package-header light-green">
                                        <h5><?php echo $mcplan1; ?></h5>
                                    </div>
                                    <div class="price">
                                        <div class="price-container">
                                            <h4><span class="currency">₦</span>
											<?php echo $mcprice1; ?></h4>
                                            <span class="period"></span>
                                        </div>
                                    </div>
                                    <ul>
                                        <li><i class="fa fa-check"></i>2:1 Matrix</li>
                                        <li><i class="fa fa-check"></i>Auto Assign</li>
                                        <li><i class="fa fa-check"></i>Pay Out/In Option</li>
                                        <li><i class="fa fa-check"></i>1 Hour Auto Purge 
										<div style="color:#FF0000">(new)*</div></li>
                                        
										 <li><i class="fa fa-check"></i>
										 <?php echo '₦'.($mcprice1*2); ?> Return Investment</li>

                                    </ul>
									
									
                                    <a href="<?php echo $set['url']; ?>/member/register?plan=1&sess=<?php echo md5(uniqid(rand())); ?>" class="btn btn-template-main">Sign Up </a>
                                
								
								</div>
                            </div>
							                            <div class="col-md-3">
                                <div class="package ">
                                    <div class="package-header light-green">
                                        <h5><?php echo $mcplan2; ?></h5>
                                    </div>
                                    <div class="price">
                                        <div class="price-container">
                                            <h4><span class="currency">₦</span>
											<?php echo $mcprice2; ?></h4>
                                            <span class="period"></span>
                                        </div>
                                    </div>
                                    <ul>
                                        <li><i class="fa fa-check"></i>2:1 Matrix</li>
                                        <li><i class="fa fa-check"></i>Auto Assign</li>
                                        <li><i class="fa fa-check"></i>Pay Out/In Option</li>
                                        <li><i class="fa fa-check"></i>1 Hour Auto Purge 
										<div style="color:#FF0000">(new)*</div></li>
                                        
										 <li><i class="fa fa-check"></i>
										 <?php echo '₦'.($mcprice2*2); ?> Return Investment</li>

                                    </ul>
									
									
                                    <a href="<?php echo $set['url']; ?>/member/register?plan=2&sess=<?php echo md5(uniqid(rand())); ?>" class="btn btn-template-main">Sign Up </a>
                                
								
								</div>
                            </div>
							                            <div class="col-md-3">
                                <div class="package ">
                                    <div class="package-header light-green">
                                        <h5><?php echo $mcplan3; ?></h5>
                                    </div>
                                    <div class="price">
                                        <div class="price-container">
                                            <h4><span class="currency">₦</span>
											<?php echo $mcprice3; ?></h4>
                                            <span class="period"></span>
                                        </div>
                                    </div>
                                    <ul>
                                        <li><i class="fa fa-check"></i>2:1 Matrix</li>
                                        <li><i class="fa fa-check"></i>Auto Assign</li>
                                        <li><i class="fa fa-check"></i>Pay Out/In Option</li>
                                        <li><i class="fa fa-check"></i>1 Hour Auto Purge 
										<div style="color:#FF0000">(new)*</div></li>
                                        
										 <li><i class="fa fa-check"></i>
										 <?php echo '₦'.($mcprice3*2); ?> Return Investment</li>

                                    </ul>
									
									
                                    <a href="<?php echo $set['url']; ?>/member/register?plan=3&sess=<?php echo md5(uniqid(rand())); ?>" class="btn btn-template-main">Sign Up </a>
                                
								
								</div>
                            </div>
				             <div class="col-md-3">
                                <div class="package ">
                                    <div class="package-header light-green">
                                        <h5><?php echo $mcplan4; ?></h5>
                                    </div>
                                    <div class="price">
                                        <div class="price-container">
                                            <h4><span class="currency"> </span>
											₦<?php echo $mcprice4; ?></h4>
                                            <span class="period"></span>
                                        </div>
                                    </div>
                                    <ul>
                                        <li><i class="fa fa-check"></i>2:1 Matrix</li>
                                        <li><i class="fa fa-check"></i>Auto Assign</li>
                                        <li><i class="fa fa-check"></i>Pay Out/In Option</li>
                                        <li><i class="fa fa-check"></i>1 Hour Auto Purge
										<div style="color:#FF0000">(new)*</div></li>
                                        
										 <li><i class="fa fa-check"></i>
										 <?php echo '₦'.($mcprice4*2); ?> Return Investment</li>

                                    </ul>
									
									
                                    <a href="<?php echo $set['url']; ?>/member/register?plan=4&sess=<?php echo md5(uniqid(rand())); ?>" class="btn btn-template-main">
									Sign Up </a>
                                
								
								</div>
                            </div>
							  <div class="col-md-3">
                                <div class="package ">
								<div class="package-header light-green">
                                        <h5><?php echo $mcplan5; ?></h5>
                                    </div>
                                    <div class="price">
                                        <div class="price-container">
                                            <h4><span class="currency"></span>
											₦<?php echo $mcprice5; ?></h4>
                                            <span class="period"></span>
                                        </div>
                                    </div>
                                    <ul>
                                        <li><i class="fa fa-check"></i>2:1 Matrix</li>
                                        <li><i class="fa fa-check"></i>Auto Assign</li>
                                        <li><i class="fa fa-check"></i>Pay Out/In Option</li>
                                        <li><i class="fa fa-check"></i>1 Hour Auto Purge 
										<div style="color:#FF0000">(new)*</div></li>
                                        
										 <li><i class="fa fa-check"></i>
										 <?php echo '₦'.($mcprice5*2); ?> Return Investment</li>

                                    </ul>
									
									
                                    <a href="<?php echo $set['url']; ?>/member/register?plan=5&sess=<?php echo md5(uniqid(rand())); ?>" class="btn btn-template-main">
									Sign Up </a>
                                
								
								</div>
                            </div>
							                            <!-- / END FIRST PACKAGE -->

                           
                        </div>

                    </div>
                </div>
            </div>
        </section>
		<!-- More And More -->
		<section class="bar background-white">
            <div class="container">
                <div class="col-md-12">


                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-desktop"></i>
                                </div>
                                <h3>Manage Panel</h3>
                                <p>Our system is easy to manage which you can access of mobile or pc.
								All pledges and re-pledges are done accordingly.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-print"></i>
                                </div>
                                <h3>Save</h3>
                                <p>All transaction made and statement are save with us our system 
								handle all conversation on this platform.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <h3>World Wide</h3>
                                <p>This platform is a world widely platform where member help member
								the more you give the more you get X2 Combo.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <h3>Consulting</h3>
                                <p>Easy consulting ,write support ticket anytime you need any help
								our great support team is ready to help you & give you some tips to guide you.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <h3>Contact Support</h3>

                                <p>Our contact support is available to help & assist you 
								if you have any issue just write a support ticket we are ready to 
								help you.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <h3>User</h3>
                                <p>All user have equal right on this platform, all user have right to do and
								undo what he/she likes on <?php echo $set['name']; ?> Platform.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- *** GET IT END *** -->

<a name="testi"></a>
        <section class="bar background-gray no-mb padding-big text-center-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading text-center">
                            <h2>Testimonials</h2>
                        </div>

                        <p class="lead" align="center">See what people are saying about us.</p>


                        <!-- *** TESTIMONIALS CAROUSEL ***
 _________________________________________________________ -->
										<?php 
										if(date('d') > 4){
											$ddvdd = (date('d') - 4);
										}
										if(date('d') > 3){
											$ddvd = (date('d') - 3);
										}
										else {
											$ddvd = date('d');
										}
										if(date('d') > 3){
											$ddvd2 = (date('d') - 1);
										}
										else {
											$ddvd2 = date('d');
										}
										?>

                        <ul class="owl-carousel testimonials same-height-row">
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p align="justify">I joined <?php echo $set['name']; ?> 
										on core aim to share with the world I had N<?php echo $mcprice4; ?>
										to 
										spend now. Thanks very much for this opportunity. 
										I am happy with this platform.</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i>                                        </div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="<?php echo $set['url']; ?>/img/comittee.png">
                                            <h5>Muritala</h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p align="justify">I'm Dauda Abdulrasaq Adewale by name on 
									 <?php echo date('M'); ?>  <?php echo $ddvd; ?>,
										<?php echo date('Y'); ?> i make a donation of N<?php echo $mcprice3; ?> 
										and on <?php echo date('M'); ?>  <?php echo $ddvd2; ?>,
										<?php echo date('Y'); ?> i was able to receive N<?php echo ($mcprice3*2); ?>
										cash in my account. 
										I really like this platform......it's making sense....</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i>                                        </div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="<?php echo $set['url']; ?>/img/comittee.png">
                                            <h5>AbdulBasheet</h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p align="justify">As i don get alert God Win!!!! 
										I registered on this platform day before yesterday
										 and make a 
										pledge of #<?php echo $mcprice1; ?>, within 17hours i got an alert of 
										#<?php echo ($mcprice1*2); ?> 
										in my account. <?php echo $set['name']; ?> is the best!!!!!!!  
										Maintain the Good Work......</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i>                                        </div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="<?php echo $set['url']; ?>/img/comittee.png">
                                            <h5>Job</h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p align="justify">God bless <?php echo $set['name']; ?> for this 
										wonderful
										platform I pH #<?php echo $mcprice4; ?> and GH back 
                                     #<?php echo ($mcprice4*2); ?>		in 2 days God bless 
										you once again
Love you</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i>                                        </div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="<?php echo $set['url']; ?>/img/comittee.png">
                                            <h5>Oluniyi</h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p align="justify"><?php echo $set['name']; ?> is the best...
										with <?php echo $set['name']; ?> 
										now I don't lack</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i>                                        </div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="<?php echo $set['url']; ?>/img/comittee.png">
                                            <h5>walesam@gmail.com</h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p align="justify">Am very very happy  to been in this  platform 
										I register  on
										<?php echo $ddvd; ?> with N<?php echo $mcprice2; ?>
										package and I receive my 
										N<?php echo ($mcprice2*2); ?> on <?php echo $ddvd2; ?> long 
										live <?php $set['name']; ?> </p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i>                                        </div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="<?php echo $set['url']; ?>/img/comittee.png">
                                            <h5>SUNGPAC</h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- /.owl-carousel -->

                        <!-- *** TESTIMONIALS CAROUSEL END *** -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.bar -->

        <section class="bar background-image-fixed-2 no-mb color-white text-center">
            <div class="dark-mask"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="icon icon-lg"><i class="fa fa-info"></i>                        </div>
                        <h3 class="text-uppercase">Want to know how <?php echo $set['name']; ?> Works?</h3>
                        <p class="lead">Donate and get 100% of your Initial Investment.</p>
                        <p class="text-center">
                            <a href="<?php echo $set['url']; ?>/about" class="btn btn-template-transparent-black btn-lg">
							ABOUT <?php echo $set['name']; ?></a>  <a href="#testi" class="btn btn-template-transparent-black btn-lg">READ TESTIMONIES</a>                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.bar -->
<?php 
include 'inc/footer.php';
?>