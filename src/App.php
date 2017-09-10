<?php
/**
 * Created by PhpStorm.
 * User: sugarfixx
 * Date: 10/09/17
 * Time: 01:03
 */

namespace App;

use App\Session;
use App\Settings;
use App\Commander;

class App
{
    public $title;
    public $notification;
    public $body;
    private $session;
    private $view;
    public function __construct()
    {
        $this->settings = new Settings();
        $this->session = new Session();
        $this->view = new Views();
        $this->commander = new Commander();
    }

    public function run()
    {
        $this->listen();
        switch ($_SESSION['authenticated']) {
            case false :
                $this->title = 'Log inn';
                $this->body = $this->view->logIn();
                break;
            case true :
                $this->title = 'You are logged in';
                $this->body = $this->view->commands($this->settings->getCommands());
                break;
            default:
                $this->title = 'Hello there';
                $this->body = 'I am quite cool';
        }
    }

    private function listen()
    {
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            if ($action == 'login') {
                $status = $this->settings->validateUser($_POST['username'], $_POST['password']);
                if ($status === true ) {
                    $_SESSION['authenticated'] = true;
                    $this->notification ='';
                }
                else {
                    $this->notification = 'ERROR: Wrong credentials';
                }
            }
            elseif ($action == 'runcmd') {

                if (isset($_POST['optradio'])) {
                    $cmd = $_POST['optradio'];
                    $notification =$this->commander->execute($cmd);
                    $this->notification = $notification;
                }
            }
        }
    }

}