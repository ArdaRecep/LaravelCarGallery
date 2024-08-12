<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        $a=0;
        return view("front.car.index",compact("cars","a"));
    }

    public function brandcar($slug)
    {
        $car_brand = Brand::where('slug', $slug)->firstOrFail();
        $cars = Car::where("brand_id",$car_brand->id)->get();
        if (count($cars)!=0)
        {
            $a=1;
        }
        else{
            $a=2;
        }
        return view("front.car.index",compact("cars","a","car_brand"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $car = Car::where('slug',$slug)->firstOrFail();
        return view("front.car.show", compact("car"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
