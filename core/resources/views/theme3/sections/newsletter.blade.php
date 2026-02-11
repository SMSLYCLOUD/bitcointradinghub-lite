@php
$content = content('newsletter.content');
@endphp

<section class="subscribe-section obsidian-section position-relative overflow-hidden py-5">
    <div class="position-absolute top-50 start-50 translate-middle w-100 h-100" style="background: radial-gradient(circle, rgba(201,168,76,0.15) 0%, rgba(10,10,15,0) 70%); pointer-events: none;"></div>

    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title text-uppercase mb-3">{{ __(@$content->data->title) }}</h2>
                    <p class="text-secondary">{{ __(@$content->data->short_description) }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-7">
                <form class="subscribe-form d-flex wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s" id="subscribe" method="POST">
                    @csrf
                    <input type="text" name="email" class="form-control subscribe-email bg-transparent border-gold text-white rounded-0 me-0 p-3"
                        placeholder="{{ __('Enter email here') }}">
                    <button class="btn main-btn bg-gold text-black rounded-0 border-0 px-4 fw-bold text-uppercase">{{ __('Subscribe') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>
