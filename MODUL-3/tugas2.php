<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ganjil dan Genap</title>
</head>
<body>
    <form method="POST" action="tugas2.php">
        <p>Masukkan Angka <input type="text" name="angka" size="3"></p>
        <input type="submit" name="submit" value="CEK">
    </form>
    
    <?php
    if (isset($_POST['submit'])) {
        error_reporting(E_ALL ^ E_NOTICE);
        $angka = $_POST['angka'];
        $submit = $_POST['submit'];
        if ($submit) {
            if ($angka == '') {
                echo "Anda Belum Memasukkan Angka!";
            } elseif ($angka % 2 == 0) {
                echo "Angka yang Anda Masukkan $angka adalah bilangan GENAP";
            } else {
                echo "Angka yang Anda Masukkan $angka adalah bilangan GANJIL";
            }
        }
    }
    ?>
    
</body>
</html>