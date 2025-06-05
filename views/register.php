<?php
include '../views/layouts/heading.php';
session_start();
$tipeUser = $_SESSION['tipeUser'] ?? null; ?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">
    <p class="font-bold text-xl md:text-2xl">Denura</p>
    <h2 class="mt-10 text-2xl/9 font-bold tracking-tight text-gray-900">Daftarkan dirimu!</h2>
  </div>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="../modules/user/userController.php" method="POST">
      <input type="hidden" name="action" value="insert">
      <div>
        <label for="namaLengkap" class="block text-sm/6 font-medium text-gray-900">Nama lengkap</label>
        <div class="mt-2">
          <input type="text" name="namaLengkap" id="namaLengkap" required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <label for="noTelp" class="block text-sm/6 font-medium text-gray-900">No. Telepon</label>
        <div class="mt-2">
          <input type="tel" name="noTelp" id="noTelp" required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
        <div class="mt-2">
          <input type="email" name="email" id="email" autocomplete="email" required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Kata sandi</label>
          <!-- <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Lupa kata sandi?</a>
          </div> -->
        </div>
        <div class="mt-2">
          <input type="password" name="password" id="password" autocomplete="current-password" required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <?php if ($tipeUser === 'Admin'): ?>
        <div>
          <label for="email" class="block text-sm/6 font-medium text-gray-900">Tipe user</label>
          <div class="mt-2">
            <select id="tipeUser" name="tipeUser" required
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              <option value="Klien">Klien</option>
              <option value="Admin">Admin</option>
              <option value="Fotografer">Fotografer</option>
              <option value="Videografer">Videografer</option>
              </option>
            </select>
          </div>
        </div>
      <?php endif; ?>
      <div>
        <button type="submit"
          class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
      </div>
    </form>
    <p class="mt-10 text-center text-sm/6 text-gray-500">
      Sudah punya akun?
      <a href="/views/login.php" class="font-semibold text-indigo-600 hover:text-indigo-500">Login saja!</a>
    </p>
  </div>
</div>