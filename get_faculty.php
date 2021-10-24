<?php

require_once __DIR__ . '/config.php';

$db = new Connect();
$faculty = array();
$data = $db->prepare("select * from _faculty");
$data->execute();

while($output = $data->fetch(PDO::FETCH_ASSOC)){
    $faculty[$output['id']] = array(
        'id' => $output['id'] , 
        'name' => $output['name']
    );
}
echo json_encode($faculty);
header('Content-Type: application/json charset=utf-8');

?>
