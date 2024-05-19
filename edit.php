<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendaftaran</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-image: url('./image/background.jpeg');
    }
</style>

<body>
    <div class="container text-white">
        <h1 class="mt-5">Edit Data Pendaftaran</h1>
        <?php
        require 'vendor/autoload.php';

        include("db.php");

        $conn->select_db($dbname);

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $id = $_GET['id'];

            // Mengambil data pendaftaran berdasarkan ID
            $sql = "SELECT * FROM pendaftar WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <form action="update.php" method="post" class="mt-3">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control bg-dark-subtle" value="<?php echo $row['nama']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" class="form-control bg-dark-subtle" value="<?php echo $row['alamat']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin:</label>
                        <input type="text" id="jk" name="jk" class="form-control bg-dark-subtle" value="<?php echo $row['jk']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="ttl">Tempat, Tanggal Lahir:</label>
                        <input type="text" id="ttl" name="ttl" class="form-control bg-dark-subtle" value="<?php echo $row['ttl']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="asal_sekolah">Asal Sekolah:</label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control bg-dark-subtle" value="<?php echo $row['asal_sekolah']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control bg-dark-subtle" value="<?php echo $row['email']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="no_telepon">No. Telepon:</label>
                        <input type="tel" id="no_telepon" name="no_telepon" class="form-control bg-dark-subtle" value="<?php echo $row['no_telepon']; ?>" required>
                    </div><br>
                    <button type="submit" value="Submit" class="btn btn-primary">Simpan</button>
                    <a href="view.php" class="btn btn-secondary">Batal</a><br>
                </form>
        <?php
            } else {
                echo "Data tidak ditemukan.";
            }
        }
        ?>
    </div>
    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();

            // Get form data
            const formData = new FormData(event.target);

            // Send form data using AJAX
            fetch("update.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        alert("Perubahan berhasil disimpan.");
                        window.location.href = "view.php";
                    } else {
                        throw new Error("Network response was not ok.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat menyimpan perubahan.");
                });
        });
    </script>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>