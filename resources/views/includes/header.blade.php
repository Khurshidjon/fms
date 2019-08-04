@php 
  $lang = App::getLocale();
@endphp
<style>
  .scrollto{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font: italic;
    position:relative;
    top:-15px;
    text-transform: lowercase !important; 
    letter-spacing: 3px !important;
  }
  .scrollto img{
    background: white;
    border-radius:50%;
    position:relative;
    /* top:-15px; */
  }
</style>
<header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h5 style="max-width:36em">
          <a href="{{ route('index') }}" class="scrollto" style="border:none; text-decoration:none">
            <img src="{{ asset('frontend/img/logo.png') }}" width="63" alt=""> Fly Mail Service            
          </a>
        </h5>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li>
            <a href="{{ route('index') }}">@lang('pages.home_page')</a>
          </li>
        @foreach($menus as $menu)
          <li class="{{ $menu->hasParent!=null?'menu-has-children':'' }} ">
            <a href="{{ $menu->url==null?'javascript:void(0);':route('page.inforamtion', ['menu' => $menu->url]) }}">{{ $menu->{'name_'.$lang} }}</a>
            @if($menu->hasParent)
            <ul>
                @foreach($menu->submenu as $submenu)
                  <li>
                    <a href="{{ $submenu->url==null?'javascript:void(0);':route('page.inforamtion', ['menu' => $submenu->url]) }}">{{ $submenu->{'name_'.$lang} }}</a>
                    @if($submenu->hasParent)
                      <ul>
                          @foreach($submenu->submenu as $subSubMenu)
                            <li>
                              <a href="{{ $subSubMenu->url==null?'javascript:void(0);':route('page.inforamtion', ['menu' => $subSubMenu->url]) }}">{{ $subSubMenu->{'name_'.$lang} }}</a>
                            </li>
                          @endforeach
                      </ul>
                      @endif
                  </li>
                @endforeach
            </ul>
            @endif
          </li>          
        @endforeach
          <li><a href="{{route('contact')}}"><i class="fa fa-headphones"></i> <span>Contact</span></a></li>
          <li class="menu-has-children">
          <a href="">
            {{ $lang }}
          </a>
            <ul>
              <li><a href="{{ route('locale', ['lang' => 'ru']) }}">Ру</a></li>
              <li><a href="{{ route('locale', ['lang' => 'uz']) }}">Uz</a></li>
              <li><a href="{{ route('locale', ['lang' => 'cyrl']) }}">Ўз</a></li>
              <li><a href="{{ route('locale', ['lang' => 'en']) }}">Eng</a></li>
            </ul>
          </li>
          <li ><a href="{{asset('enter_login')}}" ><i class="fa fa-sign-in"></i> <span>Kirish</span></a></li>
          <li><a href="{{asset('registeration')}}"><i class="fa fa-user"></i> <span>Ro'yxatdan o'tish</span></a></li>
        
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>