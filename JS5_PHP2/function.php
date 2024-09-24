<?php
    function perkenalan($nama, $salam){
        echo $salam.", ";
        echo "Perkenalkan, nama saya ".$nama."<br/>"; 
        echo "Senang berkenalan dengan Anda<br/>";
    }

    //memanggil fungsi yang sudah dibuat
    perkenalan("Hamdana","Hallo");

    echo "<hr>";

    $saya = "Elok";
    $ucapanSalam = "Selamat pagi"; 

    //memanggil fungsi yang sudah dibuat
    perkenalan($saya, $ucapanSalam);

?>