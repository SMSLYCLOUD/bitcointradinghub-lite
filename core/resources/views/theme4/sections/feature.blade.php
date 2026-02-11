@php
$content = content('feature.content');
$elements = element('feature.element');
@endphp
    <section class="benefit-section sp_pt_120 sp_pb_120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                        <h2 class="sp_site_title display-4 fw-bold text-gradient">{{ __(@$content->data->title) }}</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 mt-4">
                @foreach ($elements as $element)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                    <div class="benefit-item aurora-card p-5 rounded-3xl h-100 position-relative overflow-hidden" style="transition: all 0.3s;">
                        <div class="benefit-icon mb-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px; background: var(--aurora-gradient);">
                            <i class="{{ @$element->data->card_icon }} text-white"></i>
                        </div>
                        <div class="benefit-content">
                            <h4 class="title text-primary fw-bold mb-3">{{ __(@$element->data->card_title) }}</h4>
                            <p class="text-secondary mb-0">{{ __(@$element->data->card_description) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @push('style')
    <style>
        .benefit-item:hover {
            transform: translateY(-4px);
            border-color: var(--aurora-cyan);
            box-shadow: 0 10px 30px -10px rgba(6, 182, 212, 0.3);
        }
    </style>
    @endpush
