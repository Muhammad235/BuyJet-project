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


                                                <tbody>
                                                    <tr>
                                                        <th>Profile Picture</th>
                                                        <td>
                                                            <img src="{{ asset($user->avatar) }}" alt="Profile Picture" width="100" height="100">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fullname</th>
                                                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>phone_number </th>
                                                        <td>{{ $user->phone_number  }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>
                                                            {{ $user->email }}
                                                            @if ($user->email_verified_at != null)
                                                                <span class="badge badge-soft-success font-size-16">Verified</span>
                                                            @else
                                                                <span class="badge badge-soft-danger font-size-16">Not Verified</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>DOB</th>
                                                        <td>{{ $user->dob }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Date Join</th>
                                                        <td>{{ $user->created_at }}</td>
                                                    </tr>

                                                    <form action="{{ route('admin.users.update', $user->id) }}" class="row row-cols-lg-auto g-3 align-items-center" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <tr>
                                                            <th>Status</th>
                                                            <td>
                                                                <div class="col-12">
                                                                    <select name="status" id="" class="form-control">
                                                                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                                        <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </form>




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
