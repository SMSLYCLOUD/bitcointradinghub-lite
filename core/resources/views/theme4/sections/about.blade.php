   @php
       $content = content('about.content');
   @endphp

   <!-- about section start -->
   <section class="about-section sp_pt_120 sp_pb_120 overflow-hidden">
      <div class="container">
        <div class="row gy-5 align-items-center justify-content-between">
          <div class="col-lg-6 col-md-10 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="about-thumb aurora-card p-3 rounded-3xl border-gradient-box position-relative">
              <img src="{{ getFile('about', @$content->data->image) }}" alt="image" class="w-100 h-100 rounded-2xl" style="object-fit: cover;">
            </div>
          </div>
          <div class="col-lg-6 ps-xl-5 p-lg-4 about-content wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <h2 class="sp_site_title display-4 fw-bold text-gradient mb-4">{{ __(@$content->data->title) }}</h2>
            <div class="fs-lg mt-3 text-secondary lh-lg">
                <?php
                    echo clean(@$content->data->description);
                ?>
            </div>
            <a href="{{ __(@$content->data->button_text_link) }}" class="btn main-btn mt-5 px-5 py-3 rounded-full border border-white-10 text-white fw-bold hover-gradient-bg" style="background: rgba(255,255,255,0.05);"><span>{{ __(@$content->data->button_text) }}</span></a>
          </div>
        </div>
      </div>
    </section>

    @push('style')
    <style>
        .border-gradient-box::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: 26px;
            padding: 2px;
            background: var(--aurora-gradient);
            -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
            z-index: -1;
        }
        .hover-gradient-bg:hover {
            background: var(--aurora-gradient) !important;
            border-color: transparent !important;
            box-shadow: 0 0 20px rgba(124, 58, 237, 0.4);
        }
        .border-white-10 {
            border-color: rgba(255,255,255,0.1) !important;
        }
    </style>
    @endpush
