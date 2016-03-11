<?php
require_once('./utils.php');

$is_lock = CheckLockFile();

if (!empty($_POST) and !$is_lock) {
    $line1 = $_POST['line-1'];
    $line2 = $_POST['line-2'];
    WriteStatusFile($line1, $line2);
    
    header('Location: index.php?msg=success');
} else {
    header('Location: index.php?msg=error');
}
?>
