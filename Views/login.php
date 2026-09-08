<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Pengaduan Sarpras Sekolah</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>


<body class="min-h-screen bg-gray-100 flex items-center justify-center">


    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">


        <!-- LOGO & JUDUL -->
        <div class="text-center mb-6">

            <div class="w-20 h-20 mx-auto mb-4
                        bg-green-100 rounded-2xl
                        flex items-center justify-center">

                <i class="fa-solid fa-bullhorn text-4xl text-green-600"></i>

            </div>


            <h1 class="text-2xl font-bold text-green-700">
                Pengaduan Sarpras Sekolah
            </h1>


            <p class="text-gray-500 mt-2">
                Silakan masuk ke akun Anda
            </p>

        </div>



        <!-- PILIHAN ROLE -->
        <div class="flex gap-3 mb-6">


            <!-- SISWA -->
            <button type="button"
                    id="btnSiswa"
                    onclick="pilihRole('siswa')"
                    class="w-1/2 py-2 rounded-lg bg-green-600 text-white">

                <i class="fa-solid fa-user-graduate mr-2"></i>
                Siswa

            </button>


            <!-- ADMIN -->
            <button type="button"
                    id="btnAdmin"
                    onclick="pilihRole('admin')"
                    class="w-1/2 py-2 rounded-lg bg-gray-200 text-gray-700">

                <i class="fa-solid fa-user-shield mr-2"></i>
                Admin

            </button>

        </div>



        <!-- FORM LOGIN -->
        <form action="../Controllers/c_login.php" method="POST">


            <!-- ROLE -->
            <input type="hidden"
                   name="role"
                   id="role"
                   value="siswa">



            <!-- NIS / USERNAME -->
            <div class="mb-4">

                <label id="labelUsername"
                       class="block text-sm font-medium text-gray-700 mb-2">

                    NIS

                </label>


                <div class="relative">

                    <i id="iconUsername"
                       class="fa-solid fa-id-card absolute left-4 top-1/2
                              -translate-y-1/2 text-gray-400">
                    </i>


                    <input type="text"
                           name="username"
                           id="username"
                           placeholder="Masukkan NIS"
                           required
                           inputmode="numeric"
                           pattern="[0-9]+"
                           class="w-full pl-11 pr-4 py-3
                                  border border-gray-300 rounded-lg
                                  focus:outline-none
                                  focus:ring-2 focus:ring-green-500">

                </div>

            </div>



            <!-- PASSWORD -->
            <div class="mb-6">

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Password

                </label>


                <div class="relative">

                    <i class="fa-solid fa-lock absolute left-4 top-1/2
                              -translate-y-1/2 text-gray-400">
                    </i>


                    <input type="password"
                           name="password"
                           id="password"
                           placeholder="Masukkan password"
                           required
                           class="w-full pl-11 pr-4 py-3
                                  border border-gray-300 rounded-lg
                                  focus:outline-none
                                  focus:ring-2 focus:ring-green-500">

                </div>

            </div>



            <!-- BUTTON LOGIN -->
            <button type="submit"
                    class="w-full py-3
                           bg-green-600 hover:bg-green-700
                           text-white font-semibold
                           rounded-lg transition">

                <i class="fa-solid fa-right-to-bracket mr-2"></i>

                Login

            </button>


        </form>


    </div>



    <!-- JAVASCRIPT -->
    <script>

        function pilihRole(role) {

            // Nilai role
            document.getElementById('role').value = role;


            // Tombol
            const btnSiswa =
                document.getElementById('btnSiswa');

            const btnAdmin =
                document.getElementById('btnAdmin');


            // Input
            const label =
                document.getElementById('labelUsername');

            const input =
                document.getElementById('username');

            const icon =
                document.getElementById('iconUsername');



            // =====================================
            // JIKA MEMILIH SISWA
            // =====================================
            if (role == 'siswa') {

                btnSiswa.className =
                    "w-1/2 py-2 rounded-lg bg-green-600 text-white";

                btnAdmin.className =
                    "w-1/2 py-2 rounded-lg bg-gray-200 text-gray-700";


                label.innerText = "NIS";

                input.placeholder = "Masukkan NIS";

                input.inputMode = "numeric";

                input.pattern = "[0-9]+";


                // Hanya angka yang boleh dimasukkan
                input.onbeforeinput = function (e) {

                    if (e.data && !/^[0-9]+$/.test(e.data)) {

                        e.preventDefault();

                    }

                };


                // Mencegah paste huruf/simbol
                input.onpaste = function (e) {

                    const text =
                        e.clipboardData.getData('text');

                    if (!/^[0-9]+$/.test(text)) {

                        e.preventDefault();

                    }

                };


                // Pengaman tambahan
                input.oninput = function () {

                    this.value =
                        this.value.replace(/[^0-9]/g, '');

                };


                // Icon NIS
                icon.className =
                    "fa-solid fa-id-card absolute left-4 top-1/2 -translate-y-1/2 text-gray-400";

            }



            // =====================================
            // JIKA MEMILIH ADMIN
            // =====================================
            else {

                btnAdmin.className =
                    "w-1/2 py-2 rounded-lg bg-green-600 text-white";

                btnSiswa.className =
                    "w-1/2 py-2 rounded-lg bg-gray-200 text-gray-700";


                label.innerText = "Username";

                input.placeholder = "Masukkan username";

                input.inputMode = "text";

                input.removeAttribute("pattern");


                // Hapus pembatas angka
                input.onbeforeinput = null;

                input.onpaste = null;

                input.oninput = null;


                // Icon Admin
                icon.className =
                    "fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400";

            }

        }


    </script>


</body>

</html>