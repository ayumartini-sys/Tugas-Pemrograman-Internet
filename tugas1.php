<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman Internet</title>
</head>
<body>
    <h1 align="center">PENILAIAN MATA KULIAH PEMROGRAMAN INTERNET</h1>
    
    <table align="center" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th colspan="2">Input Nilai Mahasiswa</th>
        </tr>
        <tr>
            <td colspan="2">
                <form method="post" action="">
                    <table width="100%">
                        <tr>
                            <td>Nama:</td>
                            <td><input type="text" name="nama" required></td>
                        </tr>
                        <tr>
                            <td>NIM:</td>
                            <td><input type="text" name="nim" required></td>
                        </tr>
                        <tr>
                            <td>Nilai:</td>
                            <td><input type="number" name="nilai" min="0" max="100" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <input type="submit" name="submit" value="Submit">
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $nilai = intval($_POST['nilai']);

        // Validasi nilai
        if ($nilai < 0 || $nilai > 100) {
            echo "<p style='text-align: center;'>Nilai harus antara 0 dan 100.</p>";
        } else {
            // Menentukan grade
            if ($nilai >= 85 && $nilai <= 100) {
                $grade = "A";
            } elseif ($nilai >= 80 && $nilai < 85) {
                $grade = "B+";
            } elseif ($nilai >= 70 && $nilai < 80) {
                $grade = "B";
            } elseif ($nilai >= 65 && $nilai < 70) {
                $grade = "C+";
            } elseif ($nilai >= 55 && $nilai < 65) {
                $grade = "C";
            } elseif ($nilai >= 45 && $nilai < 55) {
                $grade = "D";
            } else {
                $grade = "E";
            }

            // Menampilkan hasil
            echo "<br>";  
            echo "<table align='center' border='1' cellpadding='10' cellspacing='0'>";
            echo "<tr><th colspan='2'>Hasil Input Nilai Mahasiswa</th></tr>";
            echo "<tr><td>Nama:</td><td>$nama</td></tr>";
            echo "<tr><td>NIM:</td><td>$nim</td></tr>";
            echo "<tr><td>Nilai:</td><td>$nilai</td></tr>";
            echo "<tr><td>Grade:</td><td>$grade</td></tr>";
            echo "</table>";
        }
    }
    ?>
</body>
</html>
