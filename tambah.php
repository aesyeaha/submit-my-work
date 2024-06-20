<?php
// Include config file
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id_kelas = $_POST['id_kelas'];
    $id_mapel = $_POST['id_mapel'];
    $nama_siswa = $_POST['nama_siswa'];
    $no_absen = $_POST['no_absen'];
    $judul_file_pdf = $_POST['judul_file_pdf'];

    // Check if file is uploaded
    if ($_FILES['nama_file_pdf']['error'] == 0) {
        $nama_file_pdf = $_FILES['nama_file_pdf']['name'];
        $tmp_name = $_FILES['nama_file_pdf']['tmp_name'];
        $size = $_FILES['nama_file_pdf']['size'];
        $type = $_FILES['nama_file_pdf']['type'];

        // Check if file is PDF and within size limit (5MB)
        if ($type == 'application/pdf' && $size <= 5242880) {
            // Check if file already exists
            $query = "SELECT nama_file_pdf FROM siswa WHERE nama_file_pdf = '$nama_file_pdf'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 0) {
                // Move uploaded file to server
                $upload_dir = 'uploads/';
                $file_path = $upload_dir . $nama_file_pdf;
                move_uploaded_file($tmp_name, $file_path);

                // Insert data into database
                $query = "INSERT INTO siswa (id_kelas, id_mapel, nama, no_absen, nama_file_pdf, judul_file_pdf, submitted_date) VALUES ('$id_kelas', '$id_mapel', '$nama_siswa', '$no_absen', '$nama_file_pdf', '$judul_file_pdf', NOW())";
                mysqli_query($conn, $query);
                
                header("Location:data.php");
                echo "File uploaded successfully!";
            } else {
                echo "File already exists!";
            }
        } else {
            echo "Invalid file type or size!";
        }
    } else {
        echo "Error uploading file!";
    }
}
?>