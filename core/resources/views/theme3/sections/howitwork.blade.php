@php
$content = content('howitwork.content');
$elements = element('howitwork.element')->take(8);
@endphp

    <section class="work-section sp_pt_120 sp_pb_120 obsidian-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title">{{ __(@$content->data->title) }}</h2>
            </div>
          </div>
        </div>

        <div class="row mt-5 position-relative">
          <div class="d-none d-lg-block position-absolute start-50 top-0 bottom-0 bg-gold translate-middle-x" style="width: 1px; opacity: 0.3;"></div>

          @foreach ($elements as $element)
          <div class="col-lg-12 mb-5 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
              <div class="row align-items-center justify-content-center">
                  <!-- Content Column -->
                  <div class="col-lg-5 {{ $loop->iteration % 2 != 0 ? 'order-lg-1 text-lg-end' : 'order-lg-3 text-lg-start' }} text-center">
                      <div class="work-content">
                          <h4 class="title text-platinum fw-bold mb-3">{{ __(@$element->data->title) }}</h4>
                          <p class="mt-2 text-secondary"><?= clean($element->data->short_description) ?></p>
                      </div>
                  </div>

                  <!-- Number Column -->
                  <div class="col-lg-2 order-lg-2 text-center position-relative mb-4 mb-lg-0">
                      <div class="work-number text-gold" style="font-size: 80px; font-weight: 100; line-height: 1; background: var(--obsidian-bg);">
                          {{ $loop->iteration }}
                      </div>
                  </div>

                  <!-- Empty Column -->
                  <div class="col-lg-5 {{ $loop->iteration % 2 != 0 ? 'order-lg-3' : 'order-lg-1' }} d-none d-lg-block"></div>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
