<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        $var1 = 1;
        $var2 = 2;
        $var3 = $var1 + $var2;
        return $var3;
        die;
        $data = [
            ['judul' => 'ini adalah judul'],
            ['judul' => 'ini adalah judul'],
            ['judul' => 'ini adalah judul'],
            ['judul' => 'ini adalah judul'],
            ['judul' => 'ini adalah judul']
        ];
        return view('belajar/list', compact('data'));
    }
}
