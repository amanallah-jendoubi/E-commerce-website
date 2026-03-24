<?php
    $dbName='exclusive';
    $password='';
    $host='localhost';
    $userName='root';
    $charset='utf8mb4';
try{
    $conn=new PDO("mysql:host=$host;dbname=$dbName;charset=$charset",$userName,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "connection failed" . $e->getMessage();
}
?>