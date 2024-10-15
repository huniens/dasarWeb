<!DOCTYPE html>
<html>

<head>
    <title>Unggah File Gambar</title>
</head>

<body>
    <form id="upload-form" action="upload_ajax.php" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" id="file" multiple> <!-- Multiple files allowed -->
        <input type="submit" name="submit" value="Unggah Gambar">
    </form>
    <div id="status"></div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#upload-form").submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: 'upload_ajax.php',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $("#status").html(response);
                    },
                    error: function() {
                        $('#status').html('Terjadi kesalahan saat mengunggah file.');
                    }
                });
            });
        });
    </script>
</body>

</html>
