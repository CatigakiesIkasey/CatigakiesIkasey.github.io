<?php 
session_start(); 
include 'db.php'; 

if($_SESSION['status_login'] != true){ 
    echo '<script>window.location="login.php"</script>'; 
} 

$matakuliah = mysqli_query($conn, "SELECT * FROM tb_matakuliah ORDER BY matakuliah_id DESC"); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Data Matakuliah</title> 
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
            <h2>Data Matakuliah</h2> 
            <div class="box-table"> 
                <p><a href="tambahmatakuliah.php" class="btn">Tambah Data</a></p> 
                <table border="1" cellspacing="0" class="table"> 
                    <thead> 
                        <tr> 
                            <th width="60px">NO</th> 
                            <th>MATAKULIAH</th> 
                            <th width="150px">AKSI</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        <?php 
                        $no = 1; 
                        if(mysqli_num_rows($matakuliah) > 0){ 
                            while($row = mysqli_fetch_array($matakuliah)){ 
                        ?> 
                        <tr> 
                            <td align="center"><?php echo $no++ ?></td> 
                            <td><?php echo $row['matakuliah_name'] ?></td> 
                            <td align="center"> 
                                <a href="editmatakuliah.php?id=<?php echo $row['matakuliah_id'] ?>">Edit</a> ||  
                                <a href="hapus.php?idk=<?php echo $row['matakuliah_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a> 
                            </td> 
                        </tr> 
                        <?php 
                            } 
                        } else { 
                        ?> 
                        <tr> 
                            <td colspan="3" align="center">Tidak Ada Data</td> 
                        </tr> 
                        <?php } ?> 
                    </tbody> 
                </table> 
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
