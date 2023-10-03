<?php

$fileName = "myName.txt";
//Open for reading
$fp = fopen($fileName, 'r');

if (!file_exists($fileName) || !$fp) {

    echo "File not found";


} else {

    //Lock file for reading (LOCK_SH - Shared)
    flock($fp, LOCK_SH);

    // check if the file is empty (no orders present)
    if (filesize($fileName) == 0) {


        echo "Sorry, file is empty.";

    } else {
        while (!feof($fp)) {

            echo fgets($fp) . "<br>";


        }
    }
    //Unlock the file after writing is complete
    flock($fp, LOCK_UN);

    fclose($fp);

}
