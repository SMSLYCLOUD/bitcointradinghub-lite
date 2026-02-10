@php
   $content = content('about.content');
@endphp

<section id="about" class="section-premium">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 d-none d-lg-block animate-fade-up">
                <div class="premium-card p-0 overflow-hidden border-0 shadow-lg">
                    <img src="{{ getFile('about', @$content->data->image) }}" alt="About Us" class="img-fluid w-100 object-fit-cover" style="min-height: 400px;">
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5 animate-fade-up" style="animation-delay: 0.2s;">
                <h2 class="display-5 fw-bold mb-4">{{ __(@$content->data->title) }}</h2>
                <div class="text-muted fs-5 mb-5 leading-relaxed">
                    <?php
                    echo clean(@$content->data->description);
                    ?>
                </div>
                <a href="{{ __(@$content->data->button_text_link) }}" class="btn-premium">{{ __(@$content->data->button_text) }}</a>
            </div>
        </div>
    </div>
</section>
