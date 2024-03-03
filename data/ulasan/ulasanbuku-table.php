<div class="col-lg-13">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Table Ulasan</h5>
            <a href="dashboard.php?page=data/ulasan/tambah-ulasan" class="btn btn-primary mb-2">Tambah Ulasan</a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Ulasan</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Set</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $role = $_SESSION['user']['Role'];
                        $userId = $_SESSION['user']['UserID'];

                        if ($role == 'admin' || $role == 'petugas') {
                            $query = mysqli_query($connect, "SELECT * FROM ulasanbuku 
                                                              LEFT JOIN user ON ulasanbuku.UserID = user.UserID 
                                                              LEFT JOIN buku ON ulasanbuku.BukuID = buku.BukuID");
                        } else {
                            $query = mysqli_query($connect, "SELECT * FROM ulasanbuku 
                                                              LEFT JOIN user ON ulasanbuku.UserID = user.UserID 
                                                              LEFT JOIN buku ON ulasanbuku.BukuID = buku.BukuID 
                                                              WHERE user.UserID = '$userId'");
                        }

                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $data['Username']; ?></td>
                                <td><?php echo $data['Judul']; ?></td>
                                <td><?php echo $data['Ulasan']; ?></td>
                                <td><?php echo $data['Rating']; ?> <i class="zmdi zmdi-star-circle"></i></td>
                                <td>
                                    <a href="?page=data/ulasan/ubah-ulasan&id=<?php echo $data['UlasanID']; ?>"><i class="zmdi zmdi-edit"></i></a>
                                    <a href="?page=data/ulasan/delete-ulasan&id=<?php echo $data['UlasanID']; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ulasan <?php echo $data['Username']; ?> ( <?php echo $data['Judul']; ?> ) ?')"><i class="zmdi zmdi-delete"></i></a>
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
