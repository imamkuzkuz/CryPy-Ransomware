<?php

session_start();
if(isset($_SESSION['LOGIN'])){
    $address = $_POST['address'];
    $callback = $_POST['callback'];
    $price = $_POST['price'];

    if(!empty($address) && !empty($callback) && !empty($price)) {
        $sql = @mysql_query("UPDATE `settings` SET `btc_address` = '".$address."', `price` = '".$price."', `callback_url` = '".$callback."';");
        if($sql) {
            $notice->addSuccess("Submited Successfully !");
            header("location:".$GLOBALS['_CONF']['HTTP']."?page=setting");
        }
    } else {
        $notice->addError("Please insert correctly !");
        header("location:".$GLOBALS['_CONF']['HTTP']."?page=setting");
    }
} else {
	header("location: ".$GLOBALS['_CONF']['HTTP']);
}
?>