@extends('layouts.front_main')
@section('content')
<div class="container" style="margin-top:100px">
<h3 class="text-center font-weight-bold">Yangilik</h3>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="card mb-3">
                <div class="box_img w-100" style="height:350px;overflow:hidden">
                <img class="w-100" src="{{asset('frontend/img/team-2.jpg')}}" alt="Card image cap">
                </div>
            <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque blanditiis neque hic at, quasi corporis dolorem, assumenda nihil dicta rem placeat est labore fuga temporibus consequatur quos ab, commodi aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, fugit optio. Suscipit, repudiandae nisi iure maiores aliquid qui ullam. Dolore nihil accusantium in! Asperiores libero consequatur necessitatibus distinctio culpa numquam. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted"><i class="fa fa-calendar"> </i> 21.07.2019</small></p>
            </div>
        </div>

        </div>    
        <div class="col-md-1"></div>    
    </div>
</div>

@endsection