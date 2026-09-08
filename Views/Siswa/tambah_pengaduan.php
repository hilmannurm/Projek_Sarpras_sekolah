<?php
session_start();

require_once '../../Models/m_kategori.php';

$kategori = new m_kategori();
$data_kategori = $kategori->tampil_kategori();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buat Aspirasi</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#15803d',
                        'soft-green': '#f0fdf4'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">

    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-white border-r border-gray-200">

        <!-- LOGO -->
        <div class="h-20 px-6 border-b border-gray-200 flex items-center gap-3">

            <div class="w-11 h-11 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-bullhorn text-green-600 text-lg"></i>
            </div>

            <div>
                <h1 class="font-bold text-gray-800">
                    Pengaduan
                </h1>

                <p class="text-xs text-gray-500">
                    Sarpras Sekolah
                </p>
            </div>

        </div>


        <!-- MENU -->
        <nav class="p-4">

            <a href="dashboard_siswa.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-700 mb-2">

                <i class="fa-solid fa-gauge"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <a href="daftar_aspirasi.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-700 mb-2">

                <i class="fa-solid fa-file-lines"></i>

                <span>
                    Aspirasi Saya
                </span>

            </a>


            <a href="tambah_pengaduan.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-green-100 text-green-700 font-medium mb-2">

                <i class="fa-solid fa-plus"></i>

                <span>
                    Buat Aspirasi
                </span>

            </a>


            <a href="../../Controllers/c_logout.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600">

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>
                    Logout
                </span>

            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="ml-64 min-h-screen">

        <!-- HEADER -->
        <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8">

            <div>

                <h2 class="text-lg font-semibold text-gray-800">
                    Buat Aspirasi
                </h2>

                <p class="text-sm text-gray-400">
                    Sampaikan laporan mengenai sarana dan prasarana sekolah
                </p>

            </div>


            <!-- PROFILE -->
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="text-sm font-medium text-gray-700">
                        <?= htmlspecialchars($_SESSION['nama_siswa']); ?>
                    </p>

                    <p class="text-xs text-gray-400">
                        NIS <?= htmlspecialchars($_SESSION['nis']); ?>
                    </p>

                </div>

                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">

                    <i class="fa-solid fa-user text-green-600"></i>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="p-8">

            <div class="max-w-4xl">

                <!-- TITLE -->
                <div class="mb-6">

                    <h3 class="text-xl font-semibold text-gray-800">
                        Form Aspirasi
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Isi data laporan dengan lengkap agar dapat segera ditindaklanjuti.
                    </p>

                </div>


                <!-- FORM -->
                <div class="bg-white rounded-xl border border-gray-200">

                    <form action="../../Controllers/c_aspirasi.php?aksi=tambah"
                        method="POST"
                        enctype="multipart/form-data">


                        <!-- ID SISWA -->
                        <input type="hidden"
                            name="id_siswa"
                            value="<?= $_SESSION['id_siswa']; ?>">


                        <div class="p-6 space-y-6">


                            <!-- KATEGORI -->
                            <div>

                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Kategori
                                </label>

                                <select name="id_kategori"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">

                                    <option value="">
                                        Pilih kategori
                                    </option>

                                    <?php while ($data = mysqli_fetch_object($data_kategori)) : ?>

                                        <option value="<?= $data->id_kategori; ?>">
                                            <?= htmlspecialchars($data->nama_kategori); ?>
                                        </option>

                                    <?php endwhile; ?>

                                </select>

                            </div>


                            <!-- JUDUL -->
                            <div>

                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Judul Laporan
                                </label>

                                <input type="text"
                                    name="judul_laporan"
                                    required
                                    placeholder="Contoh: Keran air toilet rusak"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">

                            </div>


                            <!-- KETERANGAN -->
                            <div>

                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Keterangan
                                </label>

                                <textarea name="keterangan"
                                    rows="5"
                                    required
                                    placeholder="Jelaskan kondisi atau masalah sarana dan prasarana yang ingin dilaporkan..."
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm resize-none focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>

                            </div>


                            <!-- LOKASI -->
                            <div>

                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Lokasi
                                </label>

                                <input type="text"
                                    name="lokasi"
                                    required
                                    placeholder="Contoh: Toilet lantai 2"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">

                            </div>


                            <!-- FOTO -->
                            <div>

                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Bukti Foto
                                </label>

                                <div class="border border-dashed border-gray-300 rounded-lg p-5">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">

                                            <i class="fa-solid fa-image text-green-600"></i>

                                        </div>

                                        <div>

                                            <p class="text-sm font-medium text-gray-700">
                                                Upload foto kondisi sarana
                                            </p>

                                            <p class="text-xs text-gray-400 mt-1">
                                                Pilih foto yang sesuai dengan laporan
                                            </p>

                                        </div>

                                    </div>

                                    <input type="file"
                                        name="bukti_foto"
                                        accept="image/*"
                                        required
                                        class="mt-4 block w-full text-sm text-gray-500">

                                </div>

                            </div>

                        </div>


                        <!-- BUTTON -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">

                            <a href="dashboard_siswa.php"
                                class="px-4 py-2.5 border border-gray-300 text-gray-600 hover:bg-gray-100 rounded-lg text-sm font-medium transition">

                                Batal

                            </a>


                            <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition">

                                <i class="fa-solid fa-paper-plane"></i>

                                Kirim Aspirasi

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </section>

    </main>

</body>

</html>