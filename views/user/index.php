<?php
include '../../modules/user/userController.php';
$userList = getAllUser();
?>

<?php include '../layouts/heading.php' ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="p-4 sm:ml-64">
  <h1 class="text-2xl text-bold my-3">Daftar User</h1>
  <a href="../register.php">
    <button type="button"
      class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tambah
      User</button>
  </a>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-400">
      <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
        <tr>
          <th cope="col" class="px-6 py-3">ID User</th>
          <th cope="col" class="px-6 py-3">Nama</th>
          <th cope="col" class="px-6 py-3">Email</th>
          <th cope="col" class="px-6 py-3">No Telp</th>
          <th cope="col" class="px-6 py-3">Tipe user</th>
          <th cope="col" class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($userList)): ?>
          <tr>
            <td colspan="7">Tidak ada data user.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($userList as $i => $p): ?>
            <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
              <td><?= htmlspecialchars($p['idUser']) ?></td>
              <td><?= htmlspecialchars($p['namaLengkap']) ?></td>
              <td><?= htmlspecialchars($p['email']) ?></td>
              <td><?= htmlspecialchars($p['noTelp']) ?></td>
              <td><?= htmlspecialchars($p['tipeUser']) ?></td>
              <td>
                <a href="editUser.php?id=<?= $p['idUser'] ?>">Edit</a>
                <form method="POST" action="../../modules/user/userController.php"
                  onsubmit="return confirm('Yakin ingin menghapus?');">
                  <input type="hidden" name="idUser" value="<?= $p['idUser'] ?>">
                  <input type="hidden" name="action" value="deleteUser">
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