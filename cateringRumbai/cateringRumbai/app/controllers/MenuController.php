<?php
require_once 'app/models/MenuModel.php';

class MenuController
{

    private $model;

    public function __construct()
    {
        $this->model = new MenuModel();
    }

    public function index()
    {
        $menu = $this->model->getAll();
        include 'app/views/menu/index.php';
    }

    public function tambah()
    {
        include 'app/views/menu/form.php';
    }

    public function simpan()
    {
        $data = [
            'nama_paket' => $_POST['nama_paket'],
            'deskripsi'  => $_POST['deskripsi'],
            'harga'      => $_POST['harga'],
            'satuan'     => $_POST['satuan'],
            'gambar'     => $_POST['gambar'],
        ];
        $this->model->tambah($data);
        header('Location: index.php?aksi=list_menu');
        exit;
    }

    public function edit()
    {
        $id   = $_GET['id'];
        $menu = $this->model->getById($id);
        include 'app/views/menu/form.php';
    }

    public function update()
    {
        $id   = $_POST['id'];
        $data = [
            'nama_paket' => $_POST['nama_paket'],
            'deskripsi'  => $_POST['deskripsi'],
            'harga'      => $_POST['harga'],
            'satuan'     => $_POST['satuan'],
            'gambar'     => $_POST['gambar'],
        ];
        $this->model->update($id, $data);
        header('Location: index.php?aksi=list_menu');
        exit;
    }

    public function hapus()
    {
        $id = $_GET['id'];
        $this->model->hapus($id);
        header('Location: index.php?aksi=list_menu');
        exit;
    }
}
