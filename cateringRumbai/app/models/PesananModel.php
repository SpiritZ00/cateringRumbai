<?php
require_once 'config/koneksi.php';

class PesananModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getAll()
    {
        return mysqli_query($this->conn, "SELECT * FROM pesanan ORDER BY id DESC");
    }

    public function getById($id)
    {
        $query = mysqli_query($this->conn, "SELECT * FROM pesanan WHERE id='$id'");
        return mysqli_fetch_assoc($query);
    }



    // Ambil harga menu berdasarkan nama
    public function getHargaMenu($nama_menu)
    {
        $nama_menu = mysqli_real_escape_string($this->conn, $nama_menu);
        $query = mysqli_query($this->conn, "SELECT harga FROM menu WHERE nama_menu='$nama_menu'");
        $row = mysqli_fetch_assoc($query);
        return $row ? $row['harga'] : 0;
    }

    public function insert($nama, $tanggal_pesan, $jumlah_porsi, $jenis_konsumsi, $tempat, $nomor_telepon, $catatan, $total_harga)
    {
        $query = "INSERT INTO pesanan (nama, tanggal_pesan, jumlah_porsi, jenis_konsumsi, tempat, nomor_telepon, catatan, total_harga)
                  VALUES ('$nama', '$tanggal_pesan', '$jumlah_porsi', '$jenis_konsumsi', '$tempat', '$nomor_telepon', '$catatan', '$total_harga')";
        return mysqli_query($this->conn, $query);
    }

    public function update($id, $nama, $tanggal_pesan, $jumlah_porsi, $jenis_konsumsi, $tempat, $nomor_telepon, $catatan, $total_harga)
    {
        $query = "UPDATE pesanan SET
                    nama='$nama',
                    tanggal_pesan='$tanggal_pesan',
                    jumlah_porsi='$jumlah_porsi',
                    jenis_konsumsi='$jenis_konsumsi',
                    tempat='$tempat',
                    nomor_telepon='$nomor_telepon',
                    catatan='$catatan',
                    total_harga='$total_harga'
                  WHERE id='$id'";
        return mysqli_query($this->conn, $query);
    }

    public function delete($id)
    {
        return mysqli_query($this->conn, "DELETE FROM pesanan WHERE id='$id'");
    }
}
