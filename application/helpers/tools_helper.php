<?php

function ajaxReturn($msg, $status, $data = array()){
    exit(json_encode(array('msg'=>$msg, 'status'=>$status,'data'=>$data )));
}


function print_var($param){
    echo '<pre>';
    print_r($param);
    echo '<pre>';
}

 ?>
