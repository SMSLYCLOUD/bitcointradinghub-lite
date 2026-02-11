@php
$content = content('feature.content');
$elements = element('feature.element');
@endphp
    <section class="benefit-section sp_pt_120 sp_pb_120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                        <h2 class="sp_site_title">{{ __(@$content->data->title) }}</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 mt-4">
                @foreach ($elements as $element)
                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="benefit-item obsidian-card h-100 p-4 border-start border-gold rounded-0" style="border-left-width: 4px !important;">
                        <div class="d-flex align-items-start">
                            <div class="benefit-icon me-4">
                                <i class="{{ @$element->data->card_icon }} text-gold fa-2x"></i>
                            </div>
                            <div class="benefit-content">
                                <h4 class="title text-white fw-bold mb-2" style="font-size: 18px;">{{ __(@$element->data->card_title) }}</h4>
                                <p class="text-secondary mb-0">{{ __(@$element->data->card_description) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
