<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>🕒 Log Aktivitas Pengguna</h3>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Aktivitas</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logAktivitas as $i => $log): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= esc($log['username']) ?></td>
                <td><?= esc($log['aktivitas']) ?></td>
                <td><?= $log['waktu'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
