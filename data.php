<?php
// Include your database connection file
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Submit My Work</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
</head>

<body id="body">
      <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .filter-form {
            margin-bottom: 20px;
        }
        .filter-form label {
            margin-right: 10px;
        }
        .filter-form select {
            padding: 8px;
            font-size: 16px;
        }
        .filter-form button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .filter-form button:hover {
            background-color: #45a049;
        }

        .btn-tambah {
          margin: 5px;
        }
    </style>

  <!--Header-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto"><span>Submit</span>MyWork</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Beranda</a></li>
          <li class="menu-active"><a href="data.php">Data</li>
          <li><a href="login.php">Login</a></li>
          <li><a href="#contact">Hubungi kami</a></li>
        </ul>
      </nav>
    </div>
  </header>

    <!--Form-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Daftar Siswa</h2>
        </div>

        <div class="row">
        <button type="button" class="btn btn-primary btn-tambah" id="btnTambahData">+ Tambah data</button>
          <form method="get" action="">
            <label for="kelas">Filter Kelas:</label>
            <select name="kelas" id="kelas">
              <option value="">Semua Kelas</option>
              <?php
              // Query untuk mendapatkan data mapel
              $sql = "SELECT id_kelas, nama_kelas FROM kelas";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id_kelas'] . "'>" . $row['nama_kelas'] . "</option>";
                }
              }
              ?>
            </select>

            <label for="mapel">Filter Mapel:</label>
            <select name="mapel" id="mapel">
              <option value="">Semua Mapel</option>
              <?php
              // Query untuk mendapatkan data mapel
              $sql = "SELECT id_mapel, nama_mapel FROM mapel";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id_mapel'] . "'>" . $row['nama_mapel'] . "</option>";
                }
              }

              ?>
            </select>

            <label for="tanggal">Filter berdasarkan Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal">



            <button type="submit">Filter</button>
          </form>

          <br>
          <br>

          <table>
            <tr>
              <th>ID</th>
              <th>Kelas</th>
              <th>Mapel</th>
              <th>Nama Siswa</th>
              <th>No Absen</th>
              <th>Judul File PDF</th>
              <th>Nama File PDF</th>
              <th>Submitted Date</th>
              <th>Aksi</th>
            </tr>

            <?php

            // Ambil variabel GET yang sesuai
            $kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '';
            $mapel = isset($_GET['mapel']) ? $_GET['mapel'] : '';
            $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';

            $sql = "SELECT s.id_siswa, k.nama_kelas, m.nama_mapel, s.nama, s.no_absen, s.judul_file_pdf, s.nama_file_pdf, s.submitted_date 
            FROM siswa s
            JOIN kelas k ON s.id_kelas = k.id_kelas
            JOIN mapel m ON s.id_mapel = m.id_mapel
            WHERE 1=1";

            if ($kelas != '') {
              $sql .= " AND s.id_kelas = '$kelas'";
            }
            if ($mapel != '') {
              $sql .= " AND s.id_mapel = '$mapel'";
            }
            if ($tanggal != '') {
              $sql .= " AND DATE(s.submitted_date) = '$tanggal'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_siswa"] . "</td>";
                echo "<td>" . $row["nama_kelas"] . "</td>";
                echo "<td>" . $row["nama_mapel"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["no_absen"] . "</td>";
                echo "<td>" . $row["judul_file_pdf"] . "</td>";
                echo "<td>
                <img src='img/pdf.png' width='40 px' height='55px'></img>
                <a href='uploads/" . $row["nama_file_pdf"] . "' target='_blank'>" . $row["nama_file_pdf"] . "</a></td>";
                echo "<td>" . $row["submitted_date"] . "</td>";
                echo "<td>";
                echo "<button data-id='" . $row["id_siswa"] . "' class='btn btn-primary btn-sm btn-edit'>Edit</button>";
                echo"<br>";
                echo"<br>";
                echo "<a href='delete.php?id=" . $row['id_siswa'] . "' class='btn btn-danger btn-sm btn-delete' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?')\">Delete</a>";
                echo "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='8'>Tidak ada hasil</td></tr>";
            }
            ?>



          </table>
        </div>
      </div>
    </section>

    <!--Contact-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Hubungi Kami</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address><strong>Yayasan Permata Mojokerto</strong> Lingkungan Kuwung RT 02 RW 03 Kel. Meri Kec. Kranggan Kota Mojokerto, kode 61315</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Kontak</h3>
              <p><a href='tel:++6282228580047'>+62 822-2858-0047</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href='mailto:sitpermata1@gmail.com'>sitpermata1@gmail.com</a></p>
            </div>
          </div>

        </div>
      </div>

  </main>

  <!--Footer-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Upload Tugas</strong> 2024. All Rights Reserved
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <script src="js/main.js"></script>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm" enctype="multipart/form-data">
          <input type="hidden" id="editIdSiswa" name="id_siswa">
          <div class="mb-3">
            <label for="editNamaSiswa" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control" id="editNamaSiswa" name="nama_siswa" required>
          </div>
          <div class="mb-3">
            <label for="editNoAbsen" class="form-label">No Absen</label>
            <input type="text" class="form-control" id="editNoAbsen" name="no_absen" required>
          </div>
          <div class="mb-3">
            <label for="editJudulFilePdf" class="form-label">Judul File PDF</label>
            <input type="text" class="form-control" id="editJudulFilePdf" name="judul_file_pdf" required>
          </div>
          <div class="mb-3">
            <label for="editFilePdf" class="form-label">Upload File PDF Baru (jika perlu)</label>
            <input type="file" class="form-control" id="editFilePdf" name="file_pdf">
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahData" method="post" action="tambah.php" enctype="multipart/form-data">
          <div class="mb-3">
          <label for="id_kelas">Kelas:</label>
            <select name="id_kelas" id="id_kelas">
              <option>Pilih Kelas</option>
                <?php
                include 'config.php';
                $query = "SELECT * FROM kelas";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id_kelas']}'>{$row['nama_kelas']}</option>";
                }
                ?>
            </select>
          </div>
          <div class="mb-3">
          <label for="id_mapel">Mata Pelajaran:</label>
            <select name="id_mapel" id="id_mapel">
             <option>Pilih Mapel</option>
                <?php
                include 'config.php';
                $query = "SELECT * FROM mapel";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id_mapel']}'>{$row['nama_mapel']}</option>";
                }
                ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="namaSiswa" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control" id="namaSiswa" name="nama_siswa" required>
          </div>
          <div class="mb-3">
            <label for="noAbsen" class="form-label">No Absen</label>
            <input type="text" class="form-control" id="noAbsen" name="no_absen" required>
          </div>
          <div class="mb-3">
            <label for="judulFilePdf" class="form-label">Judul File PDF</label>
            <input type="text" class="form-control" id="judulFilePdf" name="judul_file_pdf" required>
          </div>
          <div class="mb-3">
            <label for="filePdf" class="form-label">File PDF</label>
            <input type="file" class="form-control" id="filePdf" name="nama_file_pdf" accept="application/pdf" required>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
  var editForm = document.getElementById('editForm');
  editForm.addEventListener('submit', function (event) {
    event.preventDefault();
    var formData = new FormData(editForm);
    fetch('edit.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      location.reload(); // Refresh page after successful update
    })
    .catch(error => console.error('Error:', error));
  });
});

document.addEventListener('DOMContentLoaded', function () {
  var editButtons = document.querySelectorAll('.btn-edit');
  var editModal = new bootstrap.Modal(document.getElementById('editModal'));

  editButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      var idSiswa = button.getAttribute('data-id');
      fetch(`get_siswa.php?id=${idSiswa}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById('editIdSiswa').value = data.id_siswa;
          document.getElementById('editNamaSiswa').value = data.nama;
          document.getElementById('editNoAbsen').value = data.no_absen;
          document.getElementById('editJudulFilePdf').value = data.judul_file_pdf;
          editModal.show();
        })
        .catch(error => console.error('Error:', error));
    });
  });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var btnTambahData = document.getElementById('btnTambahData');
        var tambahDataModal = new bootstrap.Modal(document.getElementById('tambahDataModal'));

        btnTambahData.addEventListener('click', function () {
            tambahDataModal.show();
        });
    });
</script>

<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>