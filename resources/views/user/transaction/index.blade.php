<x-app-layout>

	@section('title', 'Transactions')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <main>
            <div class="body-bottom row">
                <div class="col-12">
                    {{-- <h6 class="text-center d-block d-md-none"> Recent Transactions</h6> --}}
                    <div class="history-section-row">
                        <div class="history-section mt-3">
                            <div class="header-history d-md-block">
                                <div>
                                    <span class="pt-2"><small>Recent Transactions</small></span>
                                </div>
                                <div>
                                    <a href="transaction.html" class="view"><span class="pt-2 text-primary view"><small
                                                class="view">View All</small>
                                        </span></a>

                                </div>
                            </div>
                            <div class="table-section pb-2">
                                @if (count($transactions) > 0)
									@foreach ($transactions as $transaction)
									<div class="table-section-row">
										<div class="table-section-wrapper">
											<img src="{{ asset('storage/crypto/'. $transaction->cryptocurrency->symbol) }}" style="width: 50px;" alt="">
											<div class="date-wrap">
												<p>{{ $transaction->cryptocurrency->name }}</p>
												<span>February 21, 2021</span>
											</div>
										</div>

										@php
											if ($transaction->status == 1) {
												$status = 'pending-div';
											}elseif ($transaction->status == 2) {
												$status = 'pending-div';
											}elseif ($transaction->status == 3) {
												$status = 'pending-div';	
											}
										@endphp

										<div class="transac-status">
											<p>{{  number_format($transaction->amount, 2) }}</p>

											@if ($transaction->status == 1)
												<span class="status-success">Success</span>
												@elseif ($transaction->status == 2)
												<span class="status-spending">Pening</span>
												@elseif ($transaction->status == 3)
												<span class="status-failed">Failed</span>
											@endif
											
										</div>
									</div>
									@endforeach 
								@else
									<div class="table-section-ntp">
										<img src="{{ asset('assets/images/mobile-ntp.png')}}" alt="" width="80%">
									</div>
									<div class="table-section-desktop-ntp">
										<img src="{{ asset('assets/images/ntp.png')}}" alt="" width="50%">
									</div>
								@endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection

</x-app-layout>
