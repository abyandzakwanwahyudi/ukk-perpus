<div class="col-lg-13">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Table Buku</h5>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <a href="dashboard.php?page=data/buku/tambah-buku" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="col-lg-6 mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari buku...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Set</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($connect, "SELECT * FROM buku");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $data['Judul']; ?></td>
                                <td><?php echo $data['Penulis']; ?></td>
                                <td><?php echo $data['Penerbit']; ?></td>
                                <td><?php echo $data['TahunTerbit']; ?></td>
                                <td>
                                    <a href="?page=data/buku/ubah-buku&id=<?php echo $data['BukuID']; ?>"><i class="zmdi zmdi-edit"></i></a>
                                    <a href="?page=data/buku/delete-buku&id=<?php echo $data['BukuID']; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data buku <?php echo $data['Judul']; ?> ( <?php echo $data['Penulis']; ?> ) ?')"><i class="zmdi zmdi-delete"></i></a>
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
<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows
        for (i = 0; i < tr.length; i++) {
            // Set the flag to false initially
            var found = false;
            // Loop through all table data cells
            for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    // If the text value contains the filter text
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        // Highlight the matching part of the text
                        td.innerHTML = txtValue.replace(new RegExp(filter, 'gi'), function(match) {
                            return '<span class="highlight">' + match + '</span>';
                        });
                        found = true;
                    } else {
                        // Reset the original HTML if the filter text is not found
                        td.innerHTML = txtValue;
                    }
                }
            }
            // Show or hide the row based on the flag value
            tr[i].style.display = found ? "" : "none";
        }
    });
</script>

<style>
    .highlight {
        background-color: yellow;
        font-weight: bold;
        color: black;
    }
</style>
