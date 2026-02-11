   @php
       $content = content('about.content');
   @endphp

   <!-- about section start -->
   <section class="about-section sp_pt_120 sp_pb_120 overflow-hidden obsidian-section">
      <div class="container">
        <div class="row gy-5 align-items-center justify-content-between">
          <div class="col-lg-6 col-md-10">
            <div class="about-thumb obsidian-card p-2 border border-gold rounded-0 position-relative">
              <img src="{{ getFile('about', @$content->data->image) }}" alt="image" class="w-100 h-100 d-block">
            </div>
          </div>
          <div class="col-lg-6 ps-xl-5 p-lg-4 about-content wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <h2 class="sp_site_title display-5 fw-bold text-white mb-4">{{ __(@$content->data->title) }}</h2>
            <div class="fs-lg mt-3 text-secondary lh-lg">
                <?php
                    echo clean(@$content->data->description);
                ?>
            </div>
            <a href="{{ __(@$content->data->button_text_link) }}" class="btn main-btn mt-5 bg-transparent text-gold border-gold rounded-0 px-5">{{ __(@$content->data->button_text) }}</a>
          </div>
        </div>
      </div>
    </section>
    <!-- about section end -->
