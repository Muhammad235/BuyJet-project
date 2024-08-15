@extends('layouts.admin')
@use('App\Enums\Status')
@section('title','Transaction Details')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 ">
                    <div class="card">
                        <div class="card-body">

                            <h3 class="h1 mb-3 text-center">Gift card transaction</h3>

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
                                            <th style="width: 70px;">Transaction ID</th>
                                            <td class="text-end"><b>#{{ $transaction->trx_hash }}</b></td>
                                        </tr>
                                        <tr>
                                            <th>Gift Card</th>
                                            <td class="text-end">
                                                {{-- <div class="float-end"> --}}
                                                    <div class="flex-shrink-0 me-3">
                                                        <img src="{{ asset($transaction->giftcard->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">{{ $transaction->giftcard->name }}</h5>
                                                    </div>
                                                {{-- </div> --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Currency</th>
                                            <td class="text-end">{{ $transaction->currency->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Is physical card</th>
                                            <td class="text-end">
                                                {{ $transaction->is_physical_card  ? "Yes" : "No" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 70px;">Bank Name</th>
                                            <td class="text-end">{{ $transaction->user->bank_name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 70px;">Account  Name</th>
                                            <td class="text-end">{{ $transaction->user->account_name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 70px;">Account  Number</th>
                                            <td class="text-end">{{ $transaction->user->account_number }}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 70px;">Receipt</th>
                                            <td class=""><img src="{{ asset($transaction->payment_receipt) }}"  style="width: 300px !important; height: 300px !important;" alt=""> </td>
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

                                        <form method="POST" action="{{ route('admin.sell.update', $transaction->trx_hash) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="trx_hash" value="{{ $transaction->trx_hash }}">

                                            {{-- <tr>
                                                <th style="width: 70px;">Payment Status</th>
                                                <td class="text-end">
                                                    <select name="payment_status" class="form-select" id="">
                                                        <option value="Completed" {{ $transaction->payment_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                        <option value="Pending" {{ $transaction->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="Received" {{ $transaction->payment_status == 'Received' ? 'selected' : '' }}>Payment Recived</option>
                                                    </select>
                                                </td>
                                            </tr> --}}

                                            <tr>
                                                <th style="width: 70px;">Transaction Status</th>
                                                <td class="text-end">
                                                    <select name="status" class="form-select" id="">
                                                        <option value="1" {{ $transaction->status == Status::SUCCESS ? 'selected' : '' }}>Completed</option>
                                                        <option value="2" {{ $transaction->status == Status::PENDIDNG ? 'selected' : '' }}>Pending</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td class="text-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </td>
                                        </form>
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
