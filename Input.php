<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('./image/background.jpeg');
        }
    </style>
</head>

<body>
    <div class="container text-white">
        <h1 class="mt-5">Form Pendaftaran</h1>
        <form action="submit.php" method="post" class="mt-3">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control bg-dark-subtle" placeholder="Masukkan Nama Lengkap Anda!" required>
            </div><br>
            <div class="form-group">
                <label for="alamat" class="label">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control bg-dark-subtle" required></textarea>
            </div><br>
            <div class="form-group">
                <label for="ttl" class="label">Tempat Tanggal Lahir:</label>
                <input type="text" id="ttl" name="ttl" class="form-control bg-dark-subtle" required>
            </div><br>
            <div class="form-group">
                <label for="jk" class="label">Jenis Kelamin:</label>
                <select id="jk" name="jk" class="form-control bg-dark-subtle" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="asal_sekolah">Sekolah Asal:</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control bg-dark-subtle" required>
            </div><br>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control bg-dark-subtle" placeholder="name@example.com" required>
            </div><br>
            <div class="form-group">
                <label for="no_telepon">No. Telepone:</label>
                <input type="tel" id="no_telepon" name="no_telepon" class="form-control bg-dark-subtle" required>
            </div><br>
            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda sudah yakin ingin mendaftar?')">Daftar</button>
        </form>
    </div>
    <footer style="color: white; padding: 20px; text-align: center;">
        <div style="max-width: 1200px; margin: auto;">
            <nav>
                <p>&copy; 2024 mwhabibi.</p>
                <a href="index.php" style="color: #fff; text-decoration: none; margin: 0 15px;">Home</a>
            </nav>
            <a class="text-center text-decoration-none">Contact us:</a>
            <div style="margin-top: 20px;">
                <a class="text-decoration-none" href="https://wa.me/+6281354734132" style="color: #fff; margin: 0 10px;">
                    <img src="./image/whatsapp-icon.png" alt="Whatsapp" style="width: 24px;">
                </a>
                <a class="text-decoration-none" href="https://www.instagram.com/mwhabibi_/" style="color: #fff; margin: 0 10px;">
                    <img src="./image/instagram-icon.png" alt="Instagram" style="width: 24px;">
                </a>
                <a class="text-decoration-none" href="https://github.com/mwhabibi/" style="color: #fff; margin: 0 10px;">
                    <img src="./image/github-icon.png" alt="Github" style="width: 24px;">
                </a>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS and dependencies -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>