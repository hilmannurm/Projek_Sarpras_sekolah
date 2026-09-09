<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buat Aspirasi</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-gray-100">

    <aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-md">

        <div class="h-20 flex items-center px-6 border-b">
            <div class="w-11 h-11 bg-green-100 rounded-xl flex items-center justify-center mr-3">
                <i class="fa-solid fa-bullhorn text-xl text-green-600"></i>
            </div>

            <div>
                <h1 class="font-bold text-gray-800">Pengaduan</h1>
                <p class="text-xs text-gray-500">Sarpras Sekolah</p>
            </div>
        </div>

        <nav class="p-4">

            <a href="/Projek_Sapras_hilman/Views/Siswa/dashboard_siswa.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">
                <i class="fa-solid fa-gauge w-5"></i>
                Dashboard
            </a>

            <a href="../Controllers/c_aspirasi_siswa.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">
                <i class="fa-solid fa-file-lines w-5"></i>
                Aspirasi Saya
            </a>

            <a href="../../Controllers/c_aspirasi.php?aksi=form_tambah"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-green-50 text-green-600 mb-2">
                <i class="fa-solid fa-pen-to-square w-5"></i>
                Buat Aspirasi
            </a>

            <a href="../Controllers/c_logout.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 mt-8">
                <i class="fa-solid fa-right-from-bracket w-5"></i>
                Logout
            </a>

        </nav>

    </aside>


    <main class="ml-64 min-h-screen">

        <header class="bg-white h-20 shadow-sm flex items-center justify-between px-8">

            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Buat Aspirasi
                </h2>

                <p class="text-sm text-gray-500">
                    Sampaikan laporan mengenai sarana dan prasarana sekolah
                </p>
            </div>

            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="font-semibold text-gray-700">
                        <?= htmlspecialchars($_SESSION['nama_siswa']); ?>
                    </p>

                    <p class="text-xs text-gray-500">
                        Nis <?= htmlspecialchars($_SESSION['nis']); ?>
                    </p>

                </div>

                <div class="w-10 h-10 rounded-full
                bg-green-100
                flex items-center
                justify-center">

                    <i class="fa-solid fa-user-shield
                  text-green-600">
                    </i>

                </div>

            </div>

        </header>


        <div class="p-8">

            <div class="bg-white rounded-xl shadow-sm p-8 max-w-4xl">

                <div class="mb-6">

                    <h3 class="text-lg font-semibold text-gray-800">
                        Form Aspirasi
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Silakan isi laporan dengan lengkap dan jelas.
                    </p>

                </div>


                <form action="../../Projek_Sapras_hilman/Controllers/c_aspirasi.php?aksi=tambah"
                    method="POST"
                    enctype="multipart/form-data">

                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Laporan
                        </label>

                        <input type="text"
                            name="judul_laporan"
                            placeholder="Contoh: Kerusakan meja di kelas"
                            required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">

                    </div>


                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori
                        </label>

                        <select name="id_kategori"
                            required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">

                            <option value="">Pilih kategori</option>

                            <?php foreach ($kategoris as $kategori) { ?>

                                <option value="<?php echo $kategori->id_kategori; ?>">
                                    <?php echo htmlspecialchars($kategori->nama_kategori); ?>
                                </option>

                            <?php } ?>

                        </select>

                    </div>


                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Lokasi
                        </label>

                        <input type="text"
                            name="lokasi"
                            placeholder="Contoh: Ruang kelas X RPL 1"
                            required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">

                    </div>


                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                            rows="5"
                            placeholder="Jelaskan kondisi atau masalah yang ingin dilaporkan..."
                            required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>

                    </div>


                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Bukti Foto
                        </label>

                        <input type="file"
                            name="bukti_foto"
                            accept="image/*"
                            required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white">

                        <p class="text-xs text-gray-500 mt-2">
                            Upload foto yang menunjukkan kondisi sarana atau prasarana yang dilaporkan.
                        </p>

                    </div>


                    <div class="flex items-center gap-3">

                        <a href="../Views/Siswa/dashboard_siswa.php"
                            class="px-5 py-3 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-100">
                            Batal
                        </a>

                        <button type="submit"
                            class="px-5 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            <i class="fa-solid fa-paper-plane mr-2"></i>
                            Kirim Aspirasi
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>