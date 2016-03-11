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

    $data = array(
        date => date("N"),
        line1 => $line1,
        line2 => $line2
    )

    $log_file = file_get_contents('log.json');
    $tempLog = json_decode($log_file);
    array_push($tempLog, $data);
    $jsonData = json_encode($tempLog);
    file_put_contents('log.json', $jsonData);
}
?>