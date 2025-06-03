<?php
include '../../modules/review/reviewController.php';
$reviewList = getAllReview();
?>

<?php include '../layouts/heading.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="p-4 sm:ml-64">
    <h1 class="text-2xl text-bold my-3">Daftar Review</h1>
    <a href="tambahReview.php">
        <button type="button"
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 
            focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 mb-2">
            Tambah Review
        </button>
    </a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Rating</th>
                    <th class="px-6 py-3">Komentar</th>
                    <th class="px-6 py-3">Tanggal Review</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($reviewList)): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center">Tidak ada review.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($reviewList as $index => $review): ?>
                        <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
                            <td class="px-6 py-4"><?= $index + 1 ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($review['idReview']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($review['rating']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($review['komentar']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($review['tglReview']) ?></td>
                            <td class="px-6 py-4">
                                <div class="inline-flex" role="group">
                                    <a href="editReview.php?id=<?= $review['idReview'] ?>" class="px-4 py-2 text-sm font-medium text-orange-500 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100">
                                        Edit
                                    </a>
                                    <form method="POST" action="../../modules/review/reviewController.php"
                                        onsubmit="return confirm('Yakin ingin menghapus review ini?');">
                                        <input type="hidden" name="idReview" value="<?= $review['idReview'] ?>">
                                        <input type="hidden" name="hapusReview" value="1">
                                        <button type="submit" class="px-4 py-2 text-sm font-medium text-red-500 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100">
                                            Delete
                                        </button>
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

<?php include '../layouts/footer.php'; ?>
