<?php


namespace Aclass;

class Login
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function Login($email,$pass)
    {

        $check = $this->conn->query("SELECT * FROM users WHERE email='$email' AND pass='$pass'");
        if ( $check->fetchColumn() > 0) {
            $_SESSION['loggedin'] = $email;

            header("Location: ../admin/dashboard.php");
        }
    }
}
