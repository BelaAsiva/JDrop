<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="mb-4">📋 Validasi Pendaftaran Sekolah</h3>

    <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
    <a href="<?= base_url('admin-dlh/dashboard') ?>" class="btn btn-outline-primary">
      🏠 Dashboard
    </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif ?>

    <?php if (empty($sekolah)): ?>
        <div class="alert alert-info">Tidak ada pendaftar baru dari sekolah.</div>
    <?php else: ?>
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sekolah as $i => $s): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td class="text-start"><?= esc($s['nama_lengkap']) ?></td>
                            <td><?= esc($s['email']) ?></td>
                            <td><?= esc($s['username']) ?></td>
                            <td>
                                <form action="<?= base_url('admin-dlh/validasi-sekolah/terima/' . $s['id']) ?>" method="post" style="display:inline;">
                                    <button class="btn btn-success btn-sm" onclick="return confirm('Yakin terima pendaftaran ini?')">✅ Terima</button>
                                </form>
                                <form action="<?= base_url('admin-dlh/validasi-sekolah/tolak/' . $s['id']) ?>" method="post" style="display:inline;">
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tolak dan hapus akun ini?')">❌ Tolak</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>
</div>

<?= $this->endSection() ?>
