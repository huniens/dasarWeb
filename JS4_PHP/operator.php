<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil tambah: {$hasilTambah} <br>";
echo "Hasil kurang: {$hasilKurang} <br>";
echo "Hasil kali: {$hasilKali} <br>";
echo "Sisa bagi: {$sisaBagi} <br>";
echo "Pangkat: {$pangkat} <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Hasil sama: {$hasilSama} <br>";
echo "Hasil kurang: {$hasilTidakSama} <br>";
echo "Hasil kali: {$hasilLebihKecil} <br>";
echo "Sisa bagi: {$hasilLebihBesar} <br>";
echo "Lebih kecil sama: {$hasilLebihKecilSama} <br>";
echo "Lebih besar sama: {$hasilLebihBesarSama} <br>";

$hasilAnd = $a && $b;
$hasilor = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil and: {$hasilAnd} <br>";
echo "Hasil or: {$hasilor} <br>";
echo "Hasil not A: {$hasilNotA} <br>";
echo "Hasil not B: {$hasilNotB} <br>";

$hasilSummation = $a += $b;
$hasilSubtraction = $a -= $b;
$hasilMultiplication = $a *= $b;
$hasilDivision = $a /= $b;
$hasilRemainderDividedBy = $a %= $b;

echo "Hasil summation: {$hasilSummation} <br>";
echo "Hasil subtraction: {$hasilSubtraction} <br>";
echo "Hasil multiplication: {$hasilMultiplication} <br>";
echo "Hasil division: {$hasilDivision} <br>";
echo "Hasil remainder divided by: {$hasilRemainderDividedBy} <br>";

$hasilIdentical = $a === $b;
$hasilNotIdentical = $a !== $b;

echo "Hasil Identical: {$hasilIdentical} <br>";
echo "Hasil Not Identical: {$hasilNotIdentical} <br>";
?>