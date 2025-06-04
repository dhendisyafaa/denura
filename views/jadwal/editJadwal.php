<?php
include '../../modules/jadwal/jadwalController.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header("Location: index.php?status=invalid_id");
  exit;
}

$idJadwal = intval($_GET['id']);
$jadwal = getJadwalById($idJadwal);

if (!$jadwal) {
  header("Location: index.php?status=not_found");
  exit;
}

include '../layouts/heading.php';
include '../layouts/sidebar.php';
?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
  <?php if (isset($_GET['status'])): ?>
    <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'updated' ? 'bg-green-500' : 'bg-red-500' ?>">
      <?= $_GET['status'] === 'updated' ? 'Jadwal berhasil diedit!' : 'Gagal mengedit jadwal.' ?>
    </div>
  <?php endif; ?>

  <h2 class="text-2xl font-bold">Edit Jadwal</h2>
  <form action="../../modules/jadwal/jadwalController.php" method="POST"
    class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
    <input type="hidden" name="idJadwal" value="<?= $jadwal['idJadwal'] ?>">

    <!-- <div class="mb-5">
            <label for="idJasa" class="block mb-2 text-sm font-medium text-gray-900">ID Jasa</label>
            <input type="number" id="idJasa" name="idJasa"
                value="<?= htmlspecialchars($jadwal['idJasa']) ?>"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div> -->

    <div class="mb-5">
      <label for="idBooking" class="block mb-2 text-sm font-medium text-gray-900">ID Booking</label>
      <input type="number" id="idBooking" name="idBooking" value="<?= htmlspecialchars($jadwal['idBooking']) ?>" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <div class="mb-5">
      <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
      <input type="date" id="tanggal" name="tanggal" value="<?= htmlspecialchars($jadwal['tanggal']) ?>" maxlength="100"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <div class="mb-5">
      <label for="jamMulai" class="block mb-2 text-sm font-medium text-gray-900">Jam Mulai</label>
      <input type="time" id="jamMulai" name="jamMulai" value="<?= htmlspecialchars($jadwal['jamMulai']) ?>" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <div class="mb-5">
      <label for="jamSelesai" class="block mb-2 text-sm font-medium text-gray-900">Jam Selesai</label>
      <input type="time" id="jamSelesai" name="jamSelesai" value="<?= htmlspecialchars($jadwal['jamSelesai']) ?>" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <div class="mb-5">
      <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900">Catatan</label>
      <input type="text" id="catatan" name="catatan" maxlength="100" value="<?= htmlspecialchars($jadwal['catatan']) ?>"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <button type="submit" name="editJadwal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Simpan Jadwal
    </button>
  </form>
</div>

<?php include '../layouts/footer.php'; ?>