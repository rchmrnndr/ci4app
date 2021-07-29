<?php

namespace App\Controllers;

class Pages extends BaseController
{
    
    public function home()
    {
        $data = [
            'title' => 'Home | Donorin'
        ];

        return view('pages/home', $data);
    }
}
