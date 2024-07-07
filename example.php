<?php
$location = realpath(dirname(__FILE__));
require_once $location . '/function.php';
$sourceFile = $location . '/About.txt';
$destinationFile = $location . '/temporary/About.txt.gz';
$return = compressFile($sourceFile, $destinationFile);
var_dump($return);