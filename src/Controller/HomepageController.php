<?php


namespace App\Controller;


class HomepageController
{
    public function  Action()
    {
        require_once 'config/twig.php';
        echo $twig->render('form/userForm.html.twig');
    }
}