<?php

namespace App\Http\Controllers;


use App\Models\Strip;
use App\Models\Webcomic;
use Illuminate\Http\Request;

class StripController extends Controller
{

    public function index($date = null)
    {
        return Strip::whereDate($date)->get();
    }
}
