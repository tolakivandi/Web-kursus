 <?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location:../login.php");
        exit;
    }


    require '../controllers/function_jadwal_kelas.php';
    $kelas = mysqli_query($connection, "SELECT * FROM kelas");
    $jadwal = mysqli_query($connection, "SELECT * FROM jadwal_kelas JOIN kelas ON jadwal_kelas.id_kelas = kelas.id_kelas");


    if (isset($_POST["submit"])) {
        // var_dump($_POST);
        if (add($_POST) > 0) {
            echo "
            <script>
                alert('data berhasil di tambahkan');
                document.location.href= '../jadwal_kelas.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal di tambahkan');
                document.location.href= '../jadwal_kelas.php';
            </script>
            ";
        }
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>TAMBAH DATA Kelas</title>
     <link href="/dist/output.css" rel="stylesheet">
     <script src="https://cdn.tailwindcss.com"></script>
     <style>
         label {
             display: block;
         }
     </style>
 </head>

 <body>
     <nav class="w-full py-4 text-white bg-green-600">
         <div class="container flex flex-wrap items-center justify-between mx-auto">
             <a href="" class="flex items-center gap-3 font-semibold h-max">
                 <img src="../images/logo-pens.png" alt="" class="w-16 ml-10">
                 PENS SUMENEP
             </a>
             <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center justify-center ml-3 text-gray-400 rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300" aria-controls="mobile-menu-2" aria-expanded="false">
                 <span class="sr-only">Open main menu</span>
                 <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                 </svg>
                 <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                 </svg>
             </button>
             <div class="hidden w-full mr-10 md:block md:w-auto" id="mobile-menu">
                 <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                     <li>
                         <a href="../index.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:p-0 focus:outline-none" aria-current="page">Home</a>
                     </li>
                     <li>
                         <a href="../peserta_kelas.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:p-0 focus:outline-none" aria-current="page">Peserta Kelas</a>
                     </li>
                     <li>
                         <a href="../kelas.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:p-0 focus:outline-none" aria-current="page">Kelas</a>
                     </li>
                     <li>
                         <a href="../jadwal_kelas.php" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Jadwal Kelas</a>
                     </li>
                     <li>
                         <a href="../pengajar.php" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Pengajar</a>
                     </li>
                     <li>
                         <a href="../pendaftaran.php" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Pendaftaran</a>
                     </li>
                     <li>
                         <a href="../fungsi/logout.php" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Logout</a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>

     <div class="flex items-center justify-center w-full h-screen overflow-hidden bg-white rounded-lg">
         <div class="w-1/3 md:flex">
             <div class="w-full px-6 py-8 md:p-8">
                 <h2 class="mb-2 text-2xl font-bold text-gray-700">Tambah Mapel</h2>
                 <form action="" method="POST">

                     <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                     <select id="id_kelas" name="id_kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-green-400 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                         <option selected>Kelas</option>
                         <?php foreach ($kelas as $item) : ?>
                             <option value="<?= $item['id_kelas'] ?>"> <?= $item['nama_kelas'] ?> </option>
                         <?php endforeach ?>
                     </select>

                     <div class="mb-4">
                         <label class="block mb-2 font-bold text-gray-700" for="mapel">
                             hari
                         </label>
                         <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline" id="hari" name="hari" type="text" placeholder="Masukkan Nama Mapel">
                     </div>
                     <div class="mb-4">
                         <label class="block mb-2 font-bold text-gray-700" for="jam_mulai">
                             jam mulai
                         </label>
                         <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline" id="jam_mulai" name="jam_mulai" type="text" placeholder="jam mulai">
                     </div>
                     <div class="mb-4">
                         <label class="block mb-2 font-bold text-gray-700" for="jam_selesai">
                             jam selesai
                         </label>
                         <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline" id="jam_selesai" name="jam_selesai" type="text" placeholder="jam selesai">
                     </div>

                     <div class="flex items-center justify-between">
                         <button class="px-4 py-2 font-bold text-white bg-green-700 border-2
                          rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit" name="submit">
                             Daftar
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>



 </body>

 </html>