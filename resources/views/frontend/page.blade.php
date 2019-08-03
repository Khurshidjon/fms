@extends('layouts.front_main')
@php 
  $lang = App::getLocale();
@endphp
@section('content')
<div class="container" style="margin-top:10em">
    <h2><b>{{ $page->{'title_'.$lang} }}</b></h2>
    <hr>
    <div class="">
        {!! $page->{'body_'.$lang} !!}
    </div>
</div>
@endsection