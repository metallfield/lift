<?php


namespace App\Classes;


class CsvWrite
{

    public function writeTo($path)
    {
        $fp = fopen($path, 'w');
        for ($i = 1; $i <=20; $i++){
            $arr = [
                $this->generateName(), $this->generatePassword(), $this->generateIsDeleted(), $this->generateIsActive()
                ];
            fputcsv($fp, $arr);
        }
        fclose($fp);
    }


    public function generateName()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }
    public function generatePassword()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }

    public function generateIsDeleted()
    {
        return    rand(0,1);
    }
    public function generateIsActive()
    {
        return    rand(0,1);
    }
}
