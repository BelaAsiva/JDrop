<!DOCTYPE html>
<html>
<head>
    <title><?= $judul ?></title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2><?= $judul ?></h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Total Sampah (ml)</th>
                <th>Bulan - Tahun</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($rekapitulasi as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_sekolah'] ?></td>
                <td><?= $row['total_ml'] ?> ml</td>
                <td><?= $row['bulan'] ?> <?= $row['tahun'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
