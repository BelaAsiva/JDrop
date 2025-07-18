<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container">
  <!-- Judul Halaman -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">📋 Daftar Siswa</h3>
    <a href="<?= base_url('admin-sekolah/siswa/create') ?>" class="btn btn-success">
      + Tambah Siswa
    </a>
  </div>

  <!-- Navigasi Fitur -->
  <div class="mb-4">
    <div class="row g-2">
      <div class="col-auto">
        <a href="<?= base_url('admin-sekolah/dashboard') ?>" class="btn btn-outline-success w-100">🏠 Dashboard</a>
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
      <div class="col-auto">
        <a href="<?= base_url('admin-sekolah/pengambilan') ?>" class="btn btn-outline-success w-100">🚛 Pengambilan</a>
      </div>
    </div>
  </div>

  <!-- Flash Message -->
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <!-- Tabel Siswa -->
  <div class="card shadow-sm">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-success text-center">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NISN</th>
            <th>Sekolah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($siswa as $s): ?>
            <tr>
              <td class="text-center"><?= $s['id'] ?></td>
              <td><?= esc($s['nama']) ?></td>
              <td class="text-center"><?= esc($s['nisn']) ?></td>
              <td><?= esc($s['nama_sekolah']) ?></td>
              <td class="text-center">
                <a href="<?= base_url('admin-sekolah/siswa/edit/' . $s['id']) ?>" class="btn btn-sm btn-warning me-2">
                  <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="<?= base_url('admin-sekolah/siswa/delete/' . $s['id']) ?>" onclick="return confirm('Yakin ingin menghapus siswa ini?')" class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i> Hapus
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Footer (otomatis di layout/main) -->
</div>

<?= $this->endSection() ?>
