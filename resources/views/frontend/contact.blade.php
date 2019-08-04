@extends('layouts.front_main')
@section('content')

@php
$lang = App::getLocale();
@endphp
<div class="box">
    @if(session()->has('message'))
    <div class="alert" style="border-radius:5px" role="alert">
        <Strong>{{ session()->get('message') }}</Strong><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    @endif
</div>
<div class="container" style="padding: 0 100px;margin-top:170px">
    <h3 class="text-center text-uppercase font-weight-bold">{{ $contact_us!=null?$contact_us->title_uz:'' }}</h3>
    <p class="text-center">{{$contact_us!=null?$contact_us->value_uz:''}}</p>
    <div class="box" style="width:20%;height: 4px;margin: 0 auto; border: 1px solid grey;">
        <div class="inner_box" style="width: 50%;margin:0 auto;height:100%; background-color: #ff5e00">

        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-4 border-right">
            <p class="text-center">
                <i class="ion-ios-location-outline fa-3x" style="color: #ff5e00"></i>
            </p>
            <h3 class="text-center text-uppercase font-weight-bold text-secondary" style="font-size: 18px">{{$address!=null?$address->{'title_'.$lang}:''}}</h3>
            <address class="text-center">{{$address!=null?$address->{'value_'.$lang}:''}} </address>
        </div>
        <div class="col-md-4 border-right">
            <p class="text-center">
                <i class="ion-ios-telephone-outline fa-3x" style="color: #ff5e00"></i>
            </p>
            <p>
                <h4 class="font-weight-bold text-secondary text-center text-uppercase " style="font-size: 18px">{{ $phone_number!=null?$phone_number->{'title_'.$lang}:'' }}</h4>
            </p>
            <p class="text-center">
                <a href="tel:{{$phone_number!=null?$phone_number->{'value_'.$lang}:''}}" class="text-dark"><small>{{$phone_number!=null?$phone_number->{'value_'.$lang}:''}}</small></a>
            </p>
        </div>
        <div class="col-md-4 border-right">
            <p class="text-center">
                <i class="ion-ios-email-outline fa-3x" style="color: #ff5e00"></i>
            </p>
            <p>
                <h4 class="font-weight-bold text-secondary text-center text-uppercase" style="font-size: 18px">{{$email!=null?$email->{'title_'.$lang}:''}}</h4>
            </p>
            <p class="text-center">
                <a href="mailto:{{$email!=null?$email->{'title_'.$lang}:''}}" class="text-dark"><small>{{$email!=null?$email->{'value_'.$lang}:''}}</small></a>
            </p>
        </div>
    </div>

</div>

<div class="container-fluide" style="margin-top: 150px;padding: 0 100px">

    <div class="row">
        <div class="col-md-6 p-2">
            <h3 class="text-center font-weight-bold "> FMS MAP</h3>
            <div class="card">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47971.57799543475!2d69.20845928453299!3d41.282237294214205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8a8b2eef294b%3A0x74d629c3b43f5834!2zWWFra2FzYXJveSB0dW1hbmksINCi0L7RiNC60LXQvdGCLCBPYHpiZWtpc3Rvbg!5e0!3m2!1suz!2s!4v1564841019681!5m2!1suz!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="text-center font-weight-bold">Contact-Uz</h3>
            <form action="/contact" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span rel="alert" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span rel="alert" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror">
                    @error('subject')
                    <span rel="alert" class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror"></textarea>
                    @error('message')
                    <span rel="alert" class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="float-left row">
                    <div class="form-group col-md-6">
                        <div class="captcha">
                            <span>{!! captcha_img('flat') !!}</span>
                            <button type="button" class="btn btn-success btn-sm" data-url="{{ route('refreshcaptcha') }}" id="refreshcaptcha"><i class="fa fa-refresh"></i></button>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha">
                        @error('captcha')
                        <span rel="alert" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                <div class="form-group text-center">
                    <button class="btn btn-warning text-light" type="submit">Отправить <i class="fa fa-paper-plane-o"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection