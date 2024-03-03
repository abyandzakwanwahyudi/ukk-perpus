<?php
if (isset($_GET['id'])) {
    $UserID = $_SESSION['user']['UserID'];
    $BukuID = $_GET['id'];

    if ($UserID == "" || $BukuID == "") {
        echo '<script>alert("Data belum terisi")</script>';
    } else {
        $queryCheck = mysqli_query($connect, "SELECT * FROM koleksipribadi WHERE UserID = '$UserID' AND BukuID = '$BukuID'");
        $isBookInCollection = mysqli_num_rows($queryCheck) > 0;

        if ($isBookInCollection) {
            // Hapus dari Koleksi
            $queryRemove = mysqli_query($connect, "DELETE FROM koleksipribadi WHERE UserID = '$UserID' AND BukuID = '$BukuID'");
            if ($queryRemove) {
                echo '
                <script>
                Swal.fire({
                    title: "It Works!",
                    icon: "success",
                    timer: 2000, // Waktu tampilan alert (ms)
                    showConfirmButton: false
                });
                setTimeout(function() {
      
                }, 2000);
                </script>';
            } else {
                echo '<script>alert("Hapus data Gagal!")</script>';
                echo mysqli_error($connect); // Menampilkan pesan kesalahan SQL untuk debugging
            }
        } else {
            // Tambah ke Koleksi
            $queryAdd = mysqli_query($connect, "INSERT INTO koleksipribadi(UserID, BukuID) VALUES ('$UserID', '$BukuID')");
            if ($queryAdd) {
                echo '
                <script>
                Swal.fire({
                    title: "Added to Collection!",
                    icon: "success",
                    timer: 2000, // Waktu tampilan alert (ms)
                    showConfirmButton: false
                });
                setTimeout(function() {
                
                }, 2000);
                </script>';
            } else {
                echo '<script>alert("Tambah data Gagal!")</script>';
                echo mysqli_error($connect); // Menampilkan pesan kesalahan SQL untuk debugging
            }
        }
    }
}
?>

<?php
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['Username'];

    $i = 1;
    $query = mysqli_query($connect, "SELECT * FROM peminjaman 
        LEFT JOIN user ON peminjaman.UserID = user.UserID 
        LEFT JOIN buku ON peminjaman.BukuID = buku.BukuID 
        WHERE user.Username = '$username'");
?>

<div class="col-lg-14">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Peminjaman (<?php echo $username; ?>)</h5>
            <a href="?page=data/user-peminjaman/peminjaman" class="btn btn-primary mb-2">Pinjam Buku</a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Tanggal Pengembalian</th>
                            <th scope="col">Status Peminjaman</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $data['Username']; ?></td>
                                <td><?php echo $data['Judul']; ?></td>
                                <td><?php echo $data['TanggalPeminjaman']; ?></td>
                                <td><?php echo $data['TanggalPengembalian']; ?></td>
                                <td><?php echo $data['StatusPeminjaman']; ?></td>
                                <td>
                                    <?php
                                    if ($data['StatusPeminjaman'] == 'Dipinjam') {
                                    ?>
                                        <a href="?page=data/user-peminjaman/ubah-peminjaman&id=<?php echo $data['PeminjamanID']; ?>"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="?page=data/user-peminjaman/delete-peminjaman&id=<?php echo $data['PeminjamanID']; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $data['Username']; ?>')"><i class="zmdi zmdi-delete"></i></a>
                                    <?php } else { ?>
                                        <?php
                                        $BukuID = $data['BukuID'];
                                        $UserID = $_SESSION['user']['UserID'];

                                        // Periksa apakah buku sudah ada dalam koleksi pengguna
                                        $queryCheck = mysqli_query($connect, "SELECT * FROM koleksipribadi WHERE UserID = '$UserID' AND BukuID = '$BukuID'");
                                        $isBookInCollection = mysqli_num_rows($queryCheck) > 0;
                                        ?>

                                        <?php
                                        if ($isBookInCollection) {
                                            echo '<a href="?page=data/user-peminjaman/peminjaman-table&id=' . $BukuID . '"><i class="zmdi zmdi-bookmark" style="background-color: rgba(128, 128, 128, 0.5); padding: 5px; border-radius: 5lo%;"></i></a>';
                                        } else {
                                            echo '<a href="?page=data/user-peminjaman/peminjaman-table&id=' . $BukuID . '"><i class="zmdi zmdi-bookmark-outline" style="background-color: rgba(128, 128, 128, 0.5); padding: 5px; border-radius: 5%;"></i></a>';
                                        }
                                        ?>

                                      
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php } ?>