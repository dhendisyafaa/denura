<?php
include '../../modules/user/userController.php';
session_start();
$tipeUser = $_SESSION['tipeUser'] ?? null;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header("Location: index.php?status=invalid_id");
  exit;
}
$idUser = intval($_GET['id']);
$user = getUserById($idUser);

if (!$user) {
  header("Location: index.php?status=not_found");
  exit;
}

include '../layouts/heading.php';
include '../layouts/sidebar.php';
?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
  <!-- form edit user -->
  <?php if (isset($_GET['status'])): ?>
    <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
      <?= $_GET['status'] === 'success' ? 'User berhasil diedit!' : 'Gagal mengedit user.' ?>
    </div>
  <?php endif; ?>

  <h2 class="text-2xl font-bold">Edit User</h2>
  <form action="../../modules/user/userController.php" method="POST"
    class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
    <input type="hidden" name="idUser" value="<?= $user['idUser'] ?>">
    <input type="hidden" name="action" value="editUser">
    <div class="mb-5">
      <label for="namaLengkap" class="block mb-2 text-sm font-medium text-gray-900">Nama lengkap</label>
      <input type="text" id="namaLengkap" name="namaLengkap" value="<?= htmlspecialchars($user['namaLengkap']) ?>"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
      <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
      <label for="noTelp" class="block mb-2 text-sm font-medium text-gray-900">No Telp</label>
      <input type="noTelp" id="noTelp" name="noTelp" value="<?= htmlspecialchars($user['noTelp']) ?>" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <?php if ($tipeUser === 'Admin'): ?>
      <select id="tipeUser" name="tipeUser"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        required>
        <?php
        $options = ['Klien', 'Admin', 'Fotografer', 'Videografer'];
        foreach ($options as $option):
          $selected = $user['tipeUser'] === $option ? 'selected' : '';
          ?>
          <option value="<?= $option ?>" <?= $selected ?>><?= $option ?></option>
        <?php endforeach; ?>
      </select>
    <?php endif; ?>
    <button type="submit" name="editUser" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Simpan Perubahan
    </button>
  </form>
</div>

<?php include '../layouts/footer.php' ?>