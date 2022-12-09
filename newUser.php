<?php
require_once 'db-connection.php';

class RegisterContact {
    public $conn;
    
    function __construct($connection) {
        $this->conn = $connection;
    }

    function validateExistingEmailAddress($email) 
    {
        $query = $this->conn->prepare('SELECT user_id FROM usuarios WHERE email = :email');
        $query->bindParam(':email',$email);
        $query->execute();
        $count=$query->rowCount();
        
        return $count > 0;
    }

    function createContact()
    {
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $celular=$_POST['celular'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        if ($this->validateExistingEmailAddress($email)) {
            $return_arr[] = array(
                "status" => 'ERROR',
                "message" => "Esta dirección de correo ya esta en uso "
            );
            header('Content-Type: application/json;charset=utf-8');
            echo json_encode($return_arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            return;
        }

        $query = $this->conn->prepare("INSERT INTO usuarios
        (nombre, apellido, celular, email, pass) 
        values (:nombre, :apellido, :celular, :email, :pass)");

        //se asocian los parametros con las variables
        $result = $query->execute(array(
            'nombre' => $nombre, 
            'apellido' => $apellido,
            'celular' => $celular,
            'email' => $email,
            'pass' => $pass
        ));

        $return_arr[] = array(
            "status" => 'SUCCESS',
            "message" => "Usuario registrado con éxito"
        );
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($return_arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        //se responde a ajax con un echo 
    }
}

$register = new RegisterContact($cnnPDO);
$register->createContact();
?>