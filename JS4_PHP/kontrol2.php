<?php
// Harga produk
$product_price = 120000; // dalam Rupiah

// Tingkat diskon
$discount_rate = 20; // 20%

// Periksa apakah produk berhak mendapatkan diskon
if ($product_price > 100000) {
    // Tampilkan harga asli produk
    echo "Harga asli produk: Rp $product_price\n";
    echo"<br>";

    // Hitung jumlah diskon
    $discount_amount = ($product_price * $discount_rate) / 100;
    echo "Jumlah diskon (20%): Rp $discount_amount\n";
    echo"<br>";

    // Hitung harga akhir setelah diskon
    $final_price = $product_price - $discount_amount;
    echo "Harga setelah diskon: Rp $final_price\n";
    echo"<br>";
} else {
    // Tidak ada diskon yang diterapkan
    $final_price = $product_price;
    echo "Harga tidak memenuhi syarat untuk diskon.\n";
    echo "Harga yang harus dibayar: Rp $final_price\n";
}
?>
