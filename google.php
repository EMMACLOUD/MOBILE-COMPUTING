<?php


$ver=substr(strtolower(preg_replace('#([\W_]+)#','-',$_SERVER['REQUEST_URI'])),1);
echo 'google-site-verification: '.$ver;
?>