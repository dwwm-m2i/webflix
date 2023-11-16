<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'title' => 'Webflix',
            'team' => [
                [
                    'name' => 'Fiorella',
                    'job' => 'CEO',
                    'image' => 'https://i.pravatar.cc/100?u=Fiorella',
                ],
                [
                    'name' => 'Toto',
                    'job' => 'CTO',
                    'image' => 'https://i.pravatar.cc/100?u=Toto',
                ],
            ],
        ]);
    }
}
