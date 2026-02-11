@php
$content = content('testimonial.content');
$elements = element('testimonial.element');

@endphp

<section class="testimonial-section sp_pt_120 sp_pb_120 obsidian-section">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title">{{ __(@$content->data->title) }}</h2>
            </div>
          </div>
        </div>

        <div class="testimonial-slider mt-5">
            @forelse ($elements as $element)
                <div class="single-slide">
                    <div class="testimonial-item obsidian-card p-4 mx-2 rounded-0 border border-gold h-100">
                        <div class="mb-4">
                             <i class="fas fa-quote-left fa-3x text-gold opacity-25"></i>
                        </div>
                        <ul class="list-unstyled d-flex text-gold mb-3 p-0">
                            <li><i class="fas fa-star fa-sm"></i></li>
                            <li><i class="fas fa-star fa-sm"></i></li>
                            <li><i class="fas fa-star fa-sm"></i></li>
                            <li><i class="fas fa-star fa-sm"></i></li>
                            <li><i class="fas fa-star fa-sm"></i></li>
                        </ul>
                        <p class="testimonial-details text-secondary mb-4">{{ @$element->data->answer }}</p>
                        <div class="testimonial-client d-flex align-items-center border-top border-secondary pt-4">
                            <div class="thumb me-3">
                                <img src="{{ getFile('testimonial', @$element->data->image) }}" alt="image" class="rounded-circle border border-gold" style="width: 50px; height: 50px; filter: grayscale(100%); object-fit: cover;">
                            </div>
                            <div class="content">
                                <h5 class="name text-white fw-bold mb-0 text-uppercase" style="letter-spacing: 1px;">{{ @$element->data->client_name }}</h5>
                                <p class="small text-secondary mb-0 mt-1">{{ @$element->data->designation }}</p>
                            </div>
                        </div>
                    </div><!-- testimonial-item end -->
                </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
