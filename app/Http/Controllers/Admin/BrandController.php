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

     public function store(AdminCategoryCreateRequest $request)
     {
         $imagePath = $this->handleFileUpload($request, 'image');

         $brand = new Brand($request->only(['name', 'language', 'show_at_nav', 'status']));
         $brand->slug = \Str::slug($request->name);
         $brand->image = $imagePath; // Simpan path gambar
         $brand->save();

         toast(__('admin.Created Successfully'), 'success')->width('350');

         return redirect()->route('admin.brand.index');
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
    {
            $languages = Language::where('status', 1)->get();
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('languages', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminCategoryUpdateRequest $request, string $id)
    {
        $brand = Brand::findOrFail($id);



        $imagePath = $this->handleFileUpload($request, 'image');
        $brand->update([
            'image' => $imagePath ?? $brand->image,
        ]);

        $brand->fill($request->only(['name', 'language', 'show_at_nav', 'status']));
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
            $news = News::where('brand_id', $brand->id)->get();
            foreach($news as $item){
                $item->tags()->delete();
            }
            $brand->delete();
            return response(['status' => 'success', 'message' => __('admin.Deleted Successfully!')]);
       } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('admin.Someting went wrong!')]);
       }
    }
}
