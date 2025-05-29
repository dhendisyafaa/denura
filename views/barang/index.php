<?php
include '../../controllers/barangController.php';
$barangList = getAllBarang();
?>


<?php include '../heading.php' ?>
<?php include '../sidebar.php'; ?>

<div class="p-4 sm:ml-64">
    <h1 class="text-2xl text-bold my-3">Daftar Barang</h1>
    <a href="tambahBarang.php">
        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tambah Barang</button>
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
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($barangList)): ?>
                    <tr class="px-6 py-4">
                        <td colspan="5">Tidak ada data barang.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($barangList as $index => $barang): ?>
                        <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
                            <td class="px-6 py-4">
                                <?= $index + 1 ?>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= htmlspecialchars($barang['idBarang']) ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= htmlspecialchars($barang['namaBarang']) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= htmlspecialchars($barang['hargaBarang']) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= htmlspecialchars($barang['stok']) ?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="inline-flex rounded-md shadow-xs" role="group">
                                    <a href="editBarang.php?id=<?= $barang['idBarang'] ?>" type="button" class="px-4 py-2 text-sm font-medium text-orange-500 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-2 focus:ring-gray-700 focus:text-gray-700">
                                        Edit
                                    </a>
                                    <form method="POST" action="../../controllers/barangController.php" onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                                        <input type="hidden" name="idBarang" value="<?= $barang['idBarang'] ?>">
                                        <input type="hidden" name="hapusBarang" value="1">
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