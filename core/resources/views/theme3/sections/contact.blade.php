@php
$content = content('contact.content');
@endphp

<section class="sp_pt_100 sp_pb_100 obsidian-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title">{{ __(@$content->data->title) }}</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <form action="{{ route('contact') }}" method="post" role="form" class="php obsidian-card p-5 border border-gold rounded-0">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-4">
                            <label class="text-secondary text-uppercase small mb-2" style="font-size: 11px; letter-spacing: 1px;">{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control obsidian-card border-secondary text-white rounded-0 p-3" id="name" placeholder="{{ __('Your Name') }}"
                                required>
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label class="text-secondary text-uppercase small mb-2" style="font-size: 11px; letter-spacing: 1px;">{{ __('Email') }}</label>
                            <input type="email" class="form-control obsidian-card border-secondary text-white rounded-0 p-3" name="email" id="email" placeholder="{{ __('Your Email') }}"
                                required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="text-secondary text-uppercase small mb-2" style="font-size: 11px; letter-spacing: 1px;">{{ __('Subject') }}</label>
                        <input type="text" class="form-control obsidian-card border-secondary text-white rounded-0 p-3" name="subject" id="subject" placeholder="{{ __('Subject') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label class="text-secondary text-uppercase small mb-2" style="font-size: 11px; letter-spacing: 1px;">{{ __('Message') }}</label>
                        <textarea class="form-control obsidian-card border-secondary text-white rounded-0 p-3" name="message" rows="5" placeholder="{{ __('Message') }}" required></textarea>
                    </div>

                    <div class="mt-3">
                        <button class="btn main-btn w-100 bg-gold text-black rounded-0 text-uppercase fw-bold p-3" type="submit">{{ __('Send Message') }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row gy-4 justify-content-center mt-5">
            <div class="col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="contact-item text-center obsidian-card p-4 border border-gold h-100 rounded-0">
                    <div class="icon mb-3">
                        <i class="fas fa-envelope text-gold fa-2x"></i>
                    </div>
                    <div class="content">
                        <h5 class="title text-white fw-bold mb-2">{{ __('Chat to support') }}</h5>
                        <p class="caption text-secondary mb-2">{{ __('Speak to our friendly team') }}</p>
                        <p class="mt-2"><a href="mailto:{{ __(@$content->data->email) }}" class="text-gold">{{ __(@$content->data->email) }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="contact-item text-center obsidian-card p-4 border border-gold h-100 rounded-0">
                    <div class="icon mb-3">
                        <i class="fas fa-map-marked-alt text-gold fa-2x"></i>
                    </div>
                    <div class="content">
                        <h5 class="title text-white fw-bold mb-2">{{ __('Visit us') }}</h5>
                        <p class="caption text-secondary mb-2">{{ __('Visit our office HQ') }}</p>
                        <p class="mt-2 text-white">{{ __(@$content->data->location) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                <div class="contact-item text-center obsidian-card p-4 border border-gold h-100 rounded-0">
                    <div class="icon mb-3">
                        <i class="fas fa-phone text-gold fa-2x"></i>
                    </div>
                    <div class="content">
                        <h5 class="title text-white fw-bold mb-2">{{ __('Call us') }}</h5>
                        <p class="caption text-secondary mb-2">{{ __('Mon-Fri from 9am to 5pm') }}</p>
                        <p class="mt-2"><a href="tel:{{ __(@$content->data->phone) }}" class="text-gold">{{ __(@$content->data->phone) }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->

<div class="map-area">
    <iframe class="map w-100 grayscale" src="{{ @$general->map_link }}" frameborder="0" allowfullscreen style="filter: grayscale(100%) invert(100%); height: 400px;"></iframe>
</div>
