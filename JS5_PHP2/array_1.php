<!DOCTYPE html>
<html>
<head>
    <title>Array with Loop</title>
</head>
<body>
    <h2>Array Terindeks</h2>
    <?php
        $Listdosen = ["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

        // Using for loop to display array elements
        for ($i = 0; $i < count($Listdosen); $i++) {
            echo $Listdosen[$i] . "<br>";
        }
    ?>
</body>
</html>
