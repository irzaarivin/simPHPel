# SimPHPel #
<h3>Adalah sebuah Libray PHP untuk melakukan CRUD (Create, Read, Update, Delete). Library ini dikhususkan untuk memudahkan programmer pemula yang baru belajar PHP dasar & OOP (Object Oriented Programming)</h3>

<br><br>

<h1>Getting Started</h1>
<br>

1. Setelah anda mengekstrak file SimPHPel.zip, maka seharusnya anda mendapatkan struktur file seperti ini:

```
* SimPHPel
  + brain
      + core
          - Database.php
          - Auth.php
      - Config.php
  - bridge.php
  - index.php
```

<br>

2. Edit file `index.php` :

```php
<?php

include('bridge.php');

$result = Database::all("coba");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimPHPel</title>
</head>

<body>

    <h1>Data Di Tabel "Coba" :</h1>
    <?php foreach ($result as $data) : ?>

        <p><?= $data['name']; ?> | <?= $data['email']; ?></p><br>

    <?php endforeach; ?>

</body>

</html>
```

<br>

3. Edit file `brain/Config.php` untuk mengganti nama database anda :

```php
<?php

class Config {

    // UBAH SERVER, USERNAME, PASSWORD, DAN DATABASE DARI MYSQLNYA DI PROPERTIES INI
    private static $db_server = "localhost";
    private static $db_user = "root";
    private static $db_password = "";
    private static $db_name = "nama_database_anda";

    protected static function connect() {
        $conn = mysqli_connect(self::$db_server, self::$db_user, self::$db_password, self::$db_name);
        return $conn;
    }

}

?>
```

<br><br>

<h3>SEBELUM MENJALANKAN PROGRAM :</h3>
<ol>
  <li>Import file coba.sql ke dalam phpmyadmin</li>
  <li>Pastikan anda mengekstrak simPHPel.zip di dalam folder project anda yang berada di dalam folder htdocs</li>
  <li>Buka folder "brain", kemudian edit file Config.php</li>
  <li>Temukan sintaks :
  
  ```php
  private static $db_name = "usk_latihan";
  ```
  
  </li>
  <li>Ganti kata "usk_latihan" menjadi nama database anda</li>
  <li>Buat file index.php</li>
  <li>Buka tag php di baris paling atas :
  
  ```php
  <?php ... ?>
  ```
  
  </li>
  <li>Didalam tag php, masukan script :
  
  ```php
  include('bridge.php');
  ```
  
  </li>
  <li>Atau jika anda ingin menggunakan Magic Method CRUD ini di dalam file php anda yang lain, ikuti langkah 7 & 8</li>
  <li>File yang telah anda sisipkan script <b>include('bridge.php');</b> sudah siap untuk anda gunakan semua methodnya</li>
</ol>

<br><br>

<h3>PERSYARATAN PROGRAM :</h3>
1. Minimal php versi 8.0.0<br>
2. Database MySQL atau MariaDB

<br><br>

<h3>DOKUMENTASI PROGRAM :</h3>
<p>Program ini sangat berkaitan dengan database. Ia berasumsi jika semua table yang telah anda buat memiliki PRIMARY KEY dengan nama "id" dan memiliki atribut AUTO_INCREMENT.</p>

<p>Semua method bersifat static, sehingga anda bisa memanggil method tersebut tanpa harus menginisialisasikan objek.</p>

<br><br>

<h3>CARA PENGGUNAAN :</h3>

```php
NamaClass::method(parameter);
```

atau

```php
Database::all(nama_table);
```

```php
Auth::register(nama_table);
```

<br><br>

<h1>DOKUMENTASI METHOD PADA CLASS Database :</h1>
<br>
<h2>1. tables()</h2>

```php
Database::tables();
```
Method ini digunakan untuk melihat semua table yang telah dibuat. Method tersebut menghasilkan perintah SQL seperti ini :

```mysql
SHOW TABLES;
```

<br><br>

<h2>2. all("nama_table")</h2>

```php
Database::all("nama_table");
```

Method ini digunakan untuk mengambil semua data di dalam table. Method tersebut menghasilkan perintah SQL seperti ini :

```mysql
SELECT * FROM nama_table
```

<br><br>

<h2>3. find("nama_table", id)</h2>

```php
Database::find("nama_table", id);
```

Method ini digunakan untuk mencari data tertentu pada suatu table berdasarkan id. Method ini akan menghasilkan perintah SQL seperti ini :

```mysql
SELECT * FROM nama_table WHERE id = 'id';
```

<br><br>

<h2>4. get("nama_table", "key", "value")</h2>

```php
Database::get("nama_table", "key", "value");
```

Method ini digunakan untuk mencari data tertentu pada suatu table dengan value where clause tertentu. Method ini akan menghasilkan perintah SQL seperti ini :

```mysql
SELECT * FROM nama_table WHERE key = 'value';
```

<br><br>

<h2>5. getOpt("nama_table", "key", "option", "value")</h2>

```php
Database::getOpt("nama_table", "key", "option", "value");
```

Method ini digunakan untuk mencari data tertentu pada suatu table dengan where clause dan value tertentu. Method ini akan menghasilkan perintah SQL seperti ini :

```mysql
SELECT * FROM nama_table WHERE key option 'value';
```

<br><br>

<h2>6. create("nama_table")</h2>

```php
Database::create("nama_table");
```

Method ini digunakan untuk menambahkan data. untuk menggunakan method ini, pastikan value dari atribut tag input anda sama dengan nama field pada database anda.

<br><br>

<h2>7. update("nama_table", "id")</h2>

```php
Database::update("nama_table", "id");
```

Method ini digunakan untuk mengupdate data. untuk menggunakan method ini, pastikan value dari atribut tag input anda sama dengan nama field pada database anda.

<br><br>

<h2>8. delete("nama_table", "id")</h2>

```php
Database::delete("nama_table", "id");
```

Method ini digunakan untuk menghapus data dari table tertentu dengan id. Method ini akan menghasilkan perintah SQL seperti ini :

```mysql
DELETE FROM nama_table WHERE id = 'id';
```

<br><br>

<h2>9. deleteOpt("nama_table", "key", "option", "value")</h2>

```php
Database::deleteOpt("nama_table", "key", "option", "value");
```

Method ini digunakan untuk menghapus data dari table tertentu dengan where clauses dan value tertentu. Method ini akan menghasilkan perintah SQL seperti ini :

```mysql
DELETE FROM nama_table WHERE key option 'value';
```

<br><br>

<h2>10. innerJoin("table1", "table2", "kolom_table1", "kolom_table2")</h2>

```php
Database::innerJoin("table1", "table2", "kolom_table1", "kolom_table2");
```

Method ini digunakan untuk melakukan fungsi INNER JOIN. Method ini akan menghasilkan perintah SQL seperti ini :

```mysql
SELECT * FROM table1 INNER JOIN table2 ON table1.kolom_table1 = table2.kolom_table2;
```

<br><br>

<h2>11. leftJoin("table1", "table2", "kolom_table1", "kolom_table2")</h2>

```php
Database::leftJoin("table1", "table2", "kolom_table1", "kolom_table2");
```

Method ini digunakan untuk melakukan fungsi LEFT OUTER JOIN. Method ini akan menghasilkan perintah SQL seperti ini :

```mysql
SELECT * FROM table1 LEFT JOIN table2 ON table1.kolom_table1 = table2.kolom_table2;
```

<br><br>

<h2>12. rightJoin("table1", "table2", "kolom_table1", "kolom_table2")</h2>

```php
Database::rightJoin("table1", "table2", "kolom_table1", "kolom_table2");
```

Method ini digunakan untuk melakukan fungsi RIGHT OUTER JOIN. Method ini akan menghasilkan perintah SQL seperti ini :

```mysql
SELECT * FROM table1 RIGHT JOIN table2 ON table1.kolom_table1 = table2.kolom_table2;
```

<br><br>

<h2>13. fullJoin("table1", "table2", "kolom_table1", "kolom_table2")</h2>

```php
Database::fullJoin("table1", "table2", "kolom_table1", "kolom_table2");
```

Method ini digunakan untuk melakukan fungsi FULL OUTER JOIN. Method ini akan menghasilkan perintah SQL seperti ini :

```mysql
SELECT * FROM table1 LEFT OUTER JOIN table2 ON table1.kolom_table1 = table2.kolom_table2 UNION SELECT * FROM table1 RIGHT OUTER JOIN table2 ON table1.kolom_table1 = table2.kolom_table2;
```

<br><br><br>

<h1>DOKUMENTASI METHOD PADA CLASS Auth :</h1>

<br>

<h2>1. register("nama_table")</h2>

```php
Auth::register("nama_table");
```

Method ini digunakan untuk mendaftarkan user baru, data password akan otomatis di hash.

<br><br>

<h2>2. login("nama_table", "keyword")</h2>

```php
Auth::login("nama_table", "keyword");
```

Method ini digunakan untuk melakukan proses Autentikasi dengan mencari data berdasarkan keyword/field tertentu.

<br><br>

<h2>3. logout("url")</h2>

```php
Auth::logout("url");
```

Method ini digunakan untuk melakukan proses Logging Out User dan otomatis redirect ke url tertentu
