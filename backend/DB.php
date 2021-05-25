<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
header('Access-Control-Max-Age: 1000');
header('Content-Type: application/json, charset=utf-8');
header('Access-Control-Allow-Methods: PUT, POST, GET,DELETE, OPTIONS');

define("USERNAME",'root');
define("PASSWORD",'');
define("DATABASE",'conception');
define("HOST",'localhost');

function connectToDatabase(){
    try {
        $conn = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //print_r($conn->getAttribute(PDO::ATTR_CONNECTION_STATUS));       
        return $conn;
    }catch(PDOException $e){
        return "Connection failed: " . $e->getMessage();
    }
}

$conn = connectToDatabase();

?>
	