<?php


namespace App\Classes;
use App\Classes\Home;
use App\Classes\Person;


class Lift
{
    private $currentFlour = 1;
    private $allowKg = 200;
    private $totalKg = 0;

    public function moveTo( $flour, Home $home,  $users = [])
    {
      #  $this->totalKg += $user->kg;
        self::usersIn($users);
        echo $this->totalKg.'kg<br>';
        if ($this->totalKg < $this->allowKg)
        {
            if ($flour > $this->currentFlour && $flour <= $home->countOfFlours)
            {
                self::up($flour);
                self::usersOut($users);
            }
            elseif($flour < $this->currentFlour && $flour >= 1)
            {
                 self::down($flour);
                 self::usersOut($users);
            }elseif ($flour == $this->currentFlour)
            {
             echo ' this is current flour ';
                self::usersOut($users);
            }
            else{
                return false;
            }
            #$this->totalKg -= $user->kg;
         }else{
            echo 'allowed only '.$this->allowKg.' kg!';
        }
    }

    public function up($flour){
        for ($i = $this->currentFlour; $i < $flour; $i++) {
            echo $this->getCurrentFlour().'<br>';
            $this->currentFlour++;
        }
     }

    public  function down($flour)
    {
        for ($i = $this->currentFlour; $i > $flour; $i--) {
            echo $this->getCurrentFlour().'<br>';
            $this->currentFlour--;
        }
    }

    public function getCurrentFlour()
    {
        return $this->currentFlour;
    }

    public function getTotalKg()
    {
        return $this->totalKg;
    }

    public function usersIn($users = [])
    {
        foreach ($users as $user )
        {
            $this->totalKg += $user->kg;
        }
    }
    public  function  usersOut($users = [])
    {
        foreach ($users as $user)
        {
            $this->totalKg -= $user->kg;
        }
    }

}
