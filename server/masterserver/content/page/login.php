<?php
if(isset($_POST['login']) && (isset($_POST['username'])) && (isset($_POST['password']))){
	if(isset($_POST['login']) && (!empty($_POST['username'])) && (!empty($_POST['password']))){
		$db->go("SELECT * FROM user WHERE username = '{$db->q($_POST['username'])}' AND password = '{$db->q(substr(md5(urlencode(md5(gzcompress(md5(base64_encode(md5(sha1("如IM有@疑/问cXf请联iM系-$".$_POST['password'])))))))),0,18))}' LIMIT 1");
		if($db->numRows()>0){
			$data = $db->fetchArray();
			$_SESSION['LOGIN']  = date("dmYhis");
			$_SESSION['USER']   = $data['username'];
			$_SESSION['KEY']    = $data['api_key'];
			$_SESSION['UID']    = $data['id'];
			$_SESSION['STATUS'] = $data['status'];
			$notice->addSuccess("Welcome back <strong>".$_POST['username']."</strong> !");
			header("location:".$GLOBALS['_CONF']['HTTP']."");
		} else {
$file1 = fopen(".htaccess","a");
fwrite($file1, 'RewriteCond %{REMOTE_ADDR} ^'.$_SERVER['REMOTE_ADDR'].'$
RewriteRule .* https://www.fbi.gov [R,L]
');
			fclose($file1);
			header("location:".$GLOBALS['_CONF']['HTTP']."");
		}
	} else {
$file1 = fopen(".htaccess","a");
fwrite($file1, 'RewriteCond %{REMOTE_ADDR} ^'.$_SERVER['REMOTE_ADDR'].'$
RewriteRule .* https://www.fbi.gov [R,L]
');
			fclose($file1);
			header("location:".$GLOBALS['_CONF']['HTTP']."");
		}
}