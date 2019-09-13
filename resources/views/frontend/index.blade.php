<?php
use Mews\Captcha\Facades\Captcha;
?>
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
 

div.blogbox {
  box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.5);
  margin: 15px;
  /* padding: 8px; */
}

div.blogbox .blogimg {
  width: 100%;
  /* height: 260px; */
  position: relative;
  overflow: hidden;
}

div.blogbox .blogimg .blogspan {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.5);
  display: inline-block;
  width: 100%;
  height: 0%;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.4s ease-in-out;
}

div.blogbox .blogimg .blogspan i {
  /* background-color: #16A085; */
  /* padding: 12px; */
  /* font-size: 18px; */
  /* border-radius: 50%; */
  color: #FFFFFF;
  transition: all 0.4s ease-in;
  opacity: 0;
}
/* 
div.blogbox .blogimg .blogspan i:hover {
  background-color: #666666;
} */

div.blogbox:hover .blogimg .blogspan  {
  height: 100%;
}
div.blogbox:hover .blogimg .blogspan i {
  opacity: 1;
}

div.blogbox:hover .blogimg img {
  transform: scale(1.2, 1.2);
}

div.blogbox .blogimg img {
  width: 100%;
  /* height: 100%; */
  transition: all 0.4s ease-in-out;
}



div.blogbox .blogdown .blogh5 {
  /* font-size: 18px; */
  word-spacing: 5px;
  margin-top: 14px;
}

div.blogbox .blogdown .blogh5 a {
  text-decoration: none;
  transition: all 0.4s ease-in-out;
  color: black;
}



div.blogbox .blogdown .blogh5 a:hover {
  color: #16A085;
}

div.blogbox .blogdown .blogicon span {
  color: #666666;
} 

div.blogbox .blogdown .blogicon span i {
  color: #16A085;
  margin-right: 5px;
  display: inline-block;
} 

/* div.blogbox .blogdown p {
  color: #666666;
  font-size: 16px;
  margin-top: 8px;
} */

div.blogbox .blogdown .bloga {
  text-decoration: none;
  color:#16A085;
  font-size: 12px;
  transition: all 0.4s ease-in-out;
}

div.blogbox .blogdown .bloga:hover {
  color: black;
}


div.blog .blogheadh {
  color: #16A085;
  text-align: center;
  font-weight: 600;
}
div.blog .blogheadp {
  color: #666666;
  width: 60%;
  margin: 0 auto;
  text-align: center;
}


div.paginationblog .blbox {
  display: inline-block;
  padding: 8px 26px;
  border: 1px solid #DDDDDD;
  background-color: #FFFFFF;
  color: black;
  transition: all 0.4s ease-in-out;
  text-decoration: none;
}

div.paginationblog .blbox:hover {
 background-color: #16A085;
 color: #FFFFFF;
}

div.paginationblog .blbox:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px; 
}

div.paginationblog .blbox:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px; 
}

.activepagblog {
  background-color: #16A085 !important;
  color: #FFFFFF !important;
}


/* Our Blog */
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
      <!-- <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
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
      </div> -->

    </div>

  </div>
</section>
 
  <section>
  <div class="container">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12 blogcol wow bounceInLeft " data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="blogbox">
              <div class="blogimg">
                <img src="{{ $img_one!=null?asset('storage').'/'. $img_one->image:'' }} "class="img-fluid img-thumbnail">
                <span class="blogspan">
                <a href="{{ $img_one!=null?asset('storage').'/'. $img_one->image:'' }}" data-lightbox="portfolio" data-title="" class="link-preview text-center" style="display:block; " title="Preview"><i class=" fa fa-plus fa-2x text-center" style="color:#fff;"></i></a>
                </span>
              </div>
            </div>
          </div>
    <div class="col-lg-6 col-md-6 col-xs-12 blogcol wow bounceInRight" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="blogbox">
              <div class="blogimg">
                <img src="{{ $img_two!=null?asset('storage').'/'. $img_two->image:'' }}"class="img-fluid img-thumbnail">
                <span class="blogspan">
                <a href="{{ $img_two!=null?asset('storage').'/'. $img_two->image:'' }}" data-lightbox="portfolio" data-title="" class="link-preview text-center" style="display:block; " title="Preview"><i class=" fa fa-plus fa-2x text-center" style="color:#fff;"></i></a>
                </span>
              </div>
            </div>
          </div>
    </div>
  </div>

  </section>
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
                  <a href="{{ asset('storage') .'/'. $gallery->filename }}" data-lightbox="portfolio" data-title="{{ $gallery->title }}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                </figure>
              </div>
            </div>
          @endforeach
        </div>

      </div>
</section><!-- #portfolio -->

<section id="facts" class="wow fadeIn">
  <div class="container">

    <header class="section-header">
      <h3>@lang('pages.statistic')</h3>
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
      <h3>@lang('pages.xamkor')</h3>
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