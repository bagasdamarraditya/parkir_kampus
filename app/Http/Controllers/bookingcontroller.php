<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bookingcontroller extends Controller
{
    public function index()
    {
        //panggil view dan kirim data students
        return view('halain.booking.index', [
        ]);
    }
}
