<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function homePage()
    {
        return view('home.index');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function errors()
    {
        return view(('errors.fallback'));
    }
/*
    public function hello()
    {
        return view('hello');
    }*/

    public function hello(){
        $sum = $this->sum(1,6);
        return view('hello');
    }

    protected function sum($num1, $num2) {
        return $num1 + $num2;
    }
}
