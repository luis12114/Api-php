<?php
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: GET, POST, DELETE');
 header("Access-Control-Allow-Headers: X-Requested-With");
 
 require_once('../includes/Client.class.php');
 if($_SERVER['REQUEST_METHOD']=='DELETE' && isset($_GET ['id'])){
    Client::delete_client_by_id($_GET ['id']);
 }
?>