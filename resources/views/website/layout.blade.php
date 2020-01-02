<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', __meta('default', 'title'))</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png" />
    <meta name="description" content="@yield('description', __meta('default', 'description'))">
    <meta name="keywords" content="@yield('keywords', __meta('default', 'keywords'))">
    <meta name="author" content="@yield('author', __meta('default', 'author'))">

    <meta name="public-path" content="{{ asset('/') }}">
    <meta name="storage-path" content="{{ asset(Storage::url('/')) }}">

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content=" @yield('author', __meta('default', 'author'))" />
    <meta property="og:title" content="@yield('title', __meta('default', 'title'))" />
    <meta property="og:description" content="@yield('description', __meta('default', 'description'))" />
    <meta property="og:locale" content="{{ LaravelLocalization::getCurrentLocale() }}">
    @foreach (LaravelLocalization::getSupportedLocales() as $key => $lang)
        @if (LaravelLocalization::getCurrentLocale()!=$key)
            <meta property="og:locale:alternate" content="{{ $key }}">
        @endif
    @endforeach
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Jura:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/website.css') }}?{{ $assets_version }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('website.components.header', ['navbar_fixed' => $__env->yieldContent('navbar_fixed', false)])
        @yield('content')
        @include('website.components.footer')
    </div>
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script> 
    <script type="text/javascript" src="{{ asset('js/website.js').'?'.$assets_version }}"></script>
    @yield('scripts')
</body>
</html>
