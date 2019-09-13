@php
$lang = App::getLocale();
@endphp
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-info">
          <h3>FMS</h3>
          <p>{{ $footer_left_side!=null?$footer_left_side->{'value_'.$lang}:'' }}</p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>@lang('pages.foot_menu')</h4>
          <ul>
            @foreach($footer_menus as $menu)
            <li><i class="ion-ios-arrow-right"></i> <a href="{{ $menu->url }}">{{ $menu->{'name_'.$lang} }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-contact">
          <h4>@lang('pages.contact_us')</h4>
          <p><strong>Address: </strong>{{ $address!=null?$address->{'value_'.$lang}:'' }} <br>
            <strong>Phone:</strong> {{ $phone_number!=null?$phone_number->{'value_'.$lang}:'' }} <br>
            <strong>Email:</strong> {{ $email!=null?$email->{'value_'.$lang}:'' }}<br>
          </p>

          <div class="social-links">
            <a href="{{ $twitter!=null?$twitter->{'value_'.$lang}:'' }}" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="{{ $facebook!=null?$facebook->{'value_'.$lang}:'' }}" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="{{ $instagram!=null?$instagram->{'value_'.$lang}:'' }}" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="{{ $google!=null?$google->{'value_'.$lang}:'' }}" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="{{ $telegram!=null?$telegram->{'value_'.$lang}:'' }}" class="linkedin"><i class="fa fa-telegram"></i></a>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-newsletter">
          <h4>@lang('pages.our_new')</h4>
          
          <p>{{ $footer_right_side!=null?$footer_right_side->{'value_'.$lang}:'' }}</p>
          <form action="/subscribe" method="post">
            @csrf
            <input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{old('email')}}"><input type="submit" value="Subscribe">
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
       <strong>fly mail service</strong>
    </div>
    <div class="credits">
      
      Designed by <a href="nomad-tech.com">Nomad-Teach</a>
    </div>
  </div>
</footer><!-- #footer -->