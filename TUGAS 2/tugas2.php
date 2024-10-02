<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rata-Rata Nilai Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        table {
            width: 600px;
            background-color: #E6E6FA;
            margin: 20px 0;
            border-collapse: collapse;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            font-size: 16px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #6A5ACD;
            color: white;
            border-bottom: 2px solid #4B0082;
        }

        td {
            color: #4B0082;
            background-color: #FFF;
        }

        /* Styling tabel lulus/tidak lulus */
        .summary-table {
            width: 400px;
            background-color: #E6E6FA;
            margin: 0 auto;
            border-collapse: collapse;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .summary-table th, .summary-table td {
            padding: 10px;
            font-size: 14px;
            text-align: center;
            border: 1px solid #ddd;
            color: #4B0082;
            background-color: #FFF;
        }

        .summary-table th {
            background-color: #6A5ACD;
            color: white;
            border-bottom: 2px solid #4B0082;
        }

        /* Button styling */
        .no-print {
            background-color: #6A5ACD;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            margin-top: 20px;
        }

        .no-print:hover {
            background-color: #483D8B;
        }

        /* Pengaturan warna khusus saat dicetak */
        @media print {
            th {
                background-color: #6A5ACD !important;
                color: white !important;
            }

            td {
                background-color: #FFF !important;
                color: #4B0082 !important;
            }

            body {
                background-color: white !important;
            }

            table, .summary-table {
                box-shadow: none !important; /* Menghapus bayangan saat dicetak */
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <?php
    // Data siswa
    $siswa = [
        ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
        ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
        ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
        ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
        ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
    ];

    $totalLulus = 0;
    $totalTidakLulus = 0;

    echo "<table>";
    echo "<tr><th colspan='4'>Rata-Rata Nilai Mahasiswa</th></tr>";
    echo "<tr><th>Nama</th><th>Rata-rata</th><th>Status</th><th>Mata Pelajaran yang harus diperbaiki</th></tr>";

    foreach ($siswa as $data) {
        $rataRata = ($data["matematika"] + $data["bahasa_inggris"] + $data["ipa"]) / 3;
        $status = $rataRata >= 75 ? "Lulus" : "Tidak Lulus";

        $lowestSubject = "";
        if ($status == "Tidak Lulus") {
            $mataPelajaran = [
                "matematika" => $data["matematika"],
                "bahasa_inggris" => $data["bahasa_inggris"],
                "ipa" => $data["ipa"]
            ];
            $lowestSubject = array_keys($mataPelajaran, min($mataPelajaran))[0];
            $lowestSubject = ucfirst(str_replace("_", " ", $lowestSubject));
        }

        echo "<tr>";
        echo "<td>" . $data["nama"] . "</td>";
        echo "<td class='highlight'>" . number_format($rataRata, 2) . "</td>";
        echo "<td>" . $status . "</td>";
        echo "<td>" . ($status == "Tidak Lulus" ? $lowestSubject : '-') . "</td>";
        echo "</tr>";

        if ($status == "Tidak Lulus") {
            $totalTidakLulus++;
        } else {
            $totalLulus++;
        }
    }
    echo "</table>";
    ?>

    <!-- Tabel Jumlah Mahasiswa yang Lulus/Tidak -->
    <table class="summary-table">
        <tr><th colspan='2'>Jumlah Mahasiswa yang Lulus/Tidak</th></tr>
        <tr><th>Jumlah Siswa Lulus</th><td><?php echo $totalLulus; ?></td></tr>
        <tr><th>Jumlah Siswa Tidak Lulus</th><td><?php echo $totalTidakLulus; ?></td></tr>
    </table>

    <!-- Tombol Cetak -->
    <button class="no-print" onclick="window.print()">Cetak</button>

</body>
</html>
