<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusquedasController extends Controller
{
    public function index()
    {
        return view('busquedas.index');
    }
}
