<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $allowed_extensions = array("jpg", "jpeg", "gif", "png");

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_type = $_FILES['files']['type'][$key];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Check if file extension is allowed (JPG, JPEG, GIF, PNG)
        if (in_array($file_ext, $allowed_extensions) === false) {
            $errors[] = "Ekstensi file $file_name tidak diizinkan. Hanya file JPG, JPEG, GIF, PNG yang diizinkan.";
        }

        // Check if file size exceeds 2 MB
        if ($file_size > 2097152) {
            $errors[] = "Ukuran file $file_name tidak boleh lebih dari 2 MB.";
        }

        // Upload if no errors
        if (empty($errors)) {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
        } else {
            echo implode("", $errors);
        }
    }

    if (empty($errors)) {
        echo "Semua file berhasil diunggah.";
    } else {
        echo "Beberapa file gagal diunggah: " . implode(", ", $errors);
    }
}
?>
