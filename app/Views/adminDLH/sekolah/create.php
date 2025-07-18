<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6">
  <h2 class="text-2xl font-bold text-center mb-6 text-green-700">Tambah Sekolah</h2>

  <?php if (session()->getFlashdata('errors')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
      <ul class="list-disc list-inside text-sm">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
          <li><?= esc($error) ?></li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="/sekolah/store" method="post">
    <?= csrf_field() ?>

    <div class="mb-5">
      <label class="block font-medium mb-1">Nama Sekolah</label>
      <input type="text" name="nama" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-green-300" value="<?= old('nama') ?>" required>
    </div>

    <div class="mb-5">
      <label class="block font-medium mb-1">Alamat</label>
      <textarea name="alamat" rows="3" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-green-300"><?= old('alamat') ?></textarea>
    </div>

    <div class="mb-5">
      <label class="block font-medium mb-1">Kontak</label>
      <input type="text" name="kontak" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-green-300" value="<?= old('kontak') ?>">
    </div>

    <div class="flex justify-between items-center mt-6">
      <a href="/sekolah" class="text-gray-600 hover:text-gray-800 underline">← Kembali</a>
      <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded-lg">
        💾 Simpan
      </button>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
