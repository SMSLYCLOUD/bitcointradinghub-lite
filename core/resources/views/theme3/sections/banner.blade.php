@php
$content = content('banner.content');
$counter = element('banner.element');
@endphp
    <section 
        class="banner-section paroller obsidian-banner"
        data-paroller-factor="0.4"
        data-paroller-factor-sm="0.2"
        data-paroller-factor-xs="0.1"
    >
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10 text-center">
                    <div 
                        class="banner-content paroller"
                        data-paroller-factor="0.4"
                        data-paroller-factor-sm="0.2"
                        data-paroller-factor-xs="0.1"
                    >
                        <h2 class="banner-title wow fadeInUp text-uppercase" style="letter-spacing: -1px; font-weight: 800; font-size: clamp(2.5rem, 5vw, 4.5rem);" data-wow-duration="0.3s" data-wow-delay="0.3s">{{ __(@$content->data->title) }}</h2>
                        <p class="banner-description mt-3 mx-auto wow fadeInUp text-secondary" style="max-width: 600px;" data-wow-duration="0.3s" data-wow-delay="0.5s">{{ __(@$content->data->short_description) }}</p>
                        <div class="mt-5 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.7s">
                            <a href="{{ @$content->data->button_text_link }}" class="btn main-btn me-3 bg-gold text-black rounded-0">
                                <span>{{ __('Get Started') }}</span>
                            </a>
                            <a href="{{ $content->data->button_text_2_link}}" class="btn main-btn2 bg-transparent text-gold border-gold rounded-0">
                                <span>{{ __('Know More') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
<!-- TradingView Widget BEGIN -->
<div class="container mt-5 mb-5">
    <div class="obsidian-card p-1">
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

    <div class="counter-section pt-5 pb-5">
        <div class="container"> 
            <div class="row gy-4 align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="row counter-wrapper justify-content-center">
                        @foreach ($counter as $count)
                            <div class="col-md-4 col-sm-6 text-center position-relative">
                                <div class="counter-item">
                                    <h3 class="counter-title display-4 text-gold tabular-nums">{{ $count->data->total }}</h3>
                                    <p class="caption text-secondary">{{ $count->data->title }}</p>
                                </div>
                                @if(!$loop->last)
                                <div class="d-none d-md-block position-absolute top-50 end-0 translate-middle-y bg-gold" style="width: 1px; height: 60%; opacity: 0.5;"></div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
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
    </style>
@endpush
