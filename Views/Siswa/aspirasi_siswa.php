<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aspirasi Saya</title>

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
                <h1 class="font-bold text-gray-800">
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


            <a href="c_aspirasi_siswa.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-green-50 text-green-600 mb-2">

                <i class="fa-solid fa-file-lines w-5"></i>

                Aspirasi Saya

            </a>


            <a href="c_aspirasi.php?aksi=form_tambah"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

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
                    Aspirasi Saya
                </h2>

                <p class="text-sm text-gray-500">
                    Daftar laporan yang telah kamu kirim
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

            <div class="bg-white rounded-xl shadow-sm p-8">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h3 class="text-lg font-semibold text-gray-800">
                            Daftar Aspirasi
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Lihat laporan dan perkembangan aspirasi kamu.
                        </p>

                    </div>


                    <a href="c_aspirasi.php?aksi=form_tambah"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">

                        <i class="fa-solid fa-plus mr-2"></i>

                        Buat Aspirasi

                    </a>

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
                            $no = 1;

                            while ($data = mysqli_fetch_object($aspirasis)) {
                            ?>

                                <tr class="border-b hover:bg-gray-50">

                                    <td class="px-4 py-4 text-sm text-gray-700">
                                        <?php echo $no++; ?>
                                    </td>


                                    <td class="px-4 py-4">

                                        <p class="text-sm font-medium text-gray-800">
                                            <?php echo htmlspecialchars($data->judul_laporan); ?>
                                        </p>

                                    </td>


                                    <td class="px-4 py-4 text-sm text-gray-600">

                                        <?php echo htmlspecialchars($data->nama_kategori); ?>

                                    </td>


                                    <td class="px-4 py-4 text-sm text-gray-600">

                                        <?php echo htmlspecialchars($data->lokasi); ?>

                                    </td>


                                    <td class="px-4 py-4 text-sm text-gray-600">

                                        <?php echo date('d-m-Y', strtotime($data->tanggal_dikirim)); ?>

                                    </td>


                                    <td class="px-4 py-4">

                                        <span class="px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-700">

                                            <?php echo htmlspecialchars($data->status); ?>

                                        </span>

                                    </td>


                                    <td class="px-4 py-4">

                                        <a href="c_aspirasi_siswa.php?id_aspirasi=<?php echo $data->id_aspirasi; ?>"
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

            </div>

        </div>

    </main>

</body>

</html>