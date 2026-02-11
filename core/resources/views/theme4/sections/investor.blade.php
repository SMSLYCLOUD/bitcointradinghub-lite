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

<section class="investor-section sp_pt_120 sp_pb_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title display-4 fw-bold text-gradient">{{ @$investor->data->title }}</h2>
                </div>
            </div>
        </div>
        <div class="investor-slider mt-5">
            @foreach ($topInvestor as $top)
                <div class="single-slide">
                    <div class="investor-item aurora-card p-4 mx-2 border-white-10 rounded-3xl text-center h-100 d-flex flex-column align-items-center justify-content-center">
                        <div class="investor-thumb mb-4 p-1 rounded-circle bg-gradient-aurora position-relative" style="width: 100px; height: 100px;">
                            <img src="{{ getFile('user', @$top->image) }}" alt="image" class="w-100 h-100 rounded-circle bg-dark" style="object-fit: cover; border: 3px solid #0A0A14;">
                        </div>
                        <div class="investor-content">
                            <h4 class="name text-white fw-bold mb-2">{{$top->full_name}}</h4>
                            <p class="mt-2 text-secondary small text-uppercase">{{__('Invest Amount')}}</p>
                            <h5 class="site-color text-gradient display-6 fw-bold tabular-nums">{{number_format($top->payments()->where('payment_status',1)->sum('amount'),2) .' '. $general->site_currency}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
