<?php

/**
 * Created by PhpStorm.
 * User: sugarfixx
 * Date: 09/09/17
 * Time: 15:59
 */

namespace App;

class Session
{
    public $status;

    public function __construct()
    {
        if (!array_key_exists('authenticated', $_SESSION)) {
            $_SESSION['authenticated'] = false;
        }
        $this->status = $_SESSION['authenticated'];
    }
}