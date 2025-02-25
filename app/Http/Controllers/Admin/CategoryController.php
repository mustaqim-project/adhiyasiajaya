<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryCreateRequest;
use App\Http\Requests\AdminCategoryUpdateRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class CategoryController extends Controller
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
        return view('admin.category.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::where('status', 1)->get();
        return view('admin.category.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */

    use FileUploadTrait;

    public function store(AdminCategoryCreateRequest $request)
    {
        $imagePath = $this->handleFileUpload($request, 'image');

        $category = new Category($request->only(['name', 'language', 'status']));
        $category->slug = \Str::slug($request->name);
        $category->image = $imagePath;
        $category->show_at_nav = $request->input('show_at_nav', 0); // Default 0 jika tidak ada input
        $category->save();

        toast(__('admin.Created Successfully'), 'success')->width('350');

        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('languages', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminCategoryUpdateRequest $request, string $id)
    {
        $category = Category::findOrFail($id);

        $imagePath = $this->handleFileUpload($request, 'image');
        $category->update([
            'image' => $imagePath ?? $category->image,
        ]);

        $category->fill($request->only(['name', 'language', 'status']));
        $category->show_at_nav = $request->input('show_at_nav', 0); // Default 0 jika tidak ada input
        $category->slug = \Str::slug($request->name);
        $category->save();

        toast(__('admin.Update Successfully'), 'success')->width('350');

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $category = Category::findOrFail($id);
            $news = News::where('category_id', $category->id)->get();
            foreach ($news as $item) {
                $item->tags()->delete();
            }
            $category->delete();
            return redirect()->route('admin.category.index')->with('status', 'Deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.category.index')->with('status', 'Something went wrong!');

        }
    }
}
