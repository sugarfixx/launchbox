<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
/**
 * Created by PhpStorm.
 * User: sugarfixx
 * Date: 09/09/17
 * Time: 15:26
 */

require_once  __DIR__ . '/includes.php';
$app = new \App\App();
$app->run();
$title = $app->title;
$notify = $app->notification;
$body = $app->body;
include "src/template.php";


