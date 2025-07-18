<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h3 class="mb-4">🎁 Tambah Penukaran Hadiah</h3>

  <form action="<?= base_url('admin-sekolah/penukaran/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
      <label for="siswa_id" class="form-label">Pilih Siswa</label>
      <select name="siswa_id" class="form-select" required>
        <option value="">-- Pilih Siswa --</option>
        <?php foreach ($siswa as $s): ?>
          <option value="<?= $s['id'] ?>"><?= esc($s['nama']) ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="hadiah_id" class="form-label">Pilih Hadiah</label>
      <select name="hadiah_id" class="form-select" required>
        <option value="">-- Pilih Hadiah --</option>
        <?php foreach ($hadiah as $h): ?>
          <option value="<?= $h['id'] ?>"><?= esc($h['nama']) ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="jumlah" class="form-label">Jumlah</label>
      <input type="number" name="jumlah" class="form-control" min="1" required>
    </div>

    <div class="d-flex justify-content-between">
      <a href="<?= base_url('admin-sekolah/penukaran') ?>" class="btn btn-secondary">← Kembali</a>
      <button type="submit" class="btn btn-success">💾 Simpan</button>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
