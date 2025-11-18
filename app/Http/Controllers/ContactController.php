<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $title = "Contactez-nous";
        return view('contact', compact('title'));
    }
}
