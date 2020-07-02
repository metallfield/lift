<?php


namespace App\Classes;


class Home
{
        private $countOfFloors;

        public function __construct($countOfFloors)
        {
            $this->countOfFloors = $countOfFloors;
        }

        public function getCountOfFloors()
        {
            return $this->countOfFloors;
        }

}
