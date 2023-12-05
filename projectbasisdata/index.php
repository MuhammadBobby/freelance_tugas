<?php
session_start();

// pemeriksaan session login
if (isset($_SESSION["login"])) {
  header("Location: build/pages/dashboard.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="build/assets/img/logo.jpeg" />
  <title>Login</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="hidden-x-overflow bg-lime-50">
  <div class="logo absolute top-0 left-0">
    <img src="build/assets/img/logo.jpeg" alt="logo" class="w-20 bg-lime-500 rounded-br-xl shadow-sm" />
  </div>

  <section class="flex flex-wrap justify-evenly content-center lg:pb-5 lg:pt-14">

    <form action="build/pages/function/proseslogin.php" method="post" class="w-2/3 mt-20 shadow-2xl p-5 rounded-lg lg:w-[40%] lg:m-10">

      <?php
      if (isset($_GET['error'])) : ?>
        <script>
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "username/password anda salah!",
            footer: "Pastikan username/password anda benar!"
          });
        </script>
      <?php endif; ?>

      <h1 class="text-xl font-bold mb-5 lg:text-5xl lg:font-extrabold lg:mb-14 text-lime-800">Selamat Datang Admin 👋</h1>

      <label for="username" class="lg:text-xl font-bold">Username :</label><br />
      <input type="text" name="username" required class="mt-1 block w-full lg:p-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-lime-700 invalid:text-lime-600 focus:invalid:border-lime-500 focus:invalid:ring-lime-500" /><br />

      <label for="password" class="lg:text-xl font-bold">Password :</label><br />
      <input type="password" name="password" required class="mt-1 block w-full lg:p-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-lime-700 invalid:text-lime-600 focus:invalid:border-lime-500 focus:invalid:ring-lime-500" /><br />




      <button type="submit" name="login" value="login" class="block m-auto p-2 border-sky-500 border-2 rounded-full px-4 py-2 bg-green-500 font-semibold hover:bg-lime-600 hover:text-teal-800 hover:scale-110 lg:font-bold lg:text-lg lg:px-6 lg:py-3 lg:mt-5">
        Login
      </button>

    </form>

    <div class="w-full mb-10 lg:w-1/2 lg:m-5">
      <img src="build/assets/img/mock.png" alt="mock" class="w-[90%] m-auto my-5" />
      <h3 class="text-2xl font-bold ms-3 lg:text-4xl lg:font-extrabold">SehatQure Apotek ✔</h3>
      <p class="text-base text-teal-600 font-semibold ms-3 italic tracking-tight lg:text-xl">"Kesehatan Terjangkau, Kualitas Terpercaya"</p>
    </div>
  </section>

</body>

</html>