<?php

session_start();



// MADE BY : IRZA ARIVIN



foreach (glob(getcwd() . "\brain\core\*") as $file) {
    require_once "$file";
}

// $file = scandir($file . "/brain");
// $file = implode(".", $file);
// $file = explode(".", $file);

// $value_to_remove = "";

// $file = array_filter($file, function ($value) use ($value_to_remove) {
//     return $value != $value_to_remove;
// });

// $file = array_filter($file);
// $value_to_remove = 'php';

// $file = array_filter($file, function ($value) use ($value_to_remove) {
//     return $value != $value_to_remove;
// });

// $key = count($file);

// foreach($file as $data) {
//     echo($data . ".php");
// }

?>