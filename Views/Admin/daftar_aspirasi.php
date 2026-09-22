<?php
require_once '../../Controllers/c_aspirasi.php';

require_once __DIR__ . '/../../Controllers/auth_admin.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Aspirasi</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-50">

    <!-- ================= SIDEBAR ================= -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-md">

        <!-- Logo -->
        <div class="h-20 px-6 border-b flex items-center gap-3">

            <div class="w-11 h-11 bg-green-100 rounded-xl flex items-center justify-center">
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


        <!-- Menu -->
        <nav class="p-4">

            <!-- Dashboard -->
            <a href="dashboard_admin.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-gauge w-5"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Aspirasi ACTIVE -->
            <a href="daftar_aspirasi.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg bg-green-100 text-green-700
                       font-medium mb-2">

                <i class="fa-solid fa-file-lines w-5"></i>

                <span>
                    Aspirasi
                </span>

            </a>


            <!-- Histori -->
            <a href="histori.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-clock-rotate-left w-5"></i>

                <span>
                    Histori
                </span>

            </a>


            <!-- Siswa -->
            <a href="daftar_siswa.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-user-graduate w-5"></i>

                <span>
                    Siswa
                </span>

            </a>


            <!-- Kategori -->
            <a href="kategori.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-layer-group w-5"></i>

                <span>
                    Kategori
                </span>

            </a>


            <!-- Logout -->
            <a href="../../Controllers/c_logout.php"
                onclick="return confirm('Yakin ingin logout?')"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-red-50 hover:text-red-600
                       mt-8">

                <i class="fa-solid fa-right-from-bracket w-5"></i>

                <span>
                    Logout
                </span>

            </a>

        </nav>

    </aside>


    <!-- ================= MAIN CONTENT ================= -->
    <main class="ml-64 min-h-screen">


        <!-- ================= TOPBAR ================= -->
        <header class="bg-white h-20 shadow-sm flex items-center justify-between px-8">

            <div>

                <h2 class="text-xl font-semibold text-gray-800">
                    Daftar Aspirasi
                </h2>

                <p class="text-sm text-gray-500">
                    Kelola pengaduan sarana dan prasarana sekolah
                </p>

            </div>


            <!-- Profile -->
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="font-semibold text-gray-700">
                        <?= htmlspecialchars($_SESSION['username']); ?>
                    </p>

                    <p class="text-xs text-gray-500">
                        Administrator
                    </p>

                </div>

                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">

                    <i class="fa-solid fa-user-shield text-green-600"></i>

                </div>

            </div>

        </header>


        <!-- ================= CONTENT ================= -->
        <section class="p-8">


            <!-- Judul Halaman -->
            <div class="mb-6">

                <h1 class="text-2xl font-bold text-gray-800">
                    Aspirasi Siswa
                </h1>

                <p class="text-gray-500 mt-1">
                    Daftar pengaduan sarana dan prasarana yang dikirim oleh siswa.
                </p>

            </div>


            <!-- ================= FILTER ================= -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">

                <!-- Judul Filter + Reset -->
                <div class="flex items-start justify-between mb-5">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">

                            <i class="fa-solid fa-filter text-green-600"></i>

                        </div>

                        <div>

                            <h2 class="text-lg font-semibold text-gray-800">
                                Filter Aspirasi
                            </h2>

                            <p class="text-sm text-gray-500">
                                Saring aspirasi berdasarkan tanggal, bulan, siswa, atau kategori.
                            </p>

                        </div>

                    </div>


                    <!-- Reset -->
                    <a
                        href="daftar_aspirasi.php"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg
                               hover:bg-gray-200 transition">

                        <i class="fa-solid fa-rotate-left mr-2"></i>
                        Reset

                    </a>

                </div>


                <!-- Form Filter -->
                <form action="daftar_aspirasi.php" method="GET">

                    <div class="flex items-end gap-4">


                        <!-- Filter Tanggal -->
                        <div class="flex-1">

                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Tanggal
                            </label>

                            <input
                                type="date"
                                name="tanggal"
                                value="<?= htmlspecialchars($tanggal); ?>"
                                class="w-full border border-gray-300 rounded-lg
                                       px-3 py-2.5
                                       focus:outline-none focus:ring-2
                                       focus:ring-green-500">

                        </div>


                        <!-- Filter Bulan -->
                        <div class="flex-1">

                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Bulan
                            </label>

                            <select
                                name="bulan"
                                class="w-full border border-gray-300 rounded-lg
                                       px-3 py-2.5
                                       focus:outline-none focus:ring-2
                                       focus:ring-green-500">

                                <option value="">
                                    Semua Bulan
                                </option>

                                <option value="1">
                                    Januari
                                </option>

                                <option value="2">
                                    Februari
                                </option>

                                <option value="3">
                                    Maret
                                </option>

                                <option value="4">
                                    April
                                </option>

                                <option value="5">
                                    Mei
                                </option>

                                <option value="6">
                                    Juni
                                </option>

                                <option value="7">
                                    Juli
                                </option>

                                <option value="8">
                                    Agustus
                                </option>

                                <option value="9">
                                    September
                                </option>

                                <option value="10">
                                    Oktober
                                </option>

                                <option value="11">
                                    November
                                </option>

                                <option value="12">
                                    Desember
                                </option>

                            </select>

                        </div>


                        <!-- Filter Siswa -->
                        <div class="flex-1">

                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Siswa
                            </label>

                            <select
                                name="id_siswa"
                                class="w-full border border-gray-300 rounded-lg
                                       px-3 py-2.5
                                       focus:outline-none focus:ring-2
                                       focus:ring-green-500">

                                <option value="">
                                    Semua Siswa
                                </option>

                                <?php foreach ($data_siswa as $s) : ?>

                                    <option value="<?= $s->id_siswa; ?>">

                                        <?= htmlspecialchars($s->nama_siswa); ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <!-- Filter Kategori -->
                        <div class="flex-1">

                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Kategori
                            </label>

                            <select
                                name="id_kategori"
                                class="w-full border border-gray-300 rounded-lg
                                       px-3 py-2.5
                                       focus:outline-none focus:ring-2
                                       focus:ring-green-500">

                                <option value="">
                                    Semua Kategori
                                </option>

                                <?php foreach ($data_kategori as $k) : ?>

                                    <option value="<?= $k->id_kategori; ?>">

                                        <?= htmlspecialchars($k->nama_kategori); ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <!-- Terapkan -->
                        <button
                            type="submit"
                            class="px-5 py-2.5
                                   bg-green-600
                                   hover:bg-green-700
                                   text-white
                                   rounded-lg
                                   font-medium
                                   transition
                                   whitespace-nowrap">

                            <i class="fa-solid fa-filter mr-2"></i>
                            Terapkan

                        </button>

                    </div>

                </form>

            </div>


            <!-- ================= TABLE ================= -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">


                <!-- Header Card -->
                <div class="px-6 py-5 border-b">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="text-lg font-semibold text-gray-800">
                                Daftar Aspirasi
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Kelola dan tanggapi aspirasi siswa.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- Table -->
                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 border-b">

                            <tr>

                                <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                    No
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                    Siswa
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                    Kategori
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                    Judul Laporan
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                    Lokasi
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-center font-semibold text-gray-600">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y">

                            <?php if (!empty($aspirasis)) : ?>

                                <?php
                                $no = 1;

                                while ($data = mysqli_fetch_object($aspirasis)) :
                                ?>

                                    <tr class="hover:bg-gray-50">


                                        <!-- No -->
                                        <td class="px-6 py-4 text-gray-600">

                                            <?= $no++; ?>

                                        </td>


                                        <!-- Siswa -->
                                        <td class="px-6 py-4">

                                            <div>

                                                <p class="font-semibold text-gray-800">

                                                    <?= htmlspecialchars($data->nama_siswa); ?>

                                                </p>

                                                <p class="text-xs text-gray-500 mt-1">

                                                    NIS:
                                                    <?= htmlspecialchars($data->nis); ?>

                                                </p>

                                                <p class="text-xs text-gray-500">

                                                    Kelas:
                                                    <?= htmlspecialchars($data->kelas); ?>

                                                </p>

                                            </div>

                                        </td>


                                        <!-- Kategori -->
                                        <td class="px-6 py-4">

                                            <span
                                                class="inline-flex items-center
                                                       px-3 py-1
                                                       rounded-full
                                                       bg-gray-100
                                                       text-gray-700
                                                       text-xs
                                                       font-medium">

                                                <?= htmlspecialchars($data->nama_kategori); ?>

                                            </span>

                                        </td>


                                        <!-- Judul -->
                                        <td class="px-6 py-4">

                                            <p class="font-medium text-gray-800">

                                                <?= htmlspecialchars($data->judul_laporan); ?>

                                            </p>

                                        </td>


                                        <!-- Lokasi -->
                                        <td class="px-6 py-4 text-gray-600">

                                            <?= htmlspecialchars($data->lokasi); ?>

                                        </td>


                                        <!-- Tanggal -->
                                        <td class="px-6 py-4 text-gray-600">

                                            <?= date(
                                                'd-m-Y',
                                                strtotime($data->tanggal_dikirim)
                                            ); ?>

                                        </td>


                                        <!-- Status -->
                                        <td class="px-6 py-4">

                                            <?php if ($data->status == 'diproses') : ?>

                                                <span
                                                    class="inline-flex items-center
                                                           px-3 py-1
                                                           rounded-full
                                                           bg-yellow-100
                                                           text-yellow-700
                                                           text-xs
                                                           font-medium">

                                                    Diproses

                                                </span>

                                            <?php elseif ($data->status == 'diperbaiki') : ?>

                                                <span
                                                    class="inline-flex items-center
                                                           px-3 py-1
                                                           rounded-full
                                                           bg-orange-100
                                                           text-orange-700
                                                           text-xs
                                                           font-medium">

                                                    Diperbaiki

                                                </span>

                                            <?php elseif ($data->status == 'selesai') : ?>

                                                <span
                                                    class="inline-flex items-center
                                                           px-3 py-1
                                                           rounded-full
                                                           bg-green-100
                                                           text-green-700
                                                           text-xs
                                                           font-medium">

                                                    Selesai

                                                </span>

                                            <?php endif; ?>

                                        </td>


                                        <!-- Aksi -->
                                        <td class="px-6 py-4 text-center">

                                            <a
                                                href="detail_aspirasi.php?id_aspirasi=<?= $data->id_aspirasi; ?>"
                                                class="inline-flex items-center gap-2
                                                       px-4 py-2
                                                       bg-green-600
                                                       hover:bg-green-700
                                                       text-white
                                                       rounded-lg
                                                       text-sm
                                                       font-medium
                                                       transition">

                                                <i class="fa-solid fa-reply"></i>

                                                Tanggapi

                                            </a>

                                        </td>

                                    </tr>

                                <?php endwhile; ?>

                            <?php else : ?>

                                <!-- Data kosong -->
                                <tr>

                                    <td
                                        colspan="8"
                                        class="px-6 py-12 text-center">

                                        <div class="flex flex-col items-center">

                                            <div
                                                class="w-14 h-14 rounded-full
                                                       bg-gray-100
                                                       flex items-center
                                                       justify-center
                                                       mb-4">

                                                <i
                                                    class="fa-solid fa-file-circle-xmark
                                                           text-gray-400
                                                           text-xl">
                                                </i>

                                            </div>


                                            <h3 class="font-semibold text-gray-700">

                                                Belum ada aspirasi

                                            </h3>


                                            <p class="text-sm text-gray-500 mt-1">

                                                Belum ada pengaduan yang dikirim oleh siswa.

                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

</body>

</html>