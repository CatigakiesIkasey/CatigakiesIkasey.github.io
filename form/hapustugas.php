<?php
session_start();
include 'db.php';

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit; // Stop further execution if not logged in
}

if (isset($_GET['idt'])) {
    $idt = mysqli_real_escape_string($conn, $_GET['idt']);

    // Get the image file name for the task
    $tugas = mysqli_query($conn, "SELECT tugas_image FROM tb_tugas WHERE tugas_id = '$idt'");
    if (mysqli_num_rows($tugas) > 0) {
        $p = mysqli_fetch_object($tugas);
        $filename = $p->tugas_image;

        // Delete the image file from the directory
        $filepath = './tugas/' . $filename;
        if (file_exists($filepath)) {
            if (!unlink($filepath)) {
                echo '<script>alert("Gagal menghapus file tugas")</script>';
                echo '<script>window.location="tugas.php"</script>';
                exit;
            }
        }

        // Delete the task from the database
        $delete = mysqli_query($conn, "DELETE FROM tb_tugas WHERE tugas_id = '$idt'");
        if ($delete) {
            echo '<script>window.location="tugas.php"</script>';
        } else {
            echo '<script>alert("Gagal menghapus data tugas dari database")</script>';
            echo '<script>window.location="tugas.php"</script>';
        }
    } else {
        echo '<script>alert("Data tugas tidak ditemukan")</script>';
        echo '<script>window.location="tugas.php"</script>';
    }
} else {
    echo '<script>alert("ID tugas tidak ditemukan")</script>';
    echo '<script>window.location="tugas.php"</script>';
}

// Close the database connection
$conn->close();
