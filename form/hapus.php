<?php  
include 'db.php'; 

if(isset($_GET['idk'])){ 
    $delete = mysqli_query($conn, "DELETE FROM tb_matakuliah WHERE matakuliah_id = '".$_GET['idk']."' "); 
    header("Location: matakuliah.php"); // Mengarahkan ke matakuliah.php tanpa menampilkan pesan "Berhasil terhubung ke database"
    exit(); // Menghentikan eksekusi skrip setelah perintah header
} 
?>

<?php  
include 'db.php'; 

if(isset($_GET['idk'])){ 
    $delete = mysqli_query($conn, "DELETE FROM tb_matakuliah WHERE matakuliah_id = '".$_GET['idk']."' "); 
    if($delete) {
        header("Location: matakuliah.php"); // Mengarahkan ke matakuliah.php setelah penghapusan berhasil
        exit(); // Menghentikan eksekusi skrip setelah perintah header
    } else {
        echo '<script>alert("Gagal menghapus data")</script>'; // Menampilkan pesan gagal jika penghapusan tidak berhasil
        echo '<script>window.location="hapus.php?idk='.$_GET['idk'].'"</script>'; // Kembali ke halaman hapus.php dengan idk yang sama jika penghapusan gagal
    }
}