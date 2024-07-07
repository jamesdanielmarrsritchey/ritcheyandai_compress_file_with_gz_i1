<?php
function compressFile($sourceFile, $destinationFile) {
    // Check if the source file exists
    if (!file_exists($sourceFile)) {
        return false;
    }

    // Open the source file for reading
    $fpIn = fopen($sourceFile, 'rb');
    if ($fpIn === false) {
        return false;
    }

    // Open the destination file for writing. 'wb9' is the compression settings.
    $fpOut = gzopen($destinationFile, 'wb9');
    if ($fpOut === false) {
        fclose($fpIn);
        return false;
    }

    // Read from the source file and write the compressed data to the destination file
    while (!feof($fpIn)) {
        gzwrite($fpOut, fread($fpIn, 1024 * 512)); // Read in chunks of 512KB
    }

    // Close the files
    fclose($fpIn);
    gzclose($fpOut);

    return true;
}
?>