<?php
require_once '../../Controllers/c_riwayat_aspirasi.php';

require_once __DIR__ . '/../../Controllers/auth_siswa.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Histori Aspirasi</title>

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
                <h1 class="font-bold text-green-700">
                    Pengaduan
                </h1>

                <p class="text-xs text-gray-500">
                    Sarpras Sekolah
                </p>
            </div>

        </div>

        <nav class="p-4">

            <a href="/Projek_Sapras_hilman/Views/Siswa/dashboard_siswa.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-gauge w-5"></i>

                Dashboard

            </a>


            <a href="aspirasi_siswa.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-file-lines w-5"></i>

                Aspirasi Saya

            </a>


            <a href="riwayat_aspirasi.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-green-50 text-green-700 font-medium mb-2">

                <i class="fa-solid fa-clock-rotate-left w-5"></i>

                Histori Aspirasi

            </a>


            <a href="../../Controllers/c_logout.php"
                onclick="return confirm('Yakin ingin logout?')"
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
                    Histori Aspirasi
                </h2>

                <p class="text-sm text-gray-500">
                    Daftar aspirasi yang telah selesai atau ditolak
                </p>

            </div>


            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="font-semibold text-gray-700">
                        <?= htmlspecialchars($_SESSION['nama_siswa']); ?>
                    </p>

                    <p class="text-xs text-gray-400">
                        Nis <?= htmlspecialchars($_SESSION['nis']); ?>
                    </p>

                </div>

                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">

                    <i class="fa-solid fa-user text-green-600"></i>

                </div>

            </div>

        </header>


        <div class="p-8">

            <div class="bg-white rounded-xl shadow-sm p-8">

                <div class="mb-6">

                    <h3 class="text-lg font-semibold text-gray-800">
                        Histori
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Aspirasi dengan status selesai dan ditolak.
                    </p>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="border-b text-left">

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    No
                                </th>

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    Judul Laporan
                                </th>

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    Kategori
                                </th>

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    Lokasi
                                </th>

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    Tanggal
                                </th>

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    Status
                                </th>

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    Detail
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php
                            $no = (($halaman - 1) * 10) + 1;

                            while ($data = mysqli_fetch_object($riwayat)) {
                            ?>

                                <tr class="border-b hover:bg-gray-50">

                                    <td class="px-4 py-4 text-sm text-gray-700">
                                        <?= $no++; ?>
                                    </td>


                                    <td class="px-4 py-4">

                                        <p class="text-sm font-medium text-gray-800">
                                            <?= htmlspecialchars($data->judul_laporan); ?>
                                        </p>

                                    </td>


                                    <td class="px-4 py-4 text-sm text-gray-600">
                                        <?= htmlspecialchars($data->nama_kategori); ?>
                                    </td>


                                    <td class="px-4 py-4 text-sm text-gray-600">
                                        <?= htmlspecialchars($data->lokasi); ?>
                                    </td>


                                    <td class="px-4 py-4 text-sm text-gray-600">
                                        <?= date('d-m-Y', strtotime($data->tanggal_dikirim)); ?>
                                    </td>


                                    <td class="px-4 py-4">

                                        <?php if ($data->status == 'selesai') : ?>

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                                Selesai
                                            </span>

                                        <?php elseif ($data->status == 'ditolak') : ?>

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                                Ditolak
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td class="px-4 py-4">

                                        <a href="detail_aspirasi_siswa.php?id_aspirasi=<?= $data->id_aspirasi; ?>"
                                            class="text-green-600 hover:text-green-800"
                                            title="Lihat detail">

                                            <i class="fa-solid fa-eye"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>

                    </table>

                </div>

                <!-- ================= PAGINATION ================= -->
                <?php if (isset($total_halaman) && $total_halaman > 1) : ?>

                    <div class="px-6 py-5 border-t flex items-center justify-between">

                        <!-- Informasi halaman -->
                        <p class="text-sm text-gray-500">
                            Halaman <?= $halaman; ?> dari <?= $total_halaman; ?>
                        </p>

                        <!-- Tombol pagination -->
                        <div class="flex items-center gap-2">

                            <!-- Sebelumnya -->
                            <?php if ($halaman > 1) : ?>

                                <a
                                    href="?riwayat=1&halaman=<?= $halaman - 1; ?>"
                                    class="px-3 py-2 rounded-lg border border-gray-300
                           text-gray-600 hover:bg-gray-100 transition">

                                    <i class="fa-solid fa-chevron-left"></i>

                                </a>

                            <?php endif; ?>

                            <!-- Nomor halaman -->
                            <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>

                                <a
                                    href="?riwayat=1&halaman=<?= $i; ?>"
                                    class="px-3 py-2 rounded-lg border transition
                                    <?= $i == $halaman
                                    ? 'bg-green-600 text-white border-green-600'
                                    : 'border-gray-300 text-gray-600 hover:bg-gray-100'; ?>">

                                    <?= $i; ?>

                                </a>

                            <?php endfor; ?>

                            <!-- Berikutnya -->
                            <?php if ($halaman < $total_halaman) : ?>

                                <a
                                    href="?riwayat=1&halaman=<?= $halaman + 1; ?>"
                                    class="px-3 py-2 rounded-lg border border-gray-300
                           text-gray-600 hover:bg-gray-100 transition">

                                    <i class="fa-solid fa-chevron-right"></i>

                                </a>

                            <?php endif; ?>

                        </div>
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </main>

</body>

</html>