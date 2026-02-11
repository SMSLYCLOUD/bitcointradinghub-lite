@php
$content = content('blog.content');
$blogs = element('blog.element')->take(6);
@endphp

<section class="blog-section sp_pt_120 sp_pb_120 obsidian-section">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title">{{ __(@$content->data->title) }}</h2>
            </div>
          </div>
        </div>
        <div class="row gy-4 mt-4">
            @foreach ($blogs as $blog)
                @php
                    $comment = App\Models\Comment::where('blog_id', $blog->id)->count();
                @endphp
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                    <div class="blog-item obsidian-card h-100 p-0 border border-gold rounded-0 overflow-hidden">
                        <div class="blog-thumb w-100">
                            <img src="{{ getFile('blog', @$blog->data->image) }}" alt="blog thumb" class="w-100 h-100" style="object-fit: cover; height: 250px;">
                        </div>
                        <div class="blog-content p-4">
                            <ul class="blog-meta mb-3 list-inline text-secondary small">
                                <li class="list-inline-item me-3"><i class="fas fa-clock text-gold me-1"></i> {{ @$blog->created_at->diffforhumans() }}</li>
                                <li class="list-inline-item"><i class="fas fa-comment text-gold me-1"></i> {{ $comment }} {{ __('comments') }}</li>
                            </ul>
                            <h4 class="blog-title mb-3"><a href="{{ route('blog', [@$blog->id, Str::slug(@$blog->data->title)]) }}" class="text-white fw-bold text-decoration-none">{{ @$blog->data->title }}</a></h4>
                            <a href="{{ route('blog', [@$blog->id, Str::slug(@$blog->data->title)]) }}" class="blog-btn text-gold text-decoration-none fw-bold text-uppercase" style="letter-spacing: 1px;">
                                <span>{{ __('Read More') }}</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
