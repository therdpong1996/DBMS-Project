<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require_once 'Database.class.php';
	require_once 'Firebase.class.php';

	$_DB['host'] = 'localhost';
	$_DB['username'] = 'root';
	$_DB['password'] = 'VLgo8Asi2Q';
	$_DB['database'] = 'admin_dbms';

	$loop_db = 1000;

	$firebase_url = "https://therdpong-dbms.firebaseio.com";

	$db = new Database($_DB['host'], $_DB['username'], $_DB['password'], $_DB['database']);
	$fb = new Firebase($firebase_url);

	if (!empty($_GET['temp']) and !empty($_GET['humi'])) {
		$date = date("Y-m-d");
		$time = date("H:i:s");
		$data = ['temp'=>$_GET['temp'], 'humi'=>$_GET['humi']];
		$f_r =  $fb->write("data/".$date."/".$time, $data);
		$db_r = $db->loopdatabase($loop_db, $data);

	}