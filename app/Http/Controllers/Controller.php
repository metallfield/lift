<?php

namespace App\Http\Controllers;

use App\Classes\Home;
use App\Classes\Lift;
use App\Classes\Person;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function index(){
        $home = new Home(7);
        $lift = new Lift();
        $user1 = new Person('user1', 90);
        $user2 = new Person('user2', 30);
        $user3 = new Person('user3', 60);
        $user4 = new Person('user4', 70);

        $lift->moveTo(3,$home, [$user1, $user2]);
        $lift->moveTo(1,$home, [$user3, $user4]);
        echo  ' current Kg = '.$lift->getTotalKg();
        echo '<br>current flour '.$lift->getCurrentFlour();
 }

}


