<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Table Kategori</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            $query = mysqli_query($connect, "SELECT * FROM kategoribuku");
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['NamaKategori']; ?></td>
                            <td>
                                <a href="?page=data/kategori/ubah-kategori&id=<?php echo $data['KategoriID']; ?>"><i class="zmdi zmdi-edit"></i> Ubah</a>
                                <a href="?page=data/kategori/delete-kategori&id=<?php echo $data['KategoriID']; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $data['NamaKategori'];?>?')"><i class="zmdi zmdi-delete"></i> Hapus</a>
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
    <a href="dashboard.php?page=data/kategori/tambah-kategori" class="btn btn-primary mb-2">Tambah Data</a>
</div>
