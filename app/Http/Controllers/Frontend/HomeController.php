<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Brand;
use App\Models\kebijakan;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\HomeSectionSetting;
use App\Models\News;
use App\Models\OurCustomer;
use App\Models\RecivedMail;
use App\Models\SocialCount;
use App\Models\SocialLink;
use App\Models\Subscriber;
use App\Models\SettingLandingPage;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::where(['is_breaking_news' => 1,])
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(10)->get();
        $heroSlider = News::with(['category', 'auther'])
            ->where('show_at_slider', 1)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')->take(7)
            ->get();

        $recentNews = News::with(['category', 'auther'])->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')->take(6)->get();
        $popularNews = News::with(['category'])->where('show_at_popular', 1)
            ->activeEntries()->withLocalize()
            ->orderBy('updated_at', 'DESC')->take(4)->get();

        $HomeSectionSetting = HomeSectionSetting::where('language', getLangauge())->first();

        if ($HomeSectionSetting) {
            $categorySectionOne = News::where('category_id', $HomeSectionSetting->category_section_one)
                ->activeEntries()->withLocalize()
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();

            $categorySectionTwo = News::where('category_id', $HomeSectionSetting->category_section_two)
                ->activeEntries()->withLocalize()
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();

            $categorySectionThree = News::where('category_id', $HomeSectionSetting->category_section_three)
                ->activeEntries()->withLocalize()
                ->orderBy('id', 'DESC')
                ->take(6)
                ->get();

            $categorySectionFour = News::where('category_id', $HomeSectionSetting->category_section_four)
                ->activeEntries()->withLocalize()
                ->orderBy('id', 'DESC')
                ->take(4)
                ->get();
        } else {
            $categorySectionOne = collect();
            $categorySectionTwo = collect();
            $categorySectionThree = collect();
            $categorySectionFour = collect();
        }


        $mostViewedPosts = News::activeEntries()->withLocalize()
            ->orderBy('views', 'DESC')
            ->take(3)
            ->get();

        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLangauge()])->get();
        $about = About::where('language', getLangauge())->first();

        $mostCommonTags = $this->mostCommonTags();
        $settingpage = SettingLandingPage::first();
        $categories = Category::with('news')->where('status', 1)->take(6)->get();



        $brands = Brand::where('status', 1)->get();
        $ad = Ad::first();
        $contact = Contact::where('language', getLangauge())->first();
        $customers = OurCustomer::all();
        return view('frontend.home', compact(
            'breakingNews',
            'heroSlider',
            'recentNews',
            'popularNews',
            'categorySectionOne',
            'categorySectionTwo',
            'categorySectionThree',
            'categorySectionFour',
            'mostViewedPosts',
            'socialCounts',
            'mostCommonTags',
            'ad',
            'contact',
            'about',
            'brands',
            'categories',
            'customers',
            'settingpage'

        ));
    }

    public function ShowNews(string $slug)
    {
        $news = News::with(['auther', 'tags', 'comments'])->where('slug', $slug)
            ->activeEntries()->withLocalize()
            ->first();

        $this->countView($news);

        $recentNews = News::with(['category', 'auther'])->where('slug', '!=', $news->slug)
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();

        $mostCommonTags = $this->mostCommonTags();

        $nextPost = News::where('id', '>', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'asc')->first();

        $previousPost = News::where('id', '<', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'desc')->first();

        $relatedPosts = News::where('slug', '!=', $news->slug)
            ->where('category_id', $news->category_id)
            ->activeEntries()
            ->withLocalize()
            ->take(5)
            ->get();

        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLangauge()])->get();

        $ad = Ad::first();

        // Dapatkan artikel terkait berdasarkan tag
        $relatedNewsByTag = News::whereHas('tags', function ($query) use ($news) {
            $query->whereIn('name', $news->tags->pluck('name'));
        })->where('id', '!=', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->take(5) // Mengambil beberapa artikel untuk tautan internal
            ->get();

        if ($relatedNewsByTag->isNotEmpty()) {
            $news = $this->insertInternalLinks($news, $relatedNewsByTag);
        }
        $categories = Category::where('status', 1)->get();
        return view('frontend.news-details', compact('news', 'recentNews', 'mostCommonTags', 'nextPost', 'previousPost', 'relatedPosts', 'socialCounts', 'ad', 'categories'));
    }

    private function getCategorySection($categoryId, $limit)
    {
        return News::where('category_id', $categoryId)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')
            ->take($limit)
            ->get();
    }

    private function getRelatedNewsByTag($news)
    {
        return News::whereHas('tags', function ($query) use ($news) {
            $query->whereIn('name', $news->tags->pluck('name'));
        })->where('id', '!=', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->inRandomOrder()
            ->take(5)
            ->get();
    }

    private function insertInternalLinks($news, $relatedNewsByTag)
    {
        $content = $news->content;
        $links = $this->getLinks($news);

        $content = preg_replace_callback(
            '/<p[^>]*>(.*?)<\/p>/is',
            function ($matches) use (&$links) {
                $paragraph = $matches[1];

                foreach ($links as $keyword => $link) {
                    if (strpos($paragraph, $keyword) !== false) {
                        $paragraph = preg_replace(
                            '/\b' . preg_quote($keyword, '/') . '\b(?![^<>]*>)/i',
                            '<a href="' . $link . '">' . $keyword . '</a>',
                            $paragraph,
                            1
                        );
                        unset($links[$keyword]);
                    }
                }

                return '<p>' . $paragraph . '</p>';
            },
            $content
        );

        $news->content = $this->insertRelatedLinks($content, $relatedNewsByTag);
        return $news;
    }

    private function getLinks($news)
    {
        $links = [];
        $tags = $news->tags;
        $category = $news->category;

        foreach ($tags as $tag) {
            $slug = $this->str_slug($tag->name);
            $slugWithEncodedSpace = str_replace('-', '%20', $slug);
            $links[$tag->name] = url('/news?tag=' . $slugWithEncodedSpace);
        }

        if ($category) {
            $slug = $this->str_slug($category->name);
            $links[$category->name] = url('/news?category=' . urlencode($slug));
        }

        return $links;
    }

    private function insertRelatedLinks($content, $relatedNewsByTag)
    {
        $paragraphs = preg_split('/(<\/p>)/i', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
        $cumulativeWords = 0;
        $counter = 0;
        $relatedLinks = $relatedNewsByTag->map(function ($relatedNews) {
            return $this->formatRelatedLink($relatedNews);
        })->toArray();

        foreach ($paragraphs as $key => $paragraph) {
            if (strip_tags($paragraph) != '') {
                $cumulativeWords += str_word_count(strip_tags($paragraph));

                if ($cumulativeWords >= 500 && isset($relatedLinks[$counter])) {
                    $paragraphs[$key] .= $relatedLinks[$counter];
                    $cumulativeWords = 0;
                    $counter++;
                }
            }
        }

        return implode('', $paragraphs);
    }

    private function formatRelatedLink($relatedNews)
    {
        $link = url('/news-details/' . $relatedNews->slug);
        $title = $relatedNews->title;
        return "
            <div style='display: flex; align-items: center; margin-top: 20px;'>
                <div style='background-color: #0052a3; width: 4px; height: 40px; margin-right: 10px;'></div>
                <div>
                    <p style='font-weight: bold; font-size:16px; margin: 0;'>Baca juga:</p>
                    <p style='margin: 0;'><a href=\"$link\" style='color: #0052a3; text-decoration: none; font-size: 16px; font-weight:bold;'>$title</a></p>
                </div>
            </div>";
    }

    private function str_slug($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }


    // public function news(Request $request)
    // {

    //     $news = News::query();

    //     $news->when($request->has('tag'), function ($query) use ($request) {
    //         $query->whereHas('tags', function ($query) use ($request) {
    //             $query->where('name', $request->tag);
    //         });
    //     });

    //     $news->when($request->has('category') && !empty($request->category), function ($query) use ($request) {
    //         $query->whereHas('category', function ($query) use ($request) {
    //             $query->where('slug', $request->category);
    //         });
    //     });

    //     $news->when($request->has('search'), function ($query) use ($request) {
    //         $query->where(function ($query) use ($request) {
    //             $query->where('title', 'like', '%' . $request->search . '%')
    //                 ->orWhere('content', 'like', '%' . $request->search . '%');
    //         })->orWhereHas('category', function ($query) use ($request) {
    //             $query->where('name', 'like', '%' . $request->search . '%');
    //         });
    //     });

    //     $news = $news->activeEntries()->withLocalize()->paginate(20);


    //     $recentNews = News::with(['category', 'auther'])
    //         ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();
    //     $mostCommonTags = $this->mostCommonTags();

    //     $categories = Category::where(['status' => 1, 'language' => getLangauge()])->get();

    //     $ad = Ad::first();

    //     return view('frontend.news', compact('news', 'recentNews', 'mostCommonTags', 'categories', 'ad'));
    // }

    public function news(Request $request)
    {
        $news = News::query();

        $news->when($request->has('tag'), function ($query) use ($request) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->where('name', $request->tag);
            });
        });

        $news->when($request->has('category') && !empty($request->category), function ($query) use ($request) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        });

        // $news->when($request->has('search'), function ($query) use ($request) {
        //     $query->where(function ($query) use ($request) {
        //         $query->where('title', 'like', '%' . $request->search . '%')
        //             ->orWhere('content', 'like', '%' . $request->search . '%');
        //     })->orWhereHas('category', function ($query) use ($request) {
        //         $query->where('name', 'like', '%' . $request->search . '%');
        //     })->orWhereHas('brand', function ($query) use ($request) {
        //         $query->where('name', 'like', '%' . $request->search . '%');
        //     });
        // });

        $news->when($request->has('search'), function ($query) use ($request) {
            $searchTerm = '%' . $request->search . '%';

            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('content', 'like', $searchTerm);
            })
                ->orWhereHas('category', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm);
                })
                ->orWhereHas('brand', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm);
                });
        });


        $news = $news->activeEntries()->withLocalize()->paginate(20);

        $recentNews = News::with(['category', 'auther'])
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();
        $mostCommonTags = $this->mostCommonTags();

        $categories = Category::where(['status' => 1, 'language' => getLangauge()])->get();

        $ad = Ad::first();

        $category = null;
        if ($request->has('category') && !empty($request->category)) {
            $category = Category::where('slug', $request->category)->first();
        }



        $katalog = DB::table('katalog')
            ->whereIn('category_id', $categories->pluck('id')) // Cocokkan dengan ID kategori aktif
            ->get()
            ->groupBy('category_id'); // Kelompokkan berdasarkan category_id


        return view('frontend.news', compact('news', 'recentNews', 'mostCommonTags', 'ad', 'category', 'categories', 'katalog'));
    }

    // public function brand(Request $request)
    // {
    //     $news = News::query();

    //     $news->when($request->has('tag'), function ($query) use ($request) {
    //         $query->whereHas('tags', function ($query) use ($request) {
    //             $query->where('name', $request->tag);
    //         });
    //     });

    //     $news->when($request->has('brand') && !empty($request->brand), function ($query) use ($request) {
    //         $query->whereHas('brand', function ($query) use ($request) {
    //             $query->where('slug', $request->brand);
    //         });
    //     });

    //     $news->when($request->has('search'), function ($query) use ($request) {
    //         $query->where(function ($query) use ($request) {
    //             $query->where('title', 'like', '%' . $request->search . '%')
    //                 ->orWhere('content', 'like', '%' . $request->search . '%');
    //         })->orWhereHas('brand', function ($query) use ($request) {
    //             $query->where('name', 'like', '%' . $request->search . '%');
    //         });
    //     });

    //     $news = $news->activeEntries()->withLocalize()->paginate(20);

    //     $recentNews = News::with(['brand', 'auther'])
    //         ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();
    //     $mostCommonTags = $this->mostCommonTags();

    //     $brands = Brand::where(['status' => 1, 'language' => getLangauge()])->get();

    //     $ad = Ad::first();

    //     $brand = null;
    //     if ($request->has('brand') && !empty($request->brand)) {
    //         $brand = Category::where('slug', $request->brand)->first();
    //     }


    //     return view('frontend.brand', compact('news', 'brands'));
    // }

    public function brand(Request $request)
    {
        $news = News::query();

        if ($request->ajax()) {
            $news->when($request->has('brand') && !empty($request->brand), function ($query) use ($request) {
                $query->whereHas('brand', function ($query) use ($request) {
                    $query->where('slug', $request->brand);
                });
            });

            // Ambil data berita berdasarkan brand
            $newsData = $news->activeEntries()->withLocalize()->get();

            // Cek apakah hasil kosong, jika kosong kembalikan error
            if ($newsData->isEmpty()) {
                return response()->json(['error' => 'No news found for the brand: ' . $request->brand], 404);
            }

            // Kembalikan respons JSON untuk permintaan AJAX
            return response()->json([
                'status' => 'success',
                'data' => $newsData,
            ]);
        }
        $brands = Brand::where(['status' => 1, 'language' => getLangauge()])->get();
        return view('frontend.brand', compact('brands'));
    }



    public function countView($news)
    {
        if (session()->has('viewed_posts')) {
            $postIds = session('viewed_posts');

            if (!in_array($news->id, $postIds)) {
                $postIds[] = $news->id;
                $news->increment('views');
            }
            session(['viewed_posts' => $postIds]);
        } else {
            session(['viewed_posts' => [$news->id]]);

            $news->increment('views');
        }
    }

    public function mostCommonTags()
    {
        return Tag::select('name', \DB::raw('COUNT(*) as count'))
            ->where('language', getLangauge())
            ->groupBy('name')
            ->orderByDesc('count')
            ->take(15)
            ->get();
    }

    public function handleComment(Request $request)
    {

        $request->validate([
            'comment' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->save();
        toast(__('frontend.Comment added successfully!'), 'success');
        return redirect()->back();
    }

    public function handleReplay(Request $request)
    {

        $request->validate([
            'replay' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->replay;
        $comment->save();
        toast(__('frontend.Comment added successfully!'), 'success');

        return redirect()->back();
    }

    public function commentDestory(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        if (Auth::user()->id === $comment->user_id) {
            $comment->delete();
            return response(['status' => 'success', 'message' => __('frontend.Deleted Successfully!')]);
        }

        return response(['status' => 'error', 'message' => __('frontend.Someting went wrong!')]);
    }

    public function SubscribeNewsLetter(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:subscribers,email']
        ], [
            'email.unique' => __('frontend.Email is already subscribed!')
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return response(['status' => 'success', 'message' => __('frontend.Subscribed successfully!')]);
    }

    public function about()
    {
        $settingpage = SettingLandingPage::first();

        $about = About::where('language', getLangauge())->first();
        return view('frontend.about', compact('about', 'settingpage'));
    }

    public function kebijakan()
    {
        $kebijakan = kebijakan::where('language', getLangauge())->first();
        return view('frontend.kebijakan', compact('kebijakan'));
    }


    public function contact()
    {
        $contact = Contact::where('language', getLangauge())->first();
        $socials = SocialLink::where('status', 1)->get();
        return view('frontend.contact', compact('contact', 'socials'));
    }

    public function handleContactFrom(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:500']
        ]);

        $emailExists = Subscriber::where('email', $request->email)->exists();

        if (!$emailExists) {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();
        }

        try {


            $toMail = Contact::where('language', 'en')->first();

            Log::info('Email sent successfully to: ' . $toMail->email);



            Mail::to($toMail->email)->send(new ContactMail($request->subject, $request->message, $request->email));

            $mail = new RecivedMail();
            $mail->email = $request->email;
            $mail->subject = $request->subject;
            $mail->message = $request->message;

            Log::info('Received mail saved successfully for email: ' . $request->email);

            $mail->save();
        } catch (\Exception $e) {
            toast(__($e->getMessage()));
        }

        toast(__('frontend.Message sent successfully!'), 'success');

        return redirect()->back();
    }
}
