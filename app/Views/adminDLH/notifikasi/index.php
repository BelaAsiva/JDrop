<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="mb-4">📬 Daftar Notifikasi</h3>

    <!-- Tombol kembali -->
    <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
        <a href="<?= base_url('admin-dlh/dashboard') ?>" class="btn btn-outline-primary">
            🏠 Dashboard
        </a>
    </div>

    <!-- Tabel Notifikasi -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            🔔 Notifikasi Pengguna
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th>Waktu Kirim</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($notifikasi as $i => $notif): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td>
                            <a href="<?= base_url('admin-dlh/notifikasi/detail/' . $notif['id']) ?>" class="text-decoration-none">
                                <?= esc($notif['judul']) ?>
                            </a>
                        </td>
                        <td>
                            <?= strlen(strip_tags($notif['pesan'])) > 50 
                                ? esc(substr(strip_tags($notif['pesan']), 0, 50)) . '...'
                                : esc(strip_tags($notif['pesan'])) ?>
                        </td>
                        <td>
                            <?php if ($notif['dibaca']): ?>
                                <span class="badge bg-success">Sudah Dibaca</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark">Belum Dibaca</span>
                            <?php endif ?>
                        </td>
                        <td><?= date('d-m-Y H:i', strtotime($notif['waktu_kirim'])) ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
