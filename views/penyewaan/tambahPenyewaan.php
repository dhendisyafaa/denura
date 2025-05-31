<?php 
include '../../modules/jasa/jasaController.php';
include '../../modules/barang/barangController.php';
$jasaList = getAllJasa();
$barangList = getAllBarang();
include '../layouts/heading.php';
include '../layouts/sidebar.php'; 
?>

<div class="p-4 sm:ml-64 min-h-screen flex flex-col items-center justify-center">
    <!-- form tambah penyewaan -->
    <?php if (isset($_GET['status'])): ?>
        <div class="mb-4 p-3 rounded-lg text-white 
        <?= $_GET['status'] === 'success' ? 'bg-green-500' : 'bg-red-500' ?>">
            <?= $_GET['status'] === 'success' ? 'Penyewaan berhasil ditambahkan!' : 'Gagal menambahkan Penyewaan.' ?>
        </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold">Tambah Penyewaan</h2>
    <form action="../../modules/penyewaan/penyewaanController.php" method="POST"
        class="w-md mx-auto my-5 p-5 border border-gray-200 rounded-lg shadow-sm">
        <div class="mb-5">
            <label for="idJasa" class="block mb-2 text-sm font-medium text-gray-900">Jasa</label>
            <select id="idJasa" name="idJasa" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Pilih jasa</option>
                <?php foreach ($jasaList as $index => $jasa): ?>
                    <option value="<?= $jasa['idJasa'] ?>">
                        <?= htmlspecialchars($jasa['jenisJasa']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-5">
            <label for="idBarang" class="block mb-2 text-sm font-medium text-gray-900">Barang</label>
            <select id="idBarang" name="idBarang" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Pilih Barang</option>
                <?php foreach ($barangList as $index => $barang): ?>
                    <option value="<?= $barang['idBarang'] ?>" data-harga="<?= $barang['hargaBarang'] ?>">
                        <?= htmlspecialchars($barang['namaBarang']) ?> - Rp <?= number_format($barang['hargaBarang'], 0, ',', '.') ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-5">
            <label for="tglSewa" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Sewa</label>
            <input type="datetime-local" id="tglSewa" name="tglSewa"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required />
        </div>
        <div class="mb-5">
            <label for="tglPengembalian" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                Pengembalian</label>
            <input type="datetime-local" id="tglPengembalian" name="tglPengembalian"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required />
        </div>
        <div class="mb-5">
            <label for="hargaSewa" class="block mb-2 text-sm font-medium text-gray-900">Harga Sewa</label>
            <input type="number" id="hargaSewa" name="hargaSewa" disabled
                value="<?=  htmlspecialchars($barang['hargaBarang']) ?>"  class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="Rp" required />
        </div>
        <button type="submit" name="tambahPenyewaan"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Simpan Penyewaan
        </button>
    </form>
</div>

<script>
    const barangSelect = document.getElementById('idBarang');
    const hargaSewaInput = document.getElementById('hargaSewa');

    barangSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const harga = selectedOption.getAttribute('data-harga');
        hargaSewaInput.value = harga ? parseInt(harga) : '';
    });
</script>

<?php include '../layouts/footer.php' ?>