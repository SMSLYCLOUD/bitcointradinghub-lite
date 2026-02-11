@php
    $content = content('banner.content');
    $counter = element('banner.element');
@endphp

<section class="hero-premium">
    {{-- To use a custom video (e.g. Elon Musk), upload to: asset/videos/hero.mp4 and change src below --}}
    <video autoplay loop muted playsinline class="hero-video-bg">
        @if(file_exists(public_path('asset/videos/hero.mp4')))
            <source src="{{ asset('asset/videos/hero.mp4') }}" type="video/mp4">
        @else
            <source src="https://videos.pexels.com/video-files/7565738/7565738-uhd_2560_1440_30fps.mp4" type="video/mp4">
        @endif
    </video>
    <div class="hero-overlay"></div>

    <div class="container position-relative z-1">
        <div class="hero-content mx-auto">
            <h1 class="hero-title">{{ __(@$content->data->title) }}</h1>
            <p class="hero-subtitle">{{ __(@$content->data->cta_title) }}</p>

            <div class="hero-actions d-flex justify-content-center gap-3">
                 <a href="{{ __(@$content->data->button_text_link) }}" class="btn-premium">
                    {{ __(@$content->data->button_text) }}
                 </a>
                 <a href="{{ __(@$content->data->button_text_2_link) }}" class="btn-premium-outline">
                    {{ __(@$content->data->button_text_2) }}
                 </a>
            </div>

            <!-- Stats as glass cards floating below -->
            <div class="row mt-5 justify-content-center">
                 @foreach ($counter as $count)
                    <div class="col-md-3 col-6 mb-3">
                        <div class="glass-panel p-3 rounded-4 text-center">
                            <h3 class="mb-1 tabular-nums fs-4 fw-bold">{{ @$count->data->total }}</h3>
                            <p class="mb-0 small text-muted">{{ __(@$count->data->title) }}</p>
                        </div>
                    </div>
                 @endforeach
            </div>
        </div>
    </div>
</section>

<!-- TradingView Widget (Keep but style) -->
<div class="container position-relative z-2" style="margin-top: -30px;">
    <div class="glass-panel rounded-pill p-2">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container" style="height: 46px;">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                {
                    "symbols": [
                        {"proName": "FOREXCOM:SPXUSD", "title": "S&P 500"},
                        {"proName": "FOREXCOM:NSXUSD", "title": "US 100"},
                        {"proName": "FX_IDC:EURUSD", "title": "EUR/USD"},
                        {"proName": "BITSTAMP:BTCUSD", "title": "Bitcoin"},
                        {"proName": "BITSTAMP:ETHUSD", "title": "Ethereum"}
                    ],
                    "showSymbolLogo": true,
                    "colorTheme": "light",
                    "isTransparent": true,
                    "displayMode": "adaptive",
                    "locale": "en"
                }
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
</div>

<!-- Calculator Section (Redesigned) -->
<section class="section-premium">
    <div class="container">
        <div class="premium-card">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <h3 class="mb-4">{{ __('Calculate Your Potential Profit') }}</h3>
                    <p class="text-muted mb-4">See how your investment can grow with our premium plans.</p>
                     <div class="d-grid gap-3">
                         <div>
                            <label class="form-label">{{ __('Amount') }}</label>
                            <input type="text" class="form-control rounded-pill border-0 bg-light p-3" name="amount" id="amount" placeholder="{{ __('Enter amount') }}">
                         </div>
                         <div>
                            <label class="form-label">{{ __('Investment Plan') }}</label>
                            <select class="form-select rounded-pill border-0 bg-light p-3" name="selectplan" id="plan">
                                <option selected disabled>{{ __('Select a plan') }}</option>
                                @forelse ($plan as $item)
                                    <option value="{{ $item->id }}">{{ $item->plan_name }}</option>
                                @empty
                                @endforelse
                            </select>
                         </div>
                         <button id="calculate-btn" class="btn-premium w-100 mt-3">{{ __('Calculate Earning') }}</button>
                     </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block text-center">
                     <img src="{{ getFile('elements', 'budget.png') }}" alt="chart" class="img-fluid" style="max-height: 300px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));">
                </div>
            </div>
        </div>
    </div>
</section>

@push('style')
    <style>
        .tradingview-widget-container {
            height: 46px !important;
        }
        .tradingview-widget-copyright {
            display: none;
        }
    </style>
@endpush
