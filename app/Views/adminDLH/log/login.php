<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>👤 Log Login Pengguna</h3>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Waktu Login</th>
                <th>IP Address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logLogin as $i => $log): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= esc($log['username']) ?></td>
                <td><?= $log['waktu_login'] ?></td>
                <td><?= esc($log['ip_address']) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
