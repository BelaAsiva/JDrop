<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h3 class="mb-4">✏️ Edit Ajuan Pengambilan</h3>

  <form action="<?= base_url('admin-sekolah/pengambilan/update/' . $pengambilan['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
      <label for="bulan" class="form-label">Bulan</label>
      <input type="text" name="bulan" id="bulan" class="form-control" value="<?= esc($pengambilan['bulan']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="keterangan" class="form-label">Keterangan</label>
      <textarea name="keterangan" id="keterangan" class="form-control" rows="3"><?= esc($pengambilan['keterangan']) ?></textarea>
    </div>

    <div class="d-flex justify-content-between">
      <a href="<?= base_url('admin-sekolah/pengambilan') ?>" class="btn btn-secondary">← Kembali</a>
      <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
