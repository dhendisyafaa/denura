<?php include '../layouts/heading.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
    <?php if (isset($_GET['status'])): ?>
        <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
            <?= $_GET['status'] === 'success' ? 'Booking berhasil ditambahkan!' : 'Gagal menambahkan booking.' ?>
        </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold">Tambah Booking</h2>
    <form action="../../modules/booking/bookingController.php" method="POST"
        class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">

        <div class="mb-5">
            <label for="idJasa" class="block mb-2 text-sm font-medium text-gray-900">ID Jasa</label>
            <input type="number" id="idJasa" name="idJasa"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>

        <div class="mb-5">
            <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" maxlength="100"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>

        <div class="mb-5">
            <label for="paketPilihan" class="block mb-2 text-sm font-medium text-gray-900">Paket Pilihan</label>
            <select name="paketPilihan" id="paketPilihan" required
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="Fotografi">Fotografi</option>
                <option value="Videografi">Videografi</option>
                <option value="Kombinasi">Kombinasi</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
            <select name="status" id="status" required
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="Pending">Pending</option>
                <option value="Terkonfirmasi">Terkonfirmasi</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>

        <button type="submit" name="tambahBooking"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Simpan Booking
        </button>
    </form>
</div>

<?php include '../layouts/footer.php'; ?>