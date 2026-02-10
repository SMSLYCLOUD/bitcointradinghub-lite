@php
$content = content('feature.content');
$elements = element('feature.element')->take(6);
@endphp

<section id="why-choose" class="section-premium bg-light">
    <div class="container">
        <div class="text-center mb-5 animate-fade-up">
            <h2 class="display-4 fw-bold">{{ __(@$content->data->title) }}</h2>
             <p class="text-muted fs-5">Why leading investors choose our platform</p>
        </div>

        <div class="row gy-4">
            @foreach ($elements as $element)
                <div class="col-lg-4 col-md-6">
                    <div class="premium-card h-100 p-4 border-0 shadow-sm bg-white">
                        <div class="d-flex align-items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="{{ @$element->data->card_icon }} fs-3 text-warning"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-2 fw-bold">{{ __(@$element->data->card_title) }}</h4>
                                <p class="text-muted mb-0">{{ __(@$element->data->card_description) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
