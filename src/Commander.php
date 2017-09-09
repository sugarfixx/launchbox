<?php

/**
 * Created by PhpStorm.
 * User: sugarfixx
 * Date: 09/09/17
 * Time: 15:06
 */
class Commander
{
    public function execute($command)
    {
        return exec($command);
    }
}