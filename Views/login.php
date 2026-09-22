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


<body class="min-h-screen bg-gray-100 bg-cover bg-center bg-no-repeat flex items-center justify-center" style="background-image: url('../Assets/bg_login.jpeg');">


    <!-- CARD LOGIN -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">


        <!-- LOGO & JUDUL -->
        <div class="text-center mb-8">

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



        <!-- FORM LOGIN -->
        <form action="../Controllers/c_login.php" method="POST">


            <!-- USERNAME / NIS -->
            <div class="mb-5">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Username / NIS
                </label>


                <div class="relative">

                    <i class="fa-solid fa-user absolute left-4 top-1/2
                              -translate-y-1/2 text-gray-400">
                    </i>


                    <input type="text"
                           name="username"
                           placeholder="Masukkan Username / NIS"
                           required
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
                           placeholder="Masukkan Password"
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

                Masuk ke Sistem

            </button>


        </form>


    </div>


</body>

</html>