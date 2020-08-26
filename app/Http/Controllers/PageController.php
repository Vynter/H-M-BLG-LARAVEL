<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function contact()
    {
        return view('welcome');
    }
    public function users()
    {
        return view('welcome');
    }
    public function user($id)
    {
        echo 'user :' . $id;
    }
    public function salutation($salutation, $nom)
    {
        echo $salutation . ' ' . $nom;
    }
}