<?php
include "../connect.php";
require_once('../vendor/autoload.php');

// Create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Laporan Peminjaman Buku');

// Add a page
$pdf->AddPage();

// Set some content to display
$html = '<h2>Laporan Peminjaman Buku</h2>';
$html .= '<table border="1">';
$html .= '<thead><tr><th>#</th><th>Nama</th><th>Judul</th><th>Tanggal Peminjaman</th><th>Tanggal Pengembalian</th><th>Status Peminjaman</th></tr></thead>';
$html .= '<tbody>';
$i = 1;
$query = mysqli_query($connect, "SELECT * FROM peminjaman LEFT JOIN user ON peminjaman.UserID = user.UserID LEFT JOIN buku ON peminjaman.BukuID = buku.BukuID");
while ($data = mysqli_fetch_array($query)) {
    $html .= '<tr>';
    $html .= '<td>' . $i++ . '</td>';
    $html .= '<td>' . $data['Username'] . '</td>';
    $html .= '<td>' . $data['Judul'] . '</td>';
    $html .= '<td>' . $data['TanggalPeminjaman'] . '</td>';
    $html .= '<td>' . $data['TanggalPengembalian'] . '</td>';
    $html .= '<td>' . $data['StatusPeminjaman'] . '</td>';
    $html .= '</tr>';
}
$html .= '</tbody>';
$html .= '</table>';

// Print content in PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF to browser
$pdf->Output('laporan_peminjaman_buku.pdf', 'I');

// Close and exit
exit;
?>
