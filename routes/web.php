<?php

use Illuminate\Support\Facades\Route;




// routes/api.php


use App\Http\Controllers\Api\IncidentController;






Route::get('/', function () {
    return view('welcome');
});
