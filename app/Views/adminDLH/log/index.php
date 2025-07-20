<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="mb-4">📋 Log Aktivitas & Login</h3>

    <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
    <a href="<?= base_url('admin-dlh/dashboard') ?>" class="btn btn-outline-primary">
      🏠 Dashboard
    </a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            🕒 Log Aktivitas Pengguna
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Pengguna</th>
                        <th>Aksi</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logAktivitas as $i => $log): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($log['nama_pengguna']) ?></td>
                        <td><?= esc($log['aksi']) ?></td>
                        <td><?= $log['waktu'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            👤 Log Login Pengguna
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Pengguna</th>
                        <th>Waktu Login</th>
                        <th>IP Address</th>
                        <th>User Agent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logLogin as $i => $log): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($log['username']) ?></td>
                        <td><?= $log['waktu_login'] ?></td>
                        <td><?= esc($log['ip_address']) ?></td>
                        <td><small><?= esc($log['user_agent']) ?></small></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
