<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajukan Pengaduan - Pengaduan Sarpras</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2F7D5A',
                        'primary-dark': '#256348',
                        'soft-green': '#EAF5EF'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-700">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-gray-200
                  fixed left-0 top-0 bottom-0">

        <!-- LOGO -->
        <div class="h-20 flex items-center gap-3 px-6
                    border-b border-gray-100">

            <div class="w-10 h-10 rounded-xl bg-primary
                        flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 text-white"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3 21h18M5 21V5l7-3 7 3v16
                             M9 21v-5h6v5M8 9h1m6 0h1
                             m-8 4h1m6 0h1"/>

                </svg>

            </div>

            <div>
                <h1 class="font-semibold text-gray-800 text-sm">
                    Pengaduan Sarpras
                </h1>

                <p class="text-xs text-gray-400">
                    Sekolah
                </p>
            </div>

        </div>


        <!-- MENU -->
        <nav class="px-4 py-6 space-y-1">

            <!-- DASHBOARD -->
            <a href="dashboard_siswa.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-soft-green hover:text-primary">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3 13h8V3H3v10zm10 8h8V3h-8v18z
                             M3 21h8v-6H3v6z"/>

                </svg>

                <span>Dashboard</span>

            </a>


            <!-- PENGADUAN SAYA -->
            <a href="pengaduan.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-soft-green hover:text-primary">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M8 10h8M8 14h5M5 4h14a2
                             2 0 012 2v12a2 2 0
                             01-2 2H5a2 2 0
                             01-2-2V6a2 2
                             0 012-2z"/>

                </svg>

                <span>Pengaduan Saya</span>

            </a>


            <!-- AJUKAN PENGADUAN ACTIVE -->
            <a href="tambah_pengaduan.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg bg-soft-green text-primary
                      font-medium">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 5v14M5 12h14"/>

                </svg>

                <span>Ajukan Pengaduan</span>

            </a>


            <!-- UMPAN BALIK -->
            <a href="umpan_balik_siswa.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-soft-green hover:text-primary">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M8 10h8M8 14h5M5 4h14a2
                             2 0 012 2v10a2 2 0
                             01-2 2h-6l-4 3v-3H5a2
                             2 0 01-2-2V6a2 2
                             0 012-2z"/>

                </svg>

                <span>Umpan Balik</span>

            </a>


            <!-- LOGOUT -->
            <div class="pt-5 mt-5 border-t border-gray-100">

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3
                          rounded-lg text-gray-600
                          hover:bg-red-50 hover:text-red-500">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M10 17l5-5-5-5M15 12H3
                                 m12-7h4a2 2 0 012 2v10a2
                                 2 0 01-2 2h-4"/>

                    </svg>

                    <span>Logout</span>

                </a>

            </div>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="ml-64 flex-1">

        <!-- HEADER -->
        <header class="h-20 bg-white border-b border-gray-200
                       flex items-center justify-between px-8">

            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    Ajukan Pengaduan
                </h2>

                <p class="text-sm text-gray-400">
                    Sampaikan masalah sarana dan prasarana sekolah.
                </p>
            </div>


            <!-- PROFILE -->
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="text-sm font-medium text-gray-700">
                        Ahmad Fauzan
                    </p>

                    <p class="text-xs text-gray-400">
                        XI RPL 1
                    </p>

                </div>

                <div class="w-10 h-10 rounded-full bg-soft-green
                            flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-primary"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M20 21a8 8 0 00-16 0
                                 M12 13a4 4 0 100-8
                                 4 4 0 000 8z"/>

                    </svg>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="p-8">

            <div class="max-w-4xl mx-auto">

                <!-- TITLE -->
                <div class="mb-6">

                    <h3 class="text-2xl font-semibold text-gray-800">
                        Form Pengaduan
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Isi informasi pengaduan dengan jelas agar
                        dapat segera ditangani.
                    </p>

                </div>


                <!-- FORM CARD -->
                <div class="bg-white border border-gray-200
                            rounded-xl p-7">

                    <form action="#" method="POST"
                          enctype="multipart/form-data">

                        <!-- KATEGORI -->
                        <div class="mb-5">

                            <label class="block text-sm font-medium
                                          text-gray-700 mb-2">

                                Kategori Pengaduan

                                <span class="text-red-500">*</span>

                            </label>

                            <select name="id_kategori"
                                    required
                                    class="w-full px-4 py-3 border
                                           border-gray-200 rounded-lg
                                           text-sm bg-white
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-primary/20
                                           focus:border-primary">

                                <option value="">
                                    Pilih kategori
                                </option>

                                <option value="1">
                                    Fasilitas
                                </option>

                                <option value="2">
                                    Kelistrikan
                                </option>

                                <option value="3">
                                    Kebersihan
                                </option>

                                <option value="4">
                                    Air
                                </option>

                                <option value="5">
                                    Keamanan
                                </option>

                                <option value="6">
                                    Lainnya
                                </option>

                            </select>

                            <p class="text-xs text-gray-400 mt-1.5">
                                Pilih kategori yang sesuai dengan masalah.
                            </p>

                        </div>


                        <!-- JUDUL -->
                        <div class="mb-5">

                            <label class="block text-sm font-medium
                                          text-gray-700 mb-2">

                                Judul Pengaduan

                                <span class="text-red-500">*</span>

                            </label>

                            <input type="text"
                                   name="judul"
                                   required
                                   placeholder="Contoh: Lampu kelas mati"
                                   class="w-full px-4 py-3 border
                                          border-gray-200 rounded-lg
                                          text-sm
                                          focus:outline-none
                                          focus:ring-2
                                          focus:ring-primary/20
                                          focus:border-primary">

                        </div>


                        <!-- LOKASI -->
                        <div class="mb-5">

                            <label class="block text-sm font-medium
                                          text-gray-700 mb-2">

                                Lokasi

                                <span class="text-red-500">*</span>

                            </label>

                            <input type="text"
                                   name="lokasi"
                                   required
                                   placeholder="Contoh: Ruang XI RPL 1"
                                   class="w-full px-4 py-3 border
                                          border-gray-200 rounded-lg
                                          text-sm
                                          focus:outline-none
                                          focus:ring-2
                                          focus:ring-primary/20
                                          focus:border-primary">

                        </div>


                        <!-- ISI PENGADUAN -->
                        <div class="mb-5">

                            <label class="block text-sm font-medium
                                          text-gray-700 mb-2">

                                Isi Pengaduan

                                <span class="text-red-500">*</span>

                            </label>

                            <textarea name="isi_pengaduan"
                                      rows="6"
                                      required
                                      placeholder="Jelaskan masalah sarana atau prasarana yang ditemukan..."
                                      class="w-full px-4 py-3 border
                                             border-gray-200 rounded-lg
                                             text-sm resize-none
                                             focus:outline-none
                                             focus:ring-2
                                             focus:ring-primary/20
                                             focus:border-primary"></textarea>

                            <p class="text-xs text-gray-400 mt-1.5">
                                Jelaskan masalah secara jelas dan lengkap.
                            </p>

                        </div>


                        <!-- FOTO -->
                        <div class="mb-7">

                            <label class="block text-sm font-medium
                                          text-gray-700 mb-2">

                                Foto Bukti

                                <span class="text-gray-400">
                                    (Opsional)
                                </span>

                            </label>

                            <div class="border-2 border-dashed
                                        border-gray-200 rounded-lg
                                        p-6 text-center
                                        hover:border-primary
                                        transition">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-8 h-8 mx-auto
                                            text-gray-400 mb-2"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="1.5">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M4 16l4.586-4.586a2
                                             2 0 012.828 0L16
                                             16m-2-2l1.586-1.586a2
                                             2 0 012.828 0L20
                                             14M4 19h16a1 1 0
                                             001-1V6a1 1 0
                                             00-1-1H4a1 1 0
                                             00-1 1v12a1 1 0
                                             001 1z"/>

                                </svg>

                                <p class="text-sm text-gray-500">
                                    Pilih foto bukti pengaduan
                                </p>

                                <p class="text-xs text-gray-400 mt-1">
                                    JPG, JPEG atau PNG
                                </p>

                                <input type="file"
                                       name="foto"
                                       accept=".jpg,.jpeg,.png"
                                       class="mt-4 text-sm">

                            </div>

                        </div>


                        <!-- BUTTON -->
                        <div class="flex items-center justify-end
                                    gap-3 border-t border-gray-100
                                    pt-5">

                            <button type="button"
                                    class="px-5 py-2.5 border
                                           border-gray-200
                                           rounded-lg text-sm
                                           text-gray-600
                                           hover:bg-gray-50">

                                Batal

                            </button>


                            <button type="submit"
                                    class="px-5 py-2.5 bg-primary
                                           hover:bg-primary-dark
                                           text-white rounded-lg
                                           text-sm font-medium
                                           transition">

                                Kirim Pengaduan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>