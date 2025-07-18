<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-success text-white">
      <h5 class="mb-0"><i class="bi bi-person-plus"></i> Tambah Siswa</h5>
    </div>

    <div class="card-body">
      <form action="<?= base_url('admin-sekolah/siswa/store') ?>" method="post">
        <?= csrf_field() ?>

        <!-- Ambil sekolah_id dari session -->
        <input type="hidden" name="sekolah_id" value="<?= session('sekolah_id') ?>">

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
          <label for="nisn" class="form-label">NISN</label>
          <input type="text" class="form-control" id="nisn" name="nisn" required>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="<?= base_url('admin-sekolah/siswa') ?>" class="btn btn-secondary">← Kembali</a>
          <button type="submit" class="btn btn-success">💾 Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
