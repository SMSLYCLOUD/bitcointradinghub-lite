@php
$content = content('contact.content');
$contentlink = content('footer.content');
$footersociallink = element('footer.element');
$serviceElements = element('service.element');

@endphp

<footer class="footer-premium text-muted">
    <div class="container">
        <div class="row gy-5 align-items-center justify-content-between">

            <div class="col-lg-3 text-center text-lg-start">
                <a href="{{ route('home') }}" class="d-inline-block mb-4">
                    @if (@$general->logo)
                        <img src="{{ getFile('logo', @$general->logo) }}" alt="logo" style="max-height: 40px;">
                    @else
                        <span class="fs-4 fw-bold text-dark">{{ @$general->sitename }}</span>
                    @endif
                </a>
                <p class="small mb-4">Empowering your financial future with premium investment solutions.</p>

                <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                    @forelse ($footersociallink as $item)
                        <a href="{{ __(@$item->data->social_link) }}" target="_blank" class="text-muted hover-text-primary fs-5">
                            <i class="{{ @$item->data->social_icon }}"></i>
                        </a>
                    @empty
                    @endforelse
                </div>
            </div>

            <div class="col-lg-5">
                <div class="row g-4 justify-content-center justify-content-lg-end">
                    <div class="col-6 col-md-4">
                         <h6 class="text-dark fw-bold mb-3">Company</h6>
                         <ul class="list-unstyled d-grid gap-2 small">
                             <li><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                             <li><a href="#about" class="text-muted text-decoration-none">About Us</a></li>
                             @forelse ($pages as $page)
                                <li><a href="{{ route('pages', $page->slug) }}" class="text-muted text-decoration-none">{{ __($page->name) }}</a></li>
                            @empty
                            @endforelse
                         </ul>
                    </div>
                    <div class="col-6 col-md-4">
                         <h6 class="text-dark fw-bold mb-3">Support</h6>
                         <ul class="list-unstyled d-grid gap-2 small">
                             <li><a href="mailto:{{ __(@$content->data->email) }}" class="text-muted text-decoration-none">{{ __(@$content->data->email) }}</a></li>
                             <li><a href="tel:{{ __(@$content->data->phone) }}" class="text-muted text-decoration-none">{{ __(@$content->data->phone) }}</a></li>
                         </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-top mt-5 pt-4 text-center small">
             <p class="mb-0">
                @if (@$general->copyright)
                    {{ __(@$general->copyright) }}
                @else
                    &copy; {{ date('Y') }} {{ @$general->sitename }}. All rights reserved.
                @endif
            </p>
        </div>
    </div>
</footer>
