<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">🎁 Riwayat Penukaran Hadiah</h3>
    <a href="<?= base_url('admin-sekolah/penukaran/create') ?>" class="btn btn-success">+ Penukaran Baru</a>
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
        <a href="<?= base_url('admin-sekolah/pengambilan') ?>" class="btn btn-outline-success w-100">🚛 Pengambilan</a>
      </div>
    </div>
  </div>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
      <?= session()->getFlashdata('success') ?>
      <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif ?>

  <div class="card shadow-sm">
    <div class="card-body table-responsive">
      <table class="table table-bordered align-middle text-center">
        <thead class="table-success">
          <tr>
            <th>#</th>
            <th>Siswa</th>
            <th>Hadiah</th>
            <th>Jumlah</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($penukaran as $i => $p): ?>
            <tr>
              <td><?= $i + 1 ?></td>
              <td><?= esc($p['nama_siswa']) ?></td>
              <td><?= esc($p['nama_hadiah']) ?></td>
              <td><?= $p['jumlah'] ?></td>
              <td>
                <?= $p['status'] == 'sudah_diambil' 
                      ? '<span class="badge bg-success">Sudah Diambil</span>' 
                      : '<span class="badge bg-warning text-dark">Belum Diambil</span>' ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
