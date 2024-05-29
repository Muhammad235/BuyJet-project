@extends('layouts.admin')

@section('title','Manage Cryptocurrency')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                         
                            <h4 class="card-title mb-3">Manage Cryptocurrency</h4>

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
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-4">All Cryptocurrencies</h4>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end">

                                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addCryptoModal"><i class="bx bx-plus"></i> Add Crypto</button>
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
                                                    @if (count($crypto) > 0)
                                                        @foreach ($crypto->reverse() as $key => $coin)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $coin->name }}</td>
                                                                <td>
                                                                    <img src="{{ asset('storage/crypto/' . $coin->symbol) }}" alt="" class="avatar-xs rounded-circle">
                                                                </td>
                                                               
                                                                <td>
                                                                    @if ($coin->status == 1)
                                                                        <span class="badge badge-soft-success font-size-11">Active</span>
                                                                    @elseif ($coin->status == 0)
                                                                        <span class="badge badge-soft-danger font-size-11">Inactive</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button id="editCrypto" data-cryptoId="{{ $coin->id }}" class="btn btn-primary btn-sm edit-crypto">
                                                                        <i class="bx bx-edit"></i>
                                                                        Update
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7" class="text-center">No Cryptocurrency found.</td>
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

    {{-- add modal   --}}
    <div class="modal fade" id="addCryptoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Crypto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="repeater" action="{{ route('admin.manage.cryptos.store') }}" enctype="multipart/form-data">
                         @csrf
                         <div class="mb-3">
                             <label>Name :</label>
                             <input type="text" name="name" required  class="form-control" placeholder="Enter Name">
                         </div>
{{-- 
                         <div class="mb-3">
                            <label>Buy Rate :</label>
                            <input type="text" name="buy_rate" oninput="validateInput(this);" required  class="form-control" placeholder="Buy Rate">
                        </div>

                        <div class="mb-3">
                            <label>Sell Rate :</label>
                            <input type="text" name="sell_rate" oninput="validateInput(this);" required  class="form-control" placeholder="Sell Rate">
                        </div> --}}

                        <div id="repeater-list">
                            <div class="repeater-item">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3 me-3">
                                            <label>Asset Name</label>
                                            <input type="text" class="form-control" name="assetname[]" placeholder="Enter Asset Name" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3 me-3">
                                            <label>Wallet Address</label>
                                            <input type="text" class="form-control" name="assetaddress[]" placeholder="Enter Wallet Address">
                                        </div>
                                    </div>
                                    <div class="col-3 align-self-end">
                                        <input type="button" class="delete-btn btn btn-danger" value="Delete"/>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="button" id="addBtn" class="add-btn btn btn-success" value="Add"/>
                        </div>
                        

                        <div class="mb-3">
                            <label>Charge (In Dollars):</label>
                            <input type="text" name="charge" oninput="validateInput(this);" required  class="form-control" placeholder="Enter Charge">
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
                            <label>Wallet Address :</label>
                            <input type="text" name="wallet_address" required  class="form-control" placeholder="Enter Wallet Address">
                        </div>

                         <div class="mb-3">
                             <button type="submit" class="btn btn-primary waves-effect waves-light">Add Crypto</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Crypto</h5>
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
                         {{-- <div class="mb-3">
                            <label>Buy Rate :</label>
                            <input type="text" name="buy_rate" oninput="validateInput(this);" required  class="form-control" placeholder="Buy Rate">
                        </div>

                        <div class="mb-3">
                            <label>Sell Rate :</label>
                            <input type="text" name="sell_rate" oninput="validateInput(this);" required  class="form-control" placeholder="Sell Rate">
                        </div> --}}
                        <div id="update-repeater-list">
                            <div class="update-repeater-item">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="button" id="updateBtn" class="btn btn-success" value="Add Asset"/>
                        </div>
                        <div class="mb-3">
                            <label>Charge (In Dollars):</label>
                            <input type="text" name="charge" oninput="validateInput(this);" required  class="form-control" placeholder="Enter Charge">
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
                            <label>Wallet Address :</label>
                            <input type="text" name="wallet_address" required  class="form-control" placeholder="Enter Wallet Address">
                        </div>

                        <div class="mb-3">
                            <label for="status">Select Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>

                         <div class="mb-3">
                             <button type="submit" class="btn btn-primary waves-effect waves-light">Update Crypto</button>
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
                    <script>document.write(new Date().getFullYear())</script> © {{ env('APP_NAME') }}.
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

    document.addEventListener("DOMContentLoaded", function() {
    
        const addBtn = document.getElementById('addBtn');
        const repeaterList = document.getElementById('repeater-list');

        addBtn.addEventListener('click', function() {
            const template = document.querySelector('.repeater-item');
            const newItem = template.cloneNode(true);
            newItem.classList.add('repeater-item');

            // Removing the existing content
            newItem.innerHTML = `
                <div class="row">
                    <div class="col-3">
                        <div class="mb-3 me-3">
                            <label>Asset Name</label>
                            <input type="text" class="form-control" name="assetname[]" placeholder="Enter Asset Name" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3 me-3">
                            <label>Wallet </label>
                            <input type="text" class="form-control" name="assetaddress[]" placeholder="Enter Wallet Address" required>
                        </div>
                    </div>
                    <div class="col-3 align-self-end">
                        <input type="button" class="delete-btn btn btn-danger" value="Delete"/>
                    </div>
                </div>
            `;

            repeaterList.appendChild(newItem);

            const deleteBtns = newItem.querySelectorAll('.delete-btn');
            deleteBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    this.closest('.repeater-item').remove();
                });
            });
        });

        const updateBtn = document.getElementById('updateBtn');
        const updateRepeaterList = document.getElementById('update-repeater-list');

        updateBtn.addEventListener('click', function() {
            const template = document.querySelector('.update-repeater-item');
            const newItem = template.cloneNode(true);
            newItem.classList.add('update-repeater-item');

            // Removing the existing content
            newItem.innerHTML = `
                <div class="row">
                    <div class="col-3">
                        <div class="mb-3 me-3">
                            <label>Asset Name</label>
                            <input type="text" class="form-control" name="assetname[]" placeholder="Enter Asset Name" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3 me-3">
                            <label>Wallet </label>
                            <input type="text" class="form-control" name="assetaddress[]" placeholder="Enter Wallet Address" required>
                        </div>
                    </div>
                    <div class="col-3 align-self-end">
                        <input type="button" class="update-delete-btn btn btn-danger" value="Delete"/>
                    </div>
                </div>
            `;
            updateRepeaterList.appendChild(newItem);
            const deleteBtns = newItem.querySelectorAll('.update-delete-btn');
            deleteBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    this.closest('.update-repeater-item').remove();
                });
            });
        });

    });

</script>