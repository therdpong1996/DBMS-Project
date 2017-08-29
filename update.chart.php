<?php
		
	header('Access-Control-Allow-Origin: *');

	$_DB['host'] = 'localhost';
	$_DB['username'] = ''; //username connect database
	$_DB['password'] = ''; //password connect database
	$_DB['database'] = ''; //tablename database

	$conn = mysqli_connect($_DB['host'], $_DB['username'], $_DB['password'], $_DB['database']);
	mysqli_set_charset($conn,"utf8");

	$result['temp'] = array();
	$result['time'] = array();
	$result['humi'] = array();

	$last = $_POST['lasttime'];
	
	$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM log_datas WHERE time > $last ORDER BY time ASC LIMIT 1"));
	if ($data) {
		$data['r'] = 1;
		$data['strtime'] = date('H:i:s d/m/Y', $data['time']);
		echo json_encode($data);
	}else{
		$data['r'] = 0;
		echo json_encode($data);
	}