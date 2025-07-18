<?php echo $this->extend('layout/main_dlh') ?>
<?php echo $this->section('content') ?>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Data Sekolah</h5>
    </div>

    <div class="card-body">
      <form action="<?= base_url('admin-dlh/sekolah/update/' . $sekolah['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Sekolah</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($sekolah['nama']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea id="alamat" name="alamat" class="form-control" rows="3" required><?= esc($sekolah['alamat']) ?></textarea>
        </div>

        <div class="mb-3">
          <label for="kontak" class="form-label">Kontak</label>
          <input type="text" class="form-control" id="kontak" name="kontak" value="<?= esc($sekolah['kontak']) ?>">
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="<?= base_url('admin-dlh/sekolah') ?>" class="btn btn-secondary">← Kembali</a>
          <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php echo $this->endSection() ?>
