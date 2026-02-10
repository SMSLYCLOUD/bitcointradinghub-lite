@php
$content = content('howitwork.content');
$elements = element('howitwork.element')->take(3);
@endphp

<section id="how-start" class="section-premium">
    <div class="container">
        <div class="text-center mb-5 animate-fade-up">
            <h2 class="display-4 fw-bold">{{ __(@$content->data->title) }}</h2>
             <p class="text-muted fs-5">Get started in three simple steps</p>
        </div>

        <div class="row gy-4">
            @foreach ($elements as $key => $element)
                <div class="col-lg-4">
                    <div class="premium-card text-center h-100 position-relative">
                        <div class="position-absolute top-0 start-50 translate-middle badge bg-warning rounded-pill fs-6 px-3 py-2 border border-white">
                            Step {{ $key + 1 }}
                        </div>
                        <div class="mt-4 mb-3 d-inline-block p-4 rounded-circle bg-light text-warning fs-1">
                             <i class="las la-wallet"></i>
                        </div>
                        <h3 class="mb-3">{{ __(@$element->data->title) }}</h3>
                        <p class="text-muted">{!! clean($element->data->short_description) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
