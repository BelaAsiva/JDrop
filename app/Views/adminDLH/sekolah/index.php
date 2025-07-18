<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<div class="container">
  <!-- Judul Halaman -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">🏫 Daftar Sekolah</h3>
    <a href="<?= base_url('admin-dlh/sekolah/create') ?>" class="btn btn-primary">
      + Tambah Sekolah
    </a>
  </div>

  <!-- Navigasi Fitur -->
  <div class="mb-4">
    <div class="row g-2">
      <div class="col-auto">
        <a href="<?= base_url('admin-dlh/dashboard') ?>" class="btn btn-outline-primary w-100">🏠 Dashboard</a>
      </div>
      <div class="col-auto">
        <a href="<?= base_url('admin-dlh/pengambilan') ?>" class="btn btn-outline-primary w-100">🔔 Pengambilan</a>
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

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <!-- Tabel Sekolah -->
  <div class="card shadow-sm">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-primary text-center">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sekolah as $s): ?>
            <tr>
              <td class="text-center"><?= $s['id'] ?></td>
              <td><?= esc($s['nama']) ?></td>
              <td><?= esc($s['alamat']) ?></td>
              <td><?= esc($s['kontak']) ?: '-' ?></td>
              <td class="text-center">
                <a href="<?= base_url('admin-dlh/sekolah/edit/' . $s['id']) ?>" class="btn btn-sm btn-warning me-2">
                  <i class="bi bi-pencil"></i> Edit
                </a>
                <form action="<?= base_url('admin-dlh/sekolah/delete/' . $s['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                  <?= csrf_field() ?>
                  <button type="submit" class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i> Hapus
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
