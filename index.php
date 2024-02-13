<?php
if (!is_dir(__DIR__ . "/codes")) {
    mkdir(__DIR__ . "/codes");  
}

if (isset($_POST["file_content"])) {
    $file_name = $_GET["f"];
    $file_data = $_POST["file_content"];
    file_put_contents(__DIR__ . "/codes/" . $file_name, $file_data);
}

$is_file_open = false;
$file_content = "";
if (isset($_GET["f"])) {
    $file_name = $_GET["f"];
    if (file_exists(__DIR__ . "/codes/" . $file_name)) {
        $file_content = file_get_contents(__DIR__ . "/codes/" . $file_name);
        $is_file_open = true;
    }
}

$user_files = false;
if (($files = scandir(__DIR__ . "/codes")) !== false) {
    $user_files = $files;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File editor</title>
</head>
<body>
    <?php if ($is_file_open): ?>
        <form method="post">
            <textarea name="file_content" rows="30" cols="60"><?= $file_content ?></textarea>
            <button>Save!</button>
            <a href="delete_file.php?f=<?= $_GET["f"] ?>"><button type="button">Delete</button></a>
        </form>
    <?php endif; ?>
    <?php if ($user_files !== false): ?>
        <?php foreach ($user_files as $file_name): ?>
            <?php if ($file_name != "." && $file_name != ".."): ?>
                <a href="?f=<?= $file_name ?>"><button><?= $file_name ?></button></a>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <a href="new_file.php"><button>Create new file</button></a>
</body>
</html>