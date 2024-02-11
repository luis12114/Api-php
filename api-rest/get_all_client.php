<?php
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: GET, POST, DELETE');
 header("Access-Control-Allow-Headers: X-Requested-With");
 
 require_once('../includes/Client.class.php');
 if($_SERVER['REQUEST_METHOD']=='GET'){
    Client::get_all_client();
 }
?>