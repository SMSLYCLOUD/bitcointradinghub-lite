@php
$content = content('howitwork.content');
$elements = element('howitwork.element')->take(8);
@endphp

    <section class="work-section sp_pt_120 sp_pb_120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title display-4 fw-bold text-gradient">{{ __(@$content->data->title) }}</h2>
            </div>
          </div>
        </div>

        <div class="row mt-5 position-relative">
            <!-- Connecting Line -->
            <div class="d-none d-lg-block position-absolute top-0 start-0 w-100" style="height: 2px; background: var(--aurora-gradient); top: 32px; z-index: 0;"></div>

            @foreach ($elements as $element)
            <div class="col-lg-3 col-md-6 mb-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.{{ $loop->iteration }}s">
                <div class="work-item text-center position-relative z-1">
                    <div class="work-number mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle bg-dark text-white fw-bold fs-4 position-relative border-gradient-circle" style="width: 64px; height: 64px; background: var(--aurora-bg);">
                        {{ $loop->iteration }}
                    </div>
                    <div class="work-content aurora-card p-4 rounded-3xl h-100">
                        <h4 class="title text-primary fw-bold mb-3">{{ __(@$element->data->title) }}</h4>
                        <p class="mt-2 text-secondary small"><?= clean($element->data->short_description) ?></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </section>

    @push('style')
    <style>
        .border-gradient-circle::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: 50%;
            padding: 2px;
            background: var(--aurora-gradient);
            -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }
    </style>
    @endpush
