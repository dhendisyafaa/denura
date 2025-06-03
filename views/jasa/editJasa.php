<?php
include '../../modules/user/userController.php';
include '../../modules/jasa/jasaController.php';
$jasaList = getAllJasa();
$userList = getAllUser();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php?status=invalid_id");
    exit;
}

$idJasa = intval($_GET['id']);
$jasa = getJasaById($idJasa);

if (!$jasa) {
    header("Location: index.php?status=not_found");
    exit;
}
include '../layouts/heading.php';
include '../layouts/sidebar.php'; 
?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
    <!-- form edit jasa -->
    <?php if (isset($_GET['status'])): ?>
        <div class="mb-4 p-3 rounded-lg text-white 
            <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
            <?= $_GET['status'] === 'success' ? 'Jasa berhasil diedit!' : 'Gagal mengedit jasa.' ?>
        </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold">Edit Jasa</h2>
    <form action="../../modules/jasa/jasaController.php" method="POST"
        class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
        <input type="hidden" name="idJasa" value="<?= $jasa['idJasa'] ?>">
        <div class="mb-5">
            <label for="idUser" class="block mb-2 text-sm font-medium text-gray-900">ID User</label>
            <select id="idUser" name="idUser" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Pilih user</option>
                <?php foreach ($userList as $index => $user): ?>
                    <option value="<?= $user['idUser'] ?>" <?= $user['idUser'] == $jasa['idUser'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($user['namaLengkap']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-5">
            <label for="jenisJasa" class="block mb-2 text-sm font-medium text-gray-900">Jenis Jasa</label>
            <select id="jenisJasa" name="jenisJasa" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option disabled <?= !isset($jasa['jenisJasa']) ? 'selected' : '' ?>>Pilih jenis jasa</option>
                <option value="Penyewaan" <?= (isset($jasa['jenisJasa']) && $jasa['jenisJasa'] === 'Penyewaan') ? 'selected' : '' ?>>Penyewaan</option>
                <option value="Booking" <?= (isset($jasa['jenisJasa']) && $jasa['jenisJasa'] === 'Booking') ? 'selected' : '' ?>>Booking</option>
            </select>
        </div>
        <button type="submit" name="editJasa"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Simpan Jasa</button>
    </form>
</div>

<?php include '../layouts/footer.php' ?>