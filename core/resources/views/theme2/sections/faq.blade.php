@php
$content = content('faq.content');
$elements = element('faq.element');
@endphp

<section id="faq" class="section-premium">
    <div class="container">
        <div class="text-center mb-5 animate-fade-up">
            <h2 class="display-4 fw-bold">{{ @$content->data->title }}</h2>
             <p class="text-muted fs-5">Common questions about our services</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    @foreach ($elements as $key => $item)
                        <div class="premium-card mb-3 p-0 overflow-hidden">
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="heading{{ $key }}">
                                    <button class="accordion-button collapsed fw-bold text-dark bg-white shadow-none py-4 px-4 fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                        {{ @$item->data->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-muted px-4 pb-4 pt-0">
                                        {{ @$item->data->answer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
