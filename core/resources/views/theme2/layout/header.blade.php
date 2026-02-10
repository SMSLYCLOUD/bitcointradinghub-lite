@php
    $contact = content('contact.content');
    $footersociallink = element('footer.element');
@endphp

<header class="header" style="position: absolute; width: 100%; z-index: 999;">
  <nav class="premium-nav navbar navbar-expand-xl">
        <a class="site-logo" href="{{ route('home') }}">
            <img src="{{ getFile('logo', @$general->logo) }}" alt="logo" style="max-height: 40px;">
        </a>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars text-dark"></i>
        </button>

        <div class="collapse navbar-collapse mt-lg-0 mt-3 justify-content-end" id="mainNavbar">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item"><a href="#banner" class="nav-link">{{__('Home')}}</a></li>
            <li class="nav-item"><a href="#about" class="nav-link">{{__('About')}}</a></li>
            <li class="nav-item"><a href="#investment" class="nav-link">{{__('Plan')}}</a></li>
            <li class="nav-item"><a href="#how-start" class="nav-link">{{__('How It Works')}}</a></li>
            <li class="nav-item"><a href="#faq" class="nav-link">{{__('FAQ')}}</a></li>

            <li class="nav-item ms-lg-3">
              @if (Auth::user())
                  <a href="{{ route('user.dashboard') }}" class="btn-premium">{{ __('Dashboard') }}</a>
              @else
                  <a href="{{ route('user.login') }}" class="btn-premium">{{ __('Login') }}</a>
              @endif
            </li>
          </ul>
        </div>
  </nav>
</header>
