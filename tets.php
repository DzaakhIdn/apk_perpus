<?php
// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
$host = "localhost";
$username = "root";
$password = "";
$database = "apk_perpus";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tentukan jenis form berdasarkan parameter 'type' di URL atau default ke 'staff'
$type = isset($_GET['type']) ? $_GET['type'] : 'staff';

// Inisialisasi pesan untuk feedback
$message = "";

// Proses form saat di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Gunakan input tersembunyi untuk menentukan jenis data
    $formType = isset($_POST['form_type']) ? $_POST['form_type'] : 'staff';

    if ($formType == 'staff') {
        // Proses data untuk Staff
        $nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
        $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
        $jabatan = isset($_POST['jabatan']) ? mysqli_real_escape_string($conn, $_POST['jabatan']) : '';

        // Validasi sederhana
        if (!empty($nama) && !empty($email) && !empty($jabatan)) {
            $sql = "INSERT INTO staff (nama, email, jabatan) VALUES ('$nama', '$email', '$jabatan')";
            if (mysqli_query($conn, $sql)) {
                $message = "Staff berhasil ditambahkan.";
            } else {
                $message = "Error: " . mysqli_error($conn);
            }
        } else {
            $message = "Semua field wajib diisi.";
        }
    } elseif ($formType == 'peminjam') {
        // Proses data untuk Peminjam
        $nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
        $alamat = isset($_POST['alamat']) ? mysqli_real_escape_string($conn, $_POST['alamat']) : '';
        $no_hp = isset($_POST['no_hp']) ? mysqli_real_escape_string($conn, $_POST['no_hp']) : '';

        // Validasi sederhana
        if (!empty($nama) && !empty($alamat) && !empty($no_hp)) {
            $sql = "INSERT INTO peminjam (nama, alamat, no_hp) VALUES ('$nama', '$alamat', '$no_hp')";
            if (mysqli_query($conn, $sql)) {
                $message = "Peminjam berhasil ditambahkan.";
            } else {
                $message = "Error: " . mysqli_error($conn);
            }
        } else {
            $message = "Semua field wajib diisi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 500px; margin: 50px auto; }
        .message { margin-bottom: 20px; color: green; }
        form { border: 1px solid #ccc; padding: 20px; border-radius: 5px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="email"], input[type="number"], textarea { width: 100%; padding: 8px; margin-top: 5px; }
        input[type="submit"] { margin-top: 15px; padding: 10px 15px; }
        .nav-links { margin-bottom: 20px; }
        .nav-links a { margin-right: 10px; text-decoration: none; color: #007BFF; }
        .nav-links a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h1>Tambah Data</h1>

    <!-- Tautan Navigasi -->
    <div class="nav-links">
        <a href="?type=staff">Tambah Staff</a>
        <a href="?type=peminjam">Tambah Peminjam</a>
    </div>

    <!-- Tampilkan pesan feedback jika ada -->
    <?php if (!empty($message)): ?>
        <div class="message">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- Tampilkan form berdasarkan jenis -->
    <?php if ($type == 'staff'): ?>
        <h2>Form Tambah Staff</h2>
        <form action="add.php?type=staff" method="POST">
            <input type="hidden" name="form_type" value="staff">
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" required>
            
            <input type="submit" value="Tambah Staff">
        </form>

    <?php elseif ($type == 'peminjam'): ?>
        <h2>Form Tambah Peminjam</h2>
        <form action="add.php?type=peminjam" method="POST">
            <input type="hidden" name="form_type" value="peminjam">
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="3" required></textarea>
            
            <label for="no_hp">No. HP:</label>
            <input type="text" id="no_hp" name="no_hp" required>
            
            <input type="submit" value="Tambah Peminjam">
        </form>

    <?php else: ?>
        <p>Pilih jenis data yang ingin ditambahkan menggunakan tautan di atas.</p>
    <?php endif; ?>
</div>

</body>
</html>

<?php
// Tutup koneksi
mysqli_close($conn);
?>
