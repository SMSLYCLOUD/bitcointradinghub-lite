@php
$content = content('testimonial.content');
$elements = element('testimonial.element');

@endphp

<section class="testimonial-section sp_pt_120 sp_pb_120">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title display-4 fw-bold text-gradient">{{ __(@$content->data->title) }}</h2>
            </div>
          </div>
        </div>

        <div class="testimonial-slider mt-5">
            @forelse ($elements as $element)
                <div class="single-slide">
                    <div class="testimonial-item aurora-card p-4 mx-2 rounded-3xl h-100 position-relative overflow-hidden" style="border-radius: 20px;">
                        <ul class="list-unstyled d-flex mb-3 p-0 gap-1">
                            <li><i class="fas fa-star text-warning fa-sm" style="color: #FBBF24;"></i></li> <!-- fallback color if gradient fails on icon -->
                            <li><i class="fas fa-star text-warning fa-sm" style="color: #FBBF24;"></i></li>
                            <li><i class="fas fa-star text-warning fa-sm" style="color: #FBBF24;"></i></li>
                            <li><i class="fas fa-star text-warning fa-sm" style="color: #FBBF24;"></i></li>
                            <li><i class="fas fa-star text-warning fa-sm" style="color: #FBBF24;"></i></li>
                        </ul>
                        <p class="testimonial-details text-secondary fst-italic mb-4">"{{ @$element->data->answer }}"</p>
                        <div class="testimonial-client d-flex align-items-center border-top border-white-10 pt-4">
                            <div class="thumb me-3 p-1 rounded-circle bg-gradient-aurora position-relative" style="width: 56px; height: 56px;">
                                <img src="{{ getFile('testimonial', @$element->data->image) }}" alt="image" class="rounded-circle w-100 h-100 bg-dark" style="object-fit: cover; border: 3px solid #0A0A14;">
                            </div>
                            <div class="content">
                                <h5 class="name text-white fw-bold mb-0">{{ @$element->data->client_name }}</h5>
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

@push('style')
<style>
    .border-white-10 {
        border-color: rgba(255,255,255,0.1) !important;
    }
    /* Gradient text for stars requires special handling, falling back to yellow/gold or custom svg.
       Using text-warning above for simplicity as font-awesome icons are fonts. */
</style>
@endpush
