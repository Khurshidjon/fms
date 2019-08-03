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
            <h4>Useful Links</h4>
            <ul>
            @foreach($footer_menus as $menu)
              <li><i class="ion-ios-arrow-right"></i> <a href="{{ $menu->url }}">{{ $menu->{'name_'.$lang} }}</a></li>
            @endforeach
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p><strong>Address: </strong>{{ $address!=null?$address->{'value_'.$lang}:'' }} <br>
              <strong>Phone:</strong> {{ $phone_number!=null?$phone_number->{'title_'.$lang}:'' }} <br>
              <strong>Email:</strong> {{ $email!=null?$email->{'title_'.$lang}:'' }}<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>{{ $footer_right_side!=null?$footer_right_side->{'value_'.$lang}:'' }}</p>
            <form action="/subscribe" method="post">
            @csrf
              <input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{old('email')}}"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>FMS</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Designed by <a href="https://bootstrapmade.com/">sssssssssss</a>
      </div>
    </div>
  </footer><!-- #footer -->
