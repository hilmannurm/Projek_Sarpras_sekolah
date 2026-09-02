

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Kategori - Admin</title>

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
            <a href="dashboard_admin.php"
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


            <!-- ASPIRASI -->
            <a href="daftar_aspirasi.php"
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
                          d="M8 10h8M8 14h5M5 4h14a2 2
                             0 012 2v12a2 2
                             0 01-2 2H5a2 2
                             0 01-2-2V6a2 2
                             0 012-2z"/>

                </svg>

                <span>Aspirasi</span>

            </a>


            <!-- HISTORI -->
            <a href="histori.php"
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
                          d="M12 8v4l3 2M20 12a8 8
                             0 11-16 0 8 8
                             0 0116 0z"/>

                </svg>

                <span>Histori</span>

            </a>


            <!-- UMPAN BALIK -->
            <a href="umpan_balik.php"
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
                          d="M8 10h8M8 14h5M5 4h14a2 2
                             0 012 2v10a2 2
                             0 01-2 2h-6
                             l-4 3v-3H5a2 2
                             0 01-2-2V6
                             a2 2 0 012-2z"/>

                </svg>

                <span>Umpan Balik</span>

            </a>


            <!-- SISWA -->
            <a href="daftar_siswa.php"
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
                          d="M16 21v-2a4 4
                             0 00-4-4H6a4 4
                             0 00-4 4v2M9 11a4 4
                             0 100-8 4 4
                             0 000 8M19 8v6m3-3h-6"/>

                </svg>

                <span>Siswa</span>

            </a>


            <!-- KATEGORI ACTIVE -->
            <a href="kategori.php"
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
                          d="M20 13l-7 7-9-9V4h7l9 9z"/>

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M7 7h.01"/>

                </svg>

                <span>Kategori</span>

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
                                 m12-7h4a2 2
                                 0 012 2v10a2 2
                                 0 01-2 2h-4"/>

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
                    Edit Kategori
                </h2>

                <p class="text-sm text-gray-400">
                    Ubah nama kategori pengaduan siswa
                </p>

            </div>


            <!-- ADMIN -->
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="text-sm font-medium text-gray-700">
                        Admin
                    </p>

                    <p class="text-xs text-gray-400">
                        Administrator
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
                              d="M20 21a8 8 0 00-16 0M12 13a4
                                 4 0 100-8 4 4 0 000 8z"/>

                    </svg>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="p-8">

            <!-- BACK -->
            <a href="../Views/Admin/kategori.php"
               class="inline-flex items-center gap-2
                      text-sm text-gray-500
                      hover:text-primary mb-6">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M15 18l-6-6 6-6"/>

                </svg>

                Kembali ke Data Kategori

            </a>


            <!-- FORM CARD -->
            <div class="max-w-2xl">

                <div class="bg-white border border-gray-200
                            rounded-xl overflow-hidden">

                    <!-- FORM HEADER -->
                    <div class="px-6 py-5 border-b border-gray-200">

                        <h3 class="text-lg font-semibold text-gray-800">
                            Form Edit Kategori
                        </h3>

                        <p class="text-sm text-gray-400 mt-1">
                            Ubah nama kategori pengaduan.
                        </p>

                    </div>


                    <!-- FORM -->
                    <form action="/Projek_Sapras_hilman/Controllers/c_kategori.php?aksi=update"
                          method="POST"
                          class="p-6">

                        <!-- ID KATEGORI -->
                        <input type="hidden"
                               name="id_kategori"
                               value="<?= $kategoris->id_kategori; ?>">


                        <div>

                            <label for="nama_kategori"
                                   class="block text-sm font-medium
                                          text-gray-700 mb-2">
                                Nama Kategori
                            </label>

                            <input type="text"
                                   id="nama_kategori"
                                   name="nama_kategori"
                                   value="<?= htmlspecialchars($kategoris->nama_kategori); ?>"
                                   required
                                   class="w-full px-4 py-3
                                          border border-gray-200
                                          rounded-lg text-sm
                                          text-gray-700
                                          placeholder-gray-400
                                          focus:outline-none
                                          focus:ring-2
                                          focus:ring-primary
                                          focus:border-primary">

                            <p class="text-xs text-gray-400 mt-2">
                                Ubah nama kategori sesuai kebutuhan.
                            </p>

                        </div>


                        <!-- BUTTON -->
                        <div class="flex justify-end gap-3 mt-8">

                            <a href="../Views/Admin/kategori.php"
                               class="px-5 py-2.5
                                      border border-gray-200
                                      rounded-lg text-sm
                                      font-medium text-gray-600
                                      hover:bg-gray-50
                                      transition">

                                Batal

                            </a>


                            <button type="submit"
                                    name="update"
                                    class="px-5 py-2.5
                                           bg-primary
                                           hover:bg-primary-dark
                                           text-white rounded-lg
                                           text-sm font-medium
                                           transition">

                                Simpan Perubahan

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