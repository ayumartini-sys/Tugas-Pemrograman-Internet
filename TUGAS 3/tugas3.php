<?php
session_start(); // Memulai session untuk menyimpan data sementara

// Inisialisasi default variabel $statusAC untuk menghindari error
$statusAC = ""; 

// Fungsi untuk mengontrol AC berdasarkan suhu dan kelembaban
function kontrolAC($suhu, $kelembaban) {
    if ($suhu < 20 && $kelembaban < 50) {
        return "AC Mati"; // Suhu rendah dan kelembaban rendah
    } elseif ($suhu >= 20 && $suhu < 25) {
        return "AC Menyala Rendah"; // Suhu sedang, kelembaban tidak ditentukan
    } elseif ($suhu >= 25 && $suhu < 29) {
        return "AC Menyala Sedang"; // Suhu lebih tinggi, kelembaban tidak ditentukan
    } elseif ($suhu >= 33 || ($suhu >= 29 && $kelembaban > 70)) {
        return "AC Menyala Berat"; // Suhu sangat tinggi atau kelembaban sangat tinggi
    } else {
        return "Kondisi tidak terdeteksi"; // Kasus lain
    }
}

// Variabel untuk menyimpan status AC
$suhuKelembabanList = [];

// Proses jika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suhu = $_POST['suhu'];
    $kelembaban = $_POST['kelembaban'];

    // Hitung status AC
    $statusAC = kontrolAC($suhu, $kelembaban);
    
    // Simpan data dalam session
    $_SESSION['data'][] = ['suhu' => $suhu, 'kelembaban' => $kelembaban, 'status' => $statusAC];
}

// Ambil data dari session untuk ditampilkan
if (isset($_SESSION['data'])) {
    $suhuKelembabanList = $_SESSION['data'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrol AC Berdasarkan Suhu dan Kelembaban</title>
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

        h1 {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 400px; /* Adjusted width */
            background-color: #E6E6FA;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px; /* Reduced padding */
            font-size: 14px; /* Smaller font size */
            text-align: center;
        }

        th {
            background-color: #6A5ACD;
            color: white;
        }

        td {
            border-bottom: 1px solid #ddd;
            color: #4B0082;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px; /* Reduced padding */
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px; /* Smaller font size */
            color: #4B0082;
        }

        input[type="submit"] {
            background-color: #6A5ACD;
            color: white;
            border: none;
            padding: 8px; /* Reduced padding */
            cursor: pointer;
            font-size: 14px; /* Smaller font size */
            border-radius: 4px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #483D8B;
        }

        .result-table {
            margin-top: 20px; /* Added margin for spacing */
        }
    </style>
</head>
<body>

    <!-- Tabel untuk judul dan form Kontrol AC -->
    <table align="center">
        <tr>
            <th colspan="2" style="background-color: #4B0082;">
                <h1>Kontrol AC Berdasarkan Suhu dan Kelembaban</h1>
            </th>
        </tr>
        <tr>
            <td colspan="2">
                <form method="post" action="">
                    <table width="100%">
                        <tr>
                            <td><label for="suhu">Suhu (°C):</label></td>
                            <td><input type="number" name="suhu" id="suhu" required></td>
                        </tr>
                        <tr>
                            <td><label for="kelembaban">Kelembaban (%):</label></td>
                            <td><input type="number" name="kelembaban" id="kelembaban" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Cek Status AC">
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>

   <!-- Tampilkan status AC jika ada -->
   <?php if ($statusAC): ?>
       <h2 style="color: #4B0082; text-align: center;">Status AC: <?php echo htmlspecialchars($statusAC); ?></h2>
   <?php endif; ?>

   <!-- Tabel untuk daftar suhu dan status AC -->
   <table class="result-table">
       <tr>
           <th colspan="4" style="text-align: center;">Daftar Suhu dan Status AC</th>
       </tr>
       <tr>
           <th>No</th>
           <th>Suhu (°C)</th>
           <th>Kelembaban (%)</th>
           <th>Status AC</th>
       </tr>

       <?php if (empty($suhuKelembabanList)): ?>
           <tr>
               <td colspan="4">Belum ada data.</td>
           </tr>
       <?php else: ?>
           <?php foreach ($suhuKelembabanList as $index => $data): ?>
               <tr>
                   <td><?php echo $index + 1; ?></td>
                   <td><?php echo htmlspecialchars($data['suhu']); ?></td>
                   <td><?php echo htmlspecialchars($data['kelembaban']); ?></td>
                   <td><?php echo htmlspecialchars($data['status']); ?></td>
               </tr>
           <?php endforeach; ?>
       <?php endif; ?>
   </table> 

</body>
</html>
