<?php
    require_once '../../Controllers/c_histori.php';
    
    require_once __DIR__ . '/../../Controllers/auth_admin.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Histori - Pengaduan</title>

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
                       rounded-lg bg-green-100 text-green-700
                       font-medium mb-2">

                <i class="fa-solid fa-clock-rotate-left w-5"></i>

                <span>Histori</span>

            </a>


            <!-- SISWA -->
            <a href="daftar_siswa.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

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
            <a href="../Controllers/c_logout.php"
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

            <div>

                <h2 class="text-xl font-bold text-gray-800">
                    Histori
                </h2>

                <p class="text-sm text-gray-500">
                    Daftar aspirasi yang telah selesai
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


        <!-- ISI -->
        <section class="p-8">

            <!-- DAFTAR HISTORI -->
            <div class="bg-white rounded-xl shadow-sm
                        border border-gray-200 overflow-hidden">

                <!-- HEADER -->
                <div class="px-6 py-5 border-b border-gray-200">

                    <h3 class="text-lg font-semibold text-gray-800">
                        Aspirasi Selesai
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Daftar aspirasi yang telah diselesaikan
                    </p>

                </div>


                <!-- TABLE -->
                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-gray-50 border-b border-gray-200">

                            <tr>

                                <th class="px-6 py-4 text-left text-sm
                                           font-semibold text-gray-600">
                                    No
                                </th>

                                <th class="px-6 py-4 text-left text-sm
                                           font-semibold text-gray-600">
                                    Siswa
                                </th>

                                <th class="px-6 py-4 text-left text-sm
                                           font-semibold text-gray-600">
                                    Judul Laporan
                                </th>

                                <th class="px-6 py-4 text-left text-sm
                                           font-semibold text-gray-600">
                                    Kategori
                                </th>

                                <th class="px-6 py-4 text-left text-sm
                                           font-semibold text-gray-600">
                                    Lokasi
                                </th>

                                <th class="px-6 py-4 text-left text-sm
                                           font-semibold text-gray-600">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-left text-sm
                                           font-semibold text-gray-600">
                                    Status
                                </th>


                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-200">

                            <?php
                            $no = 1;

                            while ($data = mysqli_fetch_object($historis)) {
                            ?>

                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <?php echo $no++; ?>
                                    </td>


                                    <td class="px-6 py-4">

                                        <p class="font-medium text-gray-800">
                                            <?php echo $data->nama_siswa; ?>
                                        </p>

                                        <p class="text-xs text-gray-500">
                                            <?php echo $data->nis; ?>
                                            -
                                            <?php echo $data->kelas; ?>
                                        </p>

                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        <?php echo $data->judul_laporan; ?>
                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <?php echo $data->nama_kategori; ?>
                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <?php echo $data->lokasi; ?>
                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <?php echo date(
                                            'd-m-Y',
                                            strtotime($data->tanggal_dikirim)
                                        ); ?>
                                    </td>


                                    <td class="px-6 py-4">

                                        <span class="inline-flex px-3 py-1
                                                     rounded-full text-xs
                                                     font-medium bg-green-100
                                                     text-green-700">

                                            <?php echo $data->status; ?>

                                        </span>

                                    </td>

                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

</body>

</html>