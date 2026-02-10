@php
$content = content('plan.content');
$plans = App\Models\Plan::where('status', 1)
    ->latest()
    ->get();
@endphp

<section id="investment" class="section-premium">
    <div class="container">

        <div class="text-center mb-5 animate-fade-up">
            <h2 class="display-4 fw-bold">{{ __(@$content->data->title) }}</h2>
            <p class="text-muted fs-5">Choose the plan that fits your financial goals</p>
        </div>

        <div class="row gy-4">
            @forelse ($plans as $plan)
                @php
                    $plan_exist = App\Models\Payment::where('plan_id', $plan->id)
                        ->where('user_id', Auth::id())
                        ->where('next_payment_date', '!=', null)
                        ->where('payment_status', 1)
                        ->count();
                @endphp

                <div class="col-lg-4 col-md-6">
                    <div class="premium-card text-center d-flex flex-column h-100">
                        <div class="mb-4">
                            <div class="mb-3">
                                <i class="las la-gem fs-1 text-warning"></i>
                            </div>
                            <h3 class="mb-2">{{ $plan->plan_name }}</h3>

                            @if ($plan->amount_type == 0)
                                <div class="my-3">
                                    <h2 class="mb-0 fw-bold tabular-nums">{{ number_format($plan->minimum_amount, 2)}} <small class="fs-6 text-muted">{{ @$general->site_currency }}</small></h2>
                                    <p class="text-muted small mb-0">Minimum</p>
                                </div>
                                <div class="my-3">
                                    <h2 class="mb-0 fw-bold tabular-nums">{{ number_format($plan->maximum_amount, 2) }} <small class="fs-6 text-muted">{{ @$general->site_currency }}</small></h2>
                                    <p class="text-muted small mb-0">Maximum</p>
                                </div>
                            @else
                                <div class="my-4">
                                    <h1 class="display-4 fw-bold tabular-nums">{{ number_format($plan->amount, 2) }} <small class="fs-5 text-muted">{{ @$general->site_currency }}</small></h1>
                                </div>
                            @endif
                        </div>

                        <ul class="list-unstyled plan-features text-start mx-auto w-100 mb-auto" style="max-width: 300px;">
                            <li class="d-flex justify-content-between py-2 border-bottom border-light">
                                <span class="text-muted">{{ __('Every') }}</span>
                                <span class="fw-bold">{{ $plan->time->name }}</span>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom border-light">
                                <span class="text-muted">{{ __('Return') }}</span>
                                <span class="fw-bold text-success">
                                    {{ number_format($plan->return_interest, 2) }}
                                    @if ($plan->interest_status == 'percentage') % @else {{ @$general->site_currency }} @endif
                                </span>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom border-light">
                                <span class="text-muted">{{ __('Duration') }}</span>
                                <span class="fw-bold">
                                    @if ($plan->return_for == 1)
                                        {{ $plan->how_many_time }} {{ __('Times') }}
                                    @else
                                        {{ __('Lifetime') }}
                                    @endif
                                </span>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom border-light">
                                <span class="text-muted">{{ __('Capital Back') }}</span>
                                <span class="fw-bold">{{ $plan->capital_back == 1 ? __('YES') : __('NO') }}</span>
                            </li>

                             @if($plan->referrals)
                                <li class="py-2">
                                    <span class="text-muted d-block mb-1">{{ __('Affiliate Bonus') }}</span>
                                    <div class="d-flex justify-content-between small">
                                         @foreach ($plan->referrals->level as $key => $value)
                                            <span class="badge bg-light text-dark border">{{$value}}: {{$plan->referrals->commision[$key]}}%</span>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        </ul>

                        <div class="mt-4 pt-3">
                            @if ($plan_exist >= $plan->invest_limit)
                                    <a class="btn btn-secondary w-100 disabled" href="#">{{ __('Limit Reached') }}</a>
                            @else
                                <a class="btn-premium w-100 d-block mb-3"
                                    href="{{ route('user.gateways', $plan->id) }}">{{ __('Choose Plan') }}</a>
                                    
                                    @auth
                                    <button class="btn-premium-outline w-100 balance" data-plan="{{ $plan }}"
                                        data-url="">{{ __('Use Balance') }}</button>
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

<!-- Invest Modal -->
<div class="modal fade" id="invest" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{route('user.investmentplan.submit')}}" method="post" class="w-100">
            @csrf
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">{{__('Invest Now')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-4">
                    <div class="form-group">
                        <label class="form-label text-muted">{{ __('Invest Amount') }}</label>
                        <input type="text" name="amount" class="form-control form-control-lg bg-light border-0 rounded-pill px-4" placeholder="0.00">
                        <input type="hidden" name="plan_id" class="form-control">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-link text-muted text-decoration-none" data-bs-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" class="btn-premium px-5">{{__('Confirm Invest')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
