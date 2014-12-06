<?php

// Reads in a file and returns each line as an item in an array
function file_to_array($file_name)
{
    $f = fopen($file_name, "r");
    $array = array();
    $index = 0;
    while (!feof($f)) {     // While not the end of the file
        $line = fgets($f);
        if (trim($line) != "") {
            $array[$index] = $line;
            $index++;
        }
    }
    fclose($f);
    return $array;
}

?>

