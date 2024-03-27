<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Data dari halaman voting
  $nama = $_POST["nama"];
  $nilai = $_POST["nilai"];

  // Simpan data ke database
  $servername = "localhost";
  $username = "root";
  $password = "1234basdat";
  $dbname = "codefest";

  // Buat koneksi
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Periksa koneksi
  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  // Ambil id project dari tabel akun berdasarkan session pengguna saat ini
  $id_project = $_SESSION["id_project"];

  // Tambahkan data ke tabel voting
  $sql = "INSERT INTO project ( id_project, nama, nilai) VALUES ('$id_project', '$nama', '$nilai')";

  if ($conn->query($sql) === TRUE) {
    // Voting berhasil ditambahkan ke database
    echo '<script>alert("Project berhasil dikumpulkan!"); window.location.href = "halamanutama.php";</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link href="assets/css/theme.css" rel="stylesheet" />
    
    
    <main class="main" id="top">
      <nav
        class="navbar navbar-expand-lg navbar-light sticky-top"
        data-navbar-on-scroll="data-navbar-on-scroll"
      >
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img src="../CodeFest/images/codefest.jpg" height="75" alt="" />
          </a>

          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"> </span>
          </button>
          <div
            class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0"
            id="navbarSupportedContent"
          >
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#feature"
                  >Bootcamp</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#marketing"
                  >Competition
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#validation"
                  >Information</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="vote.php"
                  >Vote</a
                >
              </li>
              
            </ul>
            <div class="d-flex ms-lg-4">
              <a class="btn btn-secondary-outline" href="login.php">Log In</a
              ><a class="btn btn-warning ms-3" href="register.html">Sign Up</a>
            </div>
          </div>
        </div>
      </nav>


<hr>
<div class="container bootstrap snippets bootdey">
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-polaroid profile-img img-thumbnail " />
        </div>

        
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="text-primary"><span class="glyphicon glyphicon-user"></span>Project 1<p class="lead"> Please provide a value for the vote.</p></h2>
            </div>
            <a class="btn btn-primary" href="#" id="read-more-btn">Vote Now</a>
          </div>
          <div class="row lead">
            <div class="col-md-12  text-center">
              <div id="stars" class="starrr text-warning"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
              
</body>
</html>