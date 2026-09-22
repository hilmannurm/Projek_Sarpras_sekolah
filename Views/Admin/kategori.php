<?php
require_once '../../Controllers/c_kategori.php';

require_once __DIR__ . '/../../Controllers/auth_admin.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Kategori</title>

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
                <h1 class="font-bold text-green-700">
                    Pengaduan
                </h1>

                <p class="text-xs text-gray-500">
                    Sarpras Sekolah
                </p>
            </div>

        </div>


        <nav class="p-4">

            <!-- DASHBOARD -->
            <a href="dashboard_admin.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-gauge w-5"></i>

                Dashboard

            </a>


            <!-- ASPIRASI -->
            <a href="/Projek_Sapras_hilman/Views/Admin/daftar_aspirasi.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-file-lines w-5"></i>

                Aspirasi

            </a>


            <!-- HISTORI -->
            <a href="histori.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-clock-rotate-left w-5"></i>

                Histori

            </a>


            <!-- SISWA -->
            <a href="daftar_siswa.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 mb-2">

                <i class="fa-solid fa-user-graduate w-5"></i>

                Siswa

            </a>


            <!-- KATEGORI -->
            <a href="kategori.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-green-50 text-green-600 font-medium mb-2">

                <i class="fa-solid fa-layer-group w-5"></i>

                Kategori

            </a>


            <!-- LOGOUT -->
            <a href="../../Controllers/c_logout.php"
                onclick="return confirm('Yakin ingin logout?')"
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
                    Data Kategori
                </h2>

                <p class="text-sm text-gray-500">
                    Kelola kategori pengaduan sarana dan prasarana sekolah
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

            <div class="bg-white rounded-xl shadow-sm p-8">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h3 class="text-lg font-semibold text-gray-800">
                            Daftar Kategori
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Kelola kategori yang digunakan dalam pengaduan.
                        </p>

                    </div>


                    <!-- TAMBAH KATEGORI -->
                    <a href="form_tambah_kategori.php"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">

                        <i class="fa-solid fa-plus mr-2"></i>

                        Tambah Kategori

                    </a>

                </div>


                <!-- TABLE -->
                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="border-b text-left">

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    No
                                </th>

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    Nama Kategori
                                </th>

                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php
                            $no = 1;

                            foreach ($kategoris as $kategori) {
                            ?>

                                <tr class="border-b hover:bg-gray-50">

                                    <td class="px-4 py-4 text-sm text-gray-700">
                                        <?php echo $no++; ?>
                                    </td>


                                    <td class="px-4 py-4 text-sm text-gray-700">

                                        <?php echo htmlspecialchars($kategori->nama_kategori); ?>

                                    </td>


                                    <td class="px-4 py-4">

                                        <!-- EDIT -->
                                        <a href="form_edit_kategori.php?aksi=edit&id=<?php echo $kategori->id_kategori; ?>"
                                            class="text-blue-600 hover:text-blue-800 mr-4"
                                            title="Edit">

                                            <i class="fa-solid fa-pen-to-square"></i>

                                        </a>


                                        <!-- HAPUS -->
                                        <a href="../../Controllers/c_kategori.php?aksi=hapus&id=<?php echo $kategori->id_kategori; ?>"
                                            class="text-red-600 hover:text-red-800"
                                            title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus kategori ini?');">

                                            <i class="fa-solid fa-trash"></i>

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