@php
$content = content('blog.content');
$blogs = element('blog.element')->take(2);
@endphp

<section class="blog-section sp_pt_120 sp_pb_120">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title display-4 fw-bold text-gradient">{{ __(@$content->data->title) }}</h2>
            </div>
          </div>
        </div>
        <div class="row gy-4 mt-4">
            @foreach ($blogs as $blog)
                @php
                    $comment = App\Models\Comment::where('blog_id', $blog->id)->count();
                @endphp
                <div class="col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                    <div class="blog-item aurora-card rounded-3xl overflow-hidden h-100 d-flex flex-column border-white-10">
                        <div class="blog-thumb w-100 position-relative" style="height: 300px;">
                            <img src="{{ getFile('blog', @$blog->data->image) }}" alt="blog thumb" class="w-100 h-100" style="object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(15,15,26,0.9), transparent);">
                                <ul class="blog-meta list-inline mb-0 text-white-50 small">
                                    <li class="list-inline-item me-3"><i class="fas fa-clock text-primary me-1"></i> {{ @$blog->created_at->diffforhumans() }}</li>
                                    <li class="list-inline-item"><i class="fas fa-comment text-primary me-1"></i> {{ $comment }} {{ __('comments') }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-content p-4 flex-grow-1 d-flex flex-column">
                            <h4 class="blog-title mb-3"><a href="{{ route('blog', [@$blog->id, Str::slug(@$blog->data->title)]) }}" class="text-white fw-bold text-decoration-none hover-gradient">{{ @$blog->data->title }}</a></h4>
                            <p class="text-secondary mb-4 small flex-grow-1">{{ Str::limit(strip_tags(@$blog->data->short_description), 100) }}</p>
                            
                            <a href="{{ route('blog', [@$blog->id, Str::slug(@$blog->data->title)]) }}" class="btn text-primary fw-bold p-0 text-decoration-none d-inline-flex align-items-center">
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
