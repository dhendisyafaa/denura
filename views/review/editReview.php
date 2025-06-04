<?php
include '../../modules/review/reviewController.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header("Location: index.php?status=invalid_id");
  exit;
}

$idReview = intval($_GET['id']);
$review = getReviewById($idReview);

if (!$review) {
  header("Location: index.php?status=not_found");
  exit;
}

include '../layouts/heading.php';
include '../layouts/sidebar.php';
?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
  <?php if (isset($_GET['status'])): ?>
    <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'updated' ? 'bg-green-500' : 'bg-red-500' ?>">
      <?= $_GET['status'] === 'updated' ? 'Review berhasil diedit!' : 'Gagal mengedit review.' ?>
    </div>
  <?php endif; ?>

  <h2 class="text-2xl font-bold">Edit Review</h2>
  <form action="../../modules/review/reviewController.php" method="POST"
    class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
    <input type="hidden" name="idReview" value="<?= $review['idReview'] ?>">
    <div class="mb-5">
      <label for="idJasa" class="block mb-2 text-sm font-medium text-gray-900">ID Jasa</label>
      <input type="number" id="idJasa" name="idJasa" value="<?= htmlspecialchars($review['idJasa']) ?>" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
      <label for="rating" class="block mb-2 text-sm font-medium text-gray-900">Rating</label>
      <input type="number" id="rating" name="rating" min="1" max="5" value="<?= htmlspecialchars($review['rating']) ?>"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
      <label for="komentar" class="block mb-2 text-sm font-medium text-gray-900">Komentar</label>
      <input type="text" id="komentar" name="komentar" value="<?= htmlspecialchars($review['komentar']) ?>" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
      <label for="tglReview" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Review</label>
      <input type="datetime-local" id="tglReview" name="tglReview"
        value="<?= date('Y-m-d\TH:i', strtotime($review['tglReview'])) ?>" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <button type="submit" name="editReview" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Simpan Review
    </button>
  </form>
</div>

<?php include '../layouts/footer.php'; ?>