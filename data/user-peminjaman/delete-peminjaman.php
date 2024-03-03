<?php


$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM peminjaman WHERE PeminjamanID=$id");

if($query) {
    echo "<script>alert('Hapus data Berhasil!'); location.href='dashboard.php?page=peminjaman-table';</script>";
}else{
    echo "<script>alert('Hapus data Gagal!'); location.href='dashboard.php?page=peminjaman-table';</script>";
}

?>





