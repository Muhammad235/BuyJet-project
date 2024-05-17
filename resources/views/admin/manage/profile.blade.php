@extends('layouts.admin')

@section('title','Update Profile')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

                        <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                      
                        <div class="card-body">
                            <h4 class="card-title mb-4">Update Profile</h4>
                            
                           
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
                                @if (session('error'))
                                    <script>
                                        Swal.fire({
                                        title: "Done",
                                        text: "{{ session('error') }}",
                                        icon: "error", 
                                        });
                                    </script>
                                @endif 
                            
                                <div class="tab-pane" id="change-password" role="tabpanel">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
        
                                                <h4 class="card-title">Change Password</h4>
        
                                                <form action="{{ route('admin.profile.password') }}" method="post">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Old Password</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" name="old_password" type="password" value="" id="example-text-input">
                                                        </div>
                                                    </div>
    
                                                    <div class="mb-3 row"> 
                                                        <label for="example-text-input" class="col-md-2 col-form-label">New  Password</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" name="new_password" type="password" value="" id="example-text-input">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-3 row"> 
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Confirm  Password</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" name="confirm_password" type="password" value="" id="example-text-input">
                                                        </div>
                                                    </div>
    
                                                    <div class="mb-3">
                                                        <div class="text-end">
                                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Update Password</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                
        
                                            </div>
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