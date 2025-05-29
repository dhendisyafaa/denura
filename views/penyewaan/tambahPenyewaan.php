<?php include '../heading.php' ?>
<?php include '../sidebar.php'; ?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
    <!-- form tambah barang -->
    <?php if (isset($_GET['status'])): ?>
        <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
            <?= $_GET['status'] === 'success' ? 'Barang berhasil ditambahkan!' : 'Gagal menambahkan barang.' ?>
        </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold">Tambah Penyewaan</h2>
    <form action="../../controllers/penyewaanController.php" method="POST" class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
        <div class="mb-5">
            <label for="idJasa" class="block mb-2 text-sm font-medium text-gray-900">Jasa</label>
            <select name="idJasa" id="idJasa">
                <option selected>Pilih opsi berikut</option>
            </select>
        </div>
        <div class="mb-5">
            <label for="idBarang" class="block mb-2 text-sm font-medium text-gray-900">Barang</label>
            <select name="idBarang" id="idBarang">
                <option selected>Pilih opsi berikut</option>
            </select>
        </div>
        <div class="mb-5">
            <label for="tglSewa" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Sewa</label>
            <input type="datetime-local" id="tglSewa" name="tglSewa" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Kamera" required />
        </div>
        <div class="mb-5">
            <label for="tglPengembalian" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pengembalian</label>
            <input type="datetime-local" id="tglPengembalian" name="tglPengembalian" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Kamera" required />
        </div>
        <div class="mb-5">
            <label for="hargaSewa" class="block mb-2 text-sm font-medium text-gray-900">Harga Sewa</label>
            <input type="number" id="hargaSewa" name="hargaSewa" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Kamera" required />
        </div>
        <button type="submit" name="tambahpenyewaan" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan Barang</button>
    </form>
</div>

<?php include '../footer.php' ?>