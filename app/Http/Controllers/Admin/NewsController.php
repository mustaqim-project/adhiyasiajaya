<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsCreateRequest;
use App\Http\Requests\AdminNewsUpdateRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use App\Models\Tag;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware(['permission:news index,admin'])->only(['index', 'copyNews']);
        $this->middleware(['permission:news create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:news update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:news delete,admin'])->only(['destroy']);
        $this->middleware(['permission:news all-access,admin'])->only(['toggleNewsStatus']);
    }

    /**
     * Display a listing of the resource.
     */
     
     
    public function index()
    {
        $languages = Language::where('status', 1)->get();
        return view('admin.news.index', compact('languages'));
    }

    public function pendingNews(): View
    {
        $languages = Language::where('status', 1)->get();
        return view('admin.pending-news.index', compact('languages'));
    }

    /**
     * Fetch category depending on language
     */
    public function fetchCategory(Request $request)
    {
        $categories = Category::where('language', $request->lang)->get();
        return $categories;
    }

    public function approveNews(Request $request): Response
    {
        $news = News::findOrFail($request->id);
        $news->is_approved = $request->is_approve;
        $news->save();

        return response(['status' => 'success', 'message' => __('admin.Updated Successfully')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::where('status', 1)->get();
        return view('admin.news.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminNewsCreateRequest $request)
    {
        $imagePath = $this->handleFileUpload($request, 'image');

        $news = News::create([
            'language' => $request->language,
            'category_id' => $request->category,
            'auther_id' => Auth::guard('admin')->user()->id,
            'image' => $imagePath,
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'is_breaking_news' => $request->is_breaking_news ? 1 : 0,
            'show_at_slider' => $request->show_at_slider ? 1 : 0,
            'show_at_popular' => $request->show_at_popular ? 1 : 0,
            'status' => $request->status ? 1 : 0,
            'is_approved' => getRole() == 'Super Admin' || checkPermission('news all-access') ? 1 : 0,
        ]);

        $tagIds = $this->createTags($request->tags, $news->language);
        $news->tags()->attach($tagIds);

        toast(__('admin.Created Successfully!'), 'success')->width('330');

        return redirect()->route('admin.news.index');
    }

    /**
     * Change toggle status of news
     */
    public function toggleNewsStatus(Request $request)
    {
        try {
            $news = News::findOrFail($request->id);
            $news->{$request->name} = $request->status;
            $news->save();

            return response(['status' => 'success', 'message' => __('admin.Updated successfully!')]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::where('status', 1)->get();
        $news = News::findOrFail($id);

        if (!$this->canEditNews($news)) {
            return abort(404);
        }

        $categories = Category::where('language', $news->language)->get();

        return view('admin.news.edit', compact('languages', 'news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminNewsUpdateRequest $request, string $id)
    {
        $news = News::findOrFail($id);

        if (!$this->canEditNews($news)) {
            return abort(404);
        }

        $imagePath = $this->handleFileUpload($request, 'image');
        $news->update([
            'language' => $request->language,
            'category_id' => $request->category,
            'image' => $imagePath ?? $news->image,
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'is_breaking_news' => $request->is_breaking_news ? 1 : 0,
            'show_at_slider' => $request->show_at_slider ? 1 : 0,
            'show_at_popular' => $request->show_at_popular ? 1 : 0,
            'status' => $request->status ? 1 : 0,
        ]);

        $this->updateTags($news, $request->tags);

        toast(__('admin.Update Successfully!'), 'success')->width('330');

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $this->deleteFile($news->image);
        $news->tags()->delete();
        $news->delete();

        return response(['status' => 'success', 'message' => __('admin.Deleted Successfully!')]);
    }
    
    
    public function show(string $id)
        {
            $news = News::findOrFail($id);
                $this->deleteFile($news->image);
                $news->tags()->delete();
                $news->delete();
        
            
            return redirect()->route('admin.news.index')->with('status', 'Deleted successfully!');
        }


    /**
     * Copy news
     */
    public function copyNews(string $id)
    {
        $news = News::findOrFail($id);
        $news->replicate()->save();

        toast(__('admin.Copied Successfully!'), 'success');

        return redirect()->back();
    }

    /**
     * Helper function to create tags from a comma-separated string.
     */
    private function createTags(string $tags, string $language): array
    {
        $tagIds = [];
        foreach (explode(',', $tags) as $tag) {
            $tagIds[] = Tag::create(['name' => trim($tag), 'language' => $language])->id;
        }
        return $tagIds;
    }

    /**
     * Helper function to update tags.
     */
    private function updateTags(News $news, string $tags): void
    {
        $news->tags()->delete();
        $news->tags()->detach();
        $news->tags()->attach($this->createTags($tags, $news->language));
    }

    /**
     * Helper function to check if user can edit news.
     */
    private function canEditNews(News $news): bool
    {
        return $news->auther_id === auth()->guard('admin')->user()->id || getRole() === 'Super Admin';
    }
}
