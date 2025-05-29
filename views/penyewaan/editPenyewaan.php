<?php
include '../../modules/penyewaan/penyewaanController.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php?status=invalid_id");
    exit;
}
$idSewa = intval($_GET['id']);
$penyewaan = getBarangById($idSewa);

if (!$penyewaan) {
    header("Location: index.php?status=not_found");
    exit;
}

include '../heading.php';
include '../sidebar.php';

?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
    <!-- form edit penyewaan -->
    <?php if (isset($_GET['status'])): ?>
        <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
            <?= $_GET['status'] === 'success' ? 'Penyewaan berhasil diedit!' : 'Gagal mengedit Penyewaan.' ?>
        </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold">Edit Penyewaan</h2>
    <form action="../../modules/penyewaan/penyewaanController.php" method="POST"
        class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
        <input type="hidden" name="idSewa" value="<?= $penyewaan['idSewa'] ?>">
        <div class="mb-5">
            <label for="hargaSewa" class="block mb-2 text-sm font-medium text-gray-900">Harga Sewa</label>
            <input placeholder="Rp" type="number" id="hargaSewa" name="hargaSewa"
                value="<?= htmlspecialchars($penyewaan['hargaSewa']) ?>"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required />
        </div>
        <button type="submit" name="editSewa"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan
            Barang</button>
    </form>
</div>

<?php include '../footer.php' ?>