@extends('layouts.admin')

@section('title','Manage Users')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                         
                            <h4 class="card-title mb-3">Manage Users</h4>

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
                                       
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped dt-responsive  w-100">
                                                <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <th>Fullname</th>
                                                    <th>Phone</th> 
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
            
                                                <tbody>
                                                    @if (count($users) > 0)
                                                        @foreach ($users as $key => $user)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $user->surname }} {{ $user->firstname }}</td>
                                                                <td>{{ $user->phone }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>
                                                                    @if ($user->status == 'active')
                                                                        <span class="badge badge-soft-success font-size-11">Active</span>
                                                                    @elseif ($user->status == 'inactive')
                                                                        <span class="badge badge-soft-primary font-size-11">Inactive</span>
                                                                        @elseif ($user->status == 'pending')
                                                                        <span class="badge badge-soft-danger font-size-11">Pending</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a  href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary btn-sm edit-crypto">
                                                                        <i class="bx bx-edit"></i>
                                                                        Update
                                                                    </a>
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