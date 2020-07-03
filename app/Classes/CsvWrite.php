<?php


namespace App\Classes;


class CsvWrite
{

    public static function writeTo($path)
    {
        if (filesize($path) == 0)
        {
            $fp = fopen($path, 'w');
            for ($i = 1; $i <=20; $i++){
                $arr = [
                    CsvWrite::generateName(),
                    CsvWrite::generatePassword(),
                    CsvWrite::generateIsDeleted(),
                    CsvWrite::generateIsActive()
                ];
                fputcsv($fp, $arr);
            }
            fclose($fp);
        }
    }


    private static function generateName()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }
    private static function generatePassword()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }

    private static function generateIsDeleted()
    {
        return    rand(0,1);
    }
    private static function generateIsActive()
    {
        return    rand(0,1);
    }
}
