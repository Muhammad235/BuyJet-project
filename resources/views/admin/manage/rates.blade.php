@extends('layouts.admin')

@section('title','Update Rates')

@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                         
                            <h4 class="card-title mb-3">Update Rates</h4>

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
                                    <form method="POST" action="{{ route('admin.manage.rates.update', $rate->id) }}" enctype="multipart/form-data">
                                       @method('PATCH')
                                        @csrf
                                        <div class="mb-3">
                                            <label>Buy Rate :</label>
                                            <input type="text" name="buy_rate" required value="{{ $rate->buy_rate }}" class="form-control" placeholder="Enter Buy Rate">
                                        </div>

                                        <div class="mb-3">
                                            <label>Sell Rate :</label>
                                            <input type="text" name="sell_rate" required value="{{ $rate->sell_rate }}" class="form-control" placeholder="Enter Sell Rate">
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