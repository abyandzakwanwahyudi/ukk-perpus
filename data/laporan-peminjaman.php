<div class="col-lg-13">
<div class="card">
<div class="card-body">
    <h5 class="card-title">Table Data Peminjaman</h5>
    <a href="controller/generate.php" class="btn btn-primary mb-2">Generate Laporan</a>
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
        </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            $query = mysqli_query($connect, "SELECT*FROM peminjaman LEFT JOIN user on peminjaman.UserID = user.UserID LEFT JOIN buku on peminjaman.BukuID = buku.BukuID");
            while ($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <td><?php echo $data['Username']; ?></td>
                <td><?php echo $data['Judul']; ?></td>
                <td><?php echo $data['TanggalPeminjaman']; ?></td>
                <td><?php echo $data['TanggalPengembalian']; ?></td>
                <td><?php echo $data['StatusPeminjaman']; ?></td>
            </tr>
            <?php
                } 
            ?>
        </tbody>
    </table>
</div>
</div>
</div>
