@php
$investor = content('investor.content');

$topInvestor = App\Models\Payment::where('payment_status',1)->groupBy('user_id')
    ->selectRaw('sum(amount) as sum, user_id')
    ->orderBy('sum', 'desc')
    ->get()
    ->map(function ($a) {
        return App\Models\User::find($a->user_id);
    });

@endphp

<section class="investor-section sp_pt_120 sp_pb_120 obsidian-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title">{{ @$investor->data->title }}</h2>
                </div>
            </div>
        </div>
        <div class="investor-slider mt-5">
            @foreach ($topInvestor as $top)
                <div class="single-slide">
                    <div class="investor-item obsidian-card p-4 mx-2 border border-gold rounded-0 text-center">
                        <div class="investor-thumb mb-4 mx-auto" style="width: 100px; height: 100px;">
                            <div class="investor-thumb-inner w-100 h-100 rounded-circle overflow-hidden border border-secondary">
                                <img src="{{ getFile('user', @$top->image) }}" alt="image" class="w-100 h-100" style="object-fit: cover; filter: grayscale(100%);">
                            </div>
                        </div>
                        <div class="investor-content">
                            <h4 class="name text-white fw-bold mb-2 text-uppercase">{{$top->full_name}}</h4>
                            <p class="mt-2 text-secondary small">{{__('Invest Amount')}}</p>
                            <h5 class="site-color text-gold display-6 fw-bold tabular-nums">{{number_format($top->payments()->where('payment_status',1)->sum('amount'),2) .' '. $general->site_currency}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
