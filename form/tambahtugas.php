<?php 
session_start(); 
include 'db.php'; 

if ($_SESSION['status_login'] != true) { 
  echo '<script>window.location="login.php"</script>'; 
} 

if (isset($_POST['submit'])) { 
  $matakuliah = $_POST['matakuliah']; 
  $nama = $_POST['nama']; 
  $nama_nim = $_POST['nama_nim']; 
  $format = $_POST['format']; 
  $status = $_POST['status']; 

  $filename = $_FILES['gambar']['name']; 
  $tmp_name = $_FILES['gambar']['tmp_name']; 

  $type1 = explode('.', $filename); 
  $type2 = $type1[1]; 

  $newname = 'tugas'. time().'.'.$type2; 

  $allowed_formats = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'pptx'); 

  if (!in_array($type2, $allowed_formats)) { 
    echo '<script>alert("Format File Tidak Diizinkan")</script>'; 
  } else { 
    move_uploaded_file($tmp_name, './tugas/' .$newname); 
    $insert = mysqli_query($conn, "INSERT INTO tb_tugas VALUES (null, '$matakuliah', '$nama', '$nama_nim', '$format', '$newname', '$status', null)"); 

    if ($insert) { 
      echo '<script>alert(Simpan Data Berhasil)</script>'; 
      echo '<script>window.location = "tugas.php"</script>'; 
    } else { 
      echo 'Gagal'. mysqli_error($conn); 
    } 
  } 
} 
?> 

<!DOCTYPE html> 
<html> 
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>Data Mahasiswa</title> 
  <link rel="stylesheet" type="text/css" href="css/style2.css"> 
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">  
</head> 
<body> 
  <!-- header --> 
  <header> 
    <div class="container"> 
    <img src="logo/logo.png" width="200px"> 
      <nav>
        <ul> 
          <li><strong><a href="dashboard.php">Dashboard</a></strong></li> 
          <li><a href="matakuliah.php">Mata Kuliah</a></li> 
          <li><a href="tugas.php">Tugas</a></li> 
          <li><a href="logout.php">| LOGOUT |</a></li> 
        </ul> 
      </nav>
    </div> 
  </header> 

  <!-- content --> 
  <div class="section"> 
    <div class="container"> 
      <h2>Tambah Data Tugas</h2> 
      <div class="box"> 
        <form action="" method="POST" enctype="multipart/form-data"> 
          <select class="input-control" name="matakuliah" required> 
            <option value="">--Pilih Matakuliah--</option> 
            <?php 
            $matakuliah = mysqli_query($conn, "SELECT * FROM tb_matakuliah ORDER BY matakuliah_id DESC"); 
            while ($r = mysqli_fetch_array($matakuliah)) { 
              echo '<option value="'.$r['matakuliah_id'].'">'.$r['matakuliah_name'].'</option>'; 
            } 
            ?> 
          </select> 
          
          <input type="text" name="nama" class="input-control" placeholder="Deskripsi Tugas" required> 
          <input type="text" name="nama_nim" class="input-control" placeholder="Nama (NIM)" required> 
          <input type="file" name="gambar" class="input-control" required> 
          
          <select class="input-control" name="format"> 
            <option value="">- Format Tugas--</option> 
            <option>jpg</option> 
            <option>jpeg</option> 
            <option>png</option> 
            <option>gif</option> 
            <option>pdf</option> 
            <option>docx</option> 
            <option>pptx</option>
          </select> 
          <br>    
          <select class="input-control" name="status"> 
            <option value="">--Pilih Status Tugas--</option> 
            <option value="1">Selesai</option> 
            <option value="0">Belum mengumpulkan</option> 
          </select> 
          
          <input type="submit" name="submit" value="Submit" class="btn"> 
        </form>
      </div> 
    </div> 
  </div> 

  <!-- footer --> 
  <footer> 
    <div class="container"> 
      <small>Copyright &copy; 2024 INSTITUT BISNIS DAN TEKNOLOGI INDONESIA</small> 
    </div> 
  </footer> 
</body> 
</html>