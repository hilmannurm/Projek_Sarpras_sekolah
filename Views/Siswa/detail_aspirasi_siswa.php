<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Aspirasi</title>

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
            <a href="../Views/Siswa/dashboard_siswa.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-gauge"></i>

                <span>Dashboard</span>

            </a>


            <!-- ASPIRASI SAYA -->
            <a href="c_aspirasi_siswa.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg bg-green-100 text-green-700
                       font-medium mb-2">

                <i class="fa-solid fa-file-lines"></i>

                <span>Aspirasi Saya</span>

            </a>


            <!-- BUAT ASPIRASI -->
            <a href="c_aspirasi.php?aksi=form_tambah"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-plus"></i>

                <span>Buat Aspirasi</span>

            </a>


            <!-- LOGOUT -->
            <a href="c_logout.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-red-50 hover:text-red-600
                       mt-8">

                <i class="fa-solid fa-right-from-bracket"></i>

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
                    Detail Aspirasi
                </h2>

                <p class="text-sm text-gray-500">
                    Lihat perkembangan aspirasi yang telah dikirim
                </p>

            </div>


            <!-- PROFIL SISWA -->
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

                    <i class="fa-solid fa-user text-green-600"></i>

                </div>

            </div>


        </header>


        <!-- ISI -->
        <section class="p-8">


            <!-- KEMBALI -->
            <div class="mb-6">

                <a href="c_aspirasi_siswa.php"
                    class="inline-flex items-center gap-2
                           text-gray-600 hover:text-green-600">

                    <i class="fa-solid fa-arrow-left"></i>

                    Kembali ke Aspirasi Saya

                </a>

            </div>


            <!-- DETAIL ASPIRASI -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">


                <!-- JUDUL -->
                <div class="mb-6">

                    <h1 class="text-2xl font-bold text-gray-800">

                        <?= htmlspecialchars($data_aspirasi->judul_laporan); ?>

                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Detail pengaduan yang telah kamu kirim
                    </p>

                </div>


                <!-- DATA ASPIRASI -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    <!-- KATEGORI -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Kategori
                        </p>

                        <p class="font-medium text-gray-800 mt-1">

                            <?= htmlspecialchars($data_aspirasi->nama_kategori); ?>

                        </p>

                    </div>


                    <!-- LOKASI -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Lokasi
                        </p>

                        <p class="font-medium text-gray-800 mt-1">

                            <?= htmlspecialchars($data_aspirasi->lokasi); ?>

                        </p>

                    </div>


                    <!-- TANGGAL -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Tanggal Dikirim
                        </p>

                        <p class="font-medium text-gray-800 mt-1">

                            <?= date(
                                'd-m-Y H:i',
                                strtotime($data_aspirasi->tanggal_dikirim)
                            ); ?>

                        </p>

                    </div>


                    <!-- STATUS -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Status
                        </p>

                        <p class="font-medium text-green-600 mt-1">

                            <?= htmlspecialchars($data_aspirasi->status); ?>

                        </p>

                    </div>


                </div>


                <!-- KETERANGAN -->
                <div class="mt-6">

                    <p class="text-sm text-gray-500 mb-2">
                        Keterangan Laporan
                    </p>

                    <div class="bg-gray-50 rounded-xl p-4 text-gray-700">

                        <?= nl2br(
                            htmlspecialchars($data_aspirasi->keterangan)
                        ); ?>

                    </div>

                </div>


                <!-- BUKTI FOTO -->
                <div class="mt-6">

                    <p class="text-sm text-gray-500 mb-2">
                        Bukti Foto
                    </p>

                    <img
                        src="../Upload/<?= htmlspecialchars($data_aspirasi->bukti_foto); ?>"
                        alt="Bukti foto"
                        class="max-w-md rounded-xl border">

                </div>


            </div>


            <!-- PROGRES -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">


                <div class="flex items-center gap-3 mb-6">

                    <div class="w-10 h-10 rounded-lg bg-green-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-bars-progress text-green-600"></i>

                    </div>


                    <div>

                        <h2 class="text-lg font-semibold text-gray-800">
                            Progres Penanganan
                        </h2>

                        <p class="text-sm text-gray-500">
                            Perkembangan penanganan aspirasi kamu
                        </p>

                    </div>

                </div>


                <div class="space-y-4">


                    <?php while ($data = mysqli_fetch_object($data_progres)) : ?>


                        <div class="border rounded-xl p-4">


                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="font-medium text-gray-800">

                                        <?= htmlspecialchars($data->tahap_progres); ?>

                                    </p>


                                    <p class="text-sm text-gray-500 mt-1">

                                        Oleh
                                        <?= htmlspecialchars($data->nama_lengkap); ?>

                                    </p>

                                </div>


                                <p class="text-xs text-gray-500">

                                    <?= date(
                                        'd-m-Y H:i',
                                        strtotime($data->tanggal_progres)
                                    ); ?>

                                </p>

                            </div>


                            <div class="mt-4">

                                <p class="text-xs text-gray-500 mb-2">
                                    Foto Bukti Progres
                                </p>


                                <img
                                    src="../Upload/<?= htmlspecialchars($data->foto_bukti); ?>"
                                    alt="Foto bukti progres"
                                    class="max-w-sm rounded-lg border">

                            </div>


                        </div>


                    <?php endwhile; ?>


                </div>

            </div>


            <!-- HISTORI -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">


                <div class="flex items-center gap-3 mb-6">

                    <div class="w-10 h-10 rounded-lg bg-gray-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-clock-rotate-left text-gray-600"></i>

                    </div>


                    <div>

                        <h2 class="text-lg font-semibold text-gray-800">
                            Histori Status
                        </h2>

                        <p class="text-sm text-gray-500">
                            Riwayat perubahan status aspirasi
                        </p>

                    </div>

                </div>


                <div class="space-y-4">


                    <?php while ($data = mysqli_fetch_object($data_histori)) : ?>


                        <div class="border rounded-xl p-4">


                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="font-medium text-gray-800">

                                        <?= htmlspecialchars($data->status_lama); ?>

                                        <i class="fa-solid fa-arrow-right
                                                  mx-2 text-gray-400"></i>

                                        <?= htmlspecialchars($data->status_baru); ?>

                                    </p>


                                    <p class="text-sm text-gray-500 mt-1">

                                        Oleh
                                        <?= htmlspecialchars($data->nama_lengkap); ?>

                                    </p>

                                </div>


                                <p class="text-xs text-gray-500">

                                    <?= date(
                                        'd-m-Y H:i',
                                        strtotime($data->tanggal_perubahan)
                                    ); ?>

                                </p>

                            </div>


                        </div>


                    <?php endwhile; ?>


                </div>

            </div>


            <!-- TANGGAPAN ADMIN -->
            <div class="bg-white rounded-2xl shadow-sm p-6">


                <div class="flex items-center gap-3 mb-6">

                    <div class="w-10 h-10 rounded-lg bg-green-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-reply text-green-600"></i>

                    </div>


                    <div>

                        <h2 class="text-lg font-semibold text-gray-800">
                            Tanggapan Admin
                        </h2>

                        <p class="text-sm text-gray-500">
                            Tanggapan dari admin terhadap aspirasi kamu
                        </p>

                    </div>

                </div>


                <div class="bg-gray-50 rounded-xl p-4 text-gray-700">

                    <?= nl2br(
                        htmlspecialchars($data_aspirasi->umpan_balik ?? '')
                    ); ?>

                </div>


            </div>


        </section>

    </main>


</body>

</html>