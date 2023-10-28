<?php
/*
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
*/

//$json         = file_get_contents(__DIR__ . '/../tmp/trustmnw-stats.json');
$json           = file_get_contents('/storage/trustmnw/data/tmp/trustmnw-stats.json');
$data           = json_decode($json, true);
$connected      = $data['connected'] ?? false;
$currentDate    = new DateTime('now');
$lastReportDate = new DateTime($data['lastReportDate']);
$status         = 'Connected';
$link           = '<br /><a href="http://trustmnw.paulgroeneweg.nl:2812/">Monit</a>';

if ( $connected !== true){

    header("HTTP/1.1 404 Not Found");
    $status = 'Disconnected';

}elseif ( $lastReportDate < $currentDate->modify('-5 MINUTES') ) {

    header("HTTP/1.1 404 Not Found");
    $status = 'Timed out';

}else{

    $link = null;
}

echo '<h1>'.$status.'</h1> ';
echo $lastReportDate->format('d-m-Y H:i:s');
echo $link;

