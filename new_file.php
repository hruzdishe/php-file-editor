<?php
if (isset($_POST["file_name"])) {
    $file_name = $_POST["file_name"];
    if (!is_dir(__DIR__ . "/codes")) {
        mkdir(__DIR__ . "/codes");  
    }
    if (!file_exists(__DIR__ . "/codes/" . $file_name)) {
        touch(__DIR__ . "/codes/" . $file_name);
        header("Location: /?f=" . $file_name);
        die;
    } else {
        header("Location: new_file.php");
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New File</title>
</head>
<body>
    <form method="post">
        <p>File Name</p>
        <input name="file_name">
        <button>Create</button>
    </form>
</body>
</html>