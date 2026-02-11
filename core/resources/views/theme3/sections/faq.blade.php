@php
$content = content('faq.content');
$elements = element('faq.element');
@endphp

<section class="faq-section sp_pt_120 sp_pb_120 obsidian-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title">{{ @$content->data->title }}</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center g-3 mt-4">
            <div class="col-md-10">
                <div class="accordion" id="accordionExample">
                    @foreach ($elements as $item)
                        <div class="accordion-item obsidian-card mb-3 border-0 rounded-0 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.{{ $loop->iteration }}s">
                            <h2 class="accordion-header" id="heading-{{$loop->iteration}}">
                                <button class="accordion-button collapsed bg-transparent text-white shadow-none rounded-0 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false"
                                    aria-controls="collapse{{ $loop->iteration }}">
                                    <span class="fw-bold">{{ @$item->data->question }}</span>
                                    <i class="fas fa-plus text-gold"></i>
                                </button>
                            </h2>
                            <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{$loop->iteration}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-secondary border-top border-secondary">
                                    <p class="mb-0"> {{ @$item->data->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@push('style')
<style>
    .accordion-button::after { display: none; }
    .accordion-button:not(.collapsed) {
        background-color: var(--obsidian-surface);
        box-shadow: none;
        color: var(--gold);
        border-left: 3px solid var(--gold);
    }
    .accordion-button:not(.collapsed) .fa-plus:before {
        content: "\f068";
    }
</style>
@endpush
