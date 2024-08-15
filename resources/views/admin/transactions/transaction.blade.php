@extends('layouts.admin')

@section('title','Transaction Details')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 ">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="invoice-title">
                                <h1 class="text-center h1 text-primary fs-1">&#8358; {{ number_format($transaction->amount,2) }}</h1>

                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped dt-responsive  w-100">
                                    <tbody>
                                        <tr>
                                            <th style="width: 70px;">Transaction Type</th>
                                            <td class="text-end">
                                                @if ($transaction->type == 'buy')
                                                    <span class="badge badge-soft-primary font-size-11">Buy</span>
                                                @elseif ($transaction->type == 'sell')
                                                    <span class="badge badge-soft-danger font-size-11">Sell</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Cryptocurrency</th>
                                            <td class="text-end">
                                                    <div class="flex-shrink-0 me-3">
                                                        <img src="{{ asset($transaction->cryptocurrency->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">{{ $transaction->cryptocurrency->name }}</h5>
                                                    </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 70px;">Payment Status</th>
                                            <td class="text-end">
                                                @if ($transaction->payment_status == 'Completed')
                                                    <span class="badge badge-soft-success font-size-11">Completed</span>
                                                @elseif ($transaction->payment_status == 'Pending')
                                                    <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                @elseif ($transaction->payment_status == 'Received')
                                                    <span class="badge badge-soft-info font-size-11">Payment Received</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 70px;">Transaction Status</th>
                                            <td class="text-end">
                                                @if ($transaction->status == 'Completed')
                                                    <span class="badge badge-soft-success font-size-11">Completed</span>
                                                @else
                                                    <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                @endif
                                            </td>
                                        </tr>

                                        @if ($transaction->rejection_reason)
                                            <tr>
                                                <th style="width: 70px;">Rejection Reason</th>
                                                <td class="text-end">{{ $transaction->rejection_reason }}</td>
                                            </tr>

                                        @endif

                                        <tr>
                                            <th style="width: 70px;">Payment Date</th>
                                            <td class="text-end">{{ explode(' ', $transaction->created_at)[0] }}</td>
                                        </tr>

                                    </tbody>
                                </table>
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
