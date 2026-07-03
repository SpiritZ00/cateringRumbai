<?php
require_once 'config/koneksi.php';

class MenuModel
{

    public function getAll()
    {
        global $conn;
        $query = mysqli_query($conn, "SELECT * FROM menu ORDER BY id ASC");
        return $query;
    }

    public function getById($id)
    {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id);
        $query = mysqli_query($conn, "SELECT * FROM menu WHERE id = '$id'");
        return mysqli_fetch_assoc($query);
    }

    public function tambah($data)
    {
        global $conn;
        $nama    = mysqli_real_escape_string($conn, $data['nama_paket']);
        $desk    = mysqli_real_escape_string($conn, $data['deskripsi']);
        $harga   = mysqli_real_escape_string($conn, $data['harga']);
        $satuan  = mysqli_real_escape_string($conn, $data['satuan']);
        $gambar  = mysqli_real_escape_string($conn, $data['gambar']);

        mysqli_query($conn, "INSERT INTO menu (nama_paket, deskripsi, harga, satuan, gambar) 
                             VALUES ('$nama', '$desk', '$harga', '$satuan', '$gambar')");
    }

    public function update($id, $data)
    {
        global $conn;
        $id      = mysqli_real_escape_string($conn, $id);
        $nama    = mysqli_real_escape_string($conn, $data['nama_paket']);
        $desk    = mysqli_real_escape_string($conn, $data['deskripsi']);
        $harga   = mysqli_real_escape_string($conn, $data['harga']);
        $satuan  = mysqli_real_escape_string($conn, $data['satuan']);
        $gambar  = mysqli_real_escape_string($conn, $data['gambar']);

        mysqli_query($conn, "UPDATE menu SET 
                             nama_paket='$nama', deskripsi='$desk', harga='$harga', 
                             satuan='$satuan', gambar='$gambar' 
                             WHERE id='$id'");
    }

    public function hapus($id)
    {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id);
        mysqli_query($conn, "DELETE FROM menu WHERE id = '$id'");
    }
}
