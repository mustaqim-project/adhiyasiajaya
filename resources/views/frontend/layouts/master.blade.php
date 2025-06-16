<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PT Adhya Asia Jaya - Professional Oilfield & Pulp/Paper Equipment Supplier</title>

    <!-- Primary Meta Tags -->
    <meta name="description" content="@yield('meta_description', $settings['site_seo_description'] ?? 'Supplying oilfield equipment and pulp/paper machinery with API certification. Competitive pricing, short lead times. Professional, Efficient, Customer Focus, Win-win Cooperation.')">
    <meta name="keywords" content="@yield('meta_keyword', $settings['site_seo_keywords'] ?? 'oilfield equipment Indonesia, API certified drilling tools, pulp and paper machinery supplier, industrial equipment distributor, well control equipment, solid control equipment')">
    <meta name="author" content="PT Adhya Asia Jaya">
    <meta name="robots" content="index, follow">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset($settings['site_favicon']) }}" type="image/png">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@hasSection('meta_og_title') @yield('meta_og_title') @else {{ $settings['site_name'] ?? 'PT Adhya Asia Jaya' }} @endif">
    <meta property="og:description" content="@hasSection('meta_og_description') @yield('meta_og_description') @else {{ $settings['site_seo_description'] ?? '' }} @endif">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@hasSection('meta_og_image') @yield('meta_og_image') @else {{ asset($settings['site_logo'] ?? 'default-logo.png') }} @endif">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:title" content="@hasSection('meta_tw_title') @yield('meta_tw_title') @else {{ $settings['site_name'] ?? 'PT Adhya Asia Jaya' }} @endif">
    <meta name="twitter:description" content="@hasSection('meta_tw_description') @yield('meta_tw_description') @else {{ $settings['site_seo_description'] ?? '' }} @endif">
    <meta name="twitter:image" content="@hasSection('meta_tw_image') @yield('meta_tw_image') @else {{ asset($settings['site_logo'] ?? 'default-logo.png') }} @endif">

    <!-- Preload & Fonts -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css" as="style">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('baru_depan/assets/css/styles.css') }}">
</head>


<body>
    @php
        $socialLinks = \App\Models\SocialLink::where('status', 1)->get();
        $footerInfo = \App\Models\FooterInfo::where('language', getLangauge())->first();
        $footerGridOne = \App\Models\FooterGridOne::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridTwo = \App\Models\FooterGridTwo::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridThree = \App\Models\FooterGridThree::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridOneTitle = \App\Models\FooterTitle::where([
            'key' => 'grid_one_title',
            'language' => getLangauge(),
        ])->first();
        $footerGridTwoTitle = \App\Models\FooterTitle::where([
            'key' => 'grid_two_title',
            'language' => getLangauge(),
        ])->first();
        $footerGridThreeTitle = \App\Models\FooterTitle::where([
            'key' => 'grid_three_title',
            'language' => getLangauge(),
        ])->first();
        $contact = \App\Models\Contact::where('language', getLangauge())->first();
        $about = \App\Models\About::where('language', getLangauge())->first();
    @endphp

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')


</body>

</html>
