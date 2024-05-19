<?php
require 'vendor/autoload.php';

// Koneksi ke database
$servername = "localhost";
$username = "root"; // sesuaikan dengan user MySQL Anda
$password = ""; // sesuaikan dengan password MySQL Anda
$dbname = "pendaftaran";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Menghapus data pendaftaran dari database
    $sql = "DELETE FROM pendaftar WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil dihapus! Klik OK jika anda ingin kembali!'); window.location.href = 'view.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Metode request tidak valid atau ID tidak ditemukan.";
}

// Menutup koneksi
$conn->close();
