<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function homePage()
    {
        $cesaeInfo = $this->getCesaeInfo();

        return view('home.index', compact('cesaeInfo'));
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

    //Esta função vai ser retornada na blade /hello. *FSum
    public function hello()
    {
        $sum = $this->sum(1, 6); // $sum (varsum) = resultado da função sum(1, 6)
        $helloVar = $this->helloFunc();

        // $myArray = ['José', 46, 'Web Developer']; //Aqui chamamos com a posição

        
        $myArray = [
            'name' => 'José',  //Aqui chamamos com a key
            'age' => 46,
            'profession' => 'Web Developer'
        ];

        return view('hello', compact('sum', 'helloVar', 'myArray')); //O compact serve para enviar a função acessória sum.
    }

    protected function sum($num1, $num2)
    {
        return $num1 + $num2;
    }

    protected function helloFunc()
    {
        $hello = 'Olá Mundo, estamos a aprender web';
        return $hello;
    }
    //------------

    protected function getCesaeInfo()
    {
        $cesaeInfo = [
            'name' => 'Cesae',
            'adress' => 'Rua Ciríaco Cardoso 186, 4150-212, Porto',
            'email' => 'cesae@cesae.pt'
        ];
        return $cesaeInfo;
    }
}
