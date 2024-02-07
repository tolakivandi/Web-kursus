<?php
if (isset($_SESSION['login'])) {
  header("location:peserta_kelas.php");
}
if (isset($_SESSION['login'])) {
  header("location:./user/peserta_kelas.php");
}

require './controllers/auth.php';


?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <!-- component -->
  <section class="flex flex-col items-center h-screen md:flex-row">

    <div class="w-full h-screen flex justify-center items-center md:w-1/2 xl:w-2/3">
      <img src="images/img-10.svg" alt="" class="w-3/5">
    </div>

    <div class="flex items-center justify-center w-full h-screen px-6 bg-white md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 lg:px-16 xl:px-12">

      <div class="w-full h-100">


        <h1 class="mt-12 text-xl font-bold leading-tight md:text-2xl">Log in to your account</h1>

        <form class="mt-6" action="controllers/auth.php" method="POST">
          <div>
            <label class="block text-gray-700">Username</label>
            <input type="text" name="uname" id="uname" placeholder="Your Username" class="w-full px-4 py-3 mt-2 bg-gray-200 border rounded-lg focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
          </div>

          <div class="mt-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="psw" id="psw" placeholder="Enter Password" class="w-full px-4 py-3 mt-2 bg-gray-200 border rounded-lg focus:border-blue-500 focus:bg-white focus:outline-none" required>
          </div>

          <!-- <div class="mt-2 text-right">
            <a href="#" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Forgot Password?</a>
          </div> -->

          <button type="text" class="block w-full px-4 py-3 mt-6 font-semibold text-white bg-green-700 border-2 rounded-lg hover:bg-indigo-400 focus:bg-indigo-400" name="login">Log In</button>
        </form>
        <!-- <p class="mt-8">Need an account? <a href="register.php" class="font-semibold text-blue-500 hover:text-blue-700">Create an
            account</a></p> -->
      </div>
    </div>
  </section>
</body>

</html>