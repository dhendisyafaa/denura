<?php
include '../../modules/user/userController.php';
$userList = getAllUser();
include '../layouts/heading.php';
include '../layouts/sidebar.php'; 
?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
    <!-- form tambah jasa -->
    <?php if (isset($_GET['status'])): ?>
        <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
            <?= $_GET['status'] === 'success' ? 'Jasa berhasil ditambahkan!' : 'Gagal menambahkan Jasa.' ?>
        </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold">Tambah Jasa</h2>
    <form action="../../modules/jasa/jasaController.php" method="POST"
        class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
        <div class="mb-5">
            <label for="idUser" class="block mb-2 text-sm font-medium text-gray-900">ID User</label>
            <select id="idJasa" name="idJasa" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Pilih user</option>
                <?php foreach ($userList as $index => $user): ?>
                    <option value="<?= $user['idUser'] ?>">
                        <?= htmlspecialchars($user['namaLengkap']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-5">
            <label for="jenisJasa" class="block mb-2 text-sm font-medium text-gray-900">Jenis Jasa</label>
            <select id="jenisJasa" name="jenisJasa" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Pilih jenis jasa</option>
                <option value="penyewaan">Penyewaan</option>
                <option value="booking">Booking</option>
            </select>
        </div>
        <button type="submit" name="tambahBarang"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan
            Barang</button>
    </form>
</div>

<?php include '../layouts/footer.php' ?>