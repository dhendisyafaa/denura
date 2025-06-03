<?php
include '../../modules/barang/barangController.php';
session_start();
$barangList = getAllBarang();
$tipeUser = $_SESSION['tipeUser'] ?? null;
?>

<?php include '../layouts/heading.php' ?>

<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Daftar Barang</h2>
            <?php if ($tipeUser === 'Admin'): ?>
                <a href="tambahBarang.php">
                    <button type="button" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        + Tambah Barang
                    </button>
                </a>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <?php foreach ($barangList as $barang): ?>
                <div class="group">
                    <img src="<?= htmlspecialchars($barang['urlGambar']) ?>"
                        alt="<?= htmlspecialchars($barang['namaBarang']) ?>"
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

                    <h3 class="mt-4 text-sm text-gray-700"><?= htmlspecialchars($barang['namaBarang']) ?></h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        Rp<?= number_format($barang['hargaBarang']) ?>
                    </p>
                    <p class="text-sm text-gray-500">Stok: <?= htmlspecialchars($barang['stok']) ?></p>

                    <?php if ($tipeUser === 'Admin'): ?>
                        <div class="flex gap-2 mt-2">
                            <a href="editBarang.php?id=<?= $barang['idBarang'] ?>"
                                class="flex-1 text-center text-sm bg-yellow-500 text-white py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form method="POST" action="../../modules/barang/barangController.php" class="flex-1"
                                onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                                <input type="hidden" name="idBarang" value="<?= $barang['idBarang'] ?>">
                                <input type="hidden" name="hapusBarang" value="1">
                                <button type="submit"
                                    class="w-full text-sm bg-red-500 text-white py-1 rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php' ?>