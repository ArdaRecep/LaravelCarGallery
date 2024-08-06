<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
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
        $brand=Brand::all();
        return view("admin.brand.create",compact("brand"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
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

        // Veritabanına kaydetme işlemi
        $imagePath = str_replace("storage/","",$imagePath);
        $brand = Brand::create([
            'name' => $validated['name'],
            'image' => $imagePath, // Dosyanın yolu burada kaydediliyor
        ]);

        return redirect()->route("front.brand.index")->with('success', 'Marka başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand, $id)
    {
        $brand = Brand::where("id", $id)->firstOrFail();
        return view("admin.brand.edit", compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand, $id)
    {
        $brand = Brand::where("id", $id)->firstOrFail();
        $validated_data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $imagePath = 'images/' . $imageName;
            $oldImagePath = $brand->image;
            $oldImagePath = str_replace('storage/', '', $oldImagePath);
            if (Storage::exists('public/'.$oldImagePath))
            {
                Storage::disk('public')->delete($oldImagePath);
            }
            $validated_data["image"] = $imagePath;
        }
        else
        {
            $validated_data["image"] = $brand->image;
        }
        $brand->update($validated_data);

        // Redirect to the bra$brand show page with a success message
        return redirect()->route('front.brand.show', $brand->id)
                         ->with('success', 'Araç Başarıyla Güncellendi');
    }

    public function destroy(string $id)
    {
        $brand= Brand::where("id",$id)->firstOrFail();

        $photo = $brand->image;
        $photo = str_replace("storage/", "", $photo);
        if (Storage::disk("public")->exists($photo)) {
            Storage::disk("public")->delete($photo);
        }

        $brand->delete();
        return redirect()->route("front.brand.index")->with("delete","Marka Başarıyla Silindi");
    }
}
