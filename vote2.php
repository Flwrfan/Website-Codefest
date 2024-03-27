<!DOCTYPE html>
<html>
<head>
  <title>Lembar Pengumpulan Project Competition</title>
  <style>
    /* CSS untuk mengatur tata letak */
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .form {
      display: grid;
      gap: 10px;
      max-width: 400px;
      width: 100%;
      padding: 20px;
      background-color: #f5f5f5;
      border-radius: 8px;
    }

    .form-group {
      display: grid;
      gap: 10px;
    }

    .form-group label {
      font-weight: bold;
    }

    .select-container {
      display: flex;
      align-items: center;
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 6px;
    }

    select {
      flex: 1;
      border: none;
      outline: none;
      background-color: transparent;
    }

    input[type="text"] {
      border: none;
      background-color: transparent;
      padding: 6px;
      border: 1px solid #ddd;
      border-radius: 4px;
      width: 100%;
    }

    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="container">
  <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
      <label for="id_project">Pilih Project:</label>
      <div class="select-container">
        <select id="id_project" name="id_project" required>
          <option value="" disabled selected>Pilihan Project</option>
          <?php
          // Koneksi ke database
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

          // Ambil data proyek dari tabel "project"
          $sql = "SELECT id_project, namaproject FROM project";
          $result = $conn->query($sql);

          // Tambahkan data ke tabel tugas
          $sql = "INSERT INTO voting ( id_project, nama, nilai) VALUES ('$id_project', '$nama', '$nilai',)";


          // Tampilkan opsi berdasarkan data proyek
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<option value="' . $row["id_project"] . '">' . $row["namaproject"] . '</option>';
            }
          }

          $conn->close();
          ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="nama">Nama :</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
    </div>
    <div class="form-group">
      <label for="nama">Nilai :</label>
      <input type="text" id="nilai" name="nilai" placeholder="Masukkan nilai" required>
    </div>
    <button type="submit" name="submit">Submit</button>
  </form>
</div>
</body>
</html>



              

                 