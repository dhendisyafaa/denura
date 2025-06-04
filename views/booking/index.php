<?php
include '../../modules/booking/bookingController.php';
$bookingList = getAllBooking();
?>

<?php include '../layouts/heading.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="p-4 sm:ml-64">
  <h1 class="text-2xl text-bold my-3">Daftar Booking</h1>
  <a href="tambahBooking.php">
    <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 
            focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 mb-2">
      Tambah Booking
    </button>
  </a>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-400">
      <thead class="text-xs uppercase bg-gray-700 text-gray-400">
        <tr>
          <th class="px-6 py-3">#</th>
          <th class="px-6 py-3">ID</th>
          <!-- <th class="px-6 py-3">ID Jasa</th> -->
          <th class="px-6 py-3">Lokasi</th>
          <th class="px-6 py-3">Paket Pilihan</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($bookingList)): ?>
          <tr>
            <td colspan="6" class="px-6 py-4 text-center">Tidak ada booking.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($bookingList as $index => $booking): ?>
            <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
              <td class="px-6 py-4"><?= $index + 1 ?></td>
              <td class="px-6 py-4"><?= htmlspecialchars($booking['idBooking']) ?></td>
              <!-- <td class="px-6 py-4"><?= htmlspecialchars($booking['idJasa']) ?></td> -->
              <td class="px-6 py-4"><?= htmlspecialchars($booking['lokasi']) ?></td>
              <td class="px-6 py-4"><?= htmlspecialchars($booking['paketPilihan']) ?></td>
              <td class="px-6 py-4"><?= htmlspecialchars($booking['status']) ?></td>
              <td class="px-6 py-4">
                <div class="inline-flex" role="group">
                  <a href="editBooking.php?id=<?= $booking['idBooking'] ?>"
                    class="px-4 py-2 text-sm font-medium text-orange-500 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100">
                    Edit
                  </a>
                  <form method="POST" action="../../modules/booking/bookingController.php"
                    onsubmit="return confirm('Yakin ingin menghapus booking ini?');">
                    <input type="hidden" name="idBooking" value="<?= $booking['idBooking'] ?>">
                    <input type="hidden" name="hapusBooking" value="1">
                    <button type="submit"
                      class="px-4 py-2 text-sm font-medium text-red-500 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100">
                      Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>