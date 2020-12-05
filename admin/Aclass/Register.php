<?php

namespace Aclass;

class Register
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function Register($name,$email,$pass)
    {

        $check = $this->conn->query("INSERT INTO `users` (name, email, pass) VALUES ('$name', '$email','$pass')");
        if ($check) {
            header('Location: ../admin/login.html');
        }
    }
}
