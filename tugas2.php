<?php

// Data siswa
$siswa = [
    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
];

$totalLulus = 0; // Variabel untuk menghitung jumlah siswa lulus
$totalTidakLulus = 0; // Variabel untuk menghitung jumlah siswa tidak lulus

// Menambahkan judul dan mengatur konten di tengah
echo "<div style='text-align: center;'>";
echo "<h2>Menghitung Rata-Rata Nilai</h2>";

// Menambahkan CSS untuk menyembunyikan tombol cetak saat mencetak
echo "<style>
    @media print {
        .no-print {
            display: none; // Sembunyikan elemen dengan kelas no-print saat mencetak
        }
    }
</style>";

echo "<table border='1' cellpadding='10' style='margin: 0 auto;'>";
echo "<tr><th>Nama</th><th>Rata-rata</th><th>Status</th><th>Mata Pelajaran yang harus diperbaiki</th></tr>";

// Menghitung rata-rata nilai dan status kelulusan untuk setiap siswa
foreach ($siswa as $data) {
    $rataRata = ($data["matematika"] + $data["bahasa_inggris"] + $data["ipa"]) / 3; // Menghitung rata-rata
    $status = $rataRata >= 75 ? "Lulus" : "Tidak Lulus"; // Menentukan status kelulusan
    
    // Menentukan mata pelajaran dengan nilai terendah untuk siswa yang tidak lulus
    $lowestSubject = "";
    if ($status == "Tidak Lulus") {
        $mataPelajaran = [
            "matematika" => $data["matematika"],
            "bahasa_inggris" => $data["bahasa_inggris"],
            "ipa" => $data["ipa"]
        ];
        $lowestSubject = array_keys($mataPelajaran, min($mataPelajaran))[0]; // Mendapatkan mata pelajaran dengan nilai terendah
        $lowestSubject = ucfirst(str_replace("_", " ", $lowestSubject)); // Mengubah format nama mata pelajaran
    }

    // Menampilkan informasi siswa dalam baris tabel
    echo "<tr>";
    echo "<td>" . $data["nama"] . "</td>";
    echo "<td>" . number_format($rataRata, 2) . "</td>";
    echo "<td>" . $status . "</td>";
    echo "<td>" . ($status == "Tidak Lulus" ? $lowestSubject : '-') . "</td>";
    echo "</tr>";

    // Menghitung total siswa lulus dan tidak lulus
    if ($status == "Tidak Lulus") {
        $totalTidakLulus++;
    } else {
        $totalLulus++;
    }
}

echo "</table>";

// Menampilkan total siswa dalam tabel baru
echo "<h3>Jumlah Total Siswa:</h3>";
echo "<table border='1' cellpadding='10' style='margin: 0 auto;'>";
echo "<tr><th>Status</th><th>Jumlah</th></tr>";
echo "<tr><td>Lulus</td><td>$totalLulus</td></tr>";
echo "<tr><td>Tidak Lulus</td><td>$totalTidakLulus</td></tr>";
echo "</table>";

// Tombol cetak dengan kelas no-print
echo "<br><button class='no-print' onclick='window.print()'>Cetak</button>";

echo "</div>"; // Menutup div yang terpusat

?>