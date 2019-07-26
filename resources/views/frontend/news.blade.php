@extends('layouts.front_main')
@section('content')
<div class="container" style="margin-top:100px">
<h3 class="text-center font-weight-bold">Yangiliklar</h3>
    <div class="row">
        <div class="col-md-10">
            <div class="card mb-3" style="max-width: 800px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="{{asset('frontend/img/team-1.jpg')}}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase font-weight-bold">Card title</h5>
                        <p class="card-text"><a href="{{asset('news_blog')}}" class="ok">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo nisi neque laboriosam sit sed, blanditiis voluptates eveniet soluta fugit ea dolor iste consectetur necessitatibus fuga autem ex ab! Rem, sunt. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</a></p>
                        <p class="card-text"><small class="text-muted"><i class="fa fa-calendar"> </i> 20.07.2019</small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>    
        <div class="col-md-3"></div>    
    </div>
</div>

@endsection