<?php

include 'inc/header.php';
defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
FlashTitle('About Us | '.$set['title']);
echo '<center><div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
						                                  
 <h4 class="text-uppercase">
<h2>About Us</h2>
<hr class="dhr" style="background:white;"/>
<p><b>'.$set['name'].' was founded by a team of enthusiastic
 Philantropists who wanted to overcome <br/>the routine and create a platform that would
 act in the market not only for business success 
but for the sake of humanitarian and financial empowerment services.</b>
<br/><br/></p>
</div></div>
<div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box"><br/><br/>
						<h2> Information </h2>
						<p><b>'.$set['notification'].'</b></p>
						</div></div></div></div></div></div></center>';
include 'inc/footer.php';
?>