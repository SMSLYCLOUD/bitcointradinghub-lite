@php
$content = content('plan.content');
$plans = App\Models\Plan::where('status', 1)
->latest()
->get();
@endphp

<section class="plan-section sp_pt_120 sp_pb_120 sp_separator_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title display-4 fw-bold text-gradient">{{ __(@$content->data->title) }}</h2>
                </div>
            </div>
        </div>

        <div class="row gy-4 items-wrapper justify-content-center mt-4">
            @forelse ($plans as $plan)
            @php
            $plan_exist = App\Models\Payment::where('plan_id', $plan->id)
            ->where('user_id', Auth::id())
            ->where('next_payment_date', '!=', null)
            ->where('payment_status', 1)
            ->count();

            $isFeatured = ($loop->iteration == 2);
            @endphp

            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="plan-item aurora-card p-4 h-100 d-flex flex-column rounded-3xl position-relative {{ $isFeatured ? 'border-gradient featured-plan' : '' }}" style="border-radius: 24px;">
                    @if($isFeatured)
                        <div class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-gradient-aurora px-3 py-2 text-white shadow-lg">{{ __('Most Popular') }}</div>
                    @endif

                    <div class="plan-header text-center mb-4 mt-2">
                        <h3 class="plan-name mb-2 text-primary d-inline-block position-relative pb-1" style="border-bottom: 2px solid; border-image: var(--aurora-gradient) 1;">{{ $plan->plan_name }}</h3>
                        <span class="d-block text-secondary small mt-1">{{ __('Every') }} {{ $plan->time->name }}</span>
                        <div class="plan-price mt-3">
                            <h2 class="display-4 fw-bold text-gradient mb-0">
                                {{ number_format($plan->return_interest, 2) }}@if ($plan->interest_status == 'percentage')%@else{{ @$general->site_currency }}@endif
                            </h2>
                            <span class="text-secondary small">{{ __('ROI') }}</span>
                        </div>
                    </div>

                    <div class="plan-features flex-grow-1 mb-4">
                        <ul class="list-unstyled">
                            @php
                                $checkIcon = '<i class="fas fa-check-circle text-success me-2"></i>';
                            @endphp

                            @if ($plan->amount_type == 0)
                            <li class="mb-2 d-flex align-items-center text-secondary">
                                {!! $checkIcon !!}
                                <span>{{ __('Min') }} <strong class="text-white">{{ number_format($plan->minimum_amount, 2) . ' ' . @$general->site_currency }}</strong></span>
                            </li>
                            <li class="mb-2 d-flex align-items-center text-secondary">
                                {!! $checkIcon !!}
                                <span>{{ __('Max') }} <strong class="text-white">{{ number_format($plan->maximum_amount, 2) . ' ' . @$general->site_currency }}</strong></span>
                            </li>
                            @else
                            <li class="mb-2 d-flex align-items-center text-secondary">
                                {!! $checkIcon !!}
                                <span>{{ __('Amount') }} <strong class="text-white">{{ number_format($plan->amount, 2) . ' ' . @$general->site_currency }}</strong></span>
                            </li>
                            @endif

                            <li class="mb-2 d-flex align-items-center text-secondary">
                                {!! $checkIcon !!}
                                <span>{{ __('For') }} <strong class="text-white">{{ $plan->return_for == 1 ? $plan->how_many_time . ' ' . __('Times') : __('Lifetime') }}</strong></span>
                            </li>

                            <li class="mb-2 d-flex align-items-center text-secondary">
                                {!! $checkIcon !!}
                                <span>{{ __('Capital Back') }} <strong class="text-white">{{ $plan->capital_back == 1 ? __('YES') : __('NO') }}</strong></span>
                            </li>
                        </ul>

                        <h6 class="mt-4 mb-3 text-white">{{ __('Affiliate Bonus') }}</h6>
                        <ul class="plan-referral list-unstyled">
                            @if($plan->referrals)
                                @foreach ($plan->referrals->level as $key => $value)
                                    <li class="text-secondary small d-flex justify-content-between">
                                        <span>{{$plan->referrals->commision[$key]}} %</span>
                                        <span>{{$value}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <div class="plan-action mt-auto">
                        @if ($plan_exist >= $plan->invest_limit)
                        <a class="btn w-100 disabled rounded-full bg-secondary text-white border-0 py-3" href="#">
                            <span>{{ __('Max Limit exceeded') }}</span>
                        </a>
                        @else
                        <a class="btn w-100 rounded-full py-3 fw-bold text-white mb-2 shadow-lg" href="{{ route('user.gateways', $plan->id) }}" style="background: var(--aurora-gradient);">
                            <span>{{ __('Invest Now') }}</span>
                        </a>
                        @auth
                        <button class="btn w-100 rounded-full py-3 fw-bold text-white aurora-card border border-white balance" data-plan="{{ $plan }}" data-url="">
                            <span>{{ __('Balance Invest') }}</span>
                        </button>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>

<div class="calculate-area py-5">
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-lg-10">
                <div class="aurora-card p-5 rounded-3xl border border-white-10">
                    <div class="row gy-4 align-items-end">
                        <div class="col-lg-4 col-md-6">
                            <label class="mbl-h text-white mb-2">{{ __('Amount') }}</label>
                            <input type="text" class="form-control bg-transparent text-white border-white-10 rounded-xl" name="amount" id="amount"
                                placeholder="{{ __('Enter amount') }}">
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <label class="mbl-h text-white mb-2">{{ __('Investment Plan') }}</label>
                            <select class="form-select bg-transparent text-white border-white-10 rounded-xl" name="selectplan" id="plan">
                                <option selected disabled class="text-secondary">{{ __('Select a plan') }}</option>
                                @forelse ($plans as $item)
                                    <option value="{{ $item->id }}" class="text-dark">{{ $item->plan_name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <a href="#0" id="calculate-btn" class="btn w-100 rounded-full py-2 fw-bold text-white shadow-lg" style="background: var(--aurora-gradient);"> {{ __('Calculate') }}</a>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="modal fade" id="invest" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{route('user.investmentplan.submit')}}" method="post">
            @csrf
            <div class="modal-content aurora-card rounded-2xl border-white-10">
                <div class="modal-header border-white-10">
                    <h5 class="modal-title text-white">{{__('Invest Now')}}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="" class="text-white mb-2">{{ __('Invest Amount') }}</label>
                            <input type="text" name="amount" class="form-control bg-transparent text-white border-white-10 rounded-xl">
                            <input type="hidden" name="plan_id" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-white-10">
                    <button type="button" class="btn btn-secondary rounded-full" data-bs-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" class="btn main-btn rounded-full bg-gradient-aurora text-white border-0">{{__('Invest Now')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('style')
<style>
    .featured-plan {
        transform: scale(1.05);
        z-index: 2;
        border: 2px solid transparent;
        background-clip: padding-box;
    }
    .border-gradient::after {
        content: "";
        position: absolute;
        inset: -2px;
        border-radius: 26px;
        padding: 2px;
        background: var(--aurora-gradient);
        -webkit-mask:
           linear-gradient(#fff 0 0) content-box,
           linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
    }
    .border-white-10 {
        border-color: rgba(255,255,255,0.1) !important;
    }
</style>
@endpush

@push('script')
<script>
    $(function() {
        'use strict'

        $('.balance').on('click', function() {
            const modal = $('#invest');
            modal.find('input[name=plan_id]').val($(this).data('plan').id);
            modal.modal('show')
        })
    })
</script>
@endpush
