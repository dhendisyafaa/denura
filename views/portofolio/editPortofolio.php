<?php
include '../../modules/portofolio/portofolioController.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header("Location: index.php?status=invalid_id");
  exit;
}
$idPortofolio = intval($_GET['id']);
$portofolio = getPortofolioById($idPortofolio);

if (!$portofolio) {
  header("Location: index.php?status=not_found");
  exit;
}

include '../layouts/heading.php';
include '../layouts/sidebar.php';
?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
  <!-- form edit portofolio -->
  <?php if (isset($_GET['status'])): ?>
    <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
      <?= $_GET['status'] === 'success' ? 'Portofolio berhasil diedit!' : 'Gagal mengedit portofolio.' ?>
    </div>
  <?php endif; ?>

  <h2 class="text-2xl font-bold">Edit Portofolio</h2>
  <form action="../../modules/portofolio/portofolioController.php" method="POST"
    class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
    <input type="hidden" name="idPortofolio" value="<?= $portofolio['idPortofolio'] ?>">

    <div class="mb-5">
      <label for="judulKarya" class="block mb-2 text-sm font-medium text-gray-900">Judul Karya</label>
      <input type="text" id="judulKarya" name="judulKarya" value="<?= htmlspecialchars($portofolio['judulKarya']) ?>"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>

    <div class="mb-5">
      <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
      <textarea id="deskripsi" name="deskripsi" rows="4" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        required><?= htmlspecialchars($portofolio['deskripsi']) ?></textarea>
    </div>

    <div class="mb-5">
      <label for="tipeKarya" class="block mb-2 text-sm font-medium text-gray-900">Tipe Karya</label>
      <select id="tipeKarya" name="tipeKarya" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        <?php
        $options = ['Fotografi', 'Videografi'];
        foreach ($options as $option):
          $selected = $portofolio['tipeKarya'] === $option ? 'selected' : '';
          ?>
          <option value="<?= $option ?>" <?= $selected ?>><?= $option ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button type="submit" name="editPortofolio" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Simpan Perubahan
    </button>
  </form>
</div>

<?php include '../layouts/footer.php' ?>