<style>
    tbody tr:hover {
        background-color: #f2f2f2;
        color: black;
    }
</style>

<div class="col-lg-13">
<div class="card">
<div class="card-body">
    <h5 class="card-title">Table User</h5>
    <div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Alamat</th>
            <th scope="col">Role</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            $query = mysqli_query($connect, "SELECT*FROM user");
            while ($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <td><?php echo $data['Username']; ?></td>
                <td><?php echo $data['Email']; ?></td>
                <td><?php echo $data['NamaLengkap']; ?></td>
                <td><?php echo $data['Alamat']; ?></td>
                <td><?php echo $data['Role']; ?></td>
            </tr>
            <?php
                } 
            ?>
        </tbody>
    </table>
</div>
</div>
</div>
