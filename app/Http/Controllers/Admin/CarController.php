<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        if (Brand::count() > 0) {
            return view("admin.car.create", compact("all_brands"));
        } else {
            return redirect()->route('admin.brand.create')->with('error', 'Araba eklemek için önce marka ekleyin!');
        }
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
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $imagePath = 'storage/images/' . $imageName; // Dosyanın yolunu oluşturuyoruz
        } else {
            // Dosya yüklenmediyse veya hata oluştuysa işlemleri buraya ekleyebilirsiniz
            return redirect()->back()->withInput()->withErrors(['image' => 'Dosya yüklenirken bir hata oluştu.']);
        }

        //'image' => $imagePath, // Dosyanın yolu burada kaydediliyor
        //'slug' => Str::slug($validated['name']),
        // Veritabanına kaydetme işlemi
        $imagePath = str_replace("storage/", "", $imagePath);
        $validated["image"] = $imagePath;
        $validated["slug"] = Str::slug($validated['name']);
        $car = Car::create($validated);

        return redirect()->route('front.index')->with('success', 'Araba başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $car = Car::where("slug", $slug)->firstOrFail();
        $all_brands = Brand::all();
        return view("admin.car.edit", compact("car", "all_brands"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car, $slug)
    {
        $car = Car::where("slug", $slug)->firstOrFail();
        $validated_data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $imagePath = 'images/' . $imageName;
            $oldImagePath = $car->image;
            $oldImagePath = str_replace('storage/', '', $oldImagePath);
            if (Storage::exists('public/'.$oldImagePath))
            {
                Storage::disk('public')->delete($oldImagePath);
            }
            $validated_data["image"] = $imagePath;

        }
        else
        {
            $validated_data["image"] = $car->image;
        }
        $car->update($validated_data);

        // Redirect to the car show page with a success message
        return redirect()->route('front.car.show', $car->slug)
                         ->with('success', 'Araç Başarıyla Güncellendi');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $car = Car::where("slug", $slug)->firstOrFail();
        $photoPath = $car->image;
        $photoPath = str_replace("storage/", "", $photoPath);

        if (Storage::disk("public")->exists($photoPath)) {
            Storage::disk("public")->delete($photoPath);
        }
        $car->delete();
        return redirect()->route("front.index")->with("delete", "Araç Başarıyla Silindi");
    }
}

