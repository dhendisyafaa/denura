<?php
include '../../modules/transaksi/transaksiController.php';
$transaksiList = getAllTransaksi();
?>

<?php include '../layouts/heading.php' ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="p-4 sm:ml-64">
  <h1 class="text-2xl text-bold my-3">Daftar Transaksi</h1>
  <a href="tambahTransaksi.php">
    <button type="button"
      class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tambah
      Transaksi</button>
  </a>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-400">
      <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
        <tr>
          <th cope="col" class="px-6 py-3">ID Transaksi</th>
          <th cope="col" class="px-6 py-3">ID Booking</th>
          <th cope="col" class="px-6 py-3">MEtode Pembayaran</th>
          <th cope="col" class="px-6 py-3">Total Harga</th>
          <th cope="col" class="px-6 py-3">Status Pembayaran</th>
          <th cope="col" class="px-6 py-3">Tanggal Pembayaran</th>
          <th cope="col" class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($transaksiList)): ?>
          <tr>
            <td colspan="7">Tidak ada data transaksi.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($transaksiList as $i => $p): ?>
            <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
              <td><?= $i + 1 ?></td>
              <td><?= htmlspecialchars($p['idBooking']) ?></td>
              <td><?= htmlspecialchars($p['metodePembayaran']) ?></td>
              <td><?= htmlspecialchars($p['totalHarga']) ?></td>
              <td><?= htmlspecialchars($p['statusPembayaran']) ?></td>
              <td><?= htmlspecialchars($p['tglPembayaran']) ?></td>
              <td>
                <a href="editTransaksi.php?id=<?= $p['idTransaksi'] ?>">Edit</a>
                <form method="POST" action="../../modules/transaksi/transaksiController.php"
                  onsubmit="return confirm('Yakin ingin menghapus?');">
                  <input type="hidden" name="idTransaksi" value="<?= $p['idTransaksi'] ?>">
                  <input type="hidden" name="hapusTransaksi" value="1">
                  <button type="submit">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        <?php endif ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../layouts/footer.php' ?>