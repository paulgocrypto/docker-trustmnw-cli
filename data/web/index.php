<?php 

$json = file_get_contents(__DIR__.'/../tmp/trustmnw-stats.json');

$data = json_decode($json, true);

$connected  = $data['connected']??false;

if ( $connected !== true){

	header("HTTP/1.1 404 Not Found");

	echo 'Disconnected';
}else{
	echo 'Connected: '.$data['lastReportDate'];
}
