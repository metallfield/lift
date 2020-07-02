<?php


namespace App\Classes;

class Lift
{
    private $currentfloor = 1;
    private $allowKg = 200;
    private $totalKg = 0;

    public function moveTo( $floor, Home $home,  $users = [])
    {
      #  $this->totalKg += $user->kg;
        $this->usersIn($users);
        echo $this->totalKg.'kg<br>';
        if ($this->totalKg < $this->allowKg)
        {
            if ($floor > $this->currentfloor && $floor <= $home->getCountOfFloors())
            {
               if ($this->up($floor))
                   $this->usersOut($users);
            }
            elseif($floor < $this->currentfloor && $floor >= 1)
            {
                 if ( $this->down($floor))
                     $this->usersOut($users);
            }elseif ($floor == $this->currentfloor)
            {
             echo ' this is current floor ';
                $this->usersOut($users);
            }
            else{
                return false;
            }
            #$this->totalKg -= $user->kg;
         }else{
            echo 'allowed only '.$this->allowKg.' kg!';
        }
    }

    private function up($floor){
        for ($i = $this->currentfloor; $i < $floor; $i++) {
            echo $this->getCurrentfloor().'<br>';
            $this->currentfloor++;
        }
        return true;
     }

    private  function down($floor)
    {
        for ($i = $this->currentfloor; $i > $floor; $i--) {
            echo $this->getCurrentfloor().'<br>';
            $this->currentfloor--;
        }
        return true;
    }

    public function getCurrentfloor()
    {
        return $this->currentfloor;
    }

    public function getTotalKg()
    {
        return $this->totalKg;
    }

    private function usersIn($users = [])
    {
        foreach ($users as $user )
        {
            $this->totalKg += $user->kg;
        }
    }
    private  function  usersOut($users = [])
    {
        foreach ($users as $user)
        {
            $this->totalKg -= $user->kg;
        }
    }

}
