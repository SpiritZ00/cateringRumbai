<?php
require_once 'app/models/PesananModel.php';

class PesananController
{
    private $model;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->model = new PesananModel();
    }

    private function cekLogin()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?aksi=login');
            exit;
        }
    }

    public function index()
    {
        $this->cekLogin();
        $pesanan = $this->model->getAll();
        include 'app/views/pesanan/index.php';
    }

    public function tambah()
    {
        global $conn;
        $menu = mysqli_query($conn, "SELECT * FROM menu ORDER BY id ASC");
        include 'app/views/pesanan/tambah.php';
    }

    public function simpan()
    {
        $this->cekLogin();
        $nama           = $_POST['nama'];
        $tanggal_pesan  = $_POST['tanggal_pesan'];
        $jumlah_porsi   = $_POST['jumlah_porsi'];
        $jenis_konsumsi = $_POST['jenis_konsumsi'];
        $tempat         = $_POST['tempat'];
        $nomor_telepon  = $_POST['nomor_telepon'];
        $catatan        = $_POST['catatan'];

        $harga_satuan = $this->model->getHargaMenu($jenis_konsumsi);
        $total_harga  = $harga_satuan * $jumlah_porsi;

        $this->model->insert($nama, $tanggal_pesan, $jumlah_porsi, $jenis_konsumsi, $tempat, $nomor_telepon, $catatan, $total_harga);
        header('Location: index.php?aksi=index');
    }

    public function edit()
    {
        $this->cekLogin();
        $id = $_GET['id'];
        $pesanan = $this->model->getById($id);
        include 'app/views/pesanan/edit.php';
    }

    public function update()
    {
        $this->cekLogin();
        $id             = $_POST['id'];
        $nama           = $_POST['nama'];
        $tanggal_pesan  = $_POST['tanggal_pesan'];
        $jumlah_porsi   = $_POST['jumlah_porsi'];
        $jenis_konsumsi = $_POST['jenis_konsumsi'];
        $tempat         = $_POST['tempat'];
        $nomor_telepon  = $_POST['nomor_telepon'];
        $catatan        = $_POST['catatan'];

        $harga_satuan = $this->model->getHargaMenu($jenis_konsumsi);
        $total_harga  = $harga_satuan * $jumlah_porsi;

        $this->model->update($id, $nama, $tanggal_pesan, $jumlah_porsi, $jenis_konsumsi, $tempat, $nomor_telepon, $catatan, $total_harga);
        header('Location: index.php?aksi=index');
    }

    public function hapus()
    {
        $this->cekLogin();
        $id = $_GET['id'];
        $this->model->delete($id);
        header('Location: index.php?aksi=index');
    }

    public function frontend()
    {
        global $conn;
        $pesanan = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY tanggal_pesan DESC");
        $menu    = mysqli_query($conn, "SELECT * FROM menu ORDER BY id ASC");
        include 'app/views/frontend/depan.php';
    }
    public function about()
    {
        include 'app/views/about.php';
    }

    public function contact()
    {
        include 'app/views/contact.php';
    }
}
