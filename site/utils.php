<?php
function CheckLockFile() {
    return file_exists('./lock.txt');
}

function GetStatusFile() {
    if (is_readable('./status.txt')) {
        $file = file_get_contents('./status.txt', true);
        return $file;
    }
}

function WriteStatusFile($line1, $line2) {
    touch('./lock.txt');
    file_put_contents('./status.txt', $line1 . "\n" . $line2);
    $log = $line1." --- ".$line2." |  Date: ".$date."\n";
    error_log($log, 3, './log.txt');
}
?>