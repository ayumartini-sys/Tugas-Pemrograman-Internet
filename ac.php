<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrol AC</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
        }

        form {
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: left;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            margin-bottom: 10px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Kontrol AC Berdasarkan Suhu dan Kelembaban</h1>
    
    <form method="post" action="">
        <label for="suhu">Suhu (°C):</label>
        <input type="number" name="suhu" id="suhu" required>
        <label for="kelembaban">Kelembaban (%):</label>
        <input type="number" name="kelembaban" id="kelembaban" required>
        <input type="submit" value="Cek Status AC">
    </form>

    <?php
    if ($statusAC) {
        echo "<h2>Status AC: " . htmlspecialchars($statusAC) . "</h2>";
    }
    ?>

    <h2>Daftar Suhu dan Status AC</h2>
    <table>
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
