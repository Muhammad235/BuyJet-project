@extends('layouts.admin')

@section('title','Manage Currency')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-3">Manage Currency</h4>

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
                            <div class="tab-content giftcard-buy-sell-nav-content p-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-4">All Currencies</h4>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end">

                                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addCryptoModal"><i class="bx bx-plus"></i> Add Currency</button>
                                            </div>

                                        </div>
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped w-100">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <th>Name</th>
                                                        <th>Symbol</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if (count($currencies) > 0)
                                                        @foreach ($currencies->reverse() as $key => $currency)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $currency->name }}</td>
                                                                <td>
                                                                    <img src="{{ asset($currency->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                                </td>

                                                                <td>
                                                                    @if ($currency->status == 1)
                                                                        <span class="badge badge-soft-success font-size-11">Active</span>
                                                                    @elseif ($currency->status == 0)
                                                                        <span class="badge badge-soft-danger font-size-11">Inactive</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button id="editCrypto" data-currencyid="{{ $currency->id }}" class="btn btn-primary btn-sm edit-currency">
                                                                        <i class="bx bx-edit"></i>
                                                                        Update
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7" class="text-center">No currency found.</td>
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
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    {{-- add modal  --}}
    <div class="modal fade" id="addCryptoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Currency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="repeater" action="{{ route('admin.manage.currency.store') }}" enctype="multipart/form-data">
                         @csrf
                         <div class="mb-3">
                             <label>Name :</label>
                             <input type="text" name="name" required  class="form-control" placeholder="Enter Name">
                         </div>
                         <div class="mb-3 row">
                            <img src="" style="width: 200px" alt="image"  id="selected-img" class="img-fluid rounded">
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-avatar" class="col-md-2 col-form-label">Symbol</label>
                            <div class="col-md-10">
                                <input type="file" value="0" onchange="displaySelectedImage()" name="symbol" class="form-control" id="selectedimage">
                            </div>
                        </div>

                         <div class="mb-3">
                             <button type="submit" class="btn btn-primary waves-effect waves-light">Add Currency</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal   --}}
    <div class="modal fade" id="editCryptoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Currency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" id="editCryptoForm" enctype="multipart/form-data">
                         @csrf
                         @method('PATCH')
                         <div class="mb-3">
                             <label>Name :</label>
                             <input type="text" name="name" required  class="form-control" placeholder="Enter Name">
                         </div>
                         <input type="hidden" name="id" id="">
                         <div class="mb-3 row">
                            <img src="" style="width: 200px" alt="image"  id="selected-img" class="img-fluid rounded">
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-avatar" class="col-md-2 col-form-label">Symbol</label>
                            <div class="col-md-10">
                                <input type="file" value="0" onchange="displaySelectedImage()" name="symbol" class="form-control" id="selectedimage">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status">Select Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                         <div class="mb-3">
                             <button type="submit" class="btn btn-primary waves-effect waves-light">Update Currency</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © {{ config('APP_NAME') }}.
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection

<script>
    function validateInput(input) {
    // Remove any non-numeric characters and any multiple decimal points
        input.value = input.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
    }

</script>
