<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Pengaduan Sarpras Sekolah</title>

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

<body class="min-h-screen bg-gray-50 flex items-center justify-center">

    <div class="w-full max-w-md px-6">

        <!-- LOGO / JUDUL -->
        <div class="text-center mb-8">

            <div class="w-16 h-16 bg-soft-green rounded-2xl
                        flex items-center justify-center mx-auto mb-4">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8 text-primary"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 6.253v13m0-13C10.832 5.477
                             9.246 5 7.5 5S4.168 5.477 3 6.253v13
                             C4.168 18.477 5.754 18 7.5 18s3.332.477
                             4.5 1.253m0-13C13.168 5.477 14.754 5
                             16.5 5c1.746 0 3.332.477 4.5 1.253v13
                             C19.832 18.477 18.246 18 16.5 18
                             c-1.746 0-3.332.477-4.5 1.253" />

                </svg>

            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Pengaduan Sarpras Sekolah
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Silakan masuk untuk melanjutkan
            </p>

        </div>


        <!-- LOGIN CARD -->
        <div class="bg-white border border-gray-200
                    rounded-2xl shadow-sm p-7">

            <h2 class="text-lg font-semibold text-gray-800">
                Login
            </h2>

            <p class="text-sm text-gray-400 mt-1 mb-6">
                Pilih akun yang ingin digunakan
            </p>


            <!-- PILIH ROLE -->
            <div class="grid grid-cols-2 gap-3 mb-6">

                <!-- SISWA -->
                <button type="button"
                        id="btnSiswa"
                        onclick="pilihRole('siswa')"
                        class="role-btn border-2 border-primary
                               bg-soft-green text-primary
                               rounded-lg py-3 text-sm font-medium
                               transition">

                    Siswa

                </button>


                <!-- ADMIN -->
                <button type="button"
                        id="btnAdmin"
                        onclick="pilihRole('admin')"
                        class="role-btn border-2 border-gray-200
                               text-gray-500
                               rounded-lg py-3 text-sm font-medium
                               hover:border-primary hover:text-primary
                               transition">

                    Admin

                </button>

            </div>


            <!-- FORM LOGIN -->
            <form action="#" method="POST">

                <!-- ROLE -->
                <input type="hidden"
                       name="role"
                       id="role"
                       value="siswa">


                <!-- USERNAME / NIS -->
                <div class="mb-5">

                    <label for="username"
                           id="labelUsername"
                           class="block text-sm font-medium
                                  text-gray-700 mb-2">

                        NIS

                    </label>

                    <input type="text"
                           id="username"
                           name="username"
                           placeholder="Masukkan NIS"
                           required
                           class="w-full px-4 py-3
                                  border border-gray-200
                                  rounded-lg text-sm
                                  text-gray-700
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-primary
                                  focus:border-primary">

                </div>


                <!-- PASSWORD -->
                <div class="mb-6">

                    <label for="password"
                           class="block text-sm font-medium
                                  text-gray-700 mb-2">

                        Password

                    </label>

                    <input type="password"
                           id="password"
                           name="password"
                           placeholder="Masukkan password"
                           required
                           class="w-full px-4 py-3
                                  border border-gray-200
                                  rounded-lg text-sm
                                  text-gray-700
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-primary
                                  focus:border-primary">

                </div>


                <!-- BUTTON LOGIN -->
                <button type="submit"
                        class="w-full bg-primary
                               hover:bg-primary-dark
                               text-white rounded-lg
                               py-3 text-sm font-medium
                               transition">

                    Login

                </button>

            </form>

        </div>


        <!-- FOOTER -->
        <p class="text-center text-xs text-gray-400 mt-6">
            Sistem Pengaduan Sarana dan Prasarana Sekolah
        </p>

    </div>


    <!-- SCRIPT PILIH ROLE -->
    <script>

        function pilihRole(role) {

            const btnSiswa = document.getElementById('btnSiswa');
            const btnAdmin = document.getElementById('btnAdmin');

            const labelUsername =
                document.getElementById('labelUsername');

            const username =
                document.getElementById('username');

            const inputRole =
                document.getElementById('role');


            inputRole.value = role;


            if (role === 'siswa') {

                btnSiswa.className =
                    "role-btn border-2 border-primary " +
                    "bg-soft-green text-primary rounded-lg py-3 " +
                    "text-sm font-medium transition";

                btnAdmin.className =
                    "role-btn border-2 border-gray-200 " +
                    "text-gray-500 rounded-lg py-3 text-sm " +
                    "font-medium hover:border-primary " +
                    "hover:text-primary transition";

                labelUsername.textContent = "NIS";
                username.placeholder = "Masukkan NIS";

            } else {

                btnAdmin.className =
                    "role-btn border-2 border-primary " +
                    "bg-soft-green text-primary rounded-lg py-3 " +
                    "text-sm font-medium transition";

                btnSiswa.className =
                    "role-btn border-2 border-gray-200 " +
                    "text-gray-500 rounded-lg py-3 text-sm " +
                    "font-medium hover:border-primary " +
                    "hover:text-primary transition";

                labelUsername.textContent = "Username";
                username.placeholder = "Masukkan username";

            }

        }

    </script>

</body>

</html>