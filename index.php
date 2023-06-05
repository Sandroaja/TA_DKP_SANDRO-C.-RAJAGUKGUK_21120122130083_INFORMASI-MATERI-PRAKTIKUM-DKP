<?php
session_start();

// Data pengguna terdaftar
$registeredUsers = array(
    array(
        'email' => 'sandro@gmail.com',
        'username' => 'Sandro C. Rajagukguk',
        'nim' => '21120122130083',
        'password' => '1111',
    ),
    array(
        'email' => 'admin@gmail.com',
        'username' => 'admin',
        'nim' => '2222',
        'password' => '2222',
    ),
);

// Fungsi untuk melakukan login
function login($email, $nim, $password) {
    global $registeredUsers;

    foreach ($registeredUsers as $user) {
        if ($user['email'] == $email && $user['nim'] == $nim && $user['password'] == $password) {
            // Set session untuk menandai bahwa pengguna sudah login
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $user['username'];
            $_SESSION['nim'] = $nim;
            return true;
        }
    }

    return false;
}

// Fungsi untuk melakukan logout
function logout() {
    // Hapus session yang menandakan pengguna sudah login
    session_unset();
    session_destroy();
}

// Cek apakah pengguna sudah login
function isUserLoggedIn() {
    return isset($_SESSION['email']) && isset($_SESSION['username']) && isset($_SESSION['nim']);
}

// Proses login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    if (login($email, $nim, $password)) {
        // Redirect ke halaman utama setelah login berhasil
        header("Location: index.php");
        exit();
    } else {
        echo 'Login gagal! Silakan cek kembali email, NIM, dan password Anda.';
    }
}

// Proses logout
if (isset($_GET['logout'])) {
    logout();
    // Redirect ke halaman login setelah logout berhasil
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAKTIKUM DKP 2023</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <script>
  function validateNIM(input) {
    // Hapus semua karakter non-angka dari input
    input.value = input.value.replace(/\D/g, '');

    // Periksa apakah input masih mengandung karakter selain angka
    if (input.value !== '') {
      var num = parseInt(input.value);
      if (isNaN(num)) {
        alert('NIM hanya boleh diisi dengan angka.');
        input.value = '';
      }
    }
  }
</script>

</head>
<body>
    <h1>Informasi Materi Praktikum DKP</h1>

    <?php
    // Tampilkan pesan selamat datang jika pengguna sudah login
    if (isUserLoggedIn()) {
        echo '<p>Selamat datang, ' . $_SESSION['username'] . '!</p>';
    }
    ?>


    <?php
    // Inisialisasi array berisi informasi 8 bab mata kuliah
    $mataKuliah = array(
        array(
            'bab' => 1,
            'judul' => 'Variabel, Tipe Data, dan Array',
            'deskripsi' => 'Variabel adalah tempat dimana kita dapat mengisi atau mengosongkan nilainya dan memanggil kembali apabila dibutuhkan. Setiap variabel akan mempunyai nama (identifier) dan nilai. 
            Tipe data adalah jenis data yang dapat diolah oleh komputer untuk memenuhi kebutuhan dalam pemrograman komputer. Array (larik) ialah sekumpulan variabel-variabel yang memiliki nama dan tipe data yang sama satu dengan lainnya.',
            'pengajar' => 'Muhammad Irhamsyah Arrahim (081315244955), Florencia Irena Amelia (087784809604)',
            'file' => 'https://drive.google.com/file/d/17u35yY4Gd-x33mUV1SfyyJx977RBY_zR/view?usp=drive_link'
        ),
        array(
            'bab' => 2,
            'judul' => 'Pengkondisian',
            'deskripsi' => 'Pengkondisian merupakan suatu pengaturan alur program berdasar kondisi boolean (kondisi benar dan salah) yang dijadikan patokan.',
            'pengajar' => 'Rafdan: 085799444478 (WA), Refan : 083108414438 (WA)',
            'file' => 'https://drive.google.com/file/d/1Q23VNBuzPqg-FAGr5ew4eJDYFtE99X9F/view?usp=drive_link'
        ),
        array(
            'bab' => 3,
            'judul' => 'Perulangan',
            'deskripsi' => 'Perulangan adalah salah satu bentuk pemrograman untuk menangani satu langkah yang berulang. Terdapat dua jenis perulangan yaitu counted loop seperti perulangan FOR dan uncounted loop seperti perulangan WHILE dan DO WHILE.',
            'pengajar' => 'Fangki Igo Pramana (fangki_ip), Daffa Abhyasa Santoso (08111555406)',
            'file' => 'https://drive.google.com/file/d/1TbYHSPGvbVO-XIL9zyRi1cSF_dojHBsT/view?usp=drive_link'
        ),
        array(
            'bab' => 4,
            'judul' => 'Function And Method',
            'deskripsi' => 'Function merupakan sekumpulan instruksi yang dikelompokkan secara khusus untuk mengerjakan suatu tugas tertentu. Method pada dasarnya merupakan suatu function yang berada pada suatu class yang mana dapat diimplementasikan oleh class lain.',
            'pengajar' => 'Doan Carlos Embara [carlosdoanembara@gmail.com], M. Bintang Prayoga Utama [mbintangprayogautama@students.undip.ac.id]',
            'file' => 'https://drive.google.com/file/d/11nf8N7Treus5mQq4rkTVJHWVuKtOrbPv/view?usp=drive_link'
        ),
        array(
            'bab' => 5,
            'judul' => 'Object Oriented Programming I',
            'deskripsi' => 'Pemrograman berorientasi objek adalah paradigma pemrograman yang berorientasikan kepada objek yang merupakan suatu metode dalam pembuatan program, dengan tujuan untuk menyelesaikan kompleksnya berbagai masalah program yang terus meningkat.',
            'pengajar' => 'Raihan Maulana (0895601914130), Djie Valencia Santoso (valencia_santoso03)',
            'file' => 'https://drive.google.com/file/d/1b6p88m9UzYd-EpyzvO3l4bkwQe435SEo/view?usp=drive_link'
        ),
        array(
            'bab' => 6,
            'judul' => 'Object Oriented Programming II',
            'deskripsi' => 'Polymorphism juga dapat diartikan sebagai teknik programming yang mengarahkan programmer untuk memprogram secara general daripada secara spesifik. Abstraction adalah satu dari tiga prinsip sentral (Enkapsulasi dan Pewarisan). Encapsulation merupakan implementasi penyembunyian informasi (information hiding).',
            'pengajar' => 'Syahira Isnaeni Dewi (id line = syr_yr),Shinta (wa: 085742704308)',
            'file' => 'https://drive.google.com/file/d/1WnfEcOZ7FGVgOJMWmWjnck4HpnhwvKCB/view?usp=drive_link'
        ),
        array(
            'bab' => 7,
            'judul' => 'Stack And Queue',
            'deskripsi' => 'Stack atau tumpukan dapat diartikan sebagai suatu kumpulan data yang seolah-olah terlihat seperti ada data yang diletakkan di atas data yang lain. Queue atau antrian merupakan struktur data linear dimana penambahan komponen dilakukan disatu ujung, sementara pengurangan dilakukan diujung lain.',
            'pengajar' => 'Farhan Ryan Rafli (089526384701), Yosia Aser Camme (082271507532)',
            'file' => 'https://drive.google.com/file/d/1OlkJlHdaYwMa8or1hqwHH8dwMCLlHT5c/view?usp=drive_link'
        ),
        array(
            'bab' => 8,
            'judul' => 'GUI Programming',
            'deskripsi' => 'GUI (Graphical User Interface) merupakan antarmuka grafis yang memfasilitasi interaksi antara pengguna (user) dengan program aplikasi.',
            'pengajar' => 'George Miracle (georgemiracle.t.), Agustinus Adven Christo (titoclv)',
            'file' => 'https://drive.google.com/file/d/1malInqyFt83ECC-TDlmREnBtL5LD53sO/view?usp=drive_link'
        )
    );


    // Tampilkan informasi mata kuliah jika pengguna sudah login
    if (isUserLoggedIn()) {
        foreach ($mataKuliah as $matkul) {  
            echo '<h2><a href="bab.php?bab=' . $matkul['bab'] . '">Modul ' . $matkul['bab'] . ': ' . $matkul['judul'] . '</a></h2>';
        }?> 
        
        <div class="container">
        <form action="search.php" method="GET">
          <div class="form-group">
            <label for="search">Cari pengajar:</label>
            <input type="text" id="search" name="search" placeholder="Masukkan nama pengajar">
            <input type="submit" value="Cari">
          </div>
        </form>
        <?php
    } else {
        // Tampilkan form login jika pengguna belum login
        ?>
        <div class="kotakLogin">
        <h3 class="login">Masukkan data diri anda</h3>
        <form method="POST" action="">
            <label>Email:</label><br>
            <input type="email" name="email" required placeholder="Masukkan email"><br><br>
            <label>NIM:</label><br>
            <input type="text" name="nim" placeholder="Masukkan NIM" oninput="validateNIM(this)"><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" required placeholder="Masukkan password"><br><br>
           <center> <input type="submit" name="login" value="Login"></center>
        </form>
        </div>
    <?php
    }
    ?>
</div>
    <?php
    // Tampilkan link logout jika pengguna sudah login
    if (isUserLoggedIn()) {
        echo '<p><a href="index.php?logout">Logout</a></p>';
    }
    ?>
    
</body>
</html>
