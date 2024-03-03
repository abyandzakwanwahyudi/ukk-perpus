<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <?php 
                $role = $_SESSION['user']['Role'];
                $username = $_SESSION['user']['Username'];
                $userId = $_SESSION['user']['UserID'];

                $title = ($role == 'admin' || $role == 'petugas') ? 'Table Koleksi' : 'Koleksi (' . $username . ')';
            ?>
            <h5 class="card-title"><?php echo $title; ?></h5>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Judul</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            $query = mysqli_query($connect, "SELECT * FROM koleksipribadi 
                                    LEFT JOIN user ON koleksipribadi.UserID = user.UserID 
                                    LEFT JOIN buku ON koleksipribadi.BukuID = buku.BukuID
                                    WHERE user.UserID = $userId");


                            while ($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['Username']; ?></td>
                            <td><?php echo $data['Judul']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
