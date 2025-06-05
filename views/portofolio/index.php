<?php
include '../../modules/portofolio/portofolioController.php';
$portofolioList = getAllPortofolio();
?>

<?php include '../layouts/heading.php' ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="p-4 sm:ml-64">
  <h1 class="text-2xl text-bold my-3">Daftar Portofolio</h1>
  <a href="tambahPortofolio.php">
    <button type="button"
      class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tambah
      Portofolio</button>
  </a>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-400">
      <thead class="text-xs uppercase bg-gray-700 text-gray-400">
        <tr>
          <th cope="col" class="px-6 py-3">#</th>
          <th cope="col" class="px-6 py-3">ID</th>
          <th cope="col" class="px-6 py-3">Judul</th>
          <th cope="col" class="px-6 py-3">Link Portofolio</th>
          <th cope="col" class="px-6 py-3">Deskripsi</th>
          <th cope="col" class="px-6 py-3">Tipe</th>
          <th cope="col" class="px-6 py-3">Tanggal</th>
          <th cope="col" class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($portofolioList)): ?>
          <tr>
            <td colspan="7">Tidak ada data portofolio.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($portofolioList as $i => $p): ?>
            <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
              <td><?= $i + 1 ?></td>
              <td><?= htmlspecialchars($p['idPortofolio']) ?></td>
              <td><?= htmlspecialchars($p['judulKarya']) ?></td>
              <td><?= htmlspecialchars($p['linkPortofolio']) ?></td>
              <td><?= htmlspecialchars($p['deskripsi']) ?></td>
              <td><?= htmlspecialchars($p['tipeKarya']) ?></td>
              <td><?= htmlspecialchars($p['tglUpload']) ?></td>
              <td>
                <a href="editPortofolio.php?id=<?= $p['idPortofolio'] ?>">Edit</a>
                <form method="POST" action="../../modules/portofolio/portofolioController.php"
                  onsubmit="return confirm('Yakin ingin menghapus?');">
                  <input type="hidden" name="idPortofolio" value="<?= $p['idPortofolio'] ?>">
                  <input type="hidden" name="hapusPortofolio" value="1">
                  <button type="submit">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        <?php endif ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../layouts/footer.php' ?>