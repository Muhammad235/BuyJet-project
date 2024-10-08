@extends('layouts.admin')
@section('title','Transactions')
@use('App\Enums\Status')

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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#buy-order" role="tab" aria-selected="true" tabindex="-1">
                                        Buy Orders
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#sell-order" role="tab" aria-selected="false" tabindex="-1">
                                        Sell Orders
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#giftcard-order" role="tab" aria-selected="false" tabindex="-1">
                                        Gift Card Orders
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3">
                                <div class="tab-pane" id="giftcard-order" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table datatable table-striped dt-responsive  w-100">
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
                                                @if (count($transactions) > 0)
                                                    @foreach ($transactions as $key => $transaction)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <img src="{{ asset($transaction->giftcard->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <h5 class="fs-14 mb-1">{{ $transaction->giftcard->name }}</h5>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                            <td> <p>{{ $transaction->currency->name }}</p></td>

                                                            <td>{{ number_format($transaction->amount,2) }}</td>

                                                            <td>
                                                                @if ($transaction->status == Status::SUCCESS)
                                                                    <span class="badge badge-soft-success font-size-11">Completed</span>
                                                                @else
                                                                    <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.giftcard.show', $transaction->trx_hash) }}" class="btn btn-primary btn-sm">View</a>
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
                                <div class="tab-pane active" id="buy-order" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="datatable" class="datatable table table-striped dt-responsive  w-100">
                                            <thead>
                                            <tr>
                                                <td>#</td>
                                                <th>Cryptocurrency</th>
                                                <th>Amount</th>
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
                                                            <td>{{ number_format($transaction->amount, 2) }}</td>
                                                            <td>
                                                                @if ($transaction->status == Status::SUCCESS)
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
                                                                @if ($transaction->status == Status::SUCCESS)
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
