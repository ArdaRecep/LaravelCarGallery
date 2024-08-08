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
        $imagePaths = [];
        $thumbnailPath = null;
        $urlPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->storeAs('public/images', $thumbnailName);
            $thumbnailPath = 'storage/images/' . $thumbnailName; // Thumbnail'ın yolunu oluşturuyoruz
        }
        if ($request->hasFile('url')) {
            $url = $request->file('url');
            $urlName = time() . '_' . $url->getClientOriginalName();
            $url->storeAs('public/videos', $urlName);
            $urlPath = 'storage/videos/' . $urlName;
        }
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);
                $imagePaths[] = 'images/' . $imageName; // Dosyanın yolunu oluşturuyoruz
            }
        }


        // Resim yollarını JSON formatında saklama
        $validated['images'] = json_encode($imagePaths);
        $validated['thumbnail'] = $thumbnailPath;
        $validated['url'] = $urlPath;

        // Slug oluşturma
        $validated['slug'] = Str::slug($validated['name']);

        // Veritabanına kaydetme işlemi
        Car::create($validated);

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

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagePaths = [];

            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }

            // Eski resimleri silme
            $oldImagePaths = json_decode($car->images, true);
            if (is_array($oldImagePaths)) {
                foreach ($oldImagePaths as $oldImagePath) {
                    $oldImagePath = str_replace('storage/', '', $oldImagePath);
                    if (Storage::exists('public/' . $oldImagePath)) {
                        Storage::disk('public')->delete($oldImagePath);
                    }
                }
            }

            $validated_data["images"] = json_encode($imagePaths);
        } else {
            $validated_data["images"] = $car->images;
        }

        // Yeni bir thumbnail dosyası yüklenmişse
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->storeAs('public/images', $thumbnailName);
            $thumbnailPath = 'storage/images/' . $thumbnailName;

            // Eski thumbnail'ı sil
            $oldThumbnailPath = $car->thumbnail;
            if ($oldThumbnailPath) {
                $oldThumbnailPath = str_replace('storage/', '', $oldThumbnailPath);
                if (Storage::exists('public/' . $oldThumbnailPath)) {
                    Storage::disk('public')->delete($oldThumbnailPath);
                }
            }
            $validated_data["thumbnail"] = $thumbnailPath;
        } else {

            $validated_data["thumbnail"] = $car->thumbnail;
        }

        // Yeni bir vieo dosyası yüklenmişse
        if ($request->hasFile('url')) {
            $url = $request->file('url');
            $urlName = time() . '_' . $url->getClientOriginalName();
            $url->storeAs('public/videos', $urlName);
            $urlPath = 'storage/videos/' . $urlName;

            // Eski video'yu sil
            $oldurlPath = $car->url;
            if ($oldurlPath) {
                $oldurlPath = str_replace('storage/', '', $oldurlPath);
                if (Storage::exists('public/' . $oldurlPath)) {
                    Storage::disk('public')->delete($oldurlPath);
                }
            }
            $validated_data["url"] = $urlPath;
        } else {

            $validated_data["url"] = $car->url;
        }
        $car->update($validated_data);
        return redirect()->route('front.car.show', $car->slug)->with('success', 'Araç Başarıyla Güncellendi');
    }
    public function destroy($slug)
    {
        $car = Car::where("slug", $slug)->firstOrFail();

        $photoPath = json_decode($car->images, true);
        foreach ($photoPath as $image) {
            $image = str_replace("storage/", "", $image);
            if (Storage::disk("public")->exists($image)) {
                Storage::disk("public")->delete($image);
            }
        }

        $photo = $car->thumbnail;
        $photo = str_replace("storage/", "", $photo);
        if (Storage::disk("public")->exists($photo)) {
            Storage::disk("public")->delete($photo);
        }

        $video = $car->url;
        $video = str_replace("storage/", "", $video);
        if (Storage::disk("public")->exists($video)) {
            Storage::disk("public")->delete($video);
        }

        $car->delete();
        return redirect()->route("front.index")->with("delete", "Araç Başarıyla Silindi");
    }
}

