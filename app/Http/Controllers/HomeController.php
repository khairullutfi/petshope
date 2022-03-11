<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GromingPackage;
use App\DoctorPackage;


class HomeController extends Controller
{
    public function index(Request $request){
        $items = GromingPackage::with(['galleries'])->get();
         $genres = DoctorPackage::with(['gallery'])->get();
        
        return view('pages.home',[
            'items' => $items,
            'genres' => $genres
        ]);
    }

}
