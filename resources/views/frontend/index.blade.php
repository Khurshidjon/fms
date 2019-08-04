@extends('layouts.front_main')
@php
$lang = App::getLocale();
$i = 1;
@endphp
<style>
  .alert {
    padding: 20px;
    background-color: #2196F3;
    color: white;
  }

  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }

  #intro,
  .carousel-inner,
  .carousel-item {
    max-height: 43em;
  }
</style>
@section('content')
<section id="intro">

  <div class="intro-container">
    <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">
        @foreach($banners as $banner)
        <div class="carousel-item <?= $i == 1 ? 'active' : '' ?> ">
          <div class="carousel-background"><img src="{{asset('storage').'/'. $banner->image}}" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>{{$banner->{'title_'.$lang} }}</h2>
              <p>{{$banner->{'description_'.$lang} }}</p>
              <a href="{{ route('single.news', ['post' => $banner]) }}" class="btn-get-started scrollto">@lang('pages.read_more')</a>
            </div>
          </div>
        </div>
        @php
        $i++
        @endphp
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </div>
</section><!-- #intro -->

<section id="featured-services">
  <div class="container">
  </div>
</section><!-- #featured-services -->
<!--==========================
      About Us Section
    ============================-->
<section id="about">
  <div class="container">
    <header class="section-header">
      <h3>{{$about!=null?$about->{'title_'.$lang}:'' }}</h3>
      <p>{{$about!=null?$about->{'value_'.$lang}:'' }}</p>
    </header>

    <div class="row about-cols">
      <div class="col-md-4 wow fadeInUp">
        <div class="about-col">
          <div class="img">
            <div style="width:100%; height:200px; overflow:hidden">
              <img src="{{ $card1!=null?asset('storage').'/'. $card1->image:'' }} " alt="" class="img-fluid">
            </div>
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
          </div>
          <h2 class="title"><a href="#">{{ $card1!=null?$card1->{'title_'.$lang}:''}}</a></h2>
          <p>
            {{ $card1!=null?$card1->{'value_'.$lang}:'' }}
          </p>
        </div>
      </div>


      <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="about-col">
          <div class="img">
            <div style="width:100%; height:200px; overflow:hidden">
              <img src="{{ $card2!=null?asset('storage').'/'. $card2->image:''}}" alt="" class="img-fluid">
            </div>
            <div class="icon"><i class="ion-ios-list-outline"></i></div>
          </div>
          <h2 class="title"><a href="#">{{ $card2!=null?$card2->{'title_'.$lang}:''}}</a></h2>
          <p>
            {{ $card2!=null?$card2->{'value_'.$lang}:''}}
          </p>
        </div>
      </div>

      <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
        <div class="about-col">
          <div class="img">
            <div style="width:100%; height:200px; overflow:hidden">
              <img src="{{ $card3!=null?asset('storage').'/'. $card3->image:'' }}" alt="" class="img-fluid">
            </div>
            <div class="icon"><i class="ion-ios-eye-outline"></i></div>
          </div>
          <h2 class="title"><a href="#">{{ $card3!=null?$card3->{'title_'.$lang}:'' }}</a></h2>
          <p>
            {{ $card3!=null?$card3->{'value_'.$lang}:''}}
          </p>
        </div>
      </div>

    </div>

  </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
    </div>
  </div>
</section><!-- #about -->

<!--==========================
      Services Section
    ============================-->
<section id="services">
  <div class="container">

    <header class="section-header wow fadeInUp">
      <h3>{{ $services!=null?$services->{'title_'.$lang}:'' }}</h3>
      <p>{{ $services!=null?$services->{'value_'.$lang}:'' }}</p>
    </header>

    <div class="row">

      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
        <h4 class="title"><a href="">{{ $services_card1!=null?$services_card1->{'title_'.$lang}:''}}</a></h4>
        <p class="description">{{ $services_card1!=null?$services_card1->{'value_'.$lang}:''}}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
        <h4 class="title"><a href="">{{ $services_card2!=null?$services_card2->{'title_'.$lang}:'' }}</a></h4>
        <p class="description">{{ $services_card2!=null?$services_card2->{'value_'.$lang}:'' }}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-paper-outline"></i></div>
        <h4 class="title"><a href="">{{ $services_card3!=null?$services_card3->{'title_'.$lang}:'' }}</a></h4>
        <p class="description">{{ $services_card3!=null?$services_card3->{'value_'.$lang}:'' }}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
        <h4 class="title"><a href="">{{ $services_card4!=null?$services_card4->{'title_'.$lang}:'' }}</a></h4>
        <p class="description">{{ $services_card4!=null?$services_card4->{'value_'.$lang}:'' }}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
        <h4 class="title"><a href="">{{ $services_card5!=null?$services_card5->{'title_'.$lang}:'' }}</a></h4>
        <p class="description">{{ $services_card5!=null?$services_card5->{'value_'.$lang}:'' }}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-people-outline"></i></div>
        <h4 class="title"><a href="">{{ $services_card6!=null?$services_card6->{'title_'.$lang}:'' }}</a></h4>
        <p class="description">{{ $services_card6!=null?$services_card6->{'value_'.$lang}:'' }}</p>
      </div>

    </div>

  </div>
</section>
<section id="facts" class="wow fadeIn">
  <div class="container">

    <header class="section-header">
      <h3>Statistika</h3>
    </header>

    <div class="row counters">

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{ $statistics!=null?$statistics->{'title_'.$lang}:'' }}</span>
        <p>{{ $statistics!=null?$statistics->{'value_'.$lang}:'' }}</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{ $statistics1!=null?$statistics1->{'title_'.$lang}:'' }}</span>
        <p>{{ $statistics1!=null?$statistics1->{'value_'.$lang}:'' }}</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{ $statistics2!=null?$statistics2->{'title_'.$lang}:'' }}</span>
        <p>{{ $statistics2!=null?$statistics2->{'value_'.$lang}:'' }}</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{ $statistics3!=null?$statistics3->{'title_'.$lang}:'' }}</span>
        <p>{{ $statistics3!=null?$statistics3->{'value_'.$lang}:'' }}</p>
      </div>

    </div>
  </div>
</section>
<section id="clients" class="wow fadeInUp">
  <div class="container">

    <header class="section-header">
      <h3>Bizning Hamkorlar</h3>
    </header>

    <div class="owl-carousel clients-carousel">
      @foreach($partners as $one)
      <a href="{{$one->url}}"><img src="{{asset('storage').'/'.$one->image}}" height="200" title="{{$one->name}}"></a>
      @endforeach
      <!-- <img src="{{asset('frontend/img/clients/client-2.png')}}" alt="">
      <img src="{{asset('frontend/img/clients/client-3.png')}}" alt="">
      <img src="{{asset('frontend/img/clients/client-4.png')}}" alt="">
      <img src="{{asset('frontend/img/clients/client-5.png')}}" alt="">
      <img src="{{asset('frontend/img/clients/client-6.png')}}" alt="">
      <img src="{{asset('frontend/img/clients/client-7.png')}}" alt="">
      <img src="{{asset('frontend/img/clients/client-8.png')}}" alt=""> -->
    </div>

  </div>
</section>

</section>
<section id="call-to-action" class="wow fadeIn">
  <div class="container text-center">
    <h3>{{ $call_to_action!=null?$call_to_action->{'title_'.$lang}:'' }}</h3>
    <p>{{ $call_to_action!=null?$call_to_action->{'value_'.$lang}:'' }}</p>
    <a class="cta-btn" href="{{route('contact')}}">Call To Action</a>
  </div>
</section>

<!--==========================
      Contact Section
    ============================-->
<section id="contact" class="section-bg wow fadeInUp">
  <div class="container">

    <div class="section-header">
      <h3>{{ $contact_us!=null?$contact_us->{'title_'.$lang}:'' }}</h3>
      <p>{{$contact_us!=null?$contact_us->{'value_'.$lang}:''}}</p>
    </div>

    <div class="row contact-info">

      <div class="col-md-4">
        <div class="contact-address">
          <i class="ion-ios-location-outline"></i>
          <h3>{{$address!=null?$address->{'title_'.$lang}:''}}</h3>
          <address>{{$address!=null?$address->{'value_'.$lang}:''}} </address>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-phone">
          <i class="ion-ios-telephone-outline"></i>
          <h3>{{ $phone_number!=null?$phone_number->{'title_'.$lang}:'' }}</h3>
          <p><a href="tel:{{$phone_number!=null?$phone_number->{'value_'.$lang}:''}}">{{$phone_number!=null?$phone_number->{'value_'.$lang}:''}}</a></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-email">
          <i class="ion-ios-email-outline"></i>
          <h3>{{$email!=null?$email->{'title_'.$lang}:''}}</h3>
          <p><a href="mailto:{{$email!=null?$email->{'value_'.$lang}:''}}">{{$email!=null?$email->{'value_'.$lang}:''}}</a></p>
        </div>
      </div>

    </div>

    <div class="form">

      <form action="{{ route('cont') }}" method="post" enctype="multipart/form-data" class="contactForm">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}" placeholder="Your Name" />
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <input type="email" class="form-control" name="email" placeholder="Your Email" value="{{ old('email') }}" />
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}"/>
            @error('subject')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" placeholder="Message">{{ old('message') }}</textarea>
        </div>
        <div class="float-left row">
          <div class="form-group col-md-6">
             <div class="captcha">
               <span>{!! captcha_img('flat') !!}</span>
               <button type="button" class="btn btn-success" data-url="{{ route('refreshcaptcha') }}" id="refreshcaptcha"><i class="fa fa-refresh"></i></button>
            </div>
          </div>
          <div class="form-group col-md-6">
            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
            @error('captcha')
              <span rel="alert" class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="float-right"><button type="submit">Отправить</button></div>
      </form>
    </div>
  </div>
</section><!-- #contact -->

@endsection