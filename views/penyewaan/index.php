<?php
include '../../controllers/penyewaanController.php';
$penyewaanList = getAllPenyewaan();
?>


<?php include '../heading.php' ?>
<?php include '../sidebar.php'; ?>

<div class="p-4 sm:ml-64">
    <h1 class="text-2xl text-bold my-3">Daftar Penyewaan Peralatan</h1>
    <a href="tambahPenyewaan.php">
        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            Tambah Penyewaan
        </button>
    </a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID Jasa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Sewa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pengembalian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Sewa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($penyewaanList)): ?>
                    <tr class="px-6 py-4">
                        <td colspan="5">Tidak ada data penyewaan.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($penyewaanList as $index => $penyewaan): ?>
                        <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
                            <td class="px-6 py-4">
                                <?= $index + 1 ?>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= htmlspecialchars($penyewaan['idSewa']) ?>
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= htmlspecialchars($penyewaan['idJasa']) ?>
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= htmlspecialchars($penyewaan['idBarang']) ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= htmlspecialchars($penyewaan['tglSewa']) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= htmlspecialchars($penyewaan['tglPengembalian']) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= htmlspecialchars($penyewaan['hargaSewa']) ?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="inline-flex rounded-md shadow-xs" role="group">
                                    <a href="editPenyewaan.php?id=<?= $penyewaan['idSewa'] ?>" type="button" class="px-4 py-2 text-sm font-medium text-orange-500 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-2 focus:ring-gray-700 focus:text-gray-700">
                                        Edit
                                    </a>
                                    <form method="POST" action="../../controllers/penyewaanController.php" onsubmit="return confirm('Yakin ingin menghapus penyewaan ini?');">
                                        <input type="hidden" name="idSewa" value="<?= $penyewaan['idSewa'] ?>">
                                        <input type="hidden" name="hapusPenyewaan" value="1">
                                        <button type="submit" class="px-4 py-2 text-sm font-medium text-red-500 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-2 focus:ring-gray-700">Delete</button>
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

<?php include '../footer.php' ?>