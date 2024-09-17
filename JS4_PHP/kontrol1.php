<?php
// Nilai siswa
$nilai1 = 85;
$nilai2 = 92;
$nilai3 = 78;
$nilai4 = 64;
$nilai5 = 90;
$nilai6 = 75;
$nilai7 = 88;
$nilai8 = 79;
$nilai9 = 70;
$nilai10 = 96;

// Menghitung total nilai
$totalNilai = 0;
$jumlahSiswa = 0;

// Menggunakan perulangan untuk mengakumulasi nilai
for ($i = 1; $i <= 10; $i++) {
    $nilai = ${"nilai" . $i}; // Mengambil nilai berdasarkan variabel dinamis
    $totalNilai += $nilai;
    $jumlahSiswa++;
}

// Mengabaikan dua nilai tertinggi dan dua nilai terendah
$maxNilai = max($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6, $nilai7, $nilai8, $nilai9, $nilai10);
$minNilai = min($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6, $nilai7, $nilai8, $nilai9, $nilai10);
$totalNilai -= ($maxNilai + $minNilai);

// Menghitung nilai rata-rata
$rataRata = $totalNilai / ($jumlahSiswa - 4); // Mengabaikan 2 nilai tertinggi dan 2 nilai terendah

echo "Total nilai setelah mengabaikan nilai tertinggi dan terendah: $totalNilai\n";
echo"<br>";
echo "Nilai rata-rata: " . number_format($rataRata, 2) . "\n";
?>
