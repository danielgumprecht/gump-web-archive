<?php

include "mysql.php";

function init(){
    insert(getData());
    echo json_encode(array(
        "status" => true
    ));
}

function getData(){
    return $_REQUEST['id'];
}

function insert($data){
    $currRank = Rank($data);
    $sql = "UPDATE entrys SET Rank = '$currRank' WHERE ID = '$data';";
    mysqli_query($GLOBALS['conn'], $sql);
}

function Rank($data){
    $sql = "SELECT * FROM entrys WHERE ID = '$data'";
    $result = $GLOBALS['conn']->query($sql);
    $row = mysqli_fetch_assoc($result);
    return ($row['Rank']+1);
}