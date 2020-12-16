<?php

include "mysql.php";

function init(){
    $request = $_REQUEST['request'];

    if($request == true){
        $max = getMax();
        $response = array(
            "max" => $max,
            "status" => true
        );
    }
}

function getMax(){
    $sql = "SELECT COUNT(*) AS max FROM entrys";
    $result = $GLOBALS['conn']->query($sql);
    $row = mysqli_fetch_assoc($result);
    return $row['max'];
}

init();

