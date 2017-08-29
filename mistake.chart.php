<?php
		
	header('Access-Control-Allow-Origin: *');

	$_DB['host'] = 'localhost';
	$_DB['username'] = ''; //username connect database
	$_DB['password'] = ''; //password connect database
	$_DB['database'] = ''; //tablename database

	$conn = mysqli_connect($_DB['host'], $_DB['username'], $_DB['password'], $_DB['database']);
	mysqli_set_charset($conn,"utf8");

	$result['error'] = array();
	$result['time'] = array();

	$data = mysqli_query($conn, "SELECT * FROM ( SELECT * FROM mistake ORDER BY time DESC LIMIT 10 ) sub ORDER BY id ASC");
	while ($d = mysqli_fetch_assoc($data)) {
		$result['lasttime'] = $d['time'];
		array_push($result['error'], $d['error']);
		array_push($result['time'], date('H:i:s d/m/Y', $d['time']));
	}

	echo json_encode($result);