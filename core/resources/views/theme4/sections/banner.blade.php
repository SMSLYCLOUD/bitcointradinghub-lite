@php
$content = content('banner.content');
$counter = element('banner.element');
@endphp
    <section class="banner-section d-flex align-items-center justify-content-center position-relative overflow-hidden" style="min-height: 100vh;">
        <!-- Orb -->
        <div class="position-absolute top-50 start-50 translate-middle rounded-circle" style="width: 600px; height: 600px; background: var(--aurora-gradient); filter: blur(150px); opacity: 0.2; animation: rotateOrb 20s infinite linear; pointer-events: none;"></div>

        <div class="container position-relative z-1 text-center">
            <h2 class="banner-title wow fadeInUp display-3 fw-bold mb-3 text-gradient d-inline-block" data-wow-duration="0.3s" data-wow-delay="0.3s">{{ __(@$content->data->title) }}</h2>
            <p class="banner-description mt-3 mx-auto wow fadeInUp text-secondary fs-5" style="max-width: 640px; line-height: 1.7;" data-wow-duration="0.3s" data-wow-delay="0.5s">{{ __(@$content->data->short_description) }}</p>
            <div class="mt-5 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.7s">
                <a href="{{ @$content->data->button_text_link }}" class="btn main-btn me-3 px-5 py-3 rounded-full bg-gradient-aurora text-white border-0 fw-bold shadow-lg">
                    <span>{{ __('Get Started') }}</span>
                </a>
                <a href="{{ $content->data->button_text_2_link}}" class="btn main-btn2 px-5 py-3 rounded-full aurora-card text-white border-0 fw-bold">
                    <span>{{ __('Know More') }}</span>
                </a>
            </div>
        </div>
    </section>

<!-- TradingView Widget BEGIN -->
<div class="container mt-5 mb-5 position-relative z-1">
    <div class="aurora-card p-1 rounded-2xl overflow-hidden">
        <div class="tradingview-widget-container" style="height: 46px !important;">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener"
                    target="_blank"><span class="blue-text">Markets today</span></a> by TradingView</div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                {
                    "symbols": [{
                            "proName": "FOREXCOM:SPXUSD",
                            "title": "S&P 500"
                        },
                        {
                            "proName": "FOREXCOM:NSXUSD",
                            "title": "US 100"
                        },
                        {
                            "proName": "FX_IDC:EURUSD",
                            "title": "EUR/USD"
                        },
                        {
                            "proName": "BITSTAMP:BTCUSD",
                            "title": "Bitcoin"
                        },
                        {
                            "proName": "BITSTAMP:ETHUSD",
                            "title": "Ethereum"
                        }
                    ],
                    "showSymbolLogo": true,
                    "colorTheme": "dark",
                    "isTransparent": true,
                    "displayMode": "adaptive",
                    "locale": "en"
                }
            </script>
        </div>
    </div>
</div>
<!-- TradingView Widget END -->

    <div class="counter-section pb-5 position-relative z-1">
        <div class="container"> 
            <div class="row counter-wrapper justify-content-center g-4">
                @foreach ($counter as $count)
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-item aurora-card p-4 rounded-2xl text-center h-100 position-relative overflow-hidden">
                            <div class="position-absolute top-0 start-0 w-100" style="height: 3px; background: var(--aurora-gradient);"></div>
                            <h3 class="counter-title display-5 fw-bold text-gradient mb-2">{{ $count->data->total }}</h3>
                            <p class="caption text-secondary mb-0">{{ $count->data->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> 
    </div>

    @push('style')
    <style>
        .tradingview-widget-container{
            height: 46px !important;
        }
        .tradingview-widget-copyright {
            display: none;
        }
        @keyframes rotateOrb {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
@endpush
