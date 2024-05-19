<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jk = htmlspecialchars($_POST['jk']);
    $asal_sekolah = htmlspecialchars($_POST['asal_sekolah']);
    $email = htmlspecialchars($_POST['email']);
    $no_telepon = htmlspecialchars($_POST['no_telepon']);

    // Validasi
    if (!empty($nama) && !empty($alamat) &&!empty($ttl) && !empty($jk) && !empty($asal_sekolah) && !empty($email) && !empty($no_telepon)) {
        // Koneksi ke database
        include("db.php");
        // Membuat database jika belum ada
        $sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($conn->query($sql_create_db) === TRUE) {
            echo "Database berhasil dibuat atau sudah ada!";
        } else {
            echo "Error: " . $sql_create_db . "<br>" . $conn->error;
        }

        // Memilih database yang akan digunakan
        $conn->select_db($dbname);

        // Membuat tabel jika belum ada
        $sql_create_table = "CREATE TABLE IF NOT EXISTS pendaftar (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(255) NOT NULL,
            alamat TEXT NOT NULL,
            ttl VARCHAR(50) NOT NULL,
            jk ENUM('Laki-laki', 'Perempuan') NOT NULL,
            asal_sekolah VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            no_telepon VARCHAR(20) NOT NULL
        )";
        if ($conn->query($sql_create_table) === TRUE) {
            echo "Tabel berhasil dibuat atau sudah ada!";
        } else {
            echo "Error: " . $sql_create_table . "<br>" . $conn->error;
        }

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $ttl = $_POST['ttl'];
        $jk = $_POST['jk'];
        $asal_sekolah = $_POST['asal_sekolah'];
        $no_telepon = $_POST['no_telepon'];

        // Menyimpan data ke database
        $sql_insert = "INSERT INTO pendaftar (nama, alamat, ttl, jk, asal_sekolah, email, no_telepon) VALUES ('$nama', '$alamat', '$ttl', '$jk', '$asal_sekolah', '$email', '$no_telepon')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "onclick=\"return confirm('Data Akan Disimpan!')\">Simpan</a>";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }

        $conn->close();

        header("Location: view.php");
        exit();
    } else {
        echo "Semua field harus diisi!";
    }
} else {
    echo "Metode request tidak valid.";
}
