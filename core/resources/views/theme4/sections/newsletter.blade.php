@php
$content = content('newsletter.content');
@endphp

<section class="subscribe-section position-relative overflow-hidden py-5">
    <div class="position-absolute top-50 start-50 translate-middle w-100 h-100" style="background: radial-gradient(circle at center, rgba(124,58,237,0.15), transparent 70%); pointer-events: none;"></div>

    <div class="container position-relative z-1">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="aurora-card p-5 rounded-3xl text-center shadow-lg border-white-10">
                    <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                        <h2 class="sp_site_title display-5 fw-bold text-gradient mb-3">{{ __(@$content->data->title) }}</h2>
                        <p class="text-secondary">{{ __(@$content->data->short_description) }}</p>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-10">
                            <form class="subscribe-form d-flex p-1 aurora-card rounded-full border border-white-10" id="subscribe" method="POST" style="background: rgba(255,255,255,0.02);">
                                @csrf
                                <input type="text" name="email" class="form-control subscribe-email bg-transparent border-0 text-white rounded-full px-4 shadow-none"
                                    placeholder="{{ __('Enter email here') }}">
                                <button class="btn main-btn bg-gradient-aurora text-white rounded-full px-4 fw-bold border-0">{{ __('Subscribe') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
