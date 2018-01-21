<?php
if(isset($_SESSION['LOGIN']) && (isset($_SESSION['USER'])) && (isset($_SESSION['UID']))){
	unset($_SESSION['LOGIN']);
	unset($_SESSION['USER']);
	unset($_SESSION['KEY']);
	unset($_SESSION['UID']);
	$notice->addSuccess("Successfully logout !");
	header("location:".$GLOBALS['_CONF']['HTTP']."");
}
elseif(!isset($_SESSION['LOGIN']) && (!isset($_SESSION['USER'])) && (!isset($_SESSION['UID']))){
	header("location:".$GLOBALS['_CONF']['HTTP']."");
}
?>