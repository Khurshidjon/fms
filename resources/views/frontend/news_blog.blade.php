@extends('layouts.front_main')
@section('content')
@push('script')
    .card-body img {
        max-width: 10em !important;
    }
@endpush
@php 
    $lang = App::getLocale();
@endphp
<div class="container" style="margin-top:7em">
<!-- <h3 class="text-center font-weight-bold">Yangilik</h3> -->
    <div class="card mb-3">
            <div class="box_img w-100">
                <img class="w-100" src="{{ asset('storage') .'/'. $post->image}}" alt="Card image cap">
            </div>
        <div class="card-body">
            <h5 class="card-title text-center">{{ $post->{'title_'.$lang} }}</h5>
            <p class="card-text">{!! $post->{'body_'.$lang} !!}</p>
            <p class="card-text">
                <small class="text-muted float-left"><i class="fa fa-calendar"> </i> {{ $post->created_at->format('d.m.Y') }} </small>
                <small class="text-muted float-right"><i class="fa fa-eye"> </i>  {{ $post->view_count }}</small>
            </p>
        </div>
    </div>
</div>

@endsection