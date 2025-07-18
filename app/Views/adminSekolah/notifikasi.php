<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h3 class="mb-4">🔔 Notifikasi</h3>

  <?php if (empty($notifikasi)): ?>
    <div class="alert alert-info">Belum ada notifikasi baru.</div>
  <?php else: ?>
    <ul class="list-group">
      <?php foreach ($notifikasi as $n): ?>
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold"><?= esc($n['judul']) ?></div>
            <?= esc($n['pesan']) ?>
            <div class="small text-muted mt-1"><?= date('d M Y H:i', strtotime($n['waktu_kirim'])) ?></div>
          </div>
          <?php if (!$n['dibaca']): ?>
            <span class="badge bg-warning text-dark">Baru</span>
          <?php else: ?>
            <span class="badge bg-light text-muted">Dibaca</span>
          <?php endif ?>
        </li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>

  <a href="<?= base_url('admin-sekolah/dashboard') ?>" class="btn btn-success mt-4">← Kembali ke Dashboard</a>
</div>

<?= $this->endSection() ?>
