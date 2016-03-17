<?php
require_once('./config.php');

function CheckLockFile() {
    return file_exists('./lock.txt');
}

function GetStatusFile() {
    if (is_readable('./status.txt')) {
        $file = file_get_contents('./status.txt', true);
        return $file;
    }
}

function StatusFileCreatedPlus15Minutes() {
    $time = new DateTime;
    $time->setTimestamp(filemtime('./status.txt'));
    $time->add(new DateInterval('PT15M'));
    return $time->format('g:s A');
}

function WriteStatusFile($line1, $line2) {
    touch('./lock.txt');
    file_put_contents('./status.txt', $line1 . "\n" . $line2);

    if (file_exists('./log.json') == FALSE) {
        file_put_contents('./log.json', '[]');
    }

    $data = array(
        date => date("c"),
        line1 => $line1,
        line2 => $line2
    );

    $log_file = file_get_contents('log.json');
    $tempLog = json_decode($log_file);
    array_push($tempLog, $data);
    $jsonData = json_encode($tempLog);
    file_put_contents('log.json', $jsonData);
}
?>