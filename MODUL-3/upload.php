<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        error_reporting(E_ALL ^ E_NOTICE);
        $direktori = 'images/';
        $nama_foto = $_FILES['foto']['name'];
        $size_foto = $_FILES['foto']['size'];
        $tipe_foto = $_FILES['foto']['type'];
        $upload = $direktori.$nama_foto;
        $submit = $_POST['submit'];
        
        move_uploaded_file($_FILES["foto"]["tmp_name"],$upload);
        if (file_exists($direktori.$nama_foto)) {
            echo "<h3>File Berhasil di Upload</h3> </br></br>
            <img border='0' src='$upload'></br></br>
            <b>Informasi File</b></br></br>
            Nama File : $nama_foto </br>
            Ukuran File : $size_foto byte </br>
            Tipe File : $tipe_foto </br>";
        } else {
            echo "Upload File Gagal";
        }
        
    }
    ?>
    <form method="POST" enctype="multipart/form-data" action="upload.php">
        Upload File : <input type="file" name="foto" size="20"> </br>
        <input type="submit" name="submit" value="UPLOAD">
    </form>

</body>
</html>