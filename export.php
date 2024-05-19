<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

include("db.php");

$conn->select_db($dbname);

$sql = "SELECT * FROM pendaftar";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Membuat spreadsheet baru
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Alamat');
    $sheet->setCellValue('D1', 'Tempat, Tanggal Lahir');
    $sheet->setCellValue('E1', 'Jenis Kelamin');
    $sheet->setCellValue('F1', 'Asal Sekolah');
    $sheet->setCellValue('G1', 'Email');
    $sheet->setCellValue('H1', 'NO. Telepon');

    $rowNumber = 2;
    while($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A'.$rowNumber, $row['id']);
        $sheet->setCellValue('B'.$rowNumber, $row['nama']);
        $sheet->setCellValue('C'.$rowNumber, $row['alamat']);
        $sheet->setCellValue('D'.$rowNumber, $row['ttl']);
        $sheet->setCellValue('E'.$rowNumber, $row['jk']);
        $sheet->setCellValue('F'.$rowNumber, $row['asal_sekolah']);
        $sheet->setCellValue('G'.$rowNumber, $row['email']);
        $sheet->setCellValue('H'.$rowNumber, $row['no_telepon']);
        $rowNumber++;
    }

    // Mengatur gaya untuk seluruh sel
    $styleArray = [
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
            ],
        ],
    ];
    $sheet->getStyle('A1:H'.$rowNumber)->applyFromArray($styleArray);

    // Mengatur lebar kolom agar menyesuaikan dengan konten
    foreach(range('A', 'H') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Menyimpan spreadsheet ke file
    $writer = new Xlsx($spreadsheet);
    $filename = 'pendaftaran_mahasiswa_baru.xlsx';
    $writer->save($filename);

    // Mengarahkan pengguna untuk mengunduh file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
} else {
    echo "Tidak ada data pendaftaran.";
}

// Menutup koneksi
$conn->close();

