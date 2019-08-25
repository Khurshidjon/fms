@extends('layouts.front_main')
@section('content')
@php 
  $lang = App::getLocale();
@endphp
<div class="container-fluid" style="margin-top:120px">
<section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Our Albums</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach($albums as $album)
                <li data-filter=".{{ $album->id }}">{{ $album->{'album_title_'.$lang} }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          @foreach($galleries as $gallery)
            <div class="col-lg-4 col-md-6 portfolio-item {{ $gallery->album_id }} wow fadeInUp">
              <div class="portfolio-wrap">
                <figure>
                  <img src="{{ asset('storage') .'/'. $gallery->filename }}" class="img-fluid" alt="">
                  <a href="{{ asset('storage') .'/'. $gallery->filename }}" data-lightbox="portfolio" data-title="{{ $gallery->title }}" class="link-preview" title="Preview"><i class="fa fa-search-plus"></i></a>
                </figure>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- #portfolio -->


</div>

@endsection