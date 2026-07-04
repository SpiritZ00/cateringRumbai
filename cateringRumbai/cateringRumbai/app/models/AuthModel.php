<?php
require_once 'config/koneksi.php';

class AuthModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function checkLogin($email, $password)
    {
        $query = mysqli_query($this->conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
        return mysqli_fetch_assoc($query);
    }

    public function insertUser($nama, $jabatan, $email, $password)
    {
        $query = "INSERT INTO users (nama, jabatan, email, password) VALUES ('$nama', '$jabatan', '$email', '$password')";
        return mysqli_query($this->conn, $query);
    }

    public function getAllUsers()
    {
        $query = mysqli_query($this->conn, "SELECT * FROM users ORDER BY id DESC");
        $users = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $users[] = $row;
        }
        return $users;
    }
    public function getUserById($id)
    {
        $query = mysqli_query($this->conn, "SELECT * FROM users WHERE id='$id'");
        return mysqli_fetch_assoc($query);
    }

    public function updateUser($id, $nama, $email, $password)
    {
        if (empty($password)) {
            $query = "UPDATE users SET nama='$nama', email='$email' WHERE id='$id'";
        } else {
            $query = "UPDATE users SET nama='$nama', email='$email', password='$password' WHERE id='$id'";
        }
        return mysqli_query($this->conn, $query);
    }

    public function deleteUser($id)
    {
        return mysqli_query($this->conn, "DELETE FROM users WHERE id='$id'");
    }
}
