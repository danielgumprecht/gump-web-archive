<?php

function init(){
    $data = getData();

    echo array(
        "status" => "unkonwn"
    );
}

function getData(){
    return $_REQUEST['b64Data'];
}

init();