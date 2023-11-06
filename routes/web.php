<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UseController;


Route::get('/', function () {
    return view('welcome');
});

// USUARIO
Route::get('/user/{name}/{lastName?}', function ($name, $lastName = "doe") {
    return "<h1>" . "Bienvenido(a): " . $name . " " .$lastName . "</h1>";
})-> whereAlpha(['name', 'lastName']);

// CALCULADORA
Route::get('/{calculadora}/{num1}/{num2}', function ($calculadora, $num1, $num2) {

    if($calculadora == 'suma'){
        return "<h1>". "Resultado: ". $num1 + $num2 ."</h1>";
    }else if($calculadora == 'resta'){
        return "<h1>". "Resultado: ". $num1 + $num2 ."</h1>";
    }else if($calculadora == 'multiplicacion'){
        return "<h1>". "Resultado: ". $num1 + $num2 ."</h1>";
    }else if($calculadora == 'division'){
        return "<h1>". "Resultado: ". $num1 + $num2 ."</h1>";
    }else{
        return "<h1>". "error" . "</h1>";
    }
    
})-> where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);

// PRUEBA CONTROLADOR
Route::get('/vista/{name}', function ($name) {
    return view('prueba ', ['name' => $name]);
})-> whereAlpha('name');

Route::get('/prueba/{name}', [UseController::class, 'index']);