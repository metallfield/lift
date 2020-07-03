<?php


namespace App\Classes;


class Person {
    const ACTIVE_STATUS = 1;
    const DELETED = 1;

    public function getResult($users)
    {
        echo '<h2>result:</h2>';
        foreach ($users as $user) {
            $this->analize($user);
        }
    }

    private function analize($user)
    {
        if ($user[3] == self::ACTIVE_STATUS && $user[2] != self::DELETED) {
            echo '<pre>';
            print_r($user[0]);
        }
    }

    public function getActiveUsers($users)
    {
        echo '<h2>active users: </h2>';
        foreach ($users as $user) {
            if ($user[3] == 1) {
                echo ' <pre>';
                print_r($user[0]) ;
            }
        }
    }

    public function getDeletedUsers($users)
    {
        echo '<br><h2>deleted users</h2>';
        foreach ($users as $user) {
            if ($user[2] == 1) {
                echo '<pre>';
                print_r($user[0]);
            }
        }
    }
}
