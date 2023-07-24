<?php



// MADE BY : IRZA ARIVIN



class Config {

    // UBAH SERVER, USERNAME, PASSWORD, DAN DATABASE DARI MYSQLNYA DI PROPERTIES INI
    private static $db_server = "localhost";
    private static $db_user = "root";
    private static $db_password = "";
    private static $db_name = "test";

    protected static function connect() {
        $conn = mysqli_connect(self::$db_server, self::$db_user, self::$db_password, self::$db_name);
        return $conn;
    }

}

?>
