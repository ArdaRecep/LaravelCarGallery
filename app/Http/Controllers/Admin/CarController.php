<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_brands = Brand::all();
        return view("admin.car.create",compact("all_brands"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $validated = $request->validated();

        // Dosya yükleme işlemi
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $imagePath = 'storage/images/'.$imageName; // Dosyanın yolunu oluşturuyoruz
        } else {
            // Dosya yüklenmediyse veya hata oluştuysa işlemleri buraya ekleyebilirsiniz
            return redirect()->back()->withInput()->withErrors(['image' => 'Dosya yüklenirken bir hata oluştu.']);
        }

        //'image' => $imagePath, // Dosyanın yolu burada kaydediliyor
        //'slug' => Str::slug($validated['name']),
        // Veritabanına kaydetme işlemi
        $validated["image"]= $imagePath;
        $validated["slug"]= Str::slug($validated['name']);
        $car = Car::create($validated);

        return redirect()->route('front.index')->with('success', 'Araba başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {

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
