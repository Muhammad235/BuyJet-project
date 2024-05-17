@extends('layouts.admin')

@section('title','Update Bank Details')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                         
                            <h4 class="card-title mb-3">Update Bank Details</h4>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                    <script>
                                        Swal.fire({
                                        title: "Done",
                                        text: "{{ session('success') }}",
                                        icon: "success", 
                                        });
                                    </script>
                                @endif 
                            <div class="tab-content crypto-buy-sell-nav-content p-4">

                                <div class="tab-pane active" id="buy" role="tabpanel">
                                    <form method="POST" action="{{ route('admin.manage.banks.update', $bank->id) }}" enctype="multipart/form-data">
                                       @method('PATCH')
                                        @csrf
                                        <div class="mb-3">
                                            <label>Bank Name :</label>
                                            <select name="bank_name" required class="form-control" id="bank_name" onchange="changeBank(this)">
                                                @foreach (config('banks.banks') as $banks)
                                                        <option @if ($bank->bank_name == $banks)
                                                            selected
                                                            @else
                                                            ""
                                                        @endif value="{{ $banks }}">{{ $banks }}</option>
                                                @endforeach
                                                    <option  selected value="{{ $bank->bank_name }}">Others - {{ $bank->bank_name }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="otherBankField" style="display: none;">
                                            <label>New Bank Name :</label>
                                            <input type="text" name="new_bank_name" class="form-control" placeholder="Enter New Bank Name">
                                        </div>

                                        <div class="mb-3">
                                            <label>Account Number :</label>
                                            <input type="text" name="account_number" required value="{{ $bank->account_number }}" class="form-control" placeholder="Enter Account Number">
                                        </div>

                                        <div class="mb-3">
                                            <label>Account Name :</label>
                                            <input type="text" name="account_name" required value="{{ $bank->account_name }}" class="form-control" placeholder="Enter Account Name">
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                        </div>
                                    </form>
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
<script>
    const changeBank = () =>{
        var otherBankField = document.getElementById('otherBankField');
        const bank_name = document.getElementById('bank_name');
        console.log(otherBankField);
        // get selected option
        if (bank_name.value === 'other') {
            otherBankField.style.display = 'block';
        } else {
            otherBankField.style.display = 'none';
            otherBankField.value = '';
        }
    }
</script>