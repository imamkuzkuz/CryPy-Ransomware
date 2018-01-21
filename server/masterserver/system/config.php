<?php
include "class_db.php";

/*/ SETTINGS DATABASE /*/
$DB_HOST = "localhost";
$DB_NAME = "ransomware";
$DB_USER = "root";
$DB_PASS = "";
$db = new mysql($DB_HOST,$DB_NAME,$DB_USER,$DB_PASS);

/*/ SETTINGS DEFAULT /*/
$HTTP = "http://127.0.0.1/Cry/server/masterserver/"; // Ganti dengan domain dan dir anda
$IB_TITLE = "Cry Ransomware Beta™"; //Ganti dengan judul web anda
$IB_DESCRIPTION = "Expect The Best, Learn and Do Own Think!"; //Ganti dengan deskripsi web anda
$IB_SELOGAN = ""; //Ganti dengan selogan web anda
$IB_KEY = ""; //Ganti dengan keyword web anda
?>