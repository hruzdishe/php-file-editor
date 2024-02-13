<?php

if (isset($_GET["f"])) {
    $file_name = $_GET["f"];
    if (!is_dir(__DIR__ . "/codes")) {
        mkdir(__DIR__ . "/codes");  
    }
    if (file_exists(__DIR__ . "/codes/" . $file_name)) {
        unlink(__DIR__ . "/codes/" . $file_name);
    }
}
header("Location: /");