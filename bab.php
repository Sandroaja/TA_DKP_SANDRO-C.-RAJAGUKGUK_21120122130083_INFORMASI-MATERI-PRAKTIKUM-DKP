<?php
session_start();

class Queue {
    private $data;

    public function __construct() {
        $this->data = array();
    }

    public function enqueue($item) {
        array_push($this->data, $item);
    }

    public function dequeue() {
        return array_shift($this->data);
    }

    public function peek() {
        return reset($this->data);
    }

    public function isEmpty() {
        return empty($this->data);
    }
}


// Cek apakah pengguna sudah login
function isUserLoggedIn() {
    return isset($_SESSION['email']) && isset($_SESSION['username']) && isset($_SESSION['nim']);
}

// Redirect ke halaman login jika pengguna belum login
if (!isUserLoggedIn()) {
    header("Location: index.php");
    exit();
}

// Ambil bab yang dipilih dari parameter URL
if (isset($_GET['bab'])) {
    $selectedBab = $_GET['bab'];
} else {
    // Jika bab tidak ditemukan, redirect ke halaman utama
    header("Location: index.php");
    exit();
}

// Array informasi mata kuliah
$mataKuliah = array(
    array(
        'bab' => 1,
        'judul' => 'Variabel, Tipe Data, dan Array',
        'deskripsi' => 'Variabel adalah tempat dimana kita dapat mengisi atau mengosongkan nilainya dan memanggil kembali apabila dibutuhkan. Setiap variabel akan mempunyai nama (identifier) dan nilai. 
        Tipe data adalah jenis data yang dapat diolah oleh komputer untuk memenuhi kebutuhan dalam pemrograman komputer.
        Array (larik) ialah sekumpulan variabel-variabel yang memiliki nama dan tipe data yang sama satu dengan lainnya.',
        'pengajar' => 'Muhammad Irhamsyah Arrahim (081315244955), Florencia Irena Amelia (087784809604)
        ',
        'file' => 'https://drive.google.com/file/d/17u35yY4Gd-x33mUV1SfyyJx977RBY_zR/view?usp=drive_link'
    ),
    array(
        'bab' => 2,
        'judul' => 'Pengkondisian',
        'deskripsi' => 'Pengkondisian merupakan suatu pengaturan alur program berdasar kondisi boolean (kondisi benar dan salah) yang dijadikan patokan.',
        'pengajar' => 'Muhamad Rafdan Maulana: 085799444478 (WA), Refanda Surya Saputra : 083108414438 (WA)',
        'file' => 'https://drive.google.com/file/d/1Q23VNBuzPqg-FAGr5ew4eJDYFtE99X9F/view?usp=drive_link'
    ),
    array(
        'bab' => 3,
        'judul' => 'Perulangan',
        'deskripsi' => 'Perulangan adalah salah satu bentuk pemrograman untuk menangani satu langkah yang berulang.
        Terdapat dua jenis perulangan yaitu counted loop seperti perulangan FOR dan uncounted loop seperti perulangan WHILE dan DO WHILE.
        ',
        'pengajar' => 'Fangki Igo Pramana (fangki_ip), Daffa Abhyasa Santoso (08111555406)
        ',
        'file' => 'https://drive.google.com/file/d/1TbYHSPGvbVO-XIL9zyRi1cSF_dojHBsT/view?usp=drive_link'
    ),
    array(
        'bab' => 4,
        'judul' => 'Function And Method',
        'deskripsi' => 'Function merupakan sekumpulan instruksi yang dikelompokkan secara  khusus untuk mengerjakan suatu tugas tertentu.
        Method pada dasarnya merupakan suatu function yang berada pada suatu  class yang mana dapat diimplementasikan oleh class lain.',
        'pengajar' => 'Doan Carlos Embara [carlosdoanembara@gmail.com], M. Bintang Prayoga Utama [mbintangprayogautama@students.undip.ac.id]

        ',
        'file' => 'https://drive.google.com/file/d/11nf8N7Treus5mQq4rkTVJHWVuKtOrbPv/view?usp=drive_link'
    ),
    array(
        'bab' => 5,
        'judul' => 'Object Oriented Programming I',
        'deskripsi' => 'Pemrograman berorientasi objek adalah paradigma pemrograman yang berorientasikan kepada objek yang merupakan suatu metode dalam pembuatan program,
        dengan tujuan untuk menyelesaikan kompleksnya berbagai masalah program yang terus meningkat.',
        'pengajar' => 'Muhammad Raihan Maulana (0895601914130), Djie Valencia Santoso (valencia_santoso03)',
        'file' => 'https://drive.google.com/file/d/1b6p88m9UzYd-EpyzvO3l4bkwQe435SEo/view?usp=drive_link    '
    ),
    array(
        'bab' => 6,
        'judul' => 'Object Oriented Programming II',
        'deskripsi' => 'Polymorphism juga dapat diartikan sebagai teknik programming yang  mengarahkan programmer untuk memprogram secara general daripada secara  spesifik.
        Abstraction adalah satu dari  tiga prinsip sentral (Enkapsulasi dan Pewarisan).
        Encapsulation merupakan implementasi penyembunyian informasi  (information hiding).',
        'pengajar' => 'Syahira Isnaeni Dewi (id line = syr_yr),Shinta Nurrohmah (wa: 085742704308)',
        'file' => 'https://drive.google.com/file/d/1WnfEcOZ7FGVgOJMWmWjnck4HpnhwvKCB/view?usp=drive_link'
    ),
    array(
        'bab' => 7,
        'judul' => 'Stack And Queue',
        'deskripsi' => 'Stack atau tumpukan dapat diartikan sebagai suatu kumpulan data yang seolah-olah terlihat seperti ada data yang diletakkan di atas data yang lain.
        Queue atau antrian merupakan struktur data linear dimana penambahan komponen dilakukan disatu ujung, sementara pengurangan dilakukan diujung lain. ',
        'pengajar' => 'Farhan Ryan Rafli (089526384701), Yosia Aser Camme (082271507532)
        ',
        'file' => 'https://drive.google.com/file/d/1OlkJlHdaYwMa8or1hqwHH8dwMCLlHT5c/view?usp=drive_link'
    ),
    array(
        'bab' => 8,
        'judul' => 'GUI Programming',
        'deskripsi' => 'GUI (Graphical User Interface) merupakan antarmuka grafis yang memfasilitasi interaksi antara pengguna (user) dengan program aplikasi.
        ',
        'pengajar' => 'George Miracle (georgemiracle.t.), Agustinus Adven Christo (titoclv)',
        'file' => 'https://drive.google.com/file/d/1malInqyFt83ECC-TDlmREnBtL5LD53sO/view?usp=drive_link'
    )
);

$queue = new Queue();
foreach ($mataKuliah as $matkul) {
    if ($matkul['bab'] == $selectedBab) {
        $queue->enqueue($matkul['pengajar']);
        break;
    }
}


// Cari bab yang sesuai dengan yang dipilih
$selectedBabInfo = null;
foreach ($mataKuliah as $matkul) {
    if ($matkul['bab'] == $selectedBab) {
        $selectedBabInfo = $matkul;
        break;
    }
}

// Jika bab tidak ditemukan, redirect ke halaman utama
if ($selectedBabInfo == null) {
    header("Location: index.php");
    exit();
}

// Contoh penggunaan Queue
$queue = new Queue();
$queue->enqueue($selectedBabInfo['pengajar']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>MODUL <?php echo $selectedBab; ?></title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>     
    <h1 class="modul">MODUL <?php echo $selectedBab; ?></h1>
    <h2 class="modul">Judul: <?php echo $selectedBabInfo['judul']; ?></h2>
    <h4 class="modul">Pengajar: <?php echo $queue->peek(); ?></h4>
    <p class="modul"><?php echo $selectedBabInfo['deskripsi']; ?></p>
    <center><h3><a class="modul" href="<?php echo $selectedBabInfo['file']; ?>" target="_blank">Materi</a></h3></center>
    <p class="modul"><a href="index.php">Kembali ke Halaman Utama</a></p>
</body>
</html>
