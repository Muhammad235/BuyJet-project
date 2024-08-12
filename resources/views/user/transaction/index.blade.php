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
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-button" id="dropdownButton">{{ $type }}
                                            <i class="fas fa-caret-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" id="dropdownMenu">
                                            @if($type != "Buy")
                                                <li><a href="{{ url('/transactions?type=buy') }}">Buy</a></li>
                                            @endif
                                            @if($type != "Sell")
                                                <li><a href="{{ url('/transactions?type=sell') }}">Sell</a></li>
                                            @endif
                                            @if($type != "Gift Card")
                                                <li><a href="{{ url('/transactions?type=giftcard') }}">GiftCard</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="table-section pb-2">
                                @if (count($transactions) > 0)
                                    @foreach ($transactions as $transaction)
                                    <div class="table-section-row">
                                        <div class="table-section-wrapper pb-2">
                                            {{-- <img src="{{ asset($transaction->cryptocurrency->symbol) }}" style="width: 50px;" alt=""> --}}
                                            <img src="{{ asset('assets/images/btc.png') }}" style="width: 50px;" alt="">
                                            <div class="date-wrap">
                                                <p>{{ @$transaction->cryptocurrency->name }}</p>
                                                <p>{{ @$transaction->giftcard->name }} <span>{{ @$transaction->currency->name }}</span></p>

                                                <span>{{ $transaction->created_at->format('F d, Y') }}</span>
                                            </div>
                                        </div>


                                        <div class="transac-status">
                                            <p>₦ {{ number_format($transaction->amount, 2) }}</p>

                                            @if ($transaction->status == 1)
                                                <span class="status-success">Success</span>
                                                @elseif ($transaction->status == 2)
                                                <span class="status-spending">Processing</span>
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
            </div>
        </main>
    </section>
@endsection

</x-app-layout>
