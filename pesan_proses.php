<?php
// koneksi ke database
include("connect.php");

// ambil data dari form
if (
    isset($_POST['name']) && isset($_POST['email'])
    && isset($_POST['nomor']) && isset($_POST['tanggal'])
    && isset($_POST['jumlah']) && isset($_POST['harga'])
    && isset($_FILES['bukti']['name'])
) {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $nomor = $_POST['nomor'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $bukti = $_FILES['bukti']['name'];

    // validasi input
    if (empty($nama) || empty($email) || empty($nomor) || empty($tanggal) || empty($jumlah) || empty($harga) || empty($bukti)) {
        echo "Semua field harus diisi!";
    } else {
        // cek apakah file yang diupload merupakan gambar
        $check = getimagesize($_FILES["bukti"]["tmp_name"]);
        if ($check !== false) {
            // jika file merupakan gambar, simpan data ke database
            $sql = "INSERT INTO tb_pemesanan (nama_pgj, email_pgj, nomor_pgj, tanggal, jumlah_orang, harga, bukti_transfer)
            VALUES ('$nama', '$email', '$nomor', '$tanggal', '$jumlah', '$harga', '$bukti');
            INSERT INTO tb_pengunjung (nama_pgj, email_pgj, nomor_pgj) 
            VALUES ('$nama', '$email', '$nomor')";

            if (mysqli_multi_query($conn, $sql)) {
                // pindahkan file yang diupload ke direktori yng sesuai
                move_uploaded_file($_FILES["bukti"]["tmp_name"], "bukti/" . $bukti);
                // tampilkan modal window dengan pesan sukses
                echo 'Pesanan berhasil';
            } else {
                // Error
            }
        } else {
            echo "File yang diupload bukan gambar!";
        }
    }
} else {
    echo "Form data is not being received properly.";
}

// tutup koneksi ke database
mysqli_close($conn);