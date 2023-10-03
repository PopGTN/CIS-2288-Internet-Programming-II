<?php

$fp = fopen("myName.txt","ab");

//Lock file for writing
flock($fp, LOCK_EX);

// you can replace my name with your name below
fwrite($fp,"Joey Kitson\r\n");

//Unlock the file after writing is complete
flock($fp, LOCK_UN);

fclose($fp);
date_default_timezone_set("Canada/Atlantic");
echo date('h:i:s');

echo  "<p><a href='viewMyName.php'>View Name Results</a></p>";



