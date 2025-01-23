<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryCreateRequest;
use App\Http\Requests\AdminCategoryUpdateRequest;
use App\Models\Brand;
use App\Models\Language;
use App\Models\News;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:category index,admin'])->only('index');
        $this->middleware(['permission:category create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:category update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:category delete,admin'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::where('status', 1)->get();
        return view('admin.brand.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::where('status', 1)->get();
        return view('admin.brand.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */

    use FileUploadTrait;

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'language' => 'required|string|size:2',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        $imagePath = $this->handleFileUpload($request, 'image');


        $brand = new Brand($request->only(['name', 'language', 'status']));
        $brand->slug = \Str::slug($request->name);
        $brand->image = $imagePath;
        $brand->save();


        toast(__('admin.Created Successfully'), 'success')->width('350');


        return redirect()->route('admin.brand.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::where('status', 1)->get();
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('languages', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $brand = Brand::findOrFail($id);


        $request->validate([
            'name' => 'required|string|max:255',
            'language' => 'required|string|size:2',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $this->handleFileUpload($request, 'image');
            $brand->image = $imagePath;
        }


        $brand->fill($request->only(['name', 'language', 'status']));
        $brand->slug = \Str::slug($request->name);
        $brand->save();


        toast(__('admin.Update Successfully'), 'success')->width('350');


        return redirect()->route('admin.brand.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        try {

            $brand = Brand::findOrFail($id);
            dd("Brand found:", $brand);


            $news = News::where('brand_id', $brand->id)->get();
            dd("Found news items:", $news);


            foreach ($news as $item) {
                dd("Deleting tags for news item with ID:", $item->id);
                $item->tags()->delete();
            }


            dd("Deleting brand with ID:", $brand->id);
            $brand->delete();


            return redirect()->route('admin.brand.index')->with('status', 'Deleted successfully!');
        } catch (\Throwable $th) {
            dd("Error during deletion:", $th->getMessage());
            return redirect()->route('admin.brand.index')->with('status', 'Something went wrong!');
        }


    }
}
