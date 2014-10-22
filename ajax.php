<?php
include_once('mysql_operation.php');

//echo $_POST['north']."<br>";
//echo $_POST['east']."<br>";

$db->insert('location',array('north'=>$_POST['north'],'east'=>$_POST['east']));
?>