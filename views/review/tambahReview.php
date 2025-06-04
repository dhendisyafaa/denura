<?php include '../layouts/heading.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
  <?php if (isset($_GET['status'])): ?>
    <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
      <?= $_GET['status'] === 'success' ? 'Review berhasil ditambahkan!' : 'Gagal menambahkan review.' ?>
    </div>
  <?php endif; ?>

  <h2 class="text-2xl font-bold">Tambah Review</h2>
  <form action="../../modules/review/reviewController.php" method="POST"
    class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
    <div class="mb-5">
      <label for="idJasa" class="block mb-2 text-sm font-medium text-gray-900">ID Jasa</label>
      <input type="number" id="idJasa" name="idJasa" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
      <label for="rating" class="block mb-2 text-sm font-medium text-gray-900">Rating</label>
      <input type="number" id="rating" name="rating" min="1" max="5" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
      <label for="komentar" class="block mb-2 text-sm font-medium text-gray-900">Komentar</label>
      <input type="text" id="komentar" name="komentar" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
      <label for="tglReview" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Review</label>
      <input type="datetime-local" id="tglReview" name="tglReview" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <button type="submit" name="tambahReview" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Simpan Review
    </button>
  </form>
</div>

<?php include '../layouts/footer.php'; ?>