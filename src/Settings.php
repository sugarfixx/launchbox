<?php

/**
 * Created by PhpStorm.
 * User: sugarfixx
 * Date: 09/09/17
 * Time: 15:15
 */
class Settings
{

    public $user;

    public $commands;

    public function __construct()
    {
        $str = file_get_contents(__DIR__ . '../../settings.json');
        $json = json_decode($str);
        $this->user = $json->settings->user;
        $this->commands = $json->settings->commands;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getCommands()
    {
        return $this->commands;
    }

    public function validateUser($user, $password)
    {
        if ($user == $this->user->username && $password == $this->user->password) {
            return true;
        }
        return false;
    }
}