<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">🚛 Riwayat Pengambilan Jelantah</h3>
    <a href="<?= base_url('admin-sekolah/pengambilan/create') ?>" class="btn btn-success">
      + Ajukan Pengambilan
    </a>
  </div>

   <!-- Navigasi Fitur -->
  <div class="mb-4">
    <div class="row g-2">
      <div class="col-auto">
        <a href="<?= base_url('admin-sekolah/dashboard') ?>" class="btn btn-outline-success w-100">🏠 Dashboard</a>
      </div>
      <div class="col-auto">
        <a href="<?= base_url('admin-sekolah/siswa') ?>" class="btn btn-outline-success w-100">👦 Siswa</a>
      </div>
      <div class="col-auto">
        <a href="<?= base_url('admin-sekolah/setoran') ?>" class="btn btn-outline-success w-100">🛢️ Setoran</a>
      </div>
      <div class="col-auto">
        <a href="<?= base_url('admin-sekolah/hadiah') ?>" class="btn btn-outline-success w-100">🎁 Hadiah</a>
      </div>
      <div class="col-auto">
        <a href="<?= base_url('admin-sekolah/penukaran') ?>" class="btn btn-outline-success w-100">🔁 Penukaran</a>
      </div>
    </div>
  </div>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <div class="card shadow-sm">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-success">
          <tr>
            <th>#</th>
            <th>Bulan</th>
            <th>Status Sekolah</th>
            <th>Status DLH</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pengambilan as $i => $p): ?>
            <tr>
              <td><?= $i + 1 ?></td>
              <td><?= esc($p['bulan']) ?></td>
              <td>
                <?= $p['status_sekolah'] ? '<span class="badge bg-success">Diajukan</span>' : '<span class="badge bg-secondary">Belum</span>' ?>
              </td>
              <td>
                <?= $p['status_dlh'] ? '<span class="badge bg-success">Sudah Dikonfirmasi</span>' : '<span class="badge bg-warning text-dark">Menunggu</span>' ?>
              </td>
              <td class="text-start"><?= esc($p['keterangan']) ?></td>
              <td>
                <?php if ($p['status_dlh'] == 0): ?>
                  <a href="<?= base_url('admin-sekolah/pengambilan/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning me-1">
                    <i class="bi bi-pencil"></i> Edit
                  </a>
                  <a href="<?= base_url('admin-sekolah/pengambilan/delete/' . $p['id']) ?>" class="btn btn-sm btn-danger"
                     onclick="return confirm('Yakin ingin menghapus ajuan ini?')">
                    <i class="bi bi-trash"></i> Hapus
                  </a>
                <?php else: ?>
                  <span class="text-muted">✔️ Terkunci</span>
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
