<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Car;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function carlist()
    {
        $cars = Car::all();
        return view('auth.car.list',compact("cars"));
    }
    public function brandlist()
    {
        $brands=Brand::all();
        return view('auth.brand.list',compact('brands'));
    }
}
