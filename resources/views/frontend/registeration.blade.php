@extends('layouts.front_main')
@section('content')
<div class="container" style="margin-top:120px">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item w-50">
                    <a class="nav-link text-center active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('pages.regis')</a>
                </li>
                <li class="nav-item w-50">
                    <a class="nav-link ok  text-center" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">@lang('pages.enter')</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container  mb-4 p-5">
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <label for="">To'liq simi</label>
                            <input type="text" name="username" class="form-control my-2" id="">
                            <label for="">Telefon raqami</label>
                            <input type="text" name="phone" class="form-control my-2" id="">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control my-2" id="">
                            <label for="">Parol</label>
                            <input type="password" name="password" class="form-control my-2" id="">
                            <label for="">Parol tashdiqlash</label>
                            <input type="password" name="password_confirmation" class="form-control my-2" id="">
                            <br>
                            <button type="submit" class="btn btn-sm form-control text-light" style="background-color:#ff5e00">Jo'natish</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container card p-5">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control my-2" id="">
                            <label for="">Parol</label>
                            <input type="password" name="password" class="form-control my-2" id="">
                            <br>
                            <button type="submit" class="form-control bg-primary text-light" value="Jo'natish">
                        </form>
                    </div>
                </div>
            </div>








        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection