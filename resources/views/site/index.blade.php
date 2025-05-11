@extends('layouts.site')
@section('title')
    {!! $title !!}
@endsection

@section('metaTags')
    <meta name="description" content="{!! Lang() == 'ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords" content="{!! Lang() == 'ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
    <meta name="application-name" content="{!! Lang() == 'ar' ? setting()->site_name_ar : setting()->site_name_en !!}" />
    <meta name="author" content="{!! Lang() == 'ar' ? setting()->site_name_ar : setting()->site_name_en !!}" />
@endsection

@section('content')
    @include('site.include.preLoader')
    @include('site.include.header')
    @include('site.include.search')
    @include('site.include.slider')
    @include('site.include.features')
    @include('site.include.product')
    @include('site.include.cart')
    @include('site.include.testimonail')
    @include('site.include.advertisement')
    @include('site.include.latest-news')
    @include('site.include.carousel')
    @include('site.include.footer')
@endsection
