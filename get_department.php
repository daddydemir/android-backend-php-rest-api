<?php

require_once __DIR__ . '/config.php';

$name = $_POST['id'];

$durum = true;

if(!isset($name)){
    $durum = false;
    
}

if($durum){
    $departments =  array();
    $db = new Connect();
    $data = $db->prepare("select * from _department where faculty_id=$name");
    $data->execute();
    $sayac = 0;

    while($output = $data->fetch(PDO::FETCH_ASSOC)){
        $sayac = $sayac+1;
        $departments[$sayac] = array(
            'name' => $output['name']
        );
    }
    echo json_encode($departments);
    header('Content-Type: application/json charset=utf-8');
}else{
    echo "hata";
    header("HTTP/1.1 337 LEET");
}


?>