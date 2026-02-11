@php
$content = content('transaction.content');
$recentTransactions = App\Models\Payment::with('user', 'gateway')
                                        ->latest()
                                        ->where('payment_status',1)
                                        ->limit(10)
                                        ->get();
$recentwithdraw = App\Models\Withdraw::with('user', 'withdrawMethod')
                                      ->latest()
                                      ->where('status',1)
                                      ->limit(10)
                                      ->get();

@endphp

  <section class="transaction-section sp_pt_120 sp_pb_120">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
          <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
            <h2 class="sp_site_title display-4 fw-bold text-gradient">{{ __(@$content->data->title) }}</h2>
          </div>
        </div>
      </div>
      <div class="row mt-5">
          <div class="col-lg-12">
            <div class="transaction-wrapper aurora-card p-4 rounded-3xl border-white-10">
              <div class="transaction-wrapper-top mb-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h4 class="title text-white fw-bold mb-0">{{ __('Transaction history') }}</h4>
                <ul class="nav nav-pills transaction-tabs gap-2" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-full px-4 text-white fw-bold shadow-lg" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true" style="background: var(--aurora-gradient);">{{ __('Latest Invests') }}</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-full px-4 text-white bg-transparent border border-white-10 fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">{{ __('Latest Withdraws') }}</button>
                  </li>
                </ul>
              </div>
              
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane table-content fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <div class="table-responsive">
                    <table class="table mb-0 text-white border-white-10">
                        <thead class="bg-transparent border-bottom border-white-10">
                            <tr>
                                <th scope="col" class="border-0 text-secondary small text-uppercase fw-bold ps-4">{{ __('Username') }}</th>
                                <th scope="col" class="border-0 text-secondary small text-uppercase fw-bold">{{ __('Date') }}</th>
                                <th scope="col" class="border-0 text-secondary small text-uppercase fw-bold">{{ __('Amount') }}</th>
                                <th scope="col" class="border-0 text-secondary small text-uppercase fw-bold pe-4 text-end">{{ __('Gateway') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentTransactions as $item)
                                <tr class="border-bottom border-white-10 align-middle hover-bg-white-5">
                                    <td data-caption="{{ __('Username') }}" class="text-white border-0 py-3 ps-4 fw-semibold">{{ @$item->user->username }}</td>
                                    <td data-caption="{{ __('Date') }}" class="text-secondary border-0 py-3">
                                        {{ $item->created_at->format('Y-m-d') }}</td>
                                    <td data-caption="{{ __('Amount') }}" class="text-primary fw-bold border-0 py-3">
                                        {{ number_format($item->amount, 2) . ' ' . @$general->site_currency }}</td>
                                    <td data-caption="{{ __('Gateway') }}" class="text-white border-0 py-3 pe-4 text-end"><span class="badge rounded-pill bg-white bg-opacity-10 py-2 px-3">{{ @$item->gateway->gateway_name ?? 'Deposit' }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td data-caption="{{ __('Status') }}" class="text-center text-secondary border-0 py-3" colspan="100%">
                                        {{ __('No Data Found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                  </div>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <div class="table-responsive">
                    <table class="table mb-0 text-white border-white-10">
                        <thead class="bg-transparent border-bottom border-white-10">
                            <tr>
                                <th scope="col" class="border-0 text-secondary small text-uppercase fw-bold ps-4">{{ __('Name') }}</th>
                                <th scope="col" class="border-0 text-secondary small text-uppercase fw-bold">{{ __('Date') }}</th>
                                <th scope="col" class="border-0 text-secondary small text-uppercase fw-bold">{{ __('Amount') }}</th>
                                <th scope="col" class="border-0 text-secondary small text-uppercase fw-bold pe-4 text-end">{{ __('Gateway') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentwithdraw as $item)
                                <tr class="border-bottom border-white-10 align-middle hover-bg-white-5">
                                    <td data-caption="{{ __('Name') }}" class="text-white border-0 py-3 ps-4 fw-semibold">{{ @$item->user->username }}</td>
                                    <td data-caption="{{ __('Date') }}" class="text-secondary border-0 py-3">
                                        {{ $item->created_at->format('Y-m-d') }}</td>
                                    <td data-caption="{{ __('Amount') }}" class="text-primary fw-bold border-0 py-3">
                                        {{ number_format($item->withdraw_amount, 2) . ' ' . @$general->site_currency }}
                                    </td>
                                    <td data-caption="{{ __('Gateway') }}" class="text-white border-0 py-3 pe-4 text-end"><span class="badge rounded-pill bg-white bg-opacity-10 py-2 px-3">{{ $item->withdrawMethod->name }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td data-caption="{{ __('Status') }}" class="text-center text-secondary border-0 py-3" colspan="100%">
                                        {{ __('No Data Found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>

@push('style')
<style>
    .hover-bg-white-5:hover {
        background-color: rgba(255,255,255,0.05);
    }
</style>
@endpush
