<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllers extends Controller
{
    public function showdata()
    {
        $data = [
            [
                "Nama" => "Saliza Aleeya",
                "NIM" => "235150600111022",
                "Quotes" => "Hai"
            ]
        ];

        return view("Pages/welcome");
    }
}