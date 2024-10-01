<?php
// Fungsi untuk mengontrol AC berdasarkan suhu dan kelembaban
function kontrolAC($suhu, $kelembaban) {
    if ($suhu <= 25 && $kelembaban <= 50) {
        return "AC Mati";
    } elseif ($suhu > 25 && $suhu <= 30 && $kelembaban > 50 && $kelembaban <= 70) {
        return "AC Menyala Rendah";
    } elseif ($suhu > 30 && $suhu <= 32 && $kelembaban > 70 && $kelembaban <= 80) {
        return "AC Menyala Sedang";
    } elseif ($suhu > 32 || ($suhu > 30 && $kelembaban > 80)) {
        return "AC Menyala Berat";
    } else {
        return "Kondisi tidak terdeteksi, AC dalam kondisi manual";
    }
}

// Contoh input suhu dan kelembaban
$suhu = 31; // misal suhu 31°
$kelembaban = 75; // misal kelembaban 75%

// Memanggil fungsi kontrol AC
$statusAC = kontrolAC($suhu, $kelembaban);

// Output status AC
echo "Status AC: " . $statusAC;

?>
