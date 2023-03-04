<h1>SimPHPel</h1>
<h3>Adalah sebuah Libray PHO untuk melakukan CRUD (Create, Read, Update, Delete). Library ini dikhususkan untuk memudahkan programmer pemula yang baru belajar PHP dasar & OOP (Object Oriented Programming)</h3>

SEBELUM MENJALANKAN PROGRAM :
1. Import file coba.sql ke dalam phpmyadmin
2. Pastikan anda mengekstrak simPHPel.zip di dalam folder project anda yang berada di dalam folder htdocs
3. Buka folder "brain", kemudian edit file Config.php
4. Temukan sintaks private static $db_name = "usk_latihan";
5. Ganti kata "usk_latihan" menjadi nama database anda
6. Buat file index.php
7. Buka tag php di baris paling atas = <?php ... ?>
8. Didalam tag php, masukan script include('bridge.php');
9. Atau jika anda ingin menggunakan Magic Method CRUD ini di dalam file php anda yang lain, ikuti langkah 7 & 8
10. File yang telah anda sisipkan script include('bridge.php'); telah siap untuk anda gunakan semua methodnya

PERSYARATAN PROGRAM :
1. Minimal php versi 8.0.0
2. Database MySQL atau MariaDB

DOKUMENTASI PROGRAM :
Program ini sangat berkaitan dengan database. Ia berasumsi jika semua table yang telah anda buat memiliki PRIMARY KEY dengan nama "id" dan memiliki atribut AUTO_INCREMENT.
Semua method bersifat static, sehingga anda bisa memanggil method tersebut tanpa harus menginisialisasikan objek.

CARA PENGGUNAAN :
NamaClass::method(parameter); => Database::all(nama_table); atau Auth::register(nama_table);

DOKUMENTASI METHOD PADA CLASS Database :
1. tables() => untuk melihat semua table yang telah dibuat => "SHOW TABLES"
2. all("nama_table") => untuk mengambil semua data di dalam table => "SELECT * FROM nama_table"
3. find("nama_table", id) => untuk mencari data tertentu pada suatu table berdasarkan id => "SELECT * FROM nama_table WHERE id = id"
4. get("nama_table", "key", "value") => untuk mencari data tertentu pada suatu table dengan value where clause tertentu => "SELECT * FROM nama_table WHERE key = value"
5. getOpt("nama_table", "key", "option", "value") => untuk mencari data tertentu pada suatu table dengan where clause tertentu => "SELECT * FROM nama_table WHERE key option value"
6. create("nama_table") => untuk menambahkan data. untuk menggunakan method ini, pastikan value dari atribut tag input anda sama dengan nama field pada database anda.
7. update("nama_table", "id") => untuk mengupdate data. untuk menggunakan method ini, pastikan value dari atribut tag input anda sama dengan nama field pada database anda.
8. delete("nama_table", "id") => untuk menghapus data dari table tertentu dengan id => "DELETE FROM nama_table WHERE id = id"
9. deleteOpt("nama_table", "key", "option", "value") => untuk menghapus data dari table tertentu dengan where clauses dan value tertentu => "DELETE FROM nama_table WHERE key option value"
10. innerJoin("table1", "table2", "kolom_table1", "kolom_table2") => untuk melakukan fungsi INNER JOIN => "SELECT * FROM table1 INNER JOIN table2 ON table1.kolom_table1 = table2.kolom_table2"
11. leftJoin("table1", "table2", "kolom_table1", "kolom_table2") => untuk melakukan fungsi LEFT OUTER JOIN => "SELECT * FROM table1 LEFT JOIN table2 ON table1.kolom_table1 = table2.kolom_table2"
12. rightJoin("table1", "table2", "kolom_table1", "kolom_table2") => untuk melakukan fungsi RIGHT OUTER JOIN => "SELECT * FROM table1 RIGHT JOIN table2 ON table1.kolom_table1 = table2.kolom_table2"
13. fullJoin("table1", "table2", "kolom_table1", "kolom_table2") => untuk melakukan fungsi FULL OUTER JOIN => "SELECT * FROM table1 LEFT OUTER JOIN table2 ON table1.kolom_table1 = table2.kolom_table2 UNION SELECT * FROM table1 RIGHT OUTER JOIN table2 ON table1.kolom_table1 = table2.kolom_table2"

DOKUMENTASI METHOD PADA CLASS Auth :
1. register("nama_table") => untuk mendaftarkan user baru, data password akan otomatis di hash.
2. login("nama_table", "keyword") => untuk melakukan proses Autentikasi dengan mencari data berdasarkan keyword/field tertentu.
3. logout("url") => untuk melakukan proses Logging Out User dan otomatis redirect ke url tertentu
