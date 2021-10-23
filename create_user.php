<?php

require_once __DIR__ . '/config.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$ogr_no = $_POST['studentno'];
$tel_no = $_POST['telno'];

$durum = true;

if(isset($name) and isset($surname) and isset($email) and isset($ogr_no) and isset($tel_no)){
    $db = new Connect();
    echo "Bağlantı başarılı <br/>";
}else{
    $durum = false;
    header("HTTP/1.1 337 LEET");
}

$check = $db->prepare("select * from users where student_no = '$ogr_no'");
$check->execute();

while($data = $check->fetch(PDO::FETCH_ASSOC)){
    echo($data['name'] . " Zaten kayıt olmuşsun <br/>");
    echo "İşlem Engellendi<br/>";
    $durum = false;
}


if($durum){
    $insert = $db->prepare("insert into users (name , surname , email , student_no , tel_no) values
     ('$name' , '$surname' , '$email' , '$ogr_no' , '$tel_no')");
    $insert->execute();
    header("HTTP/1.1 200 OK");
}else{
    header("HTTP/1.1 337 LEET");
}

?>