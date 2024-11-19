<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>No Telp</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    <?php
    include 'koneksi.php';
    $no = 1;
    $query = "SELECT * FROM anggota ORDER BY id DESC";
    $sql = $db1->prepare($query);
    $sql->execute();
    $res1 = $sql->get_result();

    if ($res1->num_rows > 0) {
        while ($row = $res1->fetch_assoc()) {
            $id = $row['id'];
            $nama = $row['nama'];
            $jenis_kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan';
            $alamat = $row['alamat'];
            $no_telp = $row['no_telp'];
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $nama; ?></td>
            <td><?php echo $jenis_kelamin; ?></td>
            <td><?php echo $alamat; ?></td>
            <td><?php echo $no_telp; ?></td>
            <td>
                <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data">
                    <i class="fa fa-edit"></i> Edit
                </button>
                <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data">
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </td>
        </tr>
    <?php
        }
    } else {
    ?>
        <tr>
            <td colspan="7">Tidak ada data ditemukan</td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
$(document).ready(function() {
    // Initialize DataTable
    $('#example').DataTable();

    // Function to reset error messages (if using validation error handling)
    function reset() {
        document.getElementById("err_nama").innerHTML = "";
        document.getElementById("err_jenis_kelamin").innerHTML = "";
        document.getElementById("err_alamat").innerHTML = "";
        document.getElementById("err_no_telp").innerHTML = "";
    }

    // Edit data event
    $(document).on('click', '.edit_data', function() {
        $('html, body').animate({ scrollTop: 0 }, 'slow');  // Scroll to top
        var id = $(this).attr('id');  // Get ID of the selected row

        $.ajax({
            type: 'POST',
            url: 'get_data.php',  // Server-side script to retrieve data
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                reset();  // Reset any error messages

                // Populate form fields with retrieved data
                $('html, body').animate({ scrollTop: 30 }, 'slow');  // Scroll down slightly
                document.getElementById("id").value = response.id;
                document.getElementById("nama").value = response.nama;
                document.getElementById("alamat").value = response.alamat;
                document.getElementById("no_telp").value = response.no_telp;

                // Set radio button for jenis_kelamin
                if (response.jenis_kelamin === "L") {
                    document.getElementById("jenkel1").checked = true;
                } else {
                    document.getElementById("jenkel2").checked = true;
                }
            },
            error: function(response) {
                console.log(response.responseText);  // Log errors if any
            }
        });
    });

    $(document).on('click', '.hapus_data', function() {
    var id = $(this).attr('id');  // Get the ID of the row to delete

    $.ajax({
        type: 'POST',
        url: 'hapus_data.php',  // The server-side script to handle deletion
        data: { id: id },
        success: function() {
            $('.data').load('data.php');  // Reload the data display area
        },
        error: function(response) {
            console.log(response.responseText);  // Log any errors for debugging
        }
        });
    });
});
</script>