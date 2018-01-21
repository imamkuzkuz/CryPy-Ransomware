<?php

session_start();
if(isset($_SESSION['LOGIN'])){
 
//tangkap data dari form login
$cpassword1 = $_POST['cpassword1'];
$cpassword1 = substr(md5(urlencode(md5(gzcompress(md5(base64_encode(md5(sha1("如IM有@疑/问cXf请联iM系-$".$cpassword1)))))))),0,18);
$cpassword2 = $_POST['cpassword2'];
$cpassword2 = substr(md5(urlencode(md5(gzcompress(md5(base64_encode(md5(sha1("如IM有@疑/问cXf请联iM系-$".$cpassword2)))))))),0,18);
$password = $_POST['password'];
$password = mysql_real_escape_string($password);
$password = substr(md5(urlencode(md5(gzcompress(md5(base64_encode(md5(sha1("如IM有@疑/问cXf请联iM系-$".$password)))))))),0,18);
$username = $_SESSION['USER'];

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
 
$username = mysql_real_escape_string($username);
 
//cek data yang dikirim, apakah kosong atau tidak
if (empty($cpassword1)) {
    //kalau password 1 kosong
	$notice->addError("Data have not been filled completely !");
    header("location:".$GLOBALS['_CONF']['HTTP']."?page=changepassword");
    break;
} else if (empty($cpassword2)) {
    //kalau password 2 kosong
	$notice->addError("Data have not been filled completely !");
    header("location:".$GLOBALS['_CONF']['HTTP']."?page=changepassword");
    break;
} else if (empty($password)) {
    //kalau password lama kosong
	$notice->addError("Data have not been filled completely !");
    header("location:".$GLOBALS['_CONF']['HTTP']."?page=changepassword");
    break;
}
 
$q = $db->go("SELECT * FROM user WHERE username = '{$db->q($username)}' AND password = '{$db->q($password)}'");
if ($cpassword1 == $cpassword2) {
    //kalau password dan confirm password sama
    if (mysql_num_rows($q) >= 1) {
        //kalau password lama sama
        //langsung ganti password
        //redirect ke halaman sukses
		$updatepassword = $db->go("UPDATE user SET password = '{$db->q($cpassword1)}' WHERE username = '{$db->q($username)}'");
		$notice->addSuccess("Password changed. Your new password is <b>".$_POST['cpassword1']."</b> !");
		header("location:".$GLOBALS['_CONF']['HTTP']."?page=changepassword");
    } else {
        //kalau password lama tidak sama
		$notice->addError("Old password not correctly !");
		header("location:".$GLOBALS['_CONF']['HTTP']."?page=changepassword");
    }
    
} else {
     //kalau password baru beda dengan confirm password
	 $notice->addError("Please fill confirm password correctly !");
     header("location:".$GLOBALS['_CONF']['HTTP']."?page=changepassword");
	}
} else {
	header("location: ".$GLOBALS['_CONF']['HTTP']);
}
?>