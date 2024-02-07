 <?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location:../login.php");
        exit;
    }
    require '../controllers/function_pendaftaran.php';

    $mahasiswa = mysqli_query($connection, "SELECT * FROM pendaftaran JOIN kelas ON pendaftaran.id_kelas = kelas.id_kelas JOIN peserta_kelas ON pendaftaran.id_peserta = peserta_kelas.id_peserta JOIN pengajar ON pendaftaran.id_pengajar = pengajar.id_pengajar");

    ?>
 <!doctype html>
 <html>

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="/dist/output.css" rel="stylesheet">
     <script src="https://cdn.tailwindcss.com"></script>
 </head>

 <body class="bg-gradient-to-r from-green-200 to-green-400">
     <nav class="py-4 text-white bg-green-600">
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
                         <a href="home.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:p-0 focus:outline-none" aria-current="page">Home</a>
                     </li>
                     <li>
                         <a href="peserta_kelas.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:p-0 focus:outline-none" aria-current="page">Peserta Kelas</a>
                     </li>
                     <li>
                         <a href="kelas.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:p-0 focus:outline-none" aria-current="page">Kelas</a>
                     </li>
                     <li>
                         <a href="jadwal_kelas.php" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Jadwal Kelas</a>
                     </li>
                     <li>
                         <a href="pengajar.php" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Pengajar</a>
                     </li>
                     <li>
                         <a href="pendaftaran.php" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Pendaftaran</a>
                     </li>
                     <li>
                         <a href="../controllers/logout.php" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Logout</a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     <div class="flex flex-col items-center justify-center h-screen bg-green-800 ">
         <table class="shadow-2xl font-[Poppins] border-2 border-green-200 w-6/12" style="box-shadow: 7px 14px 23px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 7px 14px 23px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 7px 14px 23px 0px rgba(0,0,0,0.75);">
             <thead class="text-white">
                 <tr>
                     <th class="py-3 bg-green-800">NO</th>

                     <th class="py-3 bg-green-800">id_kelas</th>
                     <th class="py-3 bg-green-800">id_peserta</th>
                     <th class="py-3 bg-green-800">id_pengajar</th>
                     <th class="py-3 bg-green-800">tanggal_daftar</th>
                     <th class="py-3 bg-green-800">status_pembayaran</th>
                 </tr>
             <tbody class="text-center text-green-900">
                 <?php $i = 1; ?>
                 <?php foreach ($mahasiswa as $mhs) : ?>
                     <tr class="duration-300 cursor-pointer bg-green-300">
                         <td class="px-6 py-3"> <?= $i; ?> </td>
                         <td class="px-6 py-3"> <?= $mhs["nama_kelas"]; ?> </td>
                         <td class="px-6 py-3"> <?= $mhs["nama_peserta"]; ?> </td>
                         <td class="px-6 py-3"> <?= $mhs["nama_pengajar"]; ?> </td>
                         <td class="px-6 py-3"> <?= $mhs["tanggal_daftar"]; ?> </td>
                         <td class="px-6 py-3"> <?= $mhs["status_pembayaran"]; ?> </td>

                     </tr>
                     <?php $i++; ?>
                 <?php endforeach; ?>
             </tbody>
             </thead>
         </table>

     </div>
 </body>

 </html>