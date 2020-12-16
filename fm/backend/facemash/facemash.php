<?php
header("Access-Control-Allow-Origin: *");
init();

function init(){
    $inp_data = getElements();
    if($inp_data != "nothing"){
        setPoints($inp_data);
    }
    $out_data = loadContent();
    while($out_data[0] == $out_data[1]){
        $out_data = loadContent();
    }
    echo json_encode(array(
        "img1" => $out_data[0],
        "img2" => $out_data[1]
    ));
}

function getElements(){
    return $_REQUEST['id'];
}

function loadContent(){
    $output = [];
    $length = getLength();
    $output[0] = rand(1, $length);
    $output[1] = rand(1, $length);
    return $output;
}

function getLength(){
    $sql = "SELECT COUNT(*) AS anz FROM entrys";
    $result = conn()->query($sql);
    $row = mysqli_fetch_assoc($result);
    return $row['anz'];
}

function setPoints($data){
    $sql = "SELECT * FROM entrys WHERE ID = '$data'";
    $result = conn()->query($sql);
    $row = mysqli_fetch_assoc($result);
    $curr_Rank = ($row['Rank']+1);

    $update = "UPDATE entrys SET Rank = '$curr_Rank' WHERE ID = '$data';";
        mysqli_query(conn(), $update);
    }

function conn(){
    $servername = "e106545-mysql.services.easyname.eu";
    $usn = "u167735db1";
    $dbname = "u167735db1";
    $password = "123456";
    $conn = new mysqli($servername, $usn, $password, $dbname);
    return $conn;
}