@extends('layouts.admin')

@section('title','Transactions')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <h4 class="card-title mb-3">Transactions</h4>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#all-order" role="tab" aria-selected="true">
                                        All
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#buy-order" role="tab" aria-selected="false" tabindex="-1">
                                        Buy Orders
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#sell-order" role="tab" aria-selected="false" tabindex="-1">
                                        Sell Orders
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3">
                                <div class="tab-pane active" id="all-order" role="tabpanel">
                                    <div class="table-responsive">
                                        <table   class="table datatable table-striped dt-responsive  w-100">
                                            <thead>
                                            <tr>
                                                <td>#</td>
                                                <th>Cryptocurrency</th>
                                                <th>Amount</th> 
                                                <th>Typpe</th>
                                                <th>Payment Status</th>
                                                <th>Transaction Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @if (count($transactions) > 0)
                                                    @foreach ($transactions as $key => $transaction)
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
                                                            <td>{{ number_format($transaction->amount,2) }}</td>
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
                                                                    <span class="badge badge-soft-info font-size-11">Payment Recived</span>
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
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7" class="text-center">No transactions found.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="buy-order" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="datatable" class="datatable table table-striped dt-responsive  w-100">
                                            <thead>
                                            <tr>
                                                <td>#</td>
                                                <th>Cryptocurrency</th>
                                                <th>Amount</th> 
                                                <th>Payment Status</th>
                                                <th>Transaction Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
                                            <tbody>
                                                @if (count($buyTransactions) > 0)
                                                    @foreach ($buyTransactions as $key => $transaction)
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
                                                            <td>{{ number_format($transaction->amount + $transaction->charge,2) }}</td>
                                                            
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
                                                                <a href="{{ route('admin.buy.show', $transaction->trx_hash) }}" class="btn btn-primary btn-sm">View</a>
                                                            </td>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7" class="text-center">No transactions found.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="sell-order" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="datatable" class="datatable table table-striped dt-responsive  w-100">
                                            <thead>
                                            <tr>
                                                <td>#</td>
                                                <th>Cryptocurrency</th>
                                                <th>Amount</th> 
                                                <th>Payment Status</th>
                                                <th>Transaction Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
                                            <tbody>
                                                @if (count($sellTransactions) > 0)
                                                    @foreach ($sellTransactions as $key => $transaction)
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
                                                            <td>{{ number_format($transaction->amount,2) }}</td> 
                                                            <td>
                                                                @if ($transaction->payment_status == 'Completed')
                                                                    <span class="badge badge-soft-success font-size-11">Completed</span>
                                                                @elseif ($transaction->payment_status == 'Pending')
                                                                    <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                                @elseif ($transaction->payment_status == 'Received')
                                                                    <span class="badge badge-soft-info font-size-11">Payment Recived</span>
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
                                                                <a href="{{ route('admin.sell.show', $transaction->trx_hash) }}" class="btn btn-primary btn-sm">View</a>
                                                            </td>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7" class="text-center">No transactions found.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    
    
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