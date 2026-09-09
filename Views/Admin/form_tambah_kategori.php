<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kategori</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-gray-100">

    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-md">

        <div class="h-20 flex items-center px-6 border-b">

            <div class="w-11 h-11 bg-green-100 rounded-xl flex items-center justify-center mr-3">
                <i class="fa-solid fa-bullhorn text-xl text-green-600"></i>
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

        <nav class="p-4">

            <a href="dashboard_admin.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-gauge w-5"></i>

                Dashboard

            </a>

            <a href="../../Controllers/c_aspirasi.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-file-lines w-5"></i>

                Aspirasi

            </a>

            <a href="../../Controllers/c_histori.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-clock-rotate-left w-5"></i>

                Histori

            </a>

            <a href="../../Controllers/c_siswa.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-user-graduate w-5"></i>

                Siswa

            </a>

            <a href="../../Controllers/c_kategori.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-green-50 text-green-600 mb-2">

                <i class="fa-solid fa-layer-group w-5"></i>

                Kategori

            </a>

            <a href="../../Controllers/c_logout.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 mt-8">

                <i class="fa-solid fa-right-from-bracket w-5"></i>

                Logout

            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="ml-64 min-h-screen">

        <!-- HEADER -->
        <header class="bg-white h-20 shadow-sm flex items-center justify-between px-8">

            <div>

                <h2 class="text-xl font-semibold text-gray-800">
                    Tambah Kategori
                </h2>

                <p class="text-sm text-gray-500">
                    Tambahkan kategori baru untuk pengaduan
                </p>

            </div>


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
                flex items-center
                justify-center">

                    <i class="fa-solid fa-user-shield
                  text-green-600">
                    </i>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <div class="p-8">

            <div class="bg-white rounded-xl shadow-sm p-8 max-w-2xl">

                <div class="mb-6">

                    <h3 class="text-lg font-semibold text-gray-800">
                        Form Tambah Kategori
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Masukkan nama kategori yang ingin ditambahkan.
                    </p>

                </div>


                <!-- FORM -->
                <form action="../../Controllers/c_kategori.php?aksi=tambah"
                    method="POST">

                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Kategori
                        </label>

                        <input type="text"
                            name="nama_kategori"
                            placeholder="Masukkan nama kategori"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                    </div>


                    <div class="flex items-center gap-3">

                        <a href="../Admin/kategori.php"
                            class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100">

                            <i class="fa-solid fa-arrow-left mr-2"></i>

                            Kembali

                        </a>


                        <button type="submit"
                            class="px-5 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700">

                            <i class="fa-solid fa-plus mr-2"></i>

                            Tambah Kategori

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>