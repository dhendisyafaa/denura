<?php

include '../../modules/booking/bookingController.php';
$bookingList = getAllBooking();
include '../layouts/heading.php';
include '../layouts/sidebar.php'; ?>


<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
  <?php if (isset($_GET['status'])): ?>
    <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
      <?= $_GET['status'] === 'success' ? 'Transaksi berhasil ditambahkan!' : 'Gagal menambahkan transaksi.' ?>
    </div>
  <?php endif; ?>

  <h2 class="text-2xl font-bold">Tambah Transaksi</h2>
  <form action="../../modules/transaksi/transaksiController.php" method="POST"
    class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
    <div class="mb-5">
      <label for="idBooking" class="block mb-2 text-sm font-medium text-gray-900">ID Booking</label>
      <select id="idBooking" name="idBooking" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Pilih id booking</option>
        <?php foreach ($bookingList as $index => $idBooking): ?>
          <option value="<?= $idBooking['idBooking'] ?>">
            <?= htmlspecialchars($idBooking['idBooking']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-5">
      <label for="totalHarga" class="block mb-2 text-sm font-medium text-gray-900">Total Harga</label>
      <input type="number" id="totalHarga" name="totalHarga"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
        placeholder="" required />
    </div>
    <div class="mb-5">
      <label for="metodePembayaran" class="block mb-2 text-sm font-medium text-gray-900">Metode Pembayaran</label>
      <select id="metodePembayaran" name="metodePembayaran" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Pilih Metode Pembayaran</option>
        <option value="Tunai">Tunai</option>
        <option value="Gopay">Gopay</option>
        <option value="Dana">Dana</option>
        <option value="Kartu Kredit">Kartu Kredit</option>
        </option>
      </select>
    </div>
    <div class="mb-5">
      <label for="statusPembayaran" class="block mb-2 text-sm font-medium text-gray-900">Status Pembayaran</label>
      <select id="statusPembayaran" name="statusPembayaran" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Pilih status</option>
        <option value="Lunas">Lunas</option>
        <option value="Belum Lunas">Belum Lunas</option>
        <option value="DP">DP</option>
        </option>
      </select>
    </div>
    <button type="submit" name="tambahTransaksi"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan
      Transaksi</button>
  </form>
</div>

<?php include '../layouts/footer.php' ?>