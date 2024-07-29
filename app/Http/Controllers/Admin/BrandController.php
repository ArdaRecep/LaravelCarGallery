<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

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
            'content' => $validated['content'],
            'image' => $imagePath, // Dosyanın yolu burada kaydediliyor
        ]);

        return redirect()->route("front.brand.index")->with('success', 'Marka başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand= Brand::where("id",$id)->firstOrFail();
        $brand->delete();
        return redirect()->route("front.brand.index")->with("delete","Marka Başarıyla Silindi");
    }
}
