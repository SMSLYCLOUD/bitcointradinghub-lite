@php
$content = content('contact.content');
$contentlink = content('footer.content');
$footersociallink = element('footer.element');
$serviceElements = element('service.element');

@endphp

<footer class="footer-section aurora-footer" style="background: #0A0A14;">
    <div class="footer-top p-0 w-100" style="height: 2px; background: var(--aurora-gradient);"></div>

    <div class="footer-middle pt-5 pb-5">
        <div class="container">
            <div class="row gy-4">
                <!-- Col 1: Logo & Social -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('home') }}" class="footer-logo mb-4 d-block">
                        @if (@$general->logo)
                            <img class="img-fluid"
                                src="{{ getFile('logo', @$general->whitelogo) }}" width="150" alt="pp">
                        @else
                            {{ __('No Logo Found') }}
                        @endif
                    </a>
                    <p class="text-secondary mb-4 small">{{ __(@$contentlink->data->description) }}</p>
                    <ul class="social-links d-flex gap-2 list-unstyled p-0 m-0">
                        @forelse ($footersociallink as $item)
                            <li>
                                <a href="{{ __(@$item->data->social_link) }}" target="_blank"
                                    class="d-flex align-items-center justify-content-center aurora-card rounded-circle text-white border-0"
                                    style="width: 40px; height: 40px; transition: 0.3s;">
                                    <i class="{{ @$item->data->social_icon }}"></i>
                                </a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>

                <!-- Col 2: Useful Links -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white fw-bold mb-4">{{ __('Useful Links') }}</h5>
                    <ul class="footer-links list-unstyled p-0 m-0">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-secondary text-decoration-none hover-gradient">{{ __('Home') }}</a></li>
                        <li class="mb-2"><a href="{{ route('investmentplan') }}" class="text-secondary text-decoration-none hover-gradient">{{ __('Investment Plans') }}</a></li>
                        <li class="mb-2"><a href="{{ route('allblog') }}" class="text-secondary text-decoration-none hover-gradient">{{ __('Blog') }}</a></li>
                    </ul>
                </div>

                <!-- Col 3: Pages -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white fw-bold mb-4">{{ __('Company') }}</h5>
                    <ul class="footer-links list-unstyled p-0 m-0">
                        @forelse ($pages as $page)
                            <li class="mb-2"><a href="{{ route('pages', $page->slug) }}" class="text-secondary text-decoration-none hover-gradient">{{ __($page->name) }}</a></li>
                        @empty
                        @endforelse
                    </ul>
                </div>

                <!-- Col 4: Contact -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white fw-bold mb-4">{{ __('Contact Us') }}</h5>
                    <ul class="footer-contact list-unstyled p-0 m-0">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-envelope text-gradient me-3 mt-1"></i>
                            <span class="text-secondary small">{{ __(@$content->data->email) }}</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-phone text-gradient me-3 mt-1"></i>
                            <span class="text-secondary small">{{ __(@$content->data->phone) }}</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-map-marker-alt text-gradient me-3 mt-1"></i>
                            <span class="text-secondary small">{{ __(@$content->data->location) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom py-3 border-top border-secondary" style="border-color: var(--aurora-card-border) !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="mb-0 text-secondary small">
                        @if (@$general->copyright)
                            {{ __(@$general->copyright) }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('style')
<style>
    .hover-gradient:hover {
        background: var(--aurora-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .social-links a:hover {
        background: var(--aurora-gradient) !important;
        transform: translateY(-3px);
    }
</style>
@endpush
