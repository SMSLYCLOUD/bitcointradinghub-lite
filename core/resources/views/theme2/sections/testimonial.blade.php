@php
$content = content('testimonial.content');
$elements = element('testimonial.element');
@endphp

<section id="testimonial" class="section-premium bg-light">
    <div class="container">
        <div class="text-center mb-5 animate-fade-up">
            <h2 class="display-4 fw-bold">{{ __(@$content->data->title) }}</h2>
             <p class="text-muted fs-5">{{ __(@$content->data->sub_title) }}</p>
        </div>

        <div class="testimonial-slider">
             @forelse ($elements as $element)
                <div class="px-3">
                    <div class="premium-card bg-white h-100 p-4 border-0 shadow-sm text-center">
                        <div class="mb-3 text-warning fs-5">
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                        </div>
                        <p class="mb-4 text-muted fst-italic">"{{ @$element->data->answer }}"</p>

                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <img src="{{ getFile('testimonial', @$element->data->image) }}" alt="client" class="rounded-circle object-fit-cover" style="width: 50px; height: 50px;">
                            <div class="text-start">
                                <h6 class="mb-0 fw-bold">{{ @$element->data->client_name }}</h6>
                                <span class="small text-muted">{{ @$element->data->designation }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
