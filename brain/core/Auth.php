<?php

require_once __DIR__ . '/../Config.php';



// MADE BY : IRZA ARIVIN



class Auth extends Config {

    // FUNCTION UNTUK REGISTER USER
    public static function register($table = "user") {

        if (count($_POST) != 0) {

            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $keys = count(array_keys($_POST));
            $tables = "INSERT INTO $table (";

            for ($i = 0; $i < $keys; $i++) {
                $tables .= array_keys($_POST)[$i] . ",";
            }

            $tables = rtrim($tables, ',');
            $tables .= ")";
            $data = array_values($_POST);
            $values = " VALUES(";

            for ($i = 0; $i < $keys; $i++) {
                $values .= "'" . $data[$i] . "',";
            }

            $values = rtrim($values, ',');
            $values .= ")";

            $query = $tables . $values;
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

    // FUNCTION UNTUK LOGIN USER
    public static function login($table = "user", $keyword = "email") {

        if (count($_POST) != 0) {

            $value = $_POST[$keyword];
            $cekUser = "SELECT * FROM $table WHERE $keyword = '$value'";

            if ($query = mysqli_query(self::connect(), $cekUser)) {

                $data = mysqli_fetch_assoc($query);
                $userPass = $_POST['password'];

                if (password_verify($userPass, $data['password'])) {

                    $_SESSION['auth'] = $data;
                    return true;
                } else {

                    $_SESSION['warning'] = "Password anda salah";
                    return false;
                }
            } else {

                $_SESSION['warning'] = $keyword . " tidak ditemukan";
                return false;
            }
        }

        return false;

    }

    // FUNCTION UNTUK LOGOUT USER
    public static function logout($url) {

        session_unset();
        session_destroy();
        header("Location :" . $url);
        exit();

    }

}

?>