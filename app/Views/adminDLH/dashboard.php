<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<style>
  .bg-gradient-blue {
    background: linear-gradient(90deg, #007BFF, #00B4D8);
    color: white;
  }

  .card-blue {
    border-left: 5px solid #007BFF;
    background-color: #f0f8ff;
    transition: all 0.3s ease-in-out;
  }

  .card-blue:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
  }

  .notif-body-scroll {
    max-height: 200px; /* Biar tingginya segaris dengan kartu total */
    overflow-y: auto;
    padding-right: 10px;
  }
</style>

<div class="container mt-4">
  <div class="row g-4">
    <!-- Kolom kiri -->
    <div class="col-lg-8">
      <h3 class="mb-3">📊 Dashboard Admin DLH</h3>

      <!-- Tombol Aksi -->
      <div class="d-flex flex-wrap gap-2 mb-3">
        <a href="<?= base_url('admin-dlh/rekapitulasi') ?>" class="btn btn-primary">
          📊 Rekapitulasi Jelantah
        </a>
        <a href="<?= base_url('admin-dlh/validasi-sekolah') ?>" class="btn btn-outline-primary">
          ✅ Validasi Sekolah
        </a>
        <a href="<?= base_url('admin-dlh/log') ?>" class="btn btn-outline-primary">
          📚 Riwayat Log 
        </a>
      </div>

      <!-- Statistik -->
      <div class="row g-3">
        <div class="col-md-6">
          <a href="<?= base_url('admin-dlh/sekolah') ?>" class="text-decoration-none">
            <div class="card card-blue shadow-sm h-100">
              <div class="card-body text-center">
                <h5 class="card-title">🏫 Total Sekolah</h5>
                <h2 class="text-primary"><?= $totalSekolah ?></h2>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-6">
          <a href="<?= base_url('admin-dlh/pengambilan') ?>" class="text-decoration-none">
            <div class="card card-blue shadow-sm h-100">
              <div class="card-body text-center">
                <h5 class="card-title">🚛 Total Pengambilan</h5>
                <h2 class="text-primary"><?= $totalPengambilan ?></h2>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Kolom kanan - Notifikasi -->
    <div class="col-lg-4">
      <div class="card shadow-sm h-100">
        <div class="card-header bg-gradient-blue">
          <h5 class="mb-0">🔔 Notifikasi Terbaru</h5>
        </div>
        <div class="card-body notif-body-scroll">
          <?php if (!empty($notifikasi)): ?>
            <ul class="list-group list-group-flush">
              <?php foreach ($notifikasi as $n): ?>
                <li class="list-group-item">
                  <strong><?= esc($n['judul']) ?></strong><br>
                  <small><?= esc($n['pesan']) ?></small><br>
                  <span class="text-muted small">📅 <?= date('d M Y H:i', strtotime($n['waktu_kirim'])) ?></span>
                </li>
              <?php endforeach ?>
            </ul>
          <?php else: ?>
            <p class="text-muted">Tidak ada notifikasi saat ini.</p>
          <?php endif ?>
        </div>
        <div class="card-footer text-center">
          <a href="<?= base_url('admin-dlh/notifikasi') ?>" class="btn btn-sm btn-outline-primary">📩 Lihat Semua</a>
        </div>
      </div>
    </div>

    <!-- Peringkat Sekolah -->
    <div class="card shadow-sm mt-4">
      <div class="card-body">
        <h5 class="card-title">🏆 Peringkat Sekolah Berdasarkan Total Jelantah</h5>
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th>Peringkat</th>
              <th>Nama Sekolah</th>
              <th>Total Jelantah (L)</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($peringkatSekolah)): ?>
              <?php foreach ($peringkatSekolah as $i => $s): ?>
                <tr>
                  <td><?= $i + 1 ?></td>
                  <td><?= esc($s['nama_sekolah']) ?></td>
                  <td><?= number_format($s['total_ml'] / 1000, 2) ?> L</td>
                </tr>
              <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td colspan="3" class="text-center text-muted">Belum ada data setoran.</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
