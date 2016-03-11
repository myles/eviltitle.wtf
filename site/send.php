<?php
require_once('./utils.php');

$is_lock = CheckLockFile();

if (!empty($_POST) and !$is_lock) {
    $line1 = $_POST['input-line-1'];
    $line2 = $_POST['input-line-2'];
    WriteStatusFile($line1, $line2);
} else {
    echo "Can't do anything yet.\n";
}
?>
