<?php include '../layouts/heading.php' ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
    <!-- form tambah barang -->
    <?php if (isset($_GET['status'])): ?>
        <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
            <?= $_GET['status'] === 'success' ? 'Barang berhasil ditambahkan!' : 'Gagal menambahkan barang.' ?>
        </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold">Tambah Barang</h2>
    <form action="../../modules/barang/barangController.php" method="POST"
        class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
        <div class="mb-5">
            <label for="namaBarang" class="block mb-2 text-sm font-medium text-gray-900">Nama Barang</label>
            <input type="text" id="namaBarang" name="namaBarang"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="Kamera" required />
        </div>
        <div class="mb-5">
            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
            <input placeholder="Rp" type="number" id="harga" name="hargaBarang"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required />
        </div>
        <div class="mb-5">
            <label for="stok" class="block mb-2 text-sm font-medium text-gray-900">Stok</label>
            <input placeholder="10" type="number" id="stok" name="stok"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required />
        </div>
        <button type="submit" name="tambahBarang"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan
            Barang</button>
    </form>
</div>

<?php include '../layouts/footer.php' ?>