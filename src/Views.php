<?php
/**
 * Created by PhpStorm.
 * User: sugarfixx
 * Date: 10/09/17
 * Time: 01:24
 */

namespace App;


class Views
{
    public function logIn()
    {
        $content = $this->formStart();
        $content .= $this->hiddenInput('action', 'login');
        $content .= $this->textInput('username', 'Username');
        $content .= $this->passwordInput('password', 'Password');
        $content .= $this->submit('Log In');
        $content .= $this->formEnd();

        return $content;
    }

    public function commands($commands)
    {
        $content = $this->formStart();
        $content .= $this->hiddenInput('action', 'runcmd');
        foreach ($commands as $command) {
            $content .= $this->radioInput($command->name, $command->command);
        }
        $content .= $this->submit('Run Command');
        $content .= $this->formEnd();

        return $content;
    }

    private function formStart($method = 'post')
    {
        return '<form method="'.$method.'">';
    }

    private function formEnd()
    {
        return '</form>';
    }

    private function textInput($name, $label)
    {
        $content = '<div class="form-group">';
        $content .='<label for="'. $name .'">' . $label . ':</label>';
        $content .='<input type="text" name="' . $name . '" class="form-control" id="'. $name .'">';
        $content .= '</div>';
        return $content;
    }

    private function passwordInput($name, $label)
    {
        $content = '<div class="form-group">';
        $content .='<label for="'. $name .'">' . $label . ':</label>';
        $content .='<input type="password" name="' . $name . '" class="form-control" id="'. $name .'">';
        $content .= '</div>';
        return $content;
    }

    private function hiddenInput($name, $value)
    {
        return '<input type="hidden" name="' . $name . '" value="' . $value . '">';
    }

    private function radioInput($name, $value)
    {
        $content = '<div class="radio">';
        $content .='<label><input type="radio" name="optradio" value="'.$value.'">'.$name.'</label>';
        $content .= '</div>';
        return $content;
    }

    private function submit($name)
    {
        return '<button type="submit" class="btn btn-default">'.$name.'</button>';
    }
}