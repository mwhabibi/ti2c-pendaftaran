<?php
require 'vendor/autoload.php';

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jk = htmlspecialchars($_POST['jk']);
    $asal_sekolah = htmlspecialchars($_POST['asal_sekolah']);
    $email = htmlspecialchars($_POST['email']);
    $no_telepon = htmlspecialchars($_POST['no_telepon']);

    
    // Validasi sederhana
    if (!empty($nama) && !empty($alamat) &&!empty($ttl) && !empty($jk) && !empty($asal_sekolah) && !empty($email) && !empty($no_telepon)) {
        $sql = "UPDATE pendaftar SET nama='$nama', alamat='$alamat', ttl='$ttl', jk='$jk', asal_sekolah='$asal_sekolah', email='$email', no_telepon='$no_telepon' WHERE id=$id";
        
        $conn->select_db($dbname);

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil diperbarui!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Semua field harus diisi!";
    }
}

// Menutup koneksi
$conn->close();

