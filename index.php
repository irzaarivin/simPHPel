<?php

include('bridge.php');

// Program ini berasumsi bahwa nama tablenya adalah "coba"

// Variable ini akan mengambil semua data di dalam table "coba"
$result = Database::all("coba");

// Variable ini akan meregister user baru ke dalam table "coba"
$register = Auth::register("coba");

// Variable untuk FULL OUTER JOIN
$join = Database::selFullJoin("name, email", "coba", "users", "id", "id");

// Logika untuk mengecek apakah register user berhasil
if ($register) {
    echo "<script>alert('Ok');document.location.href = 'http://localhost:8080/simPHPel/';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <ul>
        <h1>Data Di Tabel "Coba" :</h1>
        <?php foreach ($result as $data) : ?>

            <li><?= $data['name']; ?> | <?= $data['email']; ?></li>

        <?php endforeach; ?>
    </ul>

    <br><br><br><br><br>

    <h1>Tambah Data :</h1>
    <form action="" method="POST">
        <input type="text" name="name" required>
        <input type="text" name="email" required>
        <input type="password" name="password" required>
        <button type="submit">Kirim</button>
    </form>

    <br><br><br><br><br>

</body>

</html>