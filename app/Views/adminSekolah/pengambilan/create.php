<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h3 class="mb-4">📝 Ajukan Pengambilan Baru</h3>

  <form action="<?= base_url('admin-sekolah/pengambilan/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
      <label for="bulan" class="form-label">Bulan</label>
      <input type="text" name="bulan" id="bulan" class="form-control" placeholder="contoh: Juli 2025" required>
    </div>

    <div class="d-flex justify-content-between">
      <a href="<?= base_url('admin-sekolah/pengambilan') ?>" class="btn btn-secondary">← Kembali</a>
      <button type="submit" class="btn btn-success">💾 Ajukan</button>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
