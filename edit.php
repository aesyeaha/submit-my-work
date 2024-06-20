<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id_siswa']);
    $nama_siswa = mysqli_real_escape_string($conn, $_POST['nama_siswa']);
    $no_absen = mysqli_real_escape_string($conn, $_POST['no_absen']);
    $judul_file_pdf = mysqli_real_escape_string($conn, $_POST['judul_file_pdf']);

    $updateSql = "UPDATE siswa SET nama = '$nama_siswa', no_absen = '$no_absen', judul_file_pdf = '$judul_file_pdf' WHERE id_siswa = $id";

    if ($_FILES['file_pdf']['error'] == 0) {
        $file_pdf = $_FILES['file_pdf'];
        $file_name = uniqid() . '-' . basename($file_pdf['name']);
        $file_path = 'uploads/' . $file_name;
        $file_type = mime_content_type($file_pdf['tmp_name']);
        $file_size = $file_pdf['size'];

        if ($file_type == 'application/pdf' && $file_size <= 5242880) {
            if (move_uploaded_file($file_pdf['tmp_name'], $file_path)) {
                $updateSql = "UPDATE siswa SET nama = '$nama_siswa', no_absen = '$no_absen', judul_file_pdf = '$judul_file_pdf', nama_file_pdf = '$file_name' WHERE id_siswa = $id";
            } else {
                echo "Error uploading file.";
                exit;
            }
        } else {
            echo "Invalid file type or size. Only PDF files under 5MB are allowed.";
            exit;
        }
    }

    if (mysqli_query($conn, $updateSql)) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
