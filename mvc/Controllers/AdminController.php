<?php

namespace App\Controllers;

class AdminController
{

    public function index ()
    {
        \App\Util\View::load('admin/index');
    }

}