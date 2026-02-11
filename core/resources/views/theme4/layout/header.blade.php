@php
    $contact = content('contact.content');
    $footersociallink = element('footer.element');
@endphp  
  
  <!-- header-section start  -->
  <header class="header fixed-top p-3" style="transition: all 0.3s;">
    <div class="container-fluid">
        <div class="header-bottom aurora-card rounded-2xl px-4 py-2">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">

                <a class="site-logo site-title" href="{{ route('home') }}">
                    @if (@$general->logo)
                        <img class="img-fluid rounded sm-device-img text-align" src="{{ getFile('logo', @$general->logo) }}" width="100%" alt="pp">
                    @else
                        {{ __('No Logo Found') }}
                    @endif
                </a>
                <button class="navbar-toggler ms-auto text-white" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse mt-lg-0 mt-3" id="mainNavbar">
                    <ul class="nav navbar-nav sp_main_menu mx-auto text-center">
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a class="nav-link text-white" href="{{ route('home') }}">{{ __('Home') }}</a></li>

                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('investmentplan') }}">{{ __('Investment Plans') }}</a>
                        </li>

                        @forelse ($pages as $page)
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('pages', $page->slug) }}">{{ __($page->name) }}</a>
                        </li>
                        @empty
                        @endforelse

                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('allblog') }}">{{ __('Blog') }}</a></li>

                    </ul>
                    <div class="navbar-action d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                        <select class="changeLang me-3 bg-transparent text-white border-0" aria-label="Default select example">
                            @foreach ($language_top as $top)
                            <option value="{{ $top->short_code }}" class="text-dark"
                                {{ session('locale') == $top->short_code ? 'selected' : '' }}>
                                {{ __(ucwords($top->name)) }}
                            </option>
                            @endforeach
                        </select>
                        @if (Auth::user())
                            <a class="btn main-btn btn-sm" href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                        @else
                            <a class="text-white me-3 text-decoration-none" href="{{ route('user.login') }}">{{ __('Login') }}</a>
                            <a href="{{route('user.register')}}" class="btn main-btn btn-sm">{{ __('Sign up') }}</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
  </header>
  <!-- header-section end  -->
