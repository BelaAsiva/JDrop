<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h3 class="mb-4">🎁 Tambah Hadiah Baru</h3>

  <form action="<?= base_url('admin-sekolah/hadiah/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
      <label for="nama" class="form-label">Nama Hadiah</label>
      <input type="text" name="nama" id="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
      <label for="stok" class="form-label">Stok</label>
      <input type="number" name="stok" id="stok" class="form-control" value="0" min="0">
    </div>

    <div class="mb-3">
      <label for="poin_dibutuhkan" class="form-label">Poin Dibutuhkan</label>
      <input type="number" name="poin_dibutuhkan" id="poin_dibutuhkan" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between">
      <a href="<?= base_url('admin-sekolah/hadiah') ?>" class="btn btn-secondary">← Kembali</a>
      <button type="submit" class="btn btn-success">💾 Simpan</button>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
