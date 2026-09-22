<?php
require_once '../../Controllers/c_siswa.php';

require_once __DIR__ . '/../../Controllers/auth_admin.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Siswa - Pengaduan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-gray-100">

    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-md">

        <!-- LOGO -->
        <div class="h-20 flex items-center px-6 border-b">

            <div class="w-11 h-11 bg-green-100 rounded-xl
                        flex items-center justify-center mr-3">

                <i class="fa-solid fa-bullhorn text-xl text-green-600"></i>

            </div>

            <div>

                <h1 class="font-bold text-green-700">
                    Pengaduan
                </h1>

                <p class="text-xs text-gray-500">
                    Sarpras Sekolah
                </p>

            </div>

        </div>


        <!-- MENU -->
        <nav class="p-4">

            <!-- DASHBOARD -->
            <a href="dashboard_admin.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-gauge w-5"></i>

                <span>Dashboard</span>

            </a>


            <!-- ASPIRASI -->
            <a href="daftar_aspirasi.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-file-lines w-5"></i>

                <span>Aspirasi</span>

            </a>


            <!-- HISTORI -->
            <a href="histori.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-clock-rotate-left w-5"></i>

                <span>Histori</span>

            </a>


            <!-- SISWA -->
            <a href="daftar_siswa.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg bg-green-100 text-green-700
                       font-medium mb-2">

                <i class="fa-solid fa-user-graduate w-5"></i>

                <span>Siswa</span>

            </a>


            <!-- KATEGORI -->
            <a href="kategori.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-layer-group w-5"></i>

                <span>Kategori</span>

            </a>


            <!-- LOGOUT -->
            <a href="../../Controllers/c_logout.php"
                onclick="return confirm('Yakin ingin logout?')"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-red-50 hover:text-red-600
                       mt-8">

                <i class="fa-solid fa-right-from-bracket w-5"></i>

                <span>Logout</span>

            </a>

        </nav>

    </aside>


    <!-- CONTENT UTAMA -->
    <main class="ml-64 min-h-screen">

        <!-- TOPBAR -->
        <header class="bg-white h-20 shadow-sm
                       flex items-center justify-between px-8">

            <!-- JUDUL -->
            <div>

                <h2 class="text-xl font-bold text-gray-800">
                    Edit Siswa
                </h2>

                <p class="text-sm text-gray-500">
                    Ubah data siswa
                </p>

            </div>


            <!-- PROFIL ADMIN -->
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="font-semibold text-gray-700">
                        <?= htmlspecialchars($_SESSION['username']); ?>
                    </p>

                    <p class="text-xs text-gray-500">
                        Administrator
                    </p>

                </div>

                <div class="w-10 h-10 rounded-full
                            bg-green-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-user-shield text-green-600"></i>

                </div>

            </div>

        </header>


        <!-- ISI FORM -->
        <section class="p-8">

            <div class="max-w-3xl">

                <!-- CARD -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">

                    <!-- CARD HEADER -->
                    <div class="px-6 py-5 border-b border-gray-200">

                        <h3 class="text-lg font-semibold text-gray-800">
                            Data Siswa
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Ubah data siswa dengan benar
                        </p>

                    </div>


                    <!-- FORM -->
                    <form action="/Projek_Sapras_hilman/Controllers/c_siswa.php?aksi=update"
                        method="POST"
                        class="p-6">


                        <input
                            type="hidden"
                            name="id_siswa"
                            value="<?php echo $siswas->id_siswa; ?>">


                        <!-- NIS -->
                        <div class="mb-5">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                NIS
                            </label>

                            <input
                                type="number"
                                name="nis"
                                value="<?php echo $siswas->nis; ?>"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                       focus:outline-none focus:ring-2 focus:ring-green-500">

                        </div>


                        <!-- NAMA SISWA -->
                        <div class="mb-5">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Siswa
                            </label>

                            <input
                                type="text"
                                name="nama_siswa"
                                value="<?php echo $siswas->nama_siswa; ?>"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                       focus:outline-none focus:ring-2 focus:ring-green-500">

                        </div>


                        <!-- KELAS -->
                        <div class="mb-5">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kelas
                            </label>

                            <input
                                type="text"
                                name="kelas"
                                value="<?php echo $siswas->kelas; ?>"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                       focus:outline-none focus:ring-2 focus:ring-green-500">

                        </div>


                        <!-- PASSWORD -->
                        <div class="mb-6">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                placeholder="Kosongkan jika tidak ingin mengubah password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                       focus:outline-none focus:ring-2 focus:ring-green-500">

                        </div>


                        <!-- BUTTON -->
                        <div class="flex items-center gap-3">

                            <!-- KEMBALI -->
                            <a href="daftar_siswa.php"
                                class="px-5 py-3 rounded-lg border border-gray-300
                                       text-gray-600 hover:bg-gray-50">

                                <i class="fa-solid fa-arrow-left mr-2"></i>

                                Kembali

                            </a>


                            <!-- SIMPAN -->
                            <button
                                type="submit"
                                class="px-5 py-3 rounded-lg bg-green-600
                                       text-white hover:bg-green-700">

                                <i class="fa-solid fa-floppy-disk mr-2"></i>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </section>

    </main>

</body>

</html>