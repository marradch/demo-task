<?php

namespace Controllers;

class IndexController extends AbstractController
{
    public static $name = 'index';

    public function index()
    {
        $this->render(
            'wellcome',
            [
                'menuItem' => 'home'
            ]
        );
    }
}