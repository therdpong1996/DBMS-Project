<?php
		
	header('Access-Control-Allow-Origin: *');

	$_DB['host'] = 'localhost';
	$_DB['username'] = 'root';
	$_DB['password'] = 'VLgo8Asi2Q';
	$_DB['database'] = 'admin_dbms';

	$conn = mysqli_connect($_DB['host'], $_DB['username'], $_DB['password'], $_DB['database']);
	mysqli_set_charset($conn,"utf8");

	if ($_POST['temp'] and $_POST['humi']) {
		$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM display_data LIMIT 1"));
		echo json_encode($data);
	}
