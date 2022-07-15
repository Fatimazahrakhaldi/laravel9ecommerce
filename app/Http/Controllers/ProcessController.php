<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $client = session()->get('client');
        $client->redirect_post(); // CREATE INPUTS HIDDEN, GENERATE A VALID HASH AND MAKE REDIRECT POST TO CMI
        return route('process');
    }
}
