<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: sugarfixx
 * Date: 09/09/17
 * Time: 15:26
 */

include __DIR__ . '/src/Settings.php';
include __DIR__ . '/src/Commander.php';

$settings = new Settings();
//print_r( $settings->getUser());
// print_r( $settings->getCommands());
if (isset($_POST['command'])) {
    $command = $_POST['command'];
    $commander = new Commander();
    print_r($commander->execute($command));
}



