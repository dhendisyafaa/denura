<?php

include '../../modules/user/userController.php';
$userList = getAllUser();
include '../layouts/heading.php';
include '../layouts/sidebar.php'; ?>


<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
  <!-- form tambah portofolio -->
  <?php if (isset($_GET['status'])): ?>
    <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
      <?= $_GET['status'] === 'success' ? 'Portofolio berhasil ditambahkan!' : 'Gagal menambahkan portofolio.' ?>
    </div>
  <?php endif; ?>

  <h2 class="text-2xl font-bold">Tambah Portofolio</h2>
  <form action="../../modules/portofolio/portofolioController.php" method="POST"
    class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
    <div class="mb-5">
      <label for="idUser" class="block mb-2 text-sm font-medium text-gray-900">ID User</label>
      <select id="idUser" name="idUser" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Pilih user</option>
        <?php foreach ($userList as $index => $user): ?>
          <option value="<?= $user['idUser'] ?>">
            <?= htmlspecialchars($user['namaLengkap']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-5">
      <label for="judulKarya" class="block mb-2 text-sm font-medium text-gray-900">Judul Karya</label>
      <input type="text" id="judulKarya" name="judulKarya"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
        placeholder="" required />
    </div>
    <div class="mb-5">
      <label for="linkPortofolio" class="block mb-2 text-sm font-medium text-gray-900">Link Portofolio</label>
      <input type="text" id="linkPortofolio" name="linkPortofolio"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
        placeholder="" required />
    </div>
    <div class="mb-5">
      <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
      <input type="text" id="deskripsi" name="deskripsi"
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
        placeholder="" required />
    </div>
    <div class="mb-5">
      <label for="tipeKarya" class="block mb-2 text-sm font-medium text-gray-900">Tipe Karya</label>
      <select id="tipeKarya" name="tipeKarya" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Pilih tipe</option>
        <option value="Fotografi">Fotografi</option>
        <option value="Videografi">Videografi</option>
        </option>
      </select>
    </div>
    <button type="submit" name="tambahPortofolio"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan
      Portofolio</button>
  </form>
</div>

<?php include '../layouts/footer.php' ?>