<?php
session_start();
require_once 'db.php';
class Account
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login($username,$password)
    {
        $sql = "SELECT username,password FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($this->db,$sql);
        if (mysqli_num_rows($result)>0){
            $_SESSION['username'] = $_POST['username'];
            header('Location: result.php');
        }

    }
}