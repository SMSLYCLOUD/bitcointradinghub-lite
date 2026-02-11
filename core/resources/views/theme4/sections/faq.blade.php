@php
$content = content('faq.content');
$elements = element('faq.element');
@endphp

<section class="faq-section sp_pt_120 sp_pb_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title display-4 fw-bold text-gradient">{{ @$content->data->title }}</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center g-3 mt-4">
            <div class="col-md-10">
                <div class="accordion" id="accordionExample">
                    @foreach ($elements as $item)
                        <div class="accordion-item aurora-card mb-3 border-0 rounded-3xl wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.{{ $loop->iteration }}s">
                            <h2 class="accordion-header" id="heading-{{$loop->iteration}}">
                                <button class="accordion-button collapsed bg-transparent text-white shadow-none rounded-3xl d-flex justify-content-between align-items-center p-4" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false"
                                    aria-controls="collapse{{ $loop->iteration }}">
                                    <span class="fw-semibold">{{ @$item->data->question }}</span>
                                    <div class="toggle-icon position-relative d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                                        <i class="fas fa-plus position-absolute" style="color: var(--aurora-purple); transition: all 0.3s;"></i>
                                        <i class="fas fa-minus position-absolute opacity-0" style="color: var(--aurora-cyan); transition: all 0.3s;"></i>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{$loop->iteration}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-secondary ps-5 pb-4 pe-4 pt-0">
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
        background-color: rgba(255,255,255,0.02);
        box-shadow: none;
        border-left: 3px solid var(--aurora-cyan);
    }
    .accordion-button:not(.collapsed) .fa-plus {
        opacity: 0;
        transform: rotate(90deg);
    }
    .accordion-button:not(.collapsed) .fa-minus {
        opacity: 1 !important;
        transform: rotate(0);
    }
</style>
@endpush
