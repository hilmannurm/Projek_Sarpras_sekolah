<?php
require_once '../../Controllers/c_aspirasi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Aspirasi</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-50">

    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-md">

        <!-- Logo -->
        <div class="h-20 px-6 border-b flex items-center gap-3">

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


        <!-- Menu -->
        <nav class="p-4">

            <a href="dashboard_admin.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-gauge"></i>
                <span>Dashboard</span>

            </a>


            <a href="daftar_aspirasi.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg bg-green-100 text-green-700
                       font-medium mb-2">

                <i class="fa-solid fa-file-lines"></i>
                <span>Aspirasi</span>

            </a>


            <a href="/Projek_sapras_hilman/Controllers/c_histori.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>Histori</span>

            </a>


            <a href="daftar_siswa.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-user-graduate"></i>
                <span>Siswa</span>

            </a>


            <a href="kategori.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-green-50 hover:text-green-700
                       mb-2">

                <i class="fa-solid fa-layer-group"></i>
                <span>Kategori</span>

            </a>


            <a href="../../Controllers/c_logout.php"
                class="flex items-center gap-3 px-4 py-3
                       rounded-lg text-gray-600
                       hover:bg-red-50 hover:text-red-600
                       mt-8">

                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>

            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="ml-64 min-h-screen">

        <!-- TOPBAR -->
        <header class="bg-white h-20 shadow-sm flex items-center justify-between px-8">

            <div>

                <h2 class="text-xl font-bold text-gray-800">
                    Detail Aspirasi
                </h2>

                <p class="text-sm text-gray-500">
                    Kelola pengaduan sarana dan prasarana sekolah
                </p>

            </div>


            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="font-semibold text-gray-700">
                        Admin
                    </p>

                    <p class="text-xs text-gray-500">
                        Administrator
                    </p>

                </div>


                <div class="w-10 h-10 rounded-full bg-green-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-user-shield text-green-600"></i>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="p-8">

            <!-- Kembali -->
            <div class="mb-6">

                <a href="daftar_aspirasi.php"
                    class="inline-flex items-center gap-2
                           text-gray-600 hover:text-green-600">

                    <i class="fa-solid fa-arrow-left"></i>

                    Kembali ke daftar aspirasi

                </a>

            </div>


            <!-- DETAIL ASPIRASI -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">

                <div class="mb-6">

                    <h1 class="text-2xl font-bold text-gray-800">
                        <?= htmlspecialchars($data_aspirasi->judul_laporan); ?>
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Detail pengaduan siswa
                    </p>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <p class="text-sm text-gray-500">
                            Nama Siswa
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            <?= htmlspecialchars($data_aspirasi->nama_siswa); ?>
                        </p>

                    </div>


                    <div>

                        <p class="text-sm text-gray-500">
                            NIS
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            <?= htmlspecialchars($data_aspirasi->nis); ?>
                        </p>

                    </div>


                    <div>

                        <p class="text-sm text-gray-500">
                            Kelas
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            <?= htmlspecialchars($data_aspirasi->kelas); ?>
                        </p>

                    </div>


                    <div>

                        <p class="text-sm text-gray-500">
                            Kategori
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            <?= htmlspecialchars($data_aspirasi->nama_kategori); ?>
                        </p>

                    </div>


                    <div>

                        <p class="text-sm text-gray-500">
                            Lokasi
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            <?= htmlspecialchars($data_aspirasi->lokasi); ?>
                        </p>

                    </div>


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

                </div>


                <!-- Keterangan -->
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


                <!-- Bukti Foto -->
                <div class="mt-6">

                    <p class="text-sm text-gray-500 mb-2">
                        Bukti Foto
                    </p>

                    <img
                        src="../../Upload/<?= htmlspecialchars($data_aspirasi->bukti_foto); ?>"
                        alt="Bukti foto"
                        class="max-w-md rounded-xl border">

                </div>

            </div>


            <!-- STATUS -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">

                <h2 class="text-lg font-semibold text-gray-800 mb-4">
                    Status Aspirasi
                </h2>

                <div class="flex items-center gap-3">

                    <div class="w-3 h-3 rounded-full bg-green-500"></div>

                    <p class="font-medium text-gray-800">
                        <?= htmlspecialchars($data_aspirasi->status); ?>
                    </p>

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
                            Perkembangan penanganan aspirasi
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
                                        Oleh <?= htmlspecialchars($data->nama_lengkap); ?>
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
                                    src="../../Upload/<?= htmlspecialchars($data->foto_bukti); ?>"
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

<?php if ($form_tanggapan) : ?>

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
                    Berikan tanggapan terhadap aspirasi siswa
                </p>

            </div>

        </div>


        <form
            action="../../Controllers/c_aspirasi.php?aksi=tanggapi"
            method="POST"
            enctype="multipart/form-data">


            <input
                type="hidden"
                name="id_aspirasi"
                value="<?= $data_aspirasi->id_aspirasi; ?>">



            <!-- Status Berikutnya -->
            <div class="mb-5">

                <label class="block text-sm font-medium
                              text-gray-700 mb-2">

                    Status Berikutnya

                </label>

                <input
                    type="text"
                    value="<?= htmlspecialchars($status_berikutnya); ?>"
                    readonly
                    class="w-full border border-gray-300
                           bg-gray-100 rounded-lg px-4 py-3
                           text-gray-700">

                <input
                    type="hidden"
                    name="status"
                    value="<?= htmlspecialchars($status_berikutnya); ?>">

            </div>


            <!-- Umpan Balik -->
            <div class="mb-5">

                <label class="block text-sm font-medium
                              text-gray-700 mb-2">

                    Tanggapan Admin

                </label>

                <textarea
                    name="umpan_balik"
                    rows="4"
                    placeholder="Tuliskan tanggapan untuk siswa..."
                    class="w-full border border-gray-300
                           rounded-lg px-4 py-3
                           resize-none
                           focus:outline-none
                           focus:ring-2 focus:ring-green-500"><?= htmlspecialchars($data_aspirasi->umpan_balik ?? ''); ?></textarea>

            </div>


            <!-- Foto Bukti -->
            <div class="mb-6">

                <label class="block text-sm font-medium
                              text-gray-700 mb-2">

                    Foto Bukti Progres

                </label>

                <input
                    type="file"
                    name="foto_bukti"
                    accept="image/*"
                    required
                    class="w-full border border-gray-300
                           rounded-lg px-4 py-3">

                <p class="text-xs text-gray-500 mt-2">
                    Foto bukti wajib diupload setiap kali status diperbarui.
                </p>

            </div>


            <!-- Tombol -->
            <div class="flex justify-end gap-3">

                <a
                    href="daftar_aspirasi.php"
                    class="px-5 py-3 rounded-lg
                           border border-gray-300
                           text-gray-600
                           hover:bg-gray-50">

                    Kembali

                </a>


                <button
                    type="submit"
                    class="px-5 py-3 rounded-lg
                           bg-green-600
                           hover:bg-green-700
                           text-white font-medium">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Simpan Tanggapan

                </button>

            </div>

        </form>

    </div>

<?php else : ?>

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-lg bg-green-100
                        flex items-center justify-center">

                <i class="fa-solid fa-circle-check text-green-600"></i>

            </div>

            <div>

                <h2 class="text-lg font-semibold text-gray-800">
                    Aspirasi Selesai
                </h2>

                <p class="text-sm text-gray-500">
                    Aspirasi ini telah selesai ditangani dan tidak dapat diubah lagi.
                </p>

            </div>

        </div>

    </div>

<?php endif; ?>

        </section>

    </main>

</body>

</html>