<?php
$servername = "localhost";
$username = "root"; // sesuaikan dengan user MySQL Anda
$password = ""; // sesuaikan dengan password MySQL Anda
$dbname = "pendaftaran";

$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
    }
