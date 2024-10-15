<?php
if (isset($_POST["submit"])) {
    $targetdir = "uploads/"; // Directory for storing uploaded files
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
    $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $maxsize = 5 * 1024 * 1024;

    if (in_array($fileType, $allowedExtensions) && $_FILES["myfile"]["size"] <= $maxsize) {
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)) {
            echo "File successfully uploaded.";

            // Generate thumbnail image
            $thumbnailWidth = 200;
            $thumbnailHeight = 0; // Automatically calculate height
            $thumbnailFile = $targetdir . "thumb_" . basename($_FILES["myfile"]["name"]);

            $sourceImage = imagecreatefromstring(file_get_contents($targetfile));
            $sourceWidth = imagesx($sourceImage);
            $sourceHeight = imagesy($sourceImage);

            if ($sourceWidth > $thumbnailWidth) {
                $thumbnailHeight = round(($thumbnailWidth / $sourceWidth) * $sourceHeight); // Explicit rounding
            } else {
                $thumbnailWidth = $sourceWidth;
                $thumbnailHeight = $sourceHeight;
            }

            // Explicitly cast thumbnailWidth and thumbnailHeight to integers
            $thumbnailImage = imagecreatetruecolor((int)$thumbnailWidth, (int)$thumbnailHeight);
            imagecopyresampled($thumbnailImage, $sourceImage, 0, 0, 0, 0, (int)$thumbnailWidth, (int)$thumbnailHeight, $sourceWidth, $sourceHeight);

            // Save the thumbnail image
            if (imagejpeg($thumbnailImage, $thumbnailFile, 90)) {
                echo "<br>Thumbnail image created successfully.";
                echo "<br><img src='$thumbnailFile' width='$thumbnailWidth' height='$thumbnailHeight' alt='Thumbnail Image'>";
            } else {
                echo "<br>Error creating thumbnail image.";
            }

            imagedestroy($sourceImage);
            imagedestroy($thumbnailImage);
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "Invalid file or exceeds maximum allowed size.";
    }
}
?>
