<?php
require_once 'app/models/AuthModel.php';

class AuthController
{
    private $model;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->model = new AuthModel();
    }

    public function login()
    {
        include 'app/views/auth/login.php';
    }

    public function prosesLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->checkLogin($email, $password);

        if ($user) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['jabatan'] = $user['jabatan'];
            $_SESSION['email'] = $user['email'];

            header('Location: index.php?aksi=index');
        } else {
            echo "<script>alert('Email atau Password salah!'); window.location.href='index.php?aksi=login';</script>";
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php?aksi=frontend');
        exit;
    }

    public function list_user()
    {
        if ($_SESSION['jabatan'] !== 'admin') {
            echo "<script>alert('Akses Ditolak! Anda bukan Admin.'); window.location.href='index.php?aksi=index';</script>";
            exit;
        }
        $users = $this->model->getAllUsers();
        include 'app/views/auth/list_user.php';
    }

    public function register()
    {
        include 'app/views/auth/register.php';
    }

    public function prosesRegister()
    {
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $this->model->insertUser($nama, $jabatan, $email, $password);
        echo "<script>alert('User berhasil didaftarkan!'); window.location.href='index.php?aksi=list_user';</script>";
    }

    public function edit_user()
    {
        $id = $_GET['id'];
        $user = $this->model->getUserById($id);
        include 'app/views/auth/edit_user.php';
    }

    public function update_user()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $this->model->updateUser($id, $nama, $email, $password);
        header('Location: index.php?aksi=list_user');
    }

    public function hapus_user()
    {
        $id = $_GET['id'];
        $this->model->deleteUser($id);
        header('Location: index.php?aksi=list_user');
    }
}
