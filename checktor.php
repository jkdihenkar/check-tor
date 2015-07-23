<?php

function IsTorExitPoint(){
    if (gethostbyname(ReverseIPOctets($_SERVER['REMOTE_ADDR']).".".$_SERVER['SERVER_PORT'].".".ReverseIPOctets($_SERVER['SERVER_ADDR']).".ip-port.exitlist.torproject.org")=="127.0.0.2") {
        //echo 'Using TOR';
        return true;
    } else {
    	//echo 'Not Using TOR';
       return false;
    } 
}

function ReverseIPOctets($inputip){
    $ipoc = explode(".",$inputip);
    return $ipoc[3].".".$ipoc[2].".".$ipoc[1].".".$ipoc[0];
}

$start = microtime(true);

//echo "Tor Check Service :: " ;
$var = IsTorExitPoint();

$time_elapsed_secs = microtime(true) - $start;

$arr = array('using_tor : ' => $var , 'ip-addr' => $_SERVER['REMOTE_ADDR']);





//echo '<br>'; 

//echo 'Your IP Address Appears to be :';
//echo  $_SERVER['REMOTE_ADDR'];

echo json_encode($arr);


echo '<br>';
echo 'time elapsed for checking TOR : '. ($time_elapsed_secs*1000) . 'ms';




?>
