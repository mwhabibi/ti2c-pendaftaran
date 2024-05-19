<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
    <!-- Bootstrap CSS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('./image/background.jpeg')
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 text-white">Daftar Mahasiswa Baru</h1>
        <a href="index.php" class="btn btn-success mt-3">Home</a>
        <a href="input.php" class="btn btn-success mt-3">Daftar</a>
        <a href="export.php" class="btn btn-success mt-3">Export to XLSX</a>
        <br>
        <a>.</a>
        <table class="table table-white table-bordered text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tempat, Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Sekolah Asal</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'vendor/autoload.php';

                include("db.php");

                $conn->select_db($dbname);

                $sql = "SELECT * FROM pendaftar";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $no . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td>" . $row["ttl"] . "</td>";
                        echo "<td>" . $row["jk"] . "</td>";
                        echo "<td>" . $row["asal_sekolah"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["no_telepon"] . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=".$row["id"]."' class='btn btn-primary btn-sm'>Edit</a> ";
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='delete.php?id=".$row["id"]."' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah kamu yakin ingin menghapus data ini?')\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data pendaftaran</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <footer style=" color: white; padding: 20px; text-align: center;">
        <div style="max-width: 1200px; margin: auto;">
            <nav><br><br><br>    
            <p>&copy; 2024 mwhabibi.</p>
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
