<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="mb-4">📧 Detail Notifikasi</h3>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <?= esc($notifikasi['judul']) ?>
        </div>
        <div class="card-body">
            <p><strong>Waktu Kirim:</strong> <?= date('d-m-Y H:i', strtotime($notifikasi['waktu_kirim'])) ?></p>
            <p><strong>Pesan:</strong></p>
            <p><?= esc($notifikasi['pesan']) ?></p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">📝 Balas Pesan</div>
        <div class="card-body">
            <form action="<?= base_url('admin-dlh/notifikasi/balas/' . $notifikasi['id']) ?>" method="post">
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan Balasan</label>
                    <textarea name="pesan" id="pesan" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Kirim Balasan</button>
                <a href="<?= base_url('admin-dlh/notifikasi') ?>" class="btn btn-secondary">Kembali</a>
            </form>

            <form action="<?= base_url('admin-dlh/notifikasi/kirim') ?>" method="post">
                <input type="hidden" name="user_id" value="<?= $notifikasi['user_id'] ?>">
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Pesan</label>
                    <textarea name="pesan" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim ke Admin Sekolah</button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
