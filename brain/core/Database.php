<?php

require_once __DIR__ . '/../Config.php';



// MADE BY : IRZA ARIVIN



class Database extends Config {

    // FUNCTION UNTUK MELIHAT SELURUH TABLE YANG TERSEDIA
    public static function tables() {

        $sql = "SHOW TABLES";
        $call = mysqli_query(self::connect(), $sql);
        $rows = [];

        while ($row = mysqli_fetch_assoc($call)) {
            $rows[] = $row;
        }

        return $rows;

    }

    // FUNCTION UNTUK MENDAPATKAN SELURUH DATA DARI TABLE
    public static function all($table) {

        $sql = "SELECT * FROM $table";
        $call = mysqli_query(self::connect(), $sql);
        $rows = [];

        while ($row = mysqli_fetch_assoc($call)) {
            $rows[] = $row;
        }
        
        return $rows;

    }

    // FUNCTION UNTUK MENCARI SEBUAH DATA BERDASARKAN ID
    public static function find($table, $id) {

        $sql = "SELECT * FROM $table WHERE id = '$id'";
        $call = mysqli_query(self::connect(), $sql);
        $result = mysqli_fetch_assoc($call);

        return $result;

    }

    // FUNCTION UNTUK MENDAPATKAN SELURUH DATA BERDASARKAN FIELD TERTENTU
    public static function get($table, $key, $val) {

        $sql = "SELECT * FROM $table WHERE $key = '$val'";
        $call = mysqli_query(self::connect(), $sql);
        $rows = [];

        while ($row = mysqli_fetch_assoc($call)) {
            $rows[] = $row;
        }

        return $rows;

    }

    // FUNCTION UNTUK MENDAPATKAN SELURUH DATA BERDASARKAN WHERE CLAUSES TERTENTU
    public static function getOpt($table, $key, $opt, $val) {

        $sql = "SELECT * FROM $table WHERE $key $opt '$val'";
        $call = mysqli_query(self::connect(), $sql);
        $rows = [];

        while ($row = mysqli_fetch_assoc($call)) {
            $rows[] = $row;
        }

        return $rows;
        
    }

    // FUNCTION UNTUK MENAMBAHKAN DATA
    public static function create($table) {

        if(count($_POST) != 0) {

            $keys = count(array_keys($_POST));
            $tables = "INSERT INTO $table (";

            for($i=0; $i<$keys; $i++) {
                $tables .= array_keys($_POST)[$i] . ",";
            }

            $tables = rtrim($tables, ',');
            $tables .= ")";
            $data = array_values($_POST);
            $values = " VALUES(";

            for($i=0; $i<$keys; $i++) {
                $values .= "'" . $data[$i] . "',";
            }

            $values = rtrim($values, ',');
            $values .= ")";

            $query = $tables . $values;
            $request = mysqli_query(self::connect(), $query);

            if($request) {

                $_POST = null;
                return true;

            } else {

                $_POST = null;
                return false;

            }

        }

        return false;

    }

    // FUNCTION UNTUK MENGUPDATE DATA BERDASARKAN ID
    public static function update($table, $id) {

        if (count($_POST) != 0) {

            $keys = count(array_keys($_POST));
            $query = "UPDATE $table SET ";
            $tables = array_keys($_POST);
            $values = array_values($_POST);

            for ($i = 0; $i < $keys; $i++) {
                $query .= $tables[$i] . "=" . "'" . $values[$i] . "',";
            }

            $query = rtrim($query, ',');
            $query .= " WHERE id='$id'";

            $request = mysqli_query(self::connect(), $query);

            if ($request) {

                $_POST = null;
                return true;

            } else {

                $_POST = null;
                return false;

            }
        }

        return false;

    }

    // FUNCTION UNTUK MENGHAPUS DATA BERDASARKAN ID
    public static function delete($table, $id) {

        $query = "DELETE FROM $table WHERE id = '$id'";
        $request = mysqli_query(self::connect(), $query);

        if ($request) {

            $_POST = null;
            return true;

        } else {

            $_POST = null;
            return false;

        }

    }

    // FUNCTION UNTUK MENGHAPUS DATA BERDASARKAN WHERE CLAUSES & FIELD TERTENTU
    public static function deleteOpt($table, $key, $opt, $val) {

        $query = "DELETE FROM $table WHERE $key $opt '$val'";
        $request = mysqli_query(self::connect(), $query);

        if ($request) {

            $_POST = null;
            return true;

        } else {

            $_POST = null;
            return false;

        }
    }

    // FUNCTION UNTUK MENGAMBIL SELURUH DATA DENGAN INNER JOIN
    public static function innerJoin($tableA, $tableB, $columnA, $columnB) {

        $sql = "SELECT * FROM $tableA INNER JOIN $tableB ON $tableA.$columnA = $tableB.$columnB";
        $call = mysqli_query(self::connect(), $sql);
        $rows = [];

        while ($row = mysqli_fetch_assoc($call)) {
            $rows[] = $row;
        }

        return $rows;

    }

    // FUNCTION UNTUK MENGAMBIL DATA TERTENTU DENGAN INNER JOIN
    public static function selInnerJoin($tableA, $tableB, $select, $columnA, $columnB) {

        return "Under Construction";

        // $sql = "SELECT $select FROM $tableA INNER JOIN $tableB ON $tableA.$columnA = $tableB.$columnB";
        // $call = mysqli_query(self::connect(), $sql);
        // $rows = [];

        // while ($row = mysqli_fetch_assoc($call)) {
        //     $rows[] = $row;
        // }

        // return $rows;

    }

    // FUNCTION UNTUK MENGAMBIL SELURUH DATA DENGAN LEFT JOIN
    public static function leftJoin($tableA, $tableB, $columnA, $columnB) {

        $sql = "SELECT * FROM $tableA LEFT JOIN $tableB ON $tableA.$columnA = $tableB.$columnB";
        $call = mysqli_query(self::connect(), $sql);
        $rows = [];

        while ($row = mysqli_fetch_assoc($call)) {
            $rows[] = $row;
        }

        return $rows;

    }

    // FUNCTION UNTUK MENGAMBIL DATA TERTENTU DENGAN LEFT JOIN
    public static function selLeftJoin($tableA, $tableB, $select, $columnA, $columnB) {

        return "Under Construction";

        // $sql = "SELECT $select FROM $tableA INNER JOIN $tableB ON $tableA.$columnA = $tableB.$columnB";
        // $call = mysqli_query(self::connect(), $sql);
        // $rows = [];

        // while ($row = mysqli_fetch_assoc($call)) {
        //     $rows[] = $row;
        // }

        // return $rows;

    }

    // FUNCTION UNTUK MENGAMBIL SELURUH DATA DENGAN RIGHT JOIN
    public static function rightJoin($tableA, $tableB, $columnA, $columnB) {

        $sql = "SELECT * FROM $tableA RIGHT JOIN $tableB ON $tableA.$columnA = $tableB.$columnB";
        $call = mysqli_query(self::connect(), $sql);
        $rows = [];

        while ($row = mysqli_fetch_assoc($call)) {
            $rows[] = $row;
        }

        return $rows;

    }

    // FUNCTION UNTUK MENGAMBIL DATA TERTENTU DENGAN RIGHT JOIN
    public static function selRightJoin($tableA, $tableB, $select, $columnA, $columnB) {

        return "Under Construction";

        // $sql = "SELECT $select FROM $tableA RIGHT JOIN $tableB ON $tableA.$columnA = $tableB.$columnB";
        // $call = mysqli_query(self::connect(), $sql);
        // $rows = [];

        // while ($row = mysqli_fetch_assoc($call)) {
        //     $rows[] = $row;
        // }

        // return $rows;

    }

    // FUNCTION UNTUK MENGAMBIL SELURUH DATA DENGAN FULL OUTER JOIN
    public static function fullJoin($tableA, $tableB, $columnA, $columnB) {

        $sql = "SELECT * FROM $tableA LEFT OUTER JOIN $tableB ON $tableA.$columnA = $tableB.$columnB UNION SELECT * FROM $tableA RIGHT OUTER JOIN $tableB ON $tableA.$columnA = $tableB.$columnB";
        $call = mysqli_query(self::connect(), $sql);
        $rows = [];

        while ($row = mysqli_fetch_assoc($call)) {
            $rows[] = $row;
        }

        return $rows;

    }

    // FUNCTION UNTUK MENGAMBIL DATA TERTENTU DENGAN FULL OUTER JOIN
    public static function selFullJoin($select, $tableA, $tableB, $columnA, $columnB) {

        return "Under Construction";

        // $sql = "SELECT $select FROM $tableA LEFT OUTER JOIN $tableB ON $tableA.$columnA = $tableB.$columnB UNION SELECT $select FROM $tableA RIGHT OUTER JOIN $tableB ON $tableA.$columnA = $tableB.$columnB";        
        // $call = mysqli_query(self::connect(), $sql);
        // $rows = [];

        // while ($row = mysqli_fetch_assoc($call)) {
        //     $rows[] = $row;
        // }

        // return $rows;

    }

}

?>