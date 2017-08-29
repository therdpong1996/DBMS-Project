<?php
		
	header('Access-Control-Allow-Origin: *');

	$_DB['host'] = 'localhost';
	$_DB['username'] = ''; //username connect database
	$_DB['password'] = ''; //password connect database
	$_DB['database'] = ''; //tablename database

	$conn = mysqli_connect($_DB['host'], $_DB['username'], $_DB['password'], $_DB['database']);
	mysqli_set_charset($conn,"utf8");


	if ($_POST['temp'] and $_POST['humi']) {
		$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM display_data LIMIT 1"));
		$data['uptime'] = date('H:i:s d/m/Y');
		echo json_encode($data);
	}
