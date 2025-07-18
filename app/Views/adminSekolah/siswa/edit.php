<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-success text-white">
      <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Data Siswa</h5>
    </div>

    <div class="card-body">
      <form action="<?= base_url('admin-sekolah/siswa/update/' . $siswa['id']) ?>" method="post">
        <?= csrf_field() ?>

        <!-- Sekolah ID (dari session, tidak perlu diedit) -->
        <input type="hidden" name="sekolah_id" value="<?= session('sekolah_id') ?>">

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($siswa['nama']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="nisn" class="form-label">NISN</label>
          <input type="text" class="form-control" id="nisn" name="nisn" value="<?= esc($siswa['nisn']) ?>" required>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="<?= base_url('admin-sekolah/siswa') ?>" class="btn btn-secondary">← Kembali</a>
          <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
