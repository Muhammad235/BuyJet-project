@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')

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
                                            <p class="text-muted fw-medium">Cryptocurrency</p>
                                            <h4 class="mb-0">{{ count($crypto) }}</h4>
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
                                            <p class="text-muted fw-medium">Cryptocurrency</p>
                                            <h4 class="mb-0">{{ count($crypto) }}</h4>
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
                                            <p class="text-muted fw-medium">Users</p>
                                            <h4 class="mb-0">{{ count($users) }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-success">
                                                <span class="avatar-title">
                                                    <i class="bx bx-user-circle font-size-24"></i>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Transactions</p>
                                            {{-- <h4 class="mb-0">{{ count($transactions) }}</h4> --}}
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
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
                                            <p class="text-muted fw-medium">Buy Orders</p>
                                            {{-- <h4 class="mb-0">{{ count($buyorders) }}</h4> --}}
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
                                            <p class="text-muted fw-medium">Sell Orders</p>
                                            {{-- <h4 class="mb-0">{{ count($sellorders) }}</h4> --}}
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-secondary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-chevrons-right font-size-24"></i>
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
                            <h4 class="card-title mb-4">Latest Pending Buy Orders</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped dt-responsive  w-100">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Cryptocurrency</th>
                                        <th>Amount</th> 
                                        <th>Asset Network</th>
                                        <th>Payment Status</th>
                                        <th>Transaction Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    {{-- <tbody>
                                        @if (count($buyorders) > 0)
                                            @foreach ($buyorders->take(10) as $key => $buyorder)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <img src="{{ asset($buyorder->cryptocurrency->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">{{ $buyorder->cryptocurrency->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ number_format($buyorder->amount + $buyorder->charge, 2) }}</td>
                                                    <td>{{ $buyorder->asset_network }}</td>
                                                    <td>
                                                        @if ($buyorder->payment_status == 'Completed')
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @elseif ($buyorder->payment_status == 'Pending')
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @elseif ($buyorder->payment_status == 'Received')
                                                            <span class="badge badge-soft-info font-size-11">Payment Received</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($buyorder->status == 'Completed')
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @else
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.buy.show', $buyorder->trx_hash) }}" class="btn btn-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No transactions found.</td>
                                            </tr>
                                        @endif
                                    </tbody> --}}
                                    
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Pending Sell Orders</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="datatable table table-striped dt-responsive  w-100">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Cryptocurrency</th>
                                        <th>Amount</th> 
                                        <th>Asset Network</th>
                                        <th>Payment Status</th>
                                        <th>Transaction Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    {{-- <tbody>
                                        @if (count($sellorders) > 0)
                                            @foreach ($sellorders->take(10) as $key => $sellorder)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <img src="{{ asset($sellorder->cryptocurrency->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">{{ $sellorder->cryptocurrency->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ number_format($sellorder->amount, 2) }}</td>
                                                    <td>{{ $sellorder->asset_network }}</td>

                                                    <td>
                                                        @if ($sellorder->payment_status == 'Completed')
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @elseif ($sellorder->payment_status == 'Pending')
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @elseif ($sellorder->payment_status == 'Received')
                                                            <span class="badge badge-soft-info font-size-11">Payment Received</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($sellorder->status == 'Completed')
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @else
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.sell.show', $sellorder->trx_hash) }}" class="btn btn-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No transactions found.</td>
                                            </tr>
                                        @endif
                                    </tbody> --}}
                                    
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
                            <h4 class="card-title mb-4">Latest Transaction</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="datatable table table-striped dt-responsive  w-100">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Cryptocurrency</th>
                                        <th>Amount</th> 
                                        <th>Type</th> 
                                        <th>Payment Status</th>
                                        <th>Transaction Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    {{-- <tbody>
                                        @if (count($transactions) > 0)
                                            @foreach ($transactions->take(10) as $key => $transaction)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <img src="{{ asset($transaction->cryptocurrency->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">{{ $transaction->cryptocurrency->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ number_format($transaction->amount, 2) }}</td>
                                                    <td>
                                                        @if ($transaction->type == 'buy')
                                                            <span class="badge badge-soft-success font-size-11">Buy</span>
                                                        @else
                                                            <span class="badge badge-soft-danger font-size-11">Sell</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($transaction->payment_status == 'Completed')
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @elseif ($transaction->payment_status == 'Pending')
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @elseif ($transaction->payment_status == 'Received')
                                                            <span class="badge badge-soft-info font-size-11">Payment Received</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($transaction->status == 'Completed')
                                                            <span class="badge badge-soft-success font-size-11">Completed</span>
                                                        @else
                                                            <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.transactions.show', $transaction->id) }}" class="btn btn-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No transactions found.</td>
                                            </tr>
                                        @endif
                                    </tbody> --}}
                                    
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest User</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="datatable table table-striped dt-responsive  w-100">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Name</th>
                                        <th>Email</th> 
                                        <th>Phone</th> 
                                        <th>Account Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @if (count($users) > 0)
                                            @foreach ($users->take(10) as $key => $user)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $user->surname .' '. $user->firstname }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>
                                                        @if ($user->status == 'active')
                                                            <span class="badge badge-soft-success font-size-11">Active</span>
                                                        @elseif ($user->status == 'inactive')
                                                            <span class="badge badge-soft-danger font-size-11">Inactive</span>
                                                        @elseif ($user->status == 'pending')
                                                            <span class="badge badge-soft-info font-size-11">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{-- <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary btn-sm">View</a> --}}
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