@php
$content = content('contact.content');
@endphp

<section class="sp_pt_100 sp_pb_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title display-4 fw-bold text-gradient">{{ __(@$content->data->title) }}</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <form action="{{ route('contact') }}" method="post" role="form" class="php aurora-card p-5 rounded-3xl border-white-10">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-4">
                            <label class="text-secondary small text-uppercase fw-bold mb-2">{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control aurora-card border-white-10 rounded-xl px-4 py-3 text-white focus-gradient" id="name" placeholder="{{ __('Your Name') }}"
                                required>
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label class="text-secondary small text-uppercase fw-bold mb-2">{{ __('Email') }}</label>
                            <input type="email" class="form-control aurora-card border-white-10 rounded-xl px-4 py-3 text-white focus-gradient" name="email" id="email" placeholder="{{ __('Your Email') }}"
                                required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="text-secondary small text-uppercase fw-bold mb-2">{{ __('Subject') }}</label>
                        <input type="text" class="form-control aurora-card border-white-10 rounded-xl px-4 py-3 text-white focus-gradient" name="subject" id="subject" placeholder="{{ __('Subject') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label class="text-secondary small text-uppercase fw-bold mb-2">{{ __('Message') }}</label>
                        <textarea class="form-control aurora-card border-white-10 rounded-xl px-4 py-3 text-white focus-gradient" name="message" rows="5" placeholder="{{ __('Message') }}" required></textarea>
                    </div>

                    <div class="mt-3 text-center">
                        <button class="btn main-btn w-100 rounded-full py-3 fw-bold bg-gradient-aurora text-white border-0" type="submit">{{ __('Send Message') }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row gy-4 justify-content-center mt-5">
            <div class="col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="contact-item text-center aurora-card p-4 rounded-3xl h-100">
                    <div class="icon mb-3 d-flex align-items-center justify-content-center mx-auto rounded-circle bg-gradient-aurora" style="width: 56px; height: 56px;">
                        <i class="fas fa-envelope text-white fa-lg"></i>
                    </div>
                    <div class="content">
                        <h5 class="title text-white fw-bold mb-2">{{ __('Chat to support') }}</h5>
                        <p class="caption text-secondary small mb-2">{{ __('Speak to our friendly team') }}</p>
                        <p class="mt-2"><a href="mailto:{{ __(@$content->data->email) }}" class="text-primary">{{ __(@$content->data->email) }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="contact-item text-center aurora-card p-4 rounded-3xl h-100">
                    <div class="icon mb-3 d-flex align-items-center justify-content-center mx-auto rounded-circle bg-gradient-aurora" style="width: 56px; height: 56px;">
                        <i class="fas fa-map-marked-alt text-white fa-lg"></i>
                    </div>
                    <div class="content">
                        <h5 class="title text-white fw-bold mb-2">{{ __('Visit us') }}</h5>
                        <p class="caption text-secondary small mb-2">{{ __('Visit our office HQ') }}</p>
                        <p class="mt-2 text-white">{{ __(@$content->data->location) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                <div class="contact-item text-center aurora-card p-4 rounded-3xl h-100">
                    <div class="icon mb-3 d-flex align-items-center justify-content-center mx-auto rounded-circle bg-gradient-aurora" style="width: 56px; height: 56px;">
                        <i class="fas fa-phone text-white fa-lg"></i>
                    </div>
                    <div class="content">
                        <h5 class="title text-white fw-bold mb-2">{{ __('Call us') }}</h5>
                        <p class="caption text-secondary small mb-2">{{ __('Mon-Fri from 9am to 5pm') }}</p>
                        <p class="mt-2"><a href="tel:{{ __(@$content->data->phone) }}" class="text-primary">{{ __(@$content->data->phone) }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->

<div class="map-area">
    <iframe class="map w-100 grayscale" src="{{ @$general->map_link }}" frameborder="0" allowfullscreen style="filter: grayscale(100%) invert(100%); height: 400px; opacity: 0.5;"></iframe>
</div>

@push('style')
<style>
    .focus-gradient:focus {
        border-color: var(--aurora-cyan) !important;
        box-shadow: 0 0 0 0.25rem rgba(6, 182, 212, 0.25);
    }
</style>
@endpush
