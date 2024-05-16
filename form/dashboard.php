<?php 
    session_start(); 
    // Periksa apakah status_login sudah diatur dan true
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) { 
        // Jika belum, arahkan kembali ke halaman login
        echo '<script>window.location="login.php"</script>'; 
        // Hentikan eksekusi script selanjutnya
        exit;
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
                    <li><a href="profil.php">Profil</a></li> 
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
            <h2>Dashboard</h2> 
            <div class="box"> 
                <!-- Pastikan untuk memeriksa apakah $_SESSION['a_global'] diatur sebelum mengakses properti admin_name -->
                <h4 align="center">Selamat Datang <?php echo isset($_SESSION['username']->admin_name) ? $_SESSION['username']->admin_name : ''; ?> di Website INSTITUT BISNIS DAN TEKNOLOGI INDONESIA</h4> 
            </div> 
        </div> 
    </div> 

    <!-- footer --> 
    <footer> 
        <div class="container"> 
            <small>Copyright &copy; 2024 - INSTITUT BISNIS DAN TEKNOLOGI INDONESIA</small> 
        </div> 
    </footer> 
</body> 
</html> 
