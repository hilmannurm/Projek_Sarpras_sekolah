<?php
require_once '../../Controllers/c_dashboard_admin.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - Pengaduan Sarpras</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
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



        <!-- MENU SIDEBAR -->
        <nav class="p-4">


            <!-- DASHBOARD -->
            <a href="dashboard_admin.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg bg-green-100 text-green-700
                      font-medium mb-2">

                <i class="fa-solid fa-gauge"></i>

                <span>Dashboard</span>

            </a>



            <!-- ASPIRASI -->
            <a href="daftar_aspirasi.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-file-lines"></i>

                <span>Aspirasi</span>

            </a>



            <!-- HISTORI -->
            <a href="/Projek_sapras_hilman/Controllers/c_histori.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-clock-rotate-left"></i>

                <span>Histori</span>

            </a>



            <!-- SISWA -->
            <a href="daftar_siswa.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-user-graduate"></i>

                <span>Siswa</span>

            </a>





            <!-- KATEGORI -->
            <a href="kategori.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-layer-group"></i>

                <span>Kategori</span>

            </a>



            <!-- LOGOUT -->
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




    <!-- CONTENT UTAMA -->
    <main class="ml-64 min-h-screen">


        <!-- TOPBAR -->
        <header class="bg-white h-20 shadow-sm
                       flex items-center justify-between px-8">


            <!-- JUDUL -->
            <div>

                <h2 class="text-xl font-bold text-gray-800">
                    Dashboard
                </h2>

                <p class="text-sm text-gray-500">
                    Kelola pengaduan sarana dan prasarana sekolah
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

                    <i class="fa-solid fa-user-shield
                              text-green-600">
                    </i>

                </div>

            </div>


        </header>




        <!-- ISI DASHBOARD -->
        <div class="p-8">


            <!-- WELCOME -->
            <div class="bg-green-600 rounded-2xl p-6
                        text-white mb-8">


                <h1 class="text-2xl font-bold mb-2">
                    Selamat Datang, <?= htmlspecialchars($_SESSION['username']); ?>
                </h1>


                <p class="text-green-100">
                    Pantau dan kelola aspirasi siswa dengan mudah.
                </p>


            </div>




            <!-- STATISTIK -->
            <div class="grid grid-cols-1 md:grid-cols-2
                        xl:grid-cols-4 gap-6">


                <!-- TOTAL ASPIRASI -->
                <div class="bg-white rounded-2xl
                            shadow-sm p-6">


                    <div class="flex items-center
                                justify-between">


                        <div>

                            <p class="text-gray-500 text-sm">
                                Total Aspirasi
                            </p>


                            <h3 class="text-3xl font-bold
                                       text-gray-800 mt-2">
                                <?=  $statistik->total ?? 0 ?>
                            </h3>

                        </div>


                        <div class="w-12 h-12 rounded-xl
                                    bg-green-100
                                    flex items-center
                                    justify-center">

                            <i class="fa-solid fa-file-lines
                                      text-green-600 text-xl">
                            </i>

                        </div>


                    </div>

                </div>




                <!-- DIPROSES -->
                <div class="bg-white rounded-2xl
                            shadow-sm p-6">


                    <div class="flex items-center
                                justify-between">


                        <div>

                            <p class="text-gray-500 text-sm">
                                Diproses
                            </p>


                            <h3 class="text-3xl font-bold
                                       text-gray-800 mt-2">
                                <?=  $statistik->diproses ?? 0 ?>
                            </h3>

                        </div>


                        <div class="w-12 h-12 rounded-xl
                                    bg-yellow-100
                                    flex items-center
                                    justify-center">

                            <i class="fa-solid fa-spinner
                                      text-yellow-600 text-xl">
                            </i>

                        </div>


                    </div>

                </div>




                <!-- DIPERBAIKI -->
                <div class="bg-white rounded-2xl
                            shadow-sm p-6">


                    <div class="flex items-center
                                justify-between">


                        <div>

                            <p class="text-gray-500 text-sm">
                                Diperbaiki
                            </p>


                            <h3 class="text-3xl font-bold
                                       text-gray-800 mt-2">
                                <?=  $statistik->diperbaiki ?? 0 ?>
                            </h3>

                        </div>


                        <div class="w-12 h-12 rounded-xl
                                    bg-orange-100
                                    flex items-center
                                    justify-center">

                            <i class="fa-solid fa-screwdriver-wrench
                                      text-orange-600 text-xl">
                            </i>

                        </div>


                    </div>

                </div>




                <!-- SELESAI -->
                <div class="bg-white rounded-2xl
                            shadow-sm p-6">


                    <div class="flex items-center
                                justify-between">


                        <div>

                            <p class="text-gray-500 text-sm">
                                Selesai
                            </p>


                            <h3 class="text-3xl font-bold
                                       text-gray-800 mt-2">
                                <?=  $statistik->selesai ?? 0 ?>
                            </h3>

                        </div>


                        <div class="w-12 h-12 rounded-xl
                                    bg-blue-100
                                    flex items-center
                                    justify-center">

                            <i class="fa-solid fa-circle-check
                                      text-blue-600 text-xl">
                            </i>

                        </div>


                    </div>

                </div>


            </div>



        </div>


    </main>


</body>

</html>