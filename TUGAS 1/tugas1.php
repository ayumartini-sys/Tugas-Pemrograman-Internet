<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Menampilkan Grade Dari Nilai Rata-Rata</title>
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
            width: 450px;
            background-color: #E6E6FA;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        th, td {
            padding: 15px;
            font-size: 16px;
        }

        th {
            background-color: #6A5ACD;
            color: white;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        td {
            border-bottom: 1px solid #ddd;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #4B0082;
        }

        td label {
            font-weight: bold;
            color: #4B0082;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            color: #4B0082;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #6A5ACD;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            margin-right: 10px;
            width: 48%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #483D8B;
        }

        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .result-table {
            width: 300px;
            margin: 20px auto;
            background-color: #E6E6FA;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .result-table th {
            background-color: #6A5ACD;
            color: white;
        }

        .result-table td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #4B0082;
            font-size: 16px;
        }
    </style>
</head>
<body>
    
    <table align="center" cellpadding="10" cellspacing="0">
        <tr>
            <th colspan="2" style="background-color: #4B0082;">
                <h1>Formulir Menampilkan Grade Dari Nilai Rata-Rata</h1>
            </th>
        </tr>
        <tr>
            <td colspan="2">
                <form method="post" action="">
                    <table width="100%">
                        <tr>
                            <td><label for="nama">Nama:</label></td>
                            <td><input type="text" name="nama" id="nama" required></td>
                        </tr>
                        <tr>
                            <td><label for="nim">NIM:</label></td>
                            <td><input type="text" name="nim" id="nim" required></td>
                        </tr>
                        <tr>
                            <td><label for="nilai">Nilai:</label></td>
                            <td><input type="number" name="nilai" id="nilai" min="0" max="100" required></td>
                        </tr>
                    </table>
                    <div class="button-group">
                        <input type="submit" name="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </div>
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
            echo "<p class='result' style='color: red; text-align: center;'>Nilai harus antara 0 dan 100.</p>";
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

            // Menampilkan hasil dalam tabel kecil
            echo "<table class='result-table'>";
            echo "<tr><th colspan='2'>Hasil Input Nilai</th></tr>";
            echo "<tr><td>Nama</td><td>$nama</td></tr>";
            echo "<tr><td>NIM</td><td>$nim</td></tr>";
            echo "<tr><td>Nilai</td><td>$nilai</td></tr>";
            echo "<tr><td>Grade</td><td>$grade</td></tr>";
            echo "</table>";
        }
    }
    ?>
</body>
</html>
