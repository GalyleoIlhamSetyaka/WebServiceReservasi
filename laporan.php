<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/tabels.css" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laporan</title>
</head>

<body>
  <header>
    <h2>LAPORAN PEMESANAN</h2>
  </header>
  <div class="sidebar">
    <a href="laporan.php">Data Pemesanan</a>
    <a href="tabel2.php">Laporan</a>
    <a href="index.html">Lihat Website</a>
  </div>

  <!-- Page content -->
  <section id="pemesanan">
    <div class="container">
      <h2>Data Pemesanan</h2>
      <table class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Bukti Transfer</th>
            <th>OPSI</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $servername = "localhost";
          $database = "db_kalilo";
          $username = "root";
          $password = "";

          $conn = mysqli_connect($servername, $username, $password, $database);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $result = mysqli_query($conn, "SELECT * FROM tb_pemesanan");

          // Fetch data and generate table rows
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id_pemesanan'] . '</td>';
            echo '<td>' . $row['nama_pgj'] . '</td>';
            echo '<td>' . $row['email_pgj'] . '</td>';
            echo '<td>' . $row['nomor_pgj'] . '</td>';
            echo '<td>' . $row['tanggal'] . '</td>';
            echo '<td>' . $row['jumlah_orang'] . '</td>';
            echo '<td>' . $row['harga'] . '</td>';
            //menampilkan data jpg
            echo '<td>';
            $blob_data = base64_encode($row['bukti_transfer']);
            echo '<img src="data:image/jpeg;base64,' . $blob_data . '" alt="Image" />';
            echo '<td>';
            echo '<a type="button" class="btn btn-primary btn-lg text-right"> konfirmasi</a>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
</body>

</html>