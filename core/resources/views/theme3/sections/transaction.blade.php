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

  <section class="transaction-section sp_pt_120 sp_pb_120 obsidian-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
          <div class="sp_site_header wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
            <h2 class="sp_site_title">{{ __(@$content->data->title) }}</h2>
          </div>
        </div>
      </div>
      <div class="row mt-5">
          <div class="col-lg-12">
            <div class="transaction-wrapper obsidian-card p-0 border border-gold rounded-0 overflow-hidden">
              <div class="transaction-wrapper-top p-4 d-flex justify-content-between align-items-center border-bottom border-secondary">
                <h4 class="title text-white fw-bold mb-0 text-uppercase">{{ __('Transaction history') }}</h4>
                <ul class="nav nav-pills transaction-tabs" id="pills-tab" role="tablist">
                  <li class="nav-item me-2" role="presentation">
                    <button class="nav-link active rounded-0 bg-transparent text-secondary border border-secondary" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">{{ __('Latest Invests') }}</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-0 bg-transparent text-secondary border border-secondary" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">{{ __('Latest Withdraws') }}</button>
                  </li>
                </ul>
              </div>
              
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane table-content fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table site-table mb-0 text-white">
                      <thead>
                          <tr class="bg-gold text-black">
                              <th scope="col" class="border-0">{{ __('Username') }}</th>
                              <th scope="col" class="border-0">{{ __('Date') }}</th>
                              <th scope="col" class="border-0">{{ __('Amount') }}</th>
                              <th scope="col" class="border-0">{{ __('Gateway') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($recentTransactions as $item)
                              <tr class="border-bottom border-secondary">
                                  <td data-caption="{{ __('Username') }}" class="text-secondary">{{ @$item->user->username }}</td>
                                  <td data-caption="{{ __('Date') }}" class="text-secondary">
                                      {{ $item->created_at->format('Y-m-d') }}</td>
                                  <td data-caption="{{ __('Amount') }}" class="text-gold fw-bold">
                                      {{ number_format($item->amount, 2) . ' ' . @$general->site_currency }}</td>
                                  <td data-caption="{{ __('Gateway') }}" class="text-secondary">{{ @$item->gateway->gateway_name ?? 'Deposit' }}
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td data-caption="{{ __('Status') }}" class="text-center text-secondary" colspan="100%">
                                      {{ __('No Data Found') }}
                                  </td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <table class="table site-table mb-0 text-white">
                      <thead>
                          <tr class="bg-gold text-black">
                              <th scope="col" class="border-0">{{ __('Name') }}</th>
                              <th scope="col" class="border-0">{{ __('Date') }}</th>
                              <th scope="col" class="border-0">{{ __('Amount') }}</th>
                              <th scope="col" class="border-0">{{ __('Gateway') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($recentwithdraw as $item)
                              <tr class="border-bottom border-secondary">
                                  <td data-caption="{{ __('Name') }}" class="text-secondary">{{ @$item->user->username }}</td>
                                  <td data-caption="{{ __('Date') }}" class="text-secondary">
                                      {{ $item->created_at->format('Y-m-d') }}</td>
                                  <td data-caption="{{ __('Amount') }}" class="text-gold fw-bold">
                                      {{ number_format($item->withdraw_amount, 2) . ' ' . @$general->site_currency }}
                                  </td>
                                  <td data-caption="{{ __('Gateway') }}" class="text-secondary">{{ $item->withdrawMethod->name }}
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td data-caption="{{ __('Status') }}" class="text-center text-secondary" colspan="100%">
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
  </section>

@push('style')
<style>
    .nav-pills .nav-link.active {
        background-color: var(--gold) !important;
        color: black !important;
        border-color: var(--gold) !important;
    }
</style>
@endpush
