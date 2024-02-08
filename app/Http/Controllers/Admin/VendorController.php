<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Http\Trait\UploadImage;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::query()->with('categories')->latest()->paginate(5);
        return view('admin.pages.vendors._index',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.vendors._add' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request)
    {
        $vendor = Vendor::query()->create($request->except('categories'));
        $vendor->categories()->attach($request->input('categories'));
        self::upload($request , $vendor , 'image' , 'vendor_image');
        return redirect()->route('admin.vendors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $categories = Category::all();
        $vendor = Vendor::query()->where('id',$id)->first();
        return view('admin.pages.vendors._edit',compact('vendor','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lng' => 'required|numeric',
            'lat' => 'required|numeric',
            'categories' => 'required|array|min:1', // Ensure at least one category is selected
        ]);
        $vendor->update($request->except('categories'));
        $vendor->categories()->sync($request->input('categories'));
        if ($request->hasFile('image')) {
            self::upload($request , $vendor , 'image' , 'vendor_image');
        }
        return redirect()->route('admin.vendors.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->categories()->detach();
        $vendor->delete();
        return redirect()->route('admin.vendors.index');
    }
}
