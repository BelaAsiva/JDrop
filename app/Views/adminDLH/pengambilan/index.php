<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h3 class="mb-4">📋 Daftar Pengajuan Pengambilan Jelantah</h3>

  <!-- Navigasi Fitur -->
  <div class="mb-4">
    <div class="row g-2">
      <div class="col-auto">
        <a href="<?= base_url('admin-dlh/dashboard') ?>" class="btn btn-outline-primary w-100">🏠 Dashboard</a>
      </div>
      <div class="col-auto">
        <a href="<?= base_url('admin-dlh/sekolah') ?>" class="btn btn-outline-primary w-100">🔔 Sekolah</a>
      </div>
    </div>
  </div>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif ?>

  <div class="card shadow-sm">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-primary">
          <tr>
            <th>#</th>
            <th>Nama Sekolah</th>
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
              <td><?= esc($p['nama_sekolah']) ?></td>
              <td><?= esc($p['bulan']) ?></td>
              <td>
                <?= $p['status_sekolah'] ? '<span class="badge bg-success">Diajukan</span>' : '<span class="badge bg-secondary">Belum</span>' ?>
              </td>
              <td>
                <?= $p['status_dlh'] ? '<span class="badge bg-primary">Divalidasi</span>' : '<span class="badge bg-warning text-dark">Menunggu</span>' ?>
              </td>
              <td class="text-start"><?= esc($p['keterangan']) ?></td>
              <td>
                <?php if (!$p['status_dlh']): ?>
                  <a href="<?= base_url('admin-dlh/pengambilan/validasi/' . $p['id']) ?>" class="btn btn-sm btn-success">
                    ✅ Validasi
                  </a>
                <?php else: ?>
                  <a href="<?= base_url('admin-dlh/pengambilan/batalkan/' . $p['id']) ?>" class="btn btn-sm btn-outline-danger">
                    ❌ Batalkan
                  </a>
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
