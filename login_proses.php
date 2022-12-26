<?php
// Buat koneksi ke database
include("connect.php");

// Ambil data dari form
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // query untuk mencari data user berdasarkan username dan password
  $query = "SELECT * FROM tb_pengelola WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);

  // jika ada data user yang cocok
  if (mysqli_num_rows($result) == 1) {
    // simpan data user ke dalam session
    $user = mysqli_fetch_assoc($result);
    $_SESSION['tb_pengelola'] = $user;

    // redirect ke halaman dashboard
    header('Location: laporan.php');
  } else {
    // tampilkan pesan error jika username atau password salah
    echo "Username atau password salah";
  }
}

?>