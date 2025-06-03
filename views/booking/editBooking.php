<?php
include '../../modules/booking/bookingController.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php?status=invalid_id");
    exit;
}

$idBooking = intval($_GET['id']);
$booking = getBookingById($idBooking);

if (!$booking) {
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
            <?= $_GET['status'] === 'updated' ? 'Booking berhasil diedit!' : 'Gagal mengedit booking.' ?>
        </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold">Edit Booking</h2>
    <form action="../../modules/booking/bookingController.php" method="POST"
        class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
        <input type="hidden" name="idBooking" value="<?= $booking['idBooking'] ?>">

        <div class="mb-5">
            <label for="idJasa" class="block mb-2 text-sm font-medium text-gray-900">ID Jasa</label>
            <input type="number" id="idJasa" name="idJasa"
                value="<?= htmlspecialchars($booking['idJasa']) ?>"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>

        <div class="mb-5">
            <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi"
                value="<?= htmlspecialchars($booking['lokasi']) ?>"
                maxlength="100"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>

        <div class="mb-5">
            <label for="paketPilihan" class="block mb-2 text-sm font-medium text-gray-900">Paket Pilihan</label>
            <select name="paketPilihan" id="paketPilihan" required
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <?php foreach (['Fotografi', 'Videografi', 'Kombinasi'] as $paket): ?>
                    <option value="<?= $paket ?>" <?= $booking['paketPilihan'] === $paket ? 'selected' : '' ?>>
                        <?= $paket ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-5">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
            <select name="status" id="status" required
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <?php foreach (['Pending', 'Terkonfirmasi', 'Selesai'] as $status): ?>
                    <option value="<?= $status ?>" <?= $booking['status'] === $status ? 'selected' : '' ?>>
                        <?= $status ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" name="editBooking"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Simpan Booking
        </button>
    </form>
</div>

<?php include '../layouts/footer.php'; ?>