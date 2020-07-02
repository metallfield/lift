<?php

namespace App\Http\Controllers;

use App\Classes\Csv;
use App\Classes\CsvRead;
use App\Classes\CsvWrite;
use App\Classes\Home;
use App\Classes\Lift;
use App\Classes\Person;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function index(){
   /*     $home = new Home(7);
        $lift = new Lift();
        $user1 = new Person('user1', 90);
        $user2 = new Person('user2', 30);
        $user3 = new Person('user3', 60);
        $user4 = new Person('user4', 70);

        $lift->moveTo(3,$home, [$user1, $user2]);
        $lift->moveTo(7,$home, [$user3, $user4]);
        $lift->moveTo(2,$home, [$user2, $user4]);
        echo  ' current Kg = '.$lift->getTotalKg();
        echo '<br>current floor '.$lift->getCurrentFloor(); */



        $csvWrite = new CsvWrite();
        $csvWrite->writeTo('/home/developer/Desktop/file.csv');
        $csvRead = new CsvRead();
        $usersList = $csvRead->read('/home/developer/Desktop/file.csv');
        $users = new Person();
        $users->getActiveUsers($usersList);
        $users->getDeletedUsers($usersList);
        $users->getResult($usersList);

 }



}


