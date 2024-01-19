<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Mata Kuliah Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #ddd;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInUp 0.5s ease-out forwards;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #4caf50;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Daftar Data Mata Kuliah Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Mata Kuliah</th>
            <th>Jumlah SKS</th>
        </tr>
        <?php
        include 'koneksi.php';

        $result = $koneksi->query("SELECT mahasiswa.nama AS nama_mhs, matkul.nama AS nama_matkul, mhs_mtkl.id_sks 
                                    FROM mhs_mtkl 
                                    JOIN mahasiswa ON mhs_mtkl.nama = mahasiswa.id
                                    JOIN matkul ON mhs_mtkl.id_mtkul = matkul.id");

        $nomor = 1;

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $nomor . "</td>";
            echo "<td>{$row['nama_mhs']}</td>";
            echo "<td>{$row['nama_matkul']}</td>";
            echo "<td>{$row['id_sks']}</td>";
            echo "</tr>";

            $nomor++;
        }


        $koneksi->close();
        ?>
    </table>
    <div class="button-container">
        <a href="index.php" class="button">Kembali</a>
    </div>

</body>
</html>