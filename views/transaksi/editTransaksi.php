<?php
include '../../modules/transaksi/transaksiController.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header("Location: index.php?status=invalid_id");
  exit;
}
$idTransaksi = intval($_GET['id']);
$transaksi = getTransaksiById($idTransaksi);

if (!$transaksi) {
  header("Location: index.php?status=not_found");
  exit;
}

include '../layouts/heading.php';
include '../layouts/sidebar.php';
?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
  <!-- form edit transaksi -->
  <?php if (isset($_GET['status'])): ?>
    <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
      <?= $_GET['status'] === 'success' ? 'Transaksi berhasil diedit!' : 'Gagal mengedit transaksi.' ?>
    </div>
  <?php endif; ?>

  <h2 class="text-2xl font-bold">Edit Transaksi</h2>
  <form action="../../modules/transaksi/transaksiController.php" method="POST"
    class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
    <input type="hidden" name="idTransaksi" value="<?= $transaksi['idTransaksi'] ?>">
    <div class="mb-5">
      <label for="totalHarga" class="block mb-2 text-sm font-medium text-gray-900">Total harga</label>
      <input type="number" id="totalHarga" name="totalHarga" value="<?= htmlspecialchars($transaksi['totalHarga']) ?>"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
      <label for="metodePembayaran" class="block mb-2 text-sm font-medium text-gray-900">Metode Pembayaran</label>
      <select id="metodePembayaran" name="metodePembayaran"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        required>
        <?php
        $options = ['Tunai', 'Gopay', 'Dana', 'Kartu Kredit'];
        foreach ($options as $option):
          $selected = $transaksi['metodePembayaran'] === $option ? 'selected' : '';
          ?>
          <option value="<?= $option ?>" <?= $selected ?>><?= $option ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-5">
      <label for="statusPembayaran" class="block mb-2 text-sm font-medium text-gray-900">Status Pembayaran</label>
      <select id="statusPembayaran" name="statusPembayaran"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        required>
        <?php
        $options = ['Lunas', 'Belum Lunas', 'DP'];
        foreach ($options as $option):
          $selected = $transaksi['statusPembayaran'] === $option ? 'selected' : '';
          ?>
          <option value="<?= $option ?>" <?= $selected ?>><?= $option ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" name="editTransaksi" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Simpan Perubahan
    </button>
  </form>
</div>

<?php include '../layouts/footer.php' ?>