<?php
require_once '../../Controllers/c_dashboard_siswa.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa</title>

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

            <!-- DASHBOARD -->
            <a href="dashboard_siswa.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-green-100 text-green-700 font-medium mb-2">

                <i class="fa-solid fa-gauge"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- ASPIRASI SAYA -->
            <a href="daftar_aspirasi.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-700 mb-2">

                <i class="fa-solid fa-file-lines"></i>

                <span>
                    Aspirasi Saya
                </span>

            </a>


            <!-- BUAT ASPIRASI -->
            <a href="tambah_pengaduan.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-700 mb-2">

                <i class="fa-solid fa-plus"></i>

                <span>
                    Buat Aspirasi
                </span>

            </a>


            <!-- LOGOUT -->
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
                    Dashboard
                </h2>

                <p class="text-sm text-gray-400">
                    Pantau perkembangan aspirasi kamu
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

            <!-- JUDUL -->
            <div class="flex items-center justify-between mb-6">

                <div>

                    <h3 class="text-xl font-semibold text-gray-800">
                        Selamat datang, <?= htmlspecialchars($_SESSION['nama_siswa']); ?>
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Sampaikan aspirasi terkait sarana dan prasarana sekolah.
                    </p>

                </div>
            </div>


            <!-- STATISTIK -->
            <div class="grid grid-cols-4 gap-5 mb-6">

                <!-- TOTAL -->
                <div class="bg-white rounded-xl border border-gray-200 p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-500">
                                Total Aspirasi
                            </p>

                            <h3 class="text-2xl font-bold text-gray-800 mt-2">
                                <?= $statistik->total; ?>
                            </h3>

                        </div>

                        <div class="w-11 h-11 bg-green-100 rounded-lg flex items-center justify-center">

                            <i class="fa-solid fa-file-lines text-green-600"></i>

                        </div>

                    </div>

                </div>


                <!-- DIPROSES -->
                <div class="bg-white rounded-xl border border-gray-200 p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-500">
                                Diproses
                            </p>

                            <h3 class="text-2xl font-bold text-gray-800 mt-2">
                                <?= $statistik->diproses; ?>
                            </h3>

                        </div>

                        <div class="w-11 h-11 bg-blue-100 rounded-lg flex items-center justify-center">

                            <i class="fa-solid fa-clock text-blue-600"></i>

                        </div>

                    </div>

                </div>


                <!-- DIPERBAIKI -->
                <div class="bg-white rounded-xl border border-gray-200 p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-500">
                                Diperbaiki
                            </p>

                            <h3 class="text-2xl font-bold text-gray-800 mt-2">
                                <?= $statistik->diperbaiki; ?>
                            </h3>

                        </div>

                        <div class="w-11 h-11 bg-yellow-100 rounded-lg flex items-center justify-center">

                            <i class="fa-solid fa-screwdriver-wrench text-yellow-600"></i>

                        </div>

                    </div>

                </div>


                <!-- SELESAI -->
                <div class="bg-white rounded-xl border border-gray-200 p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-500">
                                Selesai
                            </p>

                            <h3 class="text-2xl font-bold text-gray-800 mt-2">
                                <?= $statistik->selesai; ?>
                            </h3>

                        </div>

                        <div class="w-11 h-11 bg-green-100 rounded-lg flex items-center justify-center">

                            <i class="fa-solid fa-circle-check text-green-600"></i>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ASPIRASI TERBARU -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">

                    <div>

                        <h3 class="font-semibold text-gray-800">
                            Aspirasi Terbaru
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Aspirasi yang telah kamu kirim.
                        </p>

                    </div>

                    <a href="daftar_aspirasi.php"
                        class="text-sm text-green-600 hover:text-green-700 font-medium">

                        Lihat Semua

                    </a>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 border-b border-gray-200">

                            <tr>

                                <th class="text-left px-6 py-4 font-medium text-gray-600">
                                    No
                                </th>

                                <th class="text-left px-6 py-4 font-medium text-gray-600">
                                    Judul Laporan
                                </th>

                                <th class="text-left px-6 py-4 font-medium text-gray-600">
                                    Kategori
                                </th>

                                <th class="text-left px-6 py-4 font-medium text-gray-600">
                                    Tanggal
                                </th>

                                <th class="text-left px-6 py-4 font-medium text-gray-600">
                                    Status
                                </th>

                                <th class="text-center px-6 py-4 font-medium text-gray-600">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_object($aspirasis)) :
                            ?>

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 text-gray-500">
                                        <?= $no++; ?>
                                    </td>

                                    <td class="px-6 py-4">

                                        <p class="font-medium text-gray-800">
                                            <?= htmlspecialchars($data->judul_laporan); ?>
                                        </p>

                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        <?= htmlspecialchars($data->nama_kategori); ?>
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        <?= date('d-m-Y H:i', strtotime($data->tanggal_dikirim)); ?>
                                    </td>

                                    <td class="px-6 py-4">

                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">

                                            <?= htmlspecialchars($data->status); ?>

                                        </span>

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        <a href="detail_aspirasi.php?id_aspirasi=<?= $data->id_aspirasi; ?>"
                                            class="inline-flex items-center gap-2 px-3 py-2 border border-green-600 text-green-700 hover:bg-green-50 rounded-lg text-sm font-medium transition">

                                            <i class="fa-solid fa-eye"></i>

                                            Detail

                                        </a>

                                    </td>

                                </tr>

                            <?php endwhile; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

</body>

</html>