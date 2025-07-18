<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h3 class="mb-4">✏️ Edit Setoran</h3>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="<?= base_url('admin-sekolah/setoran/update/' . $setoran['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
          <label for="siswa_id" class="form-label">Nama Siswa</label>
          <select class="form-select" name="siswa_id" required>
            <?php foreach ($siswa as $s): ?>
              <option value="<?= $s['id'] ?>" <?= $s['id'] == $setoran['siswa_id'] ? 'selected' : '' ?>>
                <?= esc($s['nama']) ?> (<?= esc($s['nisn']) ?>)
              </option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal</label>
          <input type="date" name="tanggal" class="form-control"
                 value="<?= esc($setoran['tanggal']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="volume_ml" class="form-label">Volume (ml)</label>
          <input type="number" name="volume_ml" class="form-control"
                 value="<?= esc($setoran['volume_ml']) ?>" required min="100" step="100">
        </div>

        <div class="d-flex justify-content-between">
          <a href="<?= base_url('admin-sekolah/setoran') ?>" class="btn btn-secondary">
            ← Kembali
          </a>
          <button type="submit" class="btn btn-primary">
            💾 Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
