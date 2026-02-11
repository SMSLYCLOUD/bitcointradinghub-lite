@php
$content = content('plan.content');
$plans = App\Models\Plan::where('status', 1)
    ->latest()
    ->get();
@endphp

    <section class="plan-section sp_pt_120 sp_pb_120 sp_separator_bg obsidian-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title">{{ __(@$content->data->title) }}</h2>
                </div>
                </div>
            </div>

            <div class="row gy-4 mt-4 justify-content-center">
                @forelse ($plans as $plan)
                    @php
                        $plan_exist = App\Models\Payment::where('plan_id', $plan->id)
                            ->where('user_id', Auth::id())
                            ->where('next_payment_date', '!=', null)
                            ->where('payment_status', 1)
                            ->count();
                    @endphp
                
                    <div class="col-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="plan-item obsidian-card p-4 border-start border-gold rounded-0 d-lg-flex align-items-center justify-content-between" style="border-left-width: 4px !important;">
                            <div class="plan-header text-lg-start text-center mb-lg-0 mb-4 pe-lg-4 border-end-lg border-secondary">
                                <h3 class="plan-name mb-1 text-uppercase text-white" style="letter-spacing: 3px;">{{ $plan->plan_name }}</h3>
                                <span class="plan-status text-secondary">{{ __('Every') }} {{ $plan->time->name }}</span>
                                <div class="plan-price mt-2">
                                    <h2 class="display-3 text-gold tabular-nums fw-bold mb-0">
                                        {{ number_format($plan->return_interest, 2) }} @if ($plan->interest_status == 'percentage')
                                            {{ '%' }}
                                        @else
                                            {{ @$general->site_currency }}
                                        @endif
                                    </h2>
                                    <span class="text-secondary small">{{ __('ROI') }}</span>
                                </div>
                            </div>

                            <div class="plan-features flex-grow-1 px-lg-5 mb-lg-0 mb-4 text-center">
                                <ul class="list-inline mb-0 text-secondary">
                                    <li class="list-inline-item mx-2">
                                        @if ($plan->amount_type == 0)
                                            {{ __('Min') }} <span class="text-white">{{ number_format($plan->minimum_amount, 2) . ' ' . @$general->site_currency }}</span>
                                            <span class="text-gold mx-2">•</span>
                                            {{ __('Max') }} <span class="text-white">{{ number_format($plan->maximum_amount, 2) . ' ' . @$general->site_currency }}</span>
                                        @else
                                            {{ __('Amount') }} <span class="text-white">{{ number_format($plan->amount, 2) . ' ' . @$general->site_currency }}</span>
                                        @endif
                                    </li>

                                    <li class="list-inline-item mx-2"><span class="text-gold mx-2">•</span></li>

                                    <li class="list-inline-item mx-2">
                                        @if ($plan->return_for == 1)
                                            {{ __('For') }} <span class="text-white">{{ $plan->how_many_time }} {{ __('Times') }}</span>
                                        @else
                                            {{ __('For') }} <span class="text-white">{{ __('Lifetime') }}</span>
                                        @endif
                                    </li>

                                    <li class="list-inline-item mx-2"><span class="text-gold mx-2">•</span></li>

                                    <li class="list-inline-item mx-2">
                                        {{ __('Capital Back') }}
                                        <span class="text-white">
                                        @if ($plan->capital_back == 1)
                                            {{ __('YES') }}
                                        @else
                                            {{ __('NO') }}
                                        @endif
                                        </span>
                                    </li>
                                </ul>
                                
                                @if($plan->referrals)
                                <div class="mt-3 text-secondary small">
                                    {{ __('Affiliate Bonus') }}:
                                    @foreach ($plan->referrals->level as $key => $value)
                                        <span class="text-white">{{$plan->referrals->commision[$key]}}%</span>@if(!$loop->last), @endif
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <div class="plan-action text-lg-end text-center" style="min-width: 200px;">
                                @if ($plan_exist >= $plan->invest_limit)
                                    <a class="btn main-btn w-100 disabled rounded-0 bg-secondary text-white border-0" href="#">{{ __('Max Limit') }}</a>
                                @else
                                    <a class="btn main-btn w-100 rounded-0 bg-gold text-black border-0 mb-2" href="{{ route('user.gateways', $plan->id) }}">{{ __('Invest Now') }}</a>
                                    @auth 
                                    <button class="btn btn-outline-gold w-100 rounded-0 text-gold border-gold bg-transparent balance" data-plan="{{ $plan }}"
                                        data-url="">{{ __('Balance') }}</button>
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

    <div class="calculate-area pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                 <div class="col-lg-10">
                    <div class="obsidian-card p-5 border border-gold">
                        <div class="row gy-4 align-items-end">
                            <div class="col-lg-4 col-md-6">
                                <label class="mbl-h text-white mb-2">{{ __('Amount') }}</label>
                                <input type="text" class="form-control bg-dark text-white border-secondary rounded-0" name="amount" id="amount"
                                    placeholder="{{ __('Enter amount') }}">
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <label class="mbl-h text-white mb-2">{{ __('Investment Plan') }}</label>
                                <select class="form-select bg-dark text-white border-secondary rounded-0" name="selectplan" id="plan">
                                    <option selected disabled class="text-secondary">{{ __('Select a plan') }}</option>
                                    @forelse ($plans as $item)
                                        <option value="{{ $item->id }}">{{ $item->plan_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <a href="#0" id="calculate-btn" class="btn main-btn w-100 rounded-0 bg-gold text-black border-0"> {{ __('Calculate') }}</a>
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
            <div class="modal-content obsidian-card border border-gold rounded-0">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title text-white">{{__('Invest Now')}}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="" class="text-white mb-2">{{ __('Invest Amount') }}</label>
                            <input type="text" name="amount" class="form-control bg-dark text-white border-secondary rounded-0">
                            <input type="hidden" name="plan_id" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" class="btn main-btn bg-gold text-black border-0 rounded-0">{{__('Invest Now')}}</button>
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
