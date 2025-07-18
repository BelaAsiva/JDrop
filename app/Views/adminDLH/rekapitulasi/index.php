<?= $this->extend('layout/main_dlh') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h3 class="mb-4">📊 Rekapitulasi Jelantah</h3>

  <!-- Tombol Navigasi dan Export -->
  <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
    <a href="<?= base_url('admin-dlh/dashboard') ?>" class="btn btn-outline-primary">
      🏠 Dashboard
    </a>
    <div class="d-flex gap-2">
      <a href="<?= base_url('admin-dlh/rekapitulasi/export/pdf') ?>" class="btn btn-outline-primary btn-sm">
        📄 Export PDF
      </a>
      <a href="<?= base_url('admin-dlh/rekapitulasi/export/excel') ?>" class="btn btn-outline-primary btn-sm">
        📊 Export Excel
      </a>
    </div>
  </div>

  <!-- Tabel Rekapitulasi -->
  <div class="card shadow-sm">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-primary">
          <tr>
            <th>#</th>
            <th>Nama Sekolah</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Total Jelantah (Liter)</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rekap as $i => $r): ?>
            <tr>
              <td><?= $i + 1 ?></td>
              <td class="text-start"><?= esc($r['nama_sekolah']) ?></td>
              <td><?= esc($r['bulan']) ?></td>
              <td><?= esc($r['tahun']) ?></td>
              <td><?= number_format($r['total_ml'] / 1000, 2) ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
