@extends('layouts.front_main')
@section('content')
@push('script')
    <script type="text/javascript" src="{{ asset('frontend/js/scripts.js') }}"></script> 
@endpush
@php 
    $lang = App::getLocale()
@endphp
<div class="container-fluid container-news" style="margin:8em 0">
    <h3 class="text-center font-weight-bold">Yangiliklar</h3>
    <div class="row" id="news-container" data-url="{{ route('render.news') }}" data-skip="{{ $skip }}">
        @include('frontend.news-render')  
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-sm btn-info news-load-more">load more</button>
    </div>
</div>
<script>
    
</script>
@endsection