<?php


namespace App\Classes;


class CsvRead
{

    public static function read($csvFile)
    {
        return CsvRead::readCSV($csvFile);
    }
    private static function readCSV($csvFile){
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle) ) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);
        return $line_of_text;
    }

}
