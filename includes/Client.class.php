<?php
require_once('Database.class.php');
class Client
{
    public static function create_client($email, $name, $city, $telephone)
    {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('INSERT INTO listado_clientes(email, name, city, telephone)
        VALUES(:email, :name, :city, :telephone)');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':telephone', $telephone);

        if ($stmt->execute()) {
            header('HTTP/1.1 201 Client Create successfully');
        } else {
            header('HTTP/1.1 404 Client not Create successfully');
        }
    }
    public static function delete_client_by_id($id){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('DELETE FROM listado_clientes WHERE id=:id');
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header('HTTP/1.1 201 Client Delete successfully');
        } else {
            header('HTTP/1.1 404 Client not Delete successfully');
        }
    }

    public static function  get_all_client(){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('SELECT * FROM listado_clientes');
        if ($stmt->execute()) {
            $result = $stmt->fetchAll();
            echo json_encode($result);
            header('HTTP/1.1 201 OK');
        } else {
            header('HTTP/1.1 404 Not Get Client  successfully');
        }
    }

    public static function update_client($id, $email, $name, $city, $telephone ){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('UPDATE listado_clientes SET email=:email, name=:name, city=:city, telephone=:telephone WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':telephone', $telephone);
        if ($stmt->execute()) {
            header('HTTP/1.1 201 Client Update successfully');
        } else {
            header('HTTP/1.1 404 Client not Update successfully');
        }
    }
}
