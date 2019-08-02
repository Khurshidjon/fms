@extends('layouts.front_main')
@php 
  $lang = App::getLocale();
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
</style>
@section('content')
<section id="intro">

  <div class="intro-container">
    <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        @foreach($post as $one)
        <div class="carousel-item  <?= $one->id == 1 ? 'active' : '' ?> ">
          <div class="carousel-background"><img src="{{asset('storage').'/'. $one->image}}" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>{{$one->title_uz}}</h2>
              <p>{{$one->description_uz}}</p>
              <a href="#" class="btn-get-started scrollto">Get Started</a>
            </div>
          </div>
        </div>
        @endforeach
        <!-- <div class="carousel-item">
          <div class="carousel-background"><img src="img/intro-carousel/2.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>At vero eos et accusamus</h2>
              <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
              <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
            </div>
          </div>
        </div>
        
        <div class="carousel-item">
          <div class="carousel-background"><img src="img/intro-carousel/3.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Temporibus autem quibusdam</h2>
              <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>
              <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/intro-carousel/4.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Nam libero tempore</h2>
              <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum.</p>
              <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
            </div>
          </div>
        </div>set_one

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/intro-carousel/5.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Magnam aliquam quaerat</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
            </div>set_one
          </div>
        </div> -->

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
      <h3>{{$card1->title_uz}}</h3>
      <p>{{$card1->value_uz}}</p>
    </header>

    <div class="row about-cols">
      <div class="col-md-4 wow fadeInUp">
        <div class="about-col">
          <div class="img">
            <div style="width:100%; height:200px; overflow:hidden">
              <img src="{{asset('storage').'/'. $card1->image}}" alt="" class="img-fluid">
            </div>
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
          </div>
          <h2 class="title"><a href="#">{{$card1->title_uz}}</a></h2>
          <p>
            {{$card1->value_uz}}
          </p>
        </div>
      </div>


      <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="about-col">
          <div class="img">
            <div style="width:100%; height:200px; overflow:hidden">
              <img src="{{asset('storage').'/'. $card2->image}}" alt="" class="img-fluid">
            </div>
            <div class="icon"><i class="ion-ios-list-outline"></i></div>
          </div>
          <h2 class="title"><a href="#">{{$card2->title_uz}}</a></h2>
          <p>
            {{$card2->value_uz}}
          </p>
        </div>
      </div>

      <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
        <div class="about-col">
          <div class="img">
            <div style="width:100%; height:200px; overflow:hidden">
              <img src="{{asset('storage').'/'. $card3->image}}" alt="" class="img-fluid">
            </div>
            <div class="icon"><i class="ion-ios-eye-outline"></i></div>
          </div>
          <h2 class="title"><a href="#">{{$card3->title_uz}}</a></h2>
          <p>
            {{$card3->value_uz}}
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
      <h3>{{$services->title_uz}}</h3>
      <p>{{$services->value_uz}}</p>
    </header>

    <div class="row">

      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
        <h4 class="title"><a href="">{{$services_card1->title_uz}}</a></h4>
        <p class="description">{{$services_card1->value_uz}}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
        <h4 class="title"><a href="">{{$services_card2->title_uz}}</a></h4>
        <p class="description">{{$services_card2->value_uz}}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-paper-outline"></i></div>
        <h4 class="title"><a href="">{{$services_card3->title_uz}}</a></h4>
        <p class="description">{{$services_card3->value_uz}}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
        <h4 class="title"><a href="">{{$services_card4->title_uz}}</a></h4>
        <p class="description">{{$services_card4->value_uz}}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
        <h4 class="title"><a href="">{{$services_card5->title_uz}}</a></h4>
        <p class="description">{{$services_card5->value_uz}}</p>
      </div>
      <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
        <div class="icon"><i class="ion-ios-people-outline"></i></div>
        <h4 class="title"><a href="">{{$services_card6->title_uz}}</a></h4>
        <p class="description">{{$services_card6->value_uz}}</p>
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
        <span data-toggle="counter-up">{{$statistics->value_uz}}</span>
        <p>{{$statistics->title_uz}}</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{$statistics1->value_uz}}</span>
        <p>{{$statistics1->title_uz}}</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{$statistics2->value_uz}}</span>
        <p>{{$statistics2->title_uz}}</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{$statistics3->value_uz}}</span>
        <p>{{$statistics3->title_uz}}</p>
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
      <a href="{{$one->url}}"><img src="{{asset('storage').'/'.$one->image}}"  height="200" title="{{$one->name}}"></a>
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
    <h3>Operator bilan bog'lanish</h3>
    <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <a class="cta-btn" href="tel: +998936888499">Call To Action</a>
  </div>
</section>

<!--==========================
      Contact Section
    ============================-->
<section id="contact" class="section-bg wow fadeInUp">
  <div class="container">

    <div class="section-header">
      <h3>Contact Us</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
    </div>

    <div class="row contact-info">

      <div class="col-md-4">
        <div class="contact-address">
          <i class="ion-ios-location-outline"></i>
          <h3>Address</h3>
          <address>Toshkent</address>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-phone">
          <i class="ion-ios-telephone-outline"></i>
          <h3>Phone Number</h3>
          <p><a href="tel:+155895548855">+998941234567</a></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-email">
          <i class="ion-ios-email-outline"></i>
          <h3>Email</h3>
          <p><a href="mailto:info@example.com">info@example.com</a></p>
        </div>
      </div>

    </div>

    <div class="form">

      <form action="/contact" method="post" enctype="multipart/form-data" class="contactForm">

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
            <input type="email" class="form-control" name="email" placeholder="Your Email" />
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" placeholder="Subject" />
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
        </div>
        @csrf
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>
    </div>

  </div>
</section><!-- #contact -->

@endsection