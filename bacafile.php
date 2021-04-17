<?php
$namaFile = "myfile.txt";
$myfile = fopen($namaFile, "a")or die("Tidak bisa buka file!");
echo fread($myfile, filesize($namaFile));
fclose($myfile);
?>