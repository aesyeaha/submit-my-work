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

  <!--Header-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto"><span>Submit</span>MyWork</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#body">Beranda</a></li>
          <li><a href="#services">Mata Pelajaran</a></li>
          <li><a href="#uploadtugas">Form</a></li>
          <li><a href="#contact">Hubungi kami</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!--Intro-->
  <section id="intro">

    <div class="intro-content">
      <h2>Effortlessly share and <span>submit your <br> assignments</span> with ease!</h2>
      <div>
        <a href="#services" class="btn-projects scrollto">Submit My Work</a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('img/intro-carousel/1.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/3.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/4.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/5.jpg');"></div>
    </div>

  </section>

  <main id="main">

    <!--About Section-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>Selamat datang di SubmitMyWork</h2>
            <h3>Sebuah platform online untuk siswa Indonesia yang ingin berbagi dan meningkatkan kualitas tugas mereka, mari bergabung dan mulai meningkatkan kualitas tugas Anda!</h3>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Meningkatkan kemampuan guru dalam memantau kemajuan siswa.</li>
              <li><i class="ion-android-checkmark-circle"></i> Meningkatkan kemampuan guru dalam mengembangkan strategi pembelajaran yang lebih baik.</li>
              <li><i class="ion-android-checkmark-circle"></i> Meningkatkan kemampuan siswa dalam menyelesaikan tugas.</li>
            </ul>

          </div>
        </div>

      </div>
    </section>

      <!--Menu-->
  <section id="services">
    <div class="container">
      <div class="section-header">
        <h2>Mata Pelajaran</h2>
      </div>

      <div class="row">

        <div class="col-lg-12">
          <div class="box wow fadeInLeft">
            <div class="icon px-3"><img src="img/Bindo.png" alt="" width="110" height="170"></i></div>
            <h4 class="title"><a href="">Bahasa Indonesia</a></h4>
            <p class="description">
              Bahasa Indonesia adalah bahasa resmi dan bahasa nasional Republik Indonesia.
              Ini adalah bahasa yang digunakan dalam berbagai aspek kehidupan sehari-hari di Indonesia, termasuk dalam komunikasi resmi, pendidikan, pemerintahan, media massa, dan interaksi sosial.
              Bahasa Indonesia memiliki akar dalam bahasa Melayu yang telah mengalami standarisasi dan pengembangan sejak Indonesia meraih kemerdekaannya pada tahun 1945.
            </p>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="box wow fadeInRight">
            <div class="icon px-3"><img src="img/matematika.png" alt="" width="110" height="170"></i></div>
            <h4 class="title"><a href="">Matematika</a></h4>
            <p class="description">
              Pelajaran Matematika adalah mata pelajaran yang mempelajari tentang konsep-konsep dasar, prinsip, dan teknik dalam bidang matematika.
              Tujuan utama dari pelajaran ini adalah untuk mengajarkan siswa tentang cara berpikir secara logis, analitis, dan sistematis dalam memecahkan masalah-masalah matematika.
              <br>
              <br>
            </p>
          </div>
        </div>
      </div>
  </section>


  <!--Form-->
  <section id="uploadtugas" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Form</h2>
          <p>Pastikan Anda memilih kelas dan mata pelajaran yang sesuai serta memasukkan informasi siswa yang benar, 
            serta perhatikan bahwa file PDF yang diupload harus berisi tugas yang sesuai dengan kelas dan mata pelajaran yang dipilih</p>
        </div>

        <div class="row">
            <form action="submit.php" method="post" enctype="multipart/form-data">
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
            <br><br>

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
            <br><br>

            <label for="nama_siswa">Nama:</label>
            <input type="text" name="nama_siswa" id="nama_siswa" required>
            <br><br>

            <label for="no_absen">No. Absen:</label>
            <input type="number" name="no_absen" id="no_absen" required>
            <br><br>

            <label for="nama_file_pdf">File PDF:</label>
            <input type="file" name="nama_file_pdf" id="nama_file_pdf" accept=".pdf" required>
            <br><br>

            <label for="judul_file_pdf">Judul File:</label>
            <input type="text" name="judul_file_pdf" id="judul_file_pdf" required>
            <br><br>

            <input type="submit" value="Upload">
        </div>

      </div>
    </section>

    <!--Contact-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Hubungi Kami</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
              <p><a href="tel:++6282228580047">+62 822-2858-0047</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:sitpermata1@gmail.com">sitpermata1@gmail.com</a></p>
            </div>
          </div>

        </div>
      </div>

  </main>

  <!--Footer-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Reveal</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by BootstrapMade
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

</body>
</html>