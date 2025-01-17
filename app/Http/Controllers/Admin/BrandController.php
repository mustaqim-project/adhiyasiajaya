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
        // Validate the request data first
        $request->validate([
            'name' => 'required|string|max:255',
            'language' => 'required|string|size:2', // Assuming language is a 2-character code like 'en'
            'status' => 'required|boolean', // Assuming status is a boolean (0 or 1)
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image type and size
        ]);

        // Handle the image upload and get the file path
        $imagePath = $this->handleFileUpload($request, 'image');

        // Create a new brand record
        $brand = new Brand($request->only(['name', 'language', 'status']));
        $brand->slug = \Str::slug($request->name); // Generate the slug from the brand name
        $brand->image = $imagePath; // Store the image path
        $brand->save();

        // Show a success message
        toast(__('admin.Created Successfully'), 'success')->width('350');

        // Redirect to the brand index page
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
    public function update(Request $request, string $id)
    {
        // Find the brand or fail if not found
        $brand = Brand::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'language' => 'required|string|size:2', // Assuming language is a 2-character code like 'en'
            'status' => 'required|boolean', // Assuming status is a boolean (0 or 1)
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Image is now optional on update
        ]);

        // If an image is uploaded, handle the file upload and get the file path
        if ($request->hasFile('image')) {
            $imagePath = $this->handleFileUpload($request, 'image');
            $brand->image = $imagePath; // Update the image path
        }

        // Update the brand's other fields
        $brand->fill($request->only(['name', 'language', 'status']));
        $brand->slug = \Str::slug($request->name); // Generate the slug from the name
        $brand->save();

        // Show a success message
        toast(__('admin.Update Successfully'), 'success')->width('350');

        // Redirect to the brand index page
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
            foreach ($news as $item) {
                $item->tags()->delete();
            }
            $brand->delete();
            return response(['status' => 'success', 'message' => __('admin.Deleted Successfully!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('admin.Someting went wrong!')]);
        }
    }
}
