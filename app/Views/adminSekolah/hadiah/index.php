<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">🎁 Daftar Hadiah</h3>
    <a href="<?= base_url('admin-sekolah/hadiah/create') ?>" class="btn btn-success">+ Tambah Hadiah</a>
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
        <a href="<?= base_url('admin-sekolah/penukaran') ?>" class="btn btn-outline-success w-100">🔁 Penukaran</a>
      </div>
      <div class="col-auto">
        <a href="<?= base_url('admin-sekolah/pengambilan') ?>" class="btn btn-outline-success w-100">🚛 Pengambilan</a>
      </div>
    </div>
  </div>

  <!-- Flash Messages -->
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <div class="card shadow-sm">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-success">
          <tr>
            <th>#</th>
            <th>Hadiah</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Poin Dibutuhkan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($hadiah as $i => $h) : ?>
            <?php
              // Emoji default
              $emoji = '🎁';

              // Pilih emoji berdasarkan kata kunci di nama
              if (stripos($h['nama'], 'pensil') !== false) {
                $emoji = '✏️';
              } elseif (stripos($h['nama'], 'penghapus') !== false) {
                $emoji = '🧽';
              } elseif (stripos($h['nama'], 'penggaris') !== false) {
                $emoji = '📏';
              } elseif (stripos($h['nama'], 'buku') !== false) {
                $emoji = '📚';
              } elseif (stripos($h['nama'], 'kotak') !== false) {
                $emoji = '🎁';
              }
            ?>
            <tr>
              <td><?= $i + 1 ?></td>
              <td class="text-center">
                <div style="font-size: 2.5rem; line-height: 1"><?= $emoji ?></div>
                <strong><?= esc($h['nama']) ?></strong>
              </td>
              <td class="text-start"><?= esc($h['deskripsi']) ?></td>
              <td><?= $h['stok'] ?></td>
              <td><?= $h['poin_dibutuhkan'] ?></td>
              <td>
                <a href="<?= base_url('admin-sekolah/hadiah/edit/' . $h['id']) ?>" class="btn btn-sm btn-warning me-1">
                  <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="<?= base_url('admin-sekolah/hadiah/delete/' . $h['id']) ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin ingin menghapus hadiah ini?')">
                  <i class="bi bi-trash"></i> Hapus
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
