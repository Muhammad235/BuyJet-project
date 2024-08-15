@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@use('App\Enums\Status')

@section('content')


{{-- @dd($transactions) --}}

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Completed Transactions</p>
                                            <h4 class="mb-0">{{ number_format($completedTransaction, 2) }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-secondary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-money font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Pending Transactions</p>
                                            <h4 class="mb-0">{{ number_format($pendingTransaction, 2) }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-secondary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-money font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Pending Buy Orders</p>
                                            <h4 class="mb-0">{{ count($buyOrders) }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-secondary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-chevrons-left font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Pending Sell Orders</p>
                                            <h4 class="mb-0">{{ count($sellOrders) }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-success">
                                                <span class="avatar-title">
                                                    <i class="bx bx-chevrons-left font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Pending Giftcard Orders</p>
                                            <h4 class="mb-0">{{ count($giftCardOrders) }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    {{-- <i class="bx bx-copy-alt font-size-24"></i> --}}
                                                    <i class="bx bx-chevrons-left font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <a href="{{ route('admin.tickets.index') }}">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Tickets</p>
                                            <h4 class="mb-0">{{ count($tickets) }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-success">
                                                <span class="avatar-title">
                                                    <i class="bx bx-chat font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <a href="{{ route('admin.users.index') }}">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total users</p>
                                            <h4 class="mb-0">{{ count($users) }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-secondary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-user-circle font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Our Buying Rate</p>
                                            <h4 class="mb-0">&#8358; {{ number_format($general_settings->buy_rate,2) }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                                <span class="avatar-title">
                                                    <i class="bx bx-trending-up font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Our Selling Rate</p>
                                            <h4 class="mb-0">&#8358; {{ number_format($general_settings->sell_rate,2) }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                                <span class="avatar-title ">
                                                    <i class="bx bx-trending-down font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

             <!-- start row -->
             <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Pending Buy Orders</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped dt-responsive  w-100">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Cryptocurrency</th>
                                        <th>Amount</th>
                                        <th>Asset Network</th>
                                        {{-- <th>Payment Status</th> --}}
                                        <th>Transaction Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @if (count($buyOrders) > 0)
                                            @foreach ($buyOrders->take(10) as $key => $buyOrder)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <img src="{{ asset($buyOrder->cryptocurrency->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">{{ $buyOrder->cryptocurrency->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ number_format($buyOrder->amount + $buyOrder->charge, 2) }}</td>
                                                    <td>{{ $buyOrder->asset_network }}</td>
                                                    {{-- <td>
                                                        @if ($buyOrder->payment_status == 'Completed')
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @elseif ($buyOrder->payment_status == 'Pending')
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @elseif ($buyOrder->payment_status == 'Received')
                                                            <span class="badge badge-soft-info font-size-11">Payment Received</span>
                                                        @endif
                                                    </td> --}}
                                                    <td>
                                                        @if ($buyOrder->status == Status::SUCCESS)
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @else
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.buy.show', $buyOrder->trx_hash) }}" class="btn btn-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No transactions found.</td>
                                            </tr>
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Pending Sell Orders</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="datatable table table-striped dt-responsive  w-100">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Cryptocurrency</th>
                                        <th>Amount</th>
                                        <th>Asset Network</th>
                                        {{-- <th>Payment Status</th> --}}
                                        <th>Transaction Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @if (count($sellOrders) > 0)
                                            @foreach ($sellOrders->take(10) as $key => $sellOrder)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <img src="{{ asset($sellOrder->cryptocurrency->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">{{ $sellOrder->cryptocurrency->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ number_format($sellOrder->amount, 2) }}</td>
                                                    <td>{{ $sellOrder->asset_network }}</td>

                                                    <td>
                                                        @if ($sellOrder->status == Status::SUCCESS)
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @else
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.sell.show', $sellOrder->trx_hash) }}" class="btn btn-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No transactions found.</td>
                                            </tr>
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Pending Gift Card Orders</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="datatable table table-striped dt-responsive  w-100">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Gift Card</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        <th>Transaction Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @if (count($giftCardOrders) > 0)
                                            @foreach ($giftCardOrders->take(10) as $key => $giftCardOrder)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <img src="{{ asset($giftCardOrder->giftcard->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">{{ $giftCardOrder->giftcard->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $giftCardOrder->currency->name }}</td>

                                                    <td>{{ number_format($giftCardOrder->amount, 2) }}</td>

                                                    <td>
                                                        @if ($giftCardOrder->status == Status::SUCCESS)
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @else
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.giftcard.show', $giftCardOrder->trx_hash) }}" class="btn btn-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No transactions found.</td>
                                            </tr>
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>


            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Modal -->

    <!-- end modal -->


    <!-- end modal -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © {{ env('APP_NAME') }}.
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
