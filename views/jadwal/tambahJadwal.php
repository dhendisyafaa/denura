<?php
include '../../modules/booking/bookingController.php';
$bookingList = getAllBooking();
?>
<?php include '../layouts/heading.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
  <?php if (isset($_GET['status'])): ?>
    <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
      <?= $_GET['status'] === 'success' ? 'Jadwal berhasil ditambahkan!' : 'Gagal menambahkan jadwal.' ?>
    </div>
  <?php endif; ?>

  <h2 class="text-2xl font-bold">Tambah Jadwal</h2>
  <form action="../../modules/jadwal/jadwalController.php" method="POST"
    class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">

    <!-- <div class="mb-5">
            <label for="idJasa" class="block mb-2 text-sm font-medium text-gray-900">ID Jasa</label>
            <input type="number" id="idJasa" name="idJasa"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div> -->

    <div class="mb-5">
      <label for="idBooking" class="block mb-2 text-sm font-medium text-gray-900">ID Booking</label>
      <select type="number" id="idBooking" name="idBooking" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Pilih Booking</option>
        <?php foreach ($bookingList as $index => $booking): ?>
          <option value="<?= $booking['idBooking'] ?>">
            <?= htmlspecialchars($booking['idBooking']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-5">
      <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
      <input type="text" id="tanggal" name="tanggal" maxlength="100" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <div class="mb-5">
      <label for="jamMulai" class="block mb-2 text-sm font-medium text-gray-900">Jam Mulai</label>
      <input type="time" id="jamMulai" name="jamMulai" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <div class="mb-5">
      <label for="jamSelesai" class="block mb-2 text-sm font-medium text-gray-900">Jam Selesai</label>
      <input type="time" id="jamSelesai" name="jamSelesai" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <div class="mb-5">
      <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900">catatan</label>
      <input type="text" id="catatan" name="catatan" maxlength="100" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <button type="submit" name="tambahJadwal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Simpan Jadwal
    </button>
  </form>
</div>

<?php include '../layouts/footer.php'; ?>