<?php

use Illuminate\Support\Facades\Route;

function isactive($routeName)
{
    return (Route::currentRouteName() == $routeName) ? 'active' : '';
}

//tenemos que registrar en composer.json : autoload>files:[ruta]
//despues correr el comando dump-autoload
//